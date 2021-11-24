<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Auth;

class GetUserEditFormAction extends Controller
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
    public function __invoke()
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }
        
        return view('pages.admin.users.create');
    }
}
