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

class PostUpdatePasswordAction extends Controller
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
        if($request->password !== $request->confirm_password) {
            return redirect(url()->previous())->with('failed', 'update-password-notmatch');
        }

        $user = Auth::user();
        
        if($user) {
            try {
                DB::beginTransaction();

                User::where('id', Auth::id())->update(['password' => Hash::make($request->password)]);

                DB::commit();
                return redirect(url()->previous())->with('success', 'success-update-password');
            } catch (\Exception $e) {
                Log::info($e->getMessage());
                DB::rollBack();

                return redirect(url()->previous());
            }
        }

        return redirect(url()->previous())->with('failed', 'failed-update-password');
    }
}