<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Models\User;
use App\Http\Models\UserLog;
use App\Mail\ResetPasswordEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PostResetPassword extends Controller
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
        $request->session()->save();
        $user = User::where('email', $request->email)->first();
        $type = 'send-reset';
        if($request->email_reset) {
            $user = User::where('email', $request->email_reset)->first();
            $type = 'reset';
        }

        if($user) {
            try {
                DB::beginTransaction();

                if(!$request->email_reset) {
                    $token = Hash::make($user->email);
                    User::where('id', $user->id)->update([
                        'token' => $token
                    ]);

                    Mail::to($user->email)->send(new ResetPasswordEmail($user->username, $token));
                } else {
                    User::where('id', $user->id)->update([
                        'password' => Hash::make($request->password)
                    ]);
                }

                DB::commit();
                return redirect(url()->previous())->with($type.'-success', 'success');
            } catch (\Exception $e) {
                Log::info($e->getMessage());
                DB::rollBack();

                return redirect(url()->previous());
            }
        }

        return redirect(url()->previous())->with($type.'-failed', 'failed');
    }
}