<?php

namespace App\Http\Controllers\Admin\Staff;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminAccount;
use App\Http\Models\AdminMenuGrant;
use Auth;

class GetAllStaffAction extends Controller
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
        
        $users = AdminAccount::whereNotIn('role_id', [1,2])->get();
        foreach ($users as $key => $value) {
            $value->grants = AdminMenuGrant::where('admin_id', $value->id)->select('name', 'menu_id')->get();
        }

        $arrView = [
            'users' => $users
        ];

        return view('pages.admin.staff.index', $arrView);
    }
}
