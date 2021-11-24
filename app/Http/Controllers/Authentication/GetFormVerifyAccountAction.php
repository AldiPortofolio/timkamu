<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Http\Models\UserLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetFormVerifyAccountAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function __invoke()
    {
        ini_set('memory_limit', '-1');
        if (Auth::user()->phone_verified === '1' && Auth::user()->email_verified === '1') {
            return redirect('/');
        }
        if(Auth::id() === null || Auth::user()->otp_expired <  Carbon::now()->format('Y-m-d H:i:s')) {
            return redirect('/');
        }

        $time = Carbon::parse(Auth::user()->otp_expired)->format('Y-m-d H:i:s');
        $timeResend = Carbon::parse(Auth::user()->otp_expired)->subMinute(30)->addSecond(30)->format('Y-m-d H:i:s');

        $arrView = [
            'timer' => $time,
            'time_resend' => $timeResend
        ];

        return view('pages.otp', $arrView);
    }

    public function skipOtp()
    {
        return redirect('/events');
    }
}
