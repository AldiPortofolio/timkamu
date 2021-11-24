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

class PostStaffCreateAction extends Controller
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
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }
        
        $user = AdminAccount::where('email', $request->email)->first();
        if ($user) {
            return redirect(url()->previous())->with('failed-signup', 'Email is arleady registered')->withInput();
        }

        $phoneNumber = $this->normalizePhoneNumber($request->phone);
        $user = AdminAccount::where('phone', $phoneNumber)->first();
        if ($user) {
            return redirect(url()->previous())->with('failed-signup', 'Phone number is already registered')->withInput();
        }
        $maxUserId = DB::table('admin_accounts')->max('id');
        $accountNumber = Carbon::now()->format('dmy') . str_pad(($maxUserId + 1), 4, 0, STR_PAD_LEFT);
        $roleId = Role::where('name', 'STAFF')->select('id')->pluck('id')->first();

        try {
            DB::beginTransaction();

            $data = new AdminAccount();
            $data->account_number = $accountNumber;
            $data->role_id        = $roleId;
            $data->username       = $request->name;
            $data->email          = $request->email;
            $data->phone          = $phoneNumber;
            $data->address        = $request->address;
            $data->password       = Hash::make($accountNumber);
            $data->save();
            $adminId = $data->id;

            foreach ($request->grants as $value) {
                AdminMenuGrant::create([
                    'admin_id'  => $adminId,
                    'menu_id'   => $request->menu_id,
                    'name'      => strtoupper($value)
                ]);
            }

            // $sendEmail = Mail::to($request->email)->send(new SignUpEmail($request->all(), $otpCode));
            // if (Mail::failures()) {
            //     DB::rollBack();

            //     return redirect(url()->previous())->with('failed', 'We cannot send verification email to that email address. Please use valid email address.')->withInput();
            // }

            DB::commit();
            return redirect('admin-tkmu/staffs')->with('success', 'Data created');
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
