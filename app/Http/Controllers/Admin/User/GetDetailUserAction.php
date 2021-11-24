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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetDetailUserAction extends Controller
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
        
        $data = User::find($id);
        $dataTransactions = Transaction::where('user_id', $id)->where('item_id', 1)->whereNotIn('payment_type', ['BP', 'COIN'])->where('status', 'PAID')->get();
        $dataEventTransactions = EventTransaction::where('user_id', $id)->where(function ($query) {
            $query->orWhere('status', 2);
            $query->orWhere('status', 3);
        })->get();

        $dataEventTransactionsWin = $dataEventTransactions->where('type', 'WIN')->count();
        $dataEventTransactionsLoss = $dataEventTransactions->where('type', 'LOSS')->count();
        $totalBothEventTransactions = $dataEventTransactionsWin + $dataEventTransactionsLoss;
        $percentageWin = 0;
        $percentageLoss = 0;
        if($totalBothEventTransactions > 0) {
            $percentageWin = round(($dataEventTransactionsWin / $totalBothEventTransactions * 100), 2);
            $percentageLoss = round(($dataEventTransactionsLoss / $totalBothEventTransactions * 100), 2);
        }

        $avgAmount = 0;
        $biggestWin = 0;
        $biggestLoss = 0;
        foreach ($dataEventTransactions as $key => $value) {
            $detail = json_decode($value->value_detail);
            if($value->type === 'WIN' && $detail->win > $biggestWin) {
                $biggestWin = $detail->win;
            } else if($value->type === 'LOSS' && $detail->value > $biggestLoss) {
                $biggestLoss = $detail->value;
            }

            $avgAmount += $detail->value;
        }

        if($avgAmount > 0) {
            $avgAmount = round($avgAmount / count($dataEventTransactions), 2);
        }

        $arrView = [
            'data' => $data,
            'data_transactions' => $dataTransactions,
            'data_event_transactions' => $dataEventTransactions,
            'data_event_transactions_win' => $dataEventTransactionsWin,
            'data_event_transactions_loss' => $dataEventTransactionsLoss,
            'percentage_win' => $percentageWin,
            'percentage_loss' => $percentageLoss,
            'avg_amount' => $avgAmount,
            'biggest_win' => $biggestWin,
            'biggest_loss' => $biggestLoss
        ];

        return view('pages.admin.users.detail', $arrView);
    }
}
