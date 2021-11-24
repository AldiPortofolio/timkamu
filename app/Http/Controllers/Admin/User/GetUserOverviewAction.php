<?php

namespace App\Http\Controllers\Admin\User;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\SystemMail;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetUserOverviewAction extends Controller
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
        ini_set('memory_limit', '-1');

        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }
        $filter = app('request')->input('filter');

        $arrMonth = [];
        $totalMemberThisMonth = 0;
        $totalVerifiedMemberThisMonth = 0;
        $totalEmailVerifiedMemberThisMonth = 0;
        $users = '';
        if ($filter) {
            $verifiedPhoneUser = DB::table('users')->where('role_id', 3)->where('phone_verified', '1')->whereMonth('created_at', Carbon::parse($filter)->format('m'))->get();
            $totalVerifiedMemberThisMonth = count($verifiedPhoneUser);

            $verifiedEmailUser = DB::table('users')->where('role_id', 3)->where('email_verified', '1')->whereMonth('created_at', Carbon::parse($filter)->format('m'))->get();
            $totalEmailVerifiedMemberThisMonth = count($verifiedEmailUser);

            $users = DB::table('users')->where('role_id', 3)->whereMonth('created_at', Carbon::parse($filter)->format('m'))->get();
            $totalMemberThisMonth = count($users);
        } else {
            $verifiedPhoneUser = DB::table('users')->where('role_id', 3)->where('phone_verified', '1')->whereMonth('created_at', Carbon::now()->format('m'))->get();
            $totalVerifiedMemberThisMonth = count($verifiedPhoneUser);

            $verifiedEmailUser = DB::table('users')->where('role_id', 3)->where('email_verified', '1')->whereMonth('created_at', Carbon::parse($filter)->format('m'))->get();
            $totalEmailVerifiedMemberThisMonth = count($verifiedEmailUser);

            $users = DB::table('users')->where('role_id', 3)->whereMonth('created_at', Carbon::parse($filter)->format('m'))->get();
            $totalMemberThisMonth = count($users);
        }

        foreach ($verifiedPhoneUser as $key => $tUV) {
            $createdMonth = Carbon::parse($tUV->created_at)->format('Y-m-d');
            if ($tUV->phone_verified === '1') {
                if (!isset($arrMonth[$createdMonth])) {
                    $arrMonth[$createdMonth] = 0;
                }

                $arrMonth[$createdMonth] += 1;
            }
        }


        $registrationToday = User::select('id', 'phone_verified')->where('role_id', 3)->where('created_at', '>=', Carbon::today()->format('Y-m-d'))->get();
        $registrationThisWeek = User::select('id', 'phone_verified')->where('role_id', 3)->where('created_at', '>=', Carbon::now()->subDays(6)->startOfDay()->toDateTimeString())->where('created_at', '<=', Carbon::now()->startOfDay()->toDateTimeString())->get();
        $registrationThisMonth = User::select('id', 'phone_verified')->where('role_id', 3)->whereMonth('created_at', Carbon::now()->format('m'))->get();
        $registrationThisYear = User::select('id', 'phone_verified')->where('role_id', 3)->whereYear('created_at', Carbon::now()->format('Y'))->get();

        $totalAll = 0;
        $totalAllVerified = 0;
        $percentageAllVerified = 0;

        $totalRegisToday = $registrationToday->count();
        $totalAll += $totalRegisToday;

        $verifiedRegisToday = $registrationToday->where('phone_verified', 1)->count();
        $totalAllVerified += $verifiedRegisToday;

        $percentageToday = 0;
        if($totalRegisToday > 0) {
            $percentageToday = round(($verifiedRegisToday / $totalRegisToday * 100), 2);
        }

        $totalRegisThisWeek = $registrationThisWeek->count();
        $totalAll += $totalRegisThisWeek;

        $verifiedRegisThisWeek = $registrationThisWeek->where('phone_verified', 1)->count();
        $totalAllVerified += $verifiedRegisThisWeek;

        $percentageThisWeek = 0;
        if ($totalRegisThisWeek > 0) {
            $percentageThisWeek = round(($verifiedRegisThisWeek / $totalRegisThisWeek * 100), 2);
        }

        $totalRegisThisMonth = $registrationThisMonth->count();
        $totalAll += $totalRegisThisMonth;

        $verifiedRegisThisMonth = $registrationThisMonth->where('phone_verified', 1)->count();
        $totalAllVerified += $verifiedRegisThisMonth;

        $percentageThisMonth = 0;
        if ($totalRegisThisMonth > 0) {
            $percentageThisMonth = round(($verifiedRegisThisMonth / $totalRegisThisMonth * 100), 2);
        }

        $totalRegisThisYear = $registrationThisYear->count();
        $totalAll += $totalRegisThisYear;

        $verifiedRegisThisYear = $registrationThisYear->where('phone_verified', 1)->count();
        $totalAllVerified += $verifiedRegisThisYear;

        $percentageThisYear = 0;
        if ($totalRegisThisYear > 0) {
            $percentageThisYear = round(($verifiedRegisThisYear / $totalRegisThisYear * 100), 2);
        }

        $percentageAllVerified = round(($totalAllVerified / $totalAll * 100), 2);


        $thisWeek = Carbon::now()->subDays(7)->format('d M') . ' - ' . Carbon::today()->format('d M Y');

        $arrView = [
            'total_registration_today' => $totalRegisToday,
            'total_registration_this_week' => $totalRegisThisWeek,
            'total_registration_this_month' => $totalRegisThisMonth,
            'total_registration_this_year' => $totalRegisThisYear,

            'total_verified_today' => $verifiedRegisToday,
            'total_verified_this_week' => $verifiedRegisThisWeek,
            'total_verified_this_month' => $verifiedRegisThisMonth,
            'total_verified_this_year' => $verifiedRegisThisYear,

            'percentage_verified_today' => $percentageToday,
            'percentage_verified_this_week' => $percentageThisWeek,
            'percentage_verified_this_month' => $percentageThisMonth,
            'percentage_verified_this_year' => $percentageThisYear,

            'total_all' => $totalAll,
            'total_all_verified' => $totalAllVerified,
            'percentage_all_verified' => $percentageAllVerified,

            'total_member_this_month'  => $totalMemberThisMonth,
            'total_verified_member_this_month'  => $totalVerifiedMemberThisMonth,
            'total_email_verified_member_this_month'  => $totalEmailVerifiedMemberThisMonth,
            'this_week' => $thisWeek,
            'users' => $arrMonth
        ];

        return view('pages.admin.users.overview', $arrView);
    }
}
