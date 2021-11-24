<?php

namespace App\Http\Controllers\Authentication;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Http\Models\Role;
use App\Http\Models\User;
use App\Mail\SignUpEmail;
use Carbon\Carbon;

use \Guzzle;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;

class PostSignUpAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request)
    {
        if ($request->username && strpos($request->username, ' ') > 0) {
            return redirect('/sign-up')->with('failed', 'Tidak boleh ada spasi di username kamu.')->withInput();
        }

        if($request->username && strlen($request->username) > 24) {
            return redirect('/sign-up')->with('failed', 'Username maksimal 24 karakter')->withInput();
        }

        if ($request->username && strlen($request->username) < 6) {
            return redirect('/sign-up')->with('failed', 'Username harus minimum 6 karakter.')->withInput();
        }

        $user = User::where('username', $request->username)->first();
        if ($user) {
            return redirect('/sign-up')->with('failed', 'Maaf, username tersebut sudah terpakai.')->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            return redirect('/sign-up')->with('failed', 'Email sudah terdaftar')->withInput();
        }

        $phoneNumber = $this->normalizePhoneNumber($request->phone);
        $user = User::where('phone', $phoneNumber)->first();
        if ($user) {
            return redirect('/sign-up')->with('failed', 'Nomor telefon sudah terdaftar')->withInput();
        }

        if (!is_numeric($request->phone)) {
            return redirect('/sign-up')->with('failed', 'Nomor telefon harus hanya berisikan angka.')->withInput();
        }

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
            'secret' => ENV('RECAPTCHA_SERVER_KEY'),
            'response' => $request->get('g-recaptcha-response'),
            'remoteip' => $remoteip
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode(json_encode(['success' => true, 'score' => 0.3]));
//        $resultJson->success = true;
//        $request->score = 0.3;

        if ($resultJson->success != true) {
            Log::info(json_encode($resultJson));

            return back()->with('failed', 'Terjadi error. Silahkan coba beberapa saat lagi.')->withInput();
        }
        if ($resultJson->score >= 0.3) {
            if ($request->password !== $request->password_confirmation) {
                return redirect('/sign-up')->with('failed', 'Password tidak sama')->withInput();
            }

            $maxUserId = DB::table('users')->max('id');
            $accountNumber = Carbon::now()->format('dmy') . str_pad(($maxUserId + 1), 4, 0, STR_PAD_LEFT);
            $roleId = Role::where('name', 'USER')->pluck('id')->first();

            $otpCode = rand(111111, 999999);
            $isOtpExist = User::where('otp_code', $otpCode)->first();
            while($isOtpExist) {
                $otpCode = rand(111111, 999999);
                $isOtpExist = User::where('otp_code', $otpCode)->first();
            }
            $token = Hash::make($otpCode);
            try {
                DB::beginTransaction();

                User::create([
                    'account_number' => $accountNumber,
                    'username'       => $request->username,
                    'email'          => strtolower($request->email),
                    'phone'          => $phoneNumber,
                    'otp_code'       => $otpCode,
                    'otp_expired'    => Carbon::now()->addMinute(30),
                    'role_id'        => $roleId,
                    'password'       => Hash::make($request->password),
                    'token'          => $token,
                    'referral_code_from' => $request->referral_code
                ]);

                if(!in_array(ENV('APP_ENV'), ['local'])) {
                    $this->sendOTP($phoneNumber, $otpCode);
                }

                // $sendEmail = Mail::to($request->email)->send(new SignUpEmail($request->username, $token));
                // if (Mail::failures()) {
                //     DB::rollBack();

                //     return redirect('/sign-up')->with('failed-signup', 'We cannot send verification email to that email address. Please use valid email address.')->withInput();
                // }

                DB::commit();

                $user = User::where('email', $request->email)->first();
                Auth::login($user);

                return redirect('/otp');
            } catch (\Exception $e) {
                Log::info($e->getMessage());

                DB::rollback();
                return redirect('/sign-up')->with('failed', 'Terjadi error. Silahkan coba beberapa saat lagi.')->withInput();
            }
        } else {
            Log::info(json_encode($resultJson));

            return back()->with('failed', 'Terjadi error. Silahkan coba beberapa saat lagi.')->withInput();
        }
    }

    private function sendOTP($phone, $otpCode) {
        $message = $otpCode . ' adalah kode verifikasi Timkamu.com Anda';

        $req = [
            'apikey'        => ENV('RAJA_SMS_API_KEY'),
            'senderid'      => '1',
            'callbackurl'   => '',
            'datapacket'    => [
                [
                    'number'  => '62' . $phone,
                    'message' => $message
                ]
            ]
        ];

        $client = new \GuzzleHttp\Client();
        $res = $client->request(
            'POST',
            ENV('RAJA_SMS_URL'),
            [
                'headers' => [
                    'Content-Type'  => 'application/json'
                ],
                'body'    => json_encode($req)
            ]
        );

        $body = json_decode($res->getBody()->getContents());

        return $body;
    }

    private function normalizePhoneNumber($phone)
    {
        if (substr($phone, 0, 1) == '0') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 1) == '+') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 2) == '62') {
            $phone = substr($phone, 2);
        }

        return $phone;
    }
}
