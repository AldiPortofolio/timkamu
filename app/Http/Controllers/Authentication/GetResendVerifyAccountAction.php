<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Mail\SignUpEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GetResendVerifyAccountAction extends Controller
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
            try {
                DB::beginTransaction();

                User::where('id', $user->id)->update([
                    'token'       => $token,
                    'otp_code'    => $otpCode,
                    'otp_expired' => Carbon::now()->addMinute(30)
                ]);

                Mail::to($user->email)->send(new SignUpEmail($user->username, $token));

                DB::commit();

                return redirect(url()->previous())->with('success', 'success-resend-email');
            } catch (\Exception $e) {
                Log::info($e->getMessage());
                DB::rollBack();

                return redirect(url()->previous())->with('failed', 'failed-resend');
            }
        }
        return redirect(url()->previous())->with('failed', 'failed-resend');
    }
}
