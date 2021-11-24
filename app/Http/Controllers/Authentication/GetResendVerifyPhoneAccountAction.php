<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Mail\SignUpEmail;
use Carbon\Carbon;
use http\Env;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GetResendVerifyPhoneAccountAction extends Controller
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

    public function __invoke()
    {
        ini_set('memory_limit', '-1');
        $user = Auth::user();
        if (!$user) {
            return redirect(url()->previous())->with('failed', 'failed-resend-email-notfound');
        }

        $otpCode = rand(111111, 999999);
        $token = Hash::make($otpCode);
        if ($user) {
            if ($user->phone_verified === '1' && $user->email_verified === '1') {
                return redirect('/');
            }

            $phone = $user->phone;
            try {
                DB::beginTransaction();

                User::where('id', $user->id)->update([
                    'token'       => $token,
                    'otp_code'    => $otpCode,
                    'otp_expired' => Carbon::now()->addMinute(30)
                ]);

                if(!in_array(ENV('APP_ENV'), ['local'])) {
                    $this->sendOTP($phone, $otpCode);
                }

                DB::commit();

                return redirect('/otp-resend')->with('success', 'success-resend');
            } catch (\Exception $e) {
                Log::info($e->getMessage());
                DB::rollBack();

                return redirect(url()->previous())->with('failed', 'failed-resend');
            }
        }
        return redirect(url()->previous())->with('failed', 'failed-resend');
    }

    private function sendOTP($phone, $otpCode)
    {
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
}
