<?php

namespace App\Http\Controllers\Authentication;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Http\Models\UserLog;
use Carbon\Carbon;
use App\Mail\SignUpEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PostSetupPhoneAction extends Controller
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
        $user = User::where('token', $request->token)->first();
        if(!$user) {
            return redirect(url()->previous())->with('failed', 'failed-otp-token-notfound');
        }

        $otpCode = rand(111111, 999999);
        $token = Hash::make($otpCode);
        if ($user) {
            if ((int)$user->active === 1) {
                return redirect('/');
            }

            try {
                DB::beginTransaction();

                $phoneNumber = GlobalFunction::normalizePhoneNumber($request->phone);
                User::where('id', $user->id)->update([
                    'phone'          => $phoneNumber,
                    'otp_code'       => $otpCode,
                    'otp_expired'    => Carbon::now()->addMinute(30),
                    'token'          => $token
                ]);

                $message = $otpCode . ' adalah kode verifikasi Timkamu.com Anda';

                if (ENV('APP_ENV') !== 'local') {
                    GlobalFunction::sendOTP($phoneNumber, $message);
                }

                DB::commit();

                return redirect('/otp');
            } catch (\Exception $e) {
                DB::rollBack();

                return redirect(url()->previous())->with('failed', 'failed-resend');
            }
        }
        return redirect(url()->previous())->with('failed', 'failed-resend');
    }
}
