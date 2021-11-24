<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Models\Item;
use App\Http\Models\User;
use App\Http\Models\UserLog;
use App\Http\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GetTransactionProfileUserAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request)
    {
        ini_set('memory_limit', '-1');
        $itemId = Item::where('name', $request->name)->pluck('id')->first();

        $userTransactions = UserTransaction::where('user_id', Auth::id())->where('item_id', $itemId)->orderBy('created_at', 'desc')->paginate(20);

        // get credit transactions
        $creditTransactions = UserTransaction::where('user_id', Auth::id())->where('item_id', $itemId)->where('type', 'CR')->whereBetween('created_at', [Carbon::now()->subMonth(1)->format('Y-m-d'), Carbon::now()->addDay()->format('Y-m-d')])->get()->pluck('value')->toArray();
        $userCreditTransactions = array_sum($creditTransactions);

        // get debit transactions
        $debitTransactions = UserTransaction::where('user_id', Auth::id())->where('item_id', $itemId)->where('type', 'DB')->whereBetween('created_at', [Carbon::now()->subMonth(1)->format('Y-m-d'), Carbon::now()->addDay()->format('Y-m-d')])->get()->pluck('value')->toArray();
        $userDebitTransactions = array_sum($debitTransactions);

        $arrView = [
            'transactions' => $userTransactions,
            'credit_transactions'   => $userCreditTransactions,
            'debit_transactions'   => $userDebitTransactions,
        ];

        return view('pages.profiles.history-transaction', $arrView);
    }
}
