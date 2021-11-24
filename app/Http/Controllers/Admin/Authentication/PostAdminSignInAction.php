<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminAccount;
use App\Http\Models\User;
use App\Http\Models\UserLog;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PostAdminSignInAction extends Controller
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
        $user = AdminAccount::where('email', $request->username)->first();

        if ($user) {
            $checkPassword = Hash::check($request->password, $user->password);
            if (!$checkPassword) {
                return redirect('/admin-tkmu/sign-in')->with('failed', 'failed-login');
            }

            if ($checkPassword) {
                try {
                    Auth::guard('admin')->login($user);
                    
                    return redirect('/admin-tkmu');
                } catch (\Exception $e) {
                    Log::info($e);

                    return redirect('/admin-tkmu/sign-in');
                }
            }
        }

        return redirect('/admin-tkmu/sign-in')->with('failed', 'Login error');
    }
}
