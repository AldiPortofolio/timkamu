<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Mail\SignUpEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PostUserCreateAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request)
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }
        
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return redirect('/sign-up')->with('failed-signup', 'Email is arleady registered')->withInput();
        }

        $phoneNumber = $this->normalizePhoneNumber($request->phone);
        $user = User::where('phone', $phoneNumber)->first();
        if ($user) {
            return redirect('/sign-up')->with('failed-signup', 'Phone number is already registered')->withInput();
        }
        $maxUserId = DB::table('users')->max('id');
        $accountNumber = Carbon::now()->format('dmy') . str_pad(($maxUserId + 1), 4, 0, STR_PAD_LEFT);

        $otpCode = rand(111111, 999999);
        try {
            DB::beginTransaction();

            User::create([
                'account_number' => $accountNumber,
                'name'           => $request->name,
                'email'          => $request->email,
                'phone'          => $phoneNumber,
                'otp_code'       => $otpCode,
                'role_id'        => $request->role_id,
                'password'       => Hash::make('123456')
            ]);

            // $this->sendOTP($phoneNumber, $otpCode);

            $sendEmail = Mail::to($request->email)->send(new SignUpEmail($request->all(), $otpCode));
            if (Mail::failures()) {
                DB::rollBack();

                return redirect(url()->previous())->with('failed', 'We cannot send verification email to that email address. Please use valid email address.')->withInput();
            }

            DB::commit();
            return redirect(url()->previous())->with('success', 'Data created');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollback();
            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer')->withInput();
        }
    }

    private function sendOTP($phone, $otpCode)
    {
        $message = 'Registration successful. ' . $otpCode . ' is your code. Do not share with anyone';

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
