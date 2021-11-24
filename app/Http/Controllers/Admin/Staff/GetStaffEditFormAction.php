<?php

namespace App\Http\Controllers\Admin\Staff;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminAccount;
use App\Http\Models\AdminMenuGrant;
use Auth;

class GetStaffEditFormAction extends Controller
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
    public function __invoke($id)
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }

        $staff = AdminAccount::find($id);
        $staffMenuGrants = AdminMenuGrant::where('admin_id', $id)->get();

        $arrView = [
            'staff' => $staff,
            'staff_menu_grants' => $staffMenuGrants
        ];
        
        return view('pages.admin.staff.edit', $arrView);
    }
}
