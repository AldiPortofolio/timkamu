<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Http\Models\UserLog;
use Carbon\Carbon;
use App\Mail\SignUpEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PostResendVerifyAccountAction extends Controller
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
        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return redirect(url()->previous())->with('failed', 'failed-resend-email-notfound');
        }

        $otpCode = rand(111111, 999999);
        if ($user) {
            if ((int)$user->active === 1) {
                return redirect('/');
            }

            try {
                DB::beginTransaction();

                User::where('id', $user->id)->update([
                    'otp_code' => $otpCode,
                    'otp_expired' => Carbon::now()->addMinute(30)
                ]);

                Mail::to($request->email)->send(new SignUpEmail($user, $otpCode));

                DB::commit();

                return redirect('/otp')->with('success', 'success-resend');
            } catch (\Exception $e) {
                DB::rollBack();

                return redirect(url()->previous())->with('failed', 'failed-resend');
            }
        }
        return redirect(url()->previous())->with('failed', 'failed-resend');
    }
}
