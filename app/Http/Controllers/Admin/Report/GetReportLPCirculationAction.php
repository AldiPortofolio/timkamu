<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventTransaction;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetReportLPCirculationAction extends Controller
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
        ini_set('memory_limit', '-1');
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }

        $dataUsers = User::get()->sum('total_lp');

        $dataMemberRecharge = Transaction::where('item_id', 1)->where('status', 'PAID')->whereNotIn('payment_type', ['LP', 'BP', 'COIN'])->get()->sum('total');
        $dataMarkteing54 = UserTransaction::where('item_id', 2)->where('type', 'CR')->where('value', 54)->where('desc', 'Registration Bonus')->get()->sum('value');
        $dataMarkteing26 = UserTransaction::where('item_id', 2)->where('type', 'CR')->where('value', 26)->where('desc', 'Registration Bonus')->get()->sum('value');
        $dataMemberBPConvert = UserTransaction::where('item_id', 2)->where('type', 'DB')->where('desc', 'Convert to LP')->get()->sum('value');
        $dataMemberCoinConvert = UserTransaction::where('item_id', 78)->where('type', 'DB')->where('desc', 'Convert to LP')->get()->sum('value');

        $arrView = [
            'total_lp_beredar' => $dataUsers,
            'total_recharge' => $dataMemberRecharge,
            'total_marketing_batch_one' => $dataMarkteing54,
            'total_marketing_batch_two' => $dataMarkteing26,
            'total_member_bp_convert' => $dataMemberBPConvert,
            'total_member_coin_convert' => $dataMemberCoinConvert
        ];

        return view('pages.admin.report.lp.circulation', $arrView);
    }
}
