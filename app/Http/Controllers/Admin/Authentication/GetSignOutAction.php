<?php

namespace App\Http\Controllers\Admin\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class GetSignOutAction extends Controller
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
        $request->session()->save();
        Auth::guard('admin')->logout();
        return redirect('admin-tkmu/sign-in')->with('success', 'success-logout');
    }
}
