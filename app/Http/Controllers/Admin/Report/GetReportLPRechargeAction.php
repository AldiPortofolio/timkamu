<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventTransaction;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetReportLPRechargeAction extends Controller
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

        $transactions = Transaction::where('item_id', '1')->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP']);
        if ($request->filter || $request->filter === '') {
            $transactions = $transactions->whereMonth('created_at', Carbon::parse($request->filter)->format('m'))->orderBy('created_at', 'desc')->get();
        } else {
            $transactions = $transactions->whereMonth('created_at', Carbon::now()->format('m'))->orderBy('created_at', 'desc')->get();
        }

        $arrMonth = [];
        foreach ($transactions as $key => $value) {
            $createdMonth = Carbon::parse($value->created_at)->format('Y-m-d');
            if (!isset($arrMonth[$createdMonth])) {
                $arrMonth[$createdMonth] = 0;
            }

            $arrMonth[$createdMonth] += $value->total;
        }


        // get recharge
        $totalRechargeLPToday = Transaction::where('created_at', '>=', Carbon::today()->format('Y-m-d'))->where('item_id', '1')->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP'])->get()->sum('total');
        $totalRechargeLPWeek = Transaction::where('created_at', '>=', Carbon::now()->subDays(7)->format('Y-m-d'))->where('created_at', '<', Carbon::now()->addDay()->format('Y-m-d'))->where('item_id', '1')->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP'])->get()->sum('total');
        $totalRechargeLPMonth = Transaction::whereMonth('created_at', Carbon::now()->format('m'))->where('item_id', '1')->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP'])->get()->sum('total');
        $totalRechargeLPYear = Transaction::whereYear('created_at', Carbon::now()->format('Y'))->where('item_id', '1')->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP'])->get()->sum('total');
        $totalRechargeInCirculation = User::select('total_lp')->get()->sum('total_lp');
        $totalRechargeLP = Transaction::where('item_id', '1')->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP'])->count();

        $thisWeek = Carbon::now()->subDays(7)->format('d M') . ' - ' . Carbon::today()->format('d M Y');
        // end of get recharge

        $arrView = [
            'total_recharge_lp_today' => $totalRechargeLPToday,
            'total_recharge_lp_week' => $totalRechargeLPWeek,
            'total_recharge_lp_month' => $totalRechargeLPMonth,
            'total_recharge_lp_year' => $totalRechargeLPYear,
            'total_recharge_lp_in_circulation' => $totalRechargeInCirculation,
            'total_recharge_lp' => $totalRechargeLP,
            'statistic_recharge_lp' => $arrMonth,
            'this_week' => $thisWeek
        ];

        return view('pages.admin.report.lp.recharge', $arrView);
    }
}
