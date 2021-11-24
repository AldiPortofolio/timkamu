<?php

namespace App\Http\Controllers\Admin\Staff;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminAccount;
use App\Http\Models\AdminMenuGrant;
use App\Http\Models\Role;
use App\Http\Models\User;
use App\Mail\SignUpEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PostStaffUpdateAction extends Controller
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
    public function __invoke(Request $request, $id)
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }
        $staff = AdminAccount::find($id);
        
        $isEmailExist = AdminAccount::where('email', $request->email)->select('email')->first();
        if ($isEmailExist && $staff->email !== $request->email) {
            return redirect(url()->previous())->with('failed', 'Email is arleady registered')->withInput();
        }

        $phoneNumber = $this->normalizePhoneNumber($request->phone);
        $isPhoneExist = AdminAccount::where('phone', $phoneNumber)->select('phone')->first();
        if ($isPhoneExist&& $staff->phone !== $phoneNumber) {
            return redirect(url()->previous())->with('failed', 'Phone number is already registered')->withInput();
        }

        try {
            DB::beginTransaction();

            $data = [];
            $data['username'] = $request->name;
            $data['email']    = $request->email;
            $data['phone']    = $phoneNumber;
            $data['address']  = $request->address;
            AdminAccount::where('id', $id)->update($data);
            AdminMenuGrant::where('admin_id', $id)->delete();

            foreach ($request->grants as $value) {
                AdminMenuGrant::create([
                    'admin_id'  => $id,
                    'menu_id'   => $request->menu_id,
                    'name'      => strtoupper($value)
                ]);
            }

            DB::commit();
            return redirect('admin-tkmu/staffs')->with('success', 'Data updated');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollback();
            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer')->withInput();
        }
    }

    private function normalizePhoneNumber($phone)
    {
        if (substr($phone, 0, 1) == '0') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 1) == '+') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 2) == '62') {
            $phone = substr($phone, 2);
        }

        return $phone;
    }
}
