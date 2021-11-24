<?php

namespace App\Http\Controllers\Admin\User;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\SystemMail;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetUserByIdAction extends Controller
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
            return 'error';
        }

        $result = [];
        $result['status'] = 'error';
        $result['message'] = 'Data not found';

        $userId = $request->user;
        $users = [];
        if ($userId) {
            $users = User::find($userId);

            $dataTransactions = Transaction::where('user_id', $userId)->where('item_id', 1)->whereNotIn('payment_type', ['BP', 'COIN'])->where('status', 'PAID')->get();

            $dataCountLPRecharge = number_format(count($dataTransactions), 0, '.', ',');
            $dataAmountLPRecharge = number_format($dataTransactions->sum('total'), 0, '.', ',');

            $users->count_lp_recharge = $dataCountLPRecharge;
            $users->amount_lp_recharge = $dataAmountLPRecharge;

            $dataEventTransactions = EventTransaction::where('user_id', $userId)->where(function ($query) {
                $query->orWhere('status', 2);
                $query->orWhere('status', 3);
            })->get();

            $totalSlip = $dataEventTransactions->count();

            $dataEventTransactionsWin = $dataEventTransactions->where('type', 'WIN')->count();
            $dataEventTransactionsLoss = $dataEventTransactions->where('type', 'LOSS')->count();
            $totalBothEventTransactions = $dataEventTransactionsWin + $dataEventTransactionsLoss;
            $percentageWin = 0;
            if ($totalBothEventTransactions > 0) {
                $percentageWin = round(($dataEventTransactionsWin / $totalBothEventTransactions * 100), 2);
            }

            $users->win_rate = $percentageWin;
            $users->total_slips = number_format($totalSlip, 0, '.', ',');
            $users->win_slip = number_format($dataEventTransactionsWin, 0, '.', ',');

            $users->registration_date = Carbon::parse($users->created_at)->format('d M Y H:i');

            $users->url_view_page = url('admin-tkmu/users/'.$userId);
            $users->url_view_lp_transactions = url('admin-tkmu/lp-transaction-member?username=' . $users->username);
            $users->url_view_all_bets = url('admin-tkmu/report-participants?username=' . $users->username);
            $users->url_view_all_topups = url('admin-tkmu/transactions-member?username=' . $users->username);
            $users->url_view_historical = url('admin-tkmu/transactions-historical-member?username=' . $users->username);

            if(!$users->phone) {
                $users->phone = 'not set<span class="verify-indicator red right"></span>';
            } else if($users->phone_verified) {
                $users->phone = '0'.$users->phone. '<span class="verify-indicator green right"></span>';
            } else if (!$users->phone_verified) {
                $users->phone = '0' . $users->phone . '<span class="verify-indicator red right"></span>';
            }

            if ($users->email_verified) {
                $users->email = $users->email . '<span class="verify-indicator green right"></span>';
            } else if (!$users->email_verified) {
                $users->email = $users->email . '<span class="verify-indicator red right"></span>';
            }
        }

        $result['users'] = $users;
        $result['status'] = 'success';
        $result['message'] = 'Data exist';

        return $result;
    }
}
