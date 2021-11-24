<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventTransaction;
use App\Http\Models\Transaction;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetReportLPTransactionAction extends Controller
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

        $transactions = Transaction::where('item_id', 1)->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP']);
        if($request->filter || $request->filter === '') {
            $transactions = $transactions->whereMonth('created_at', Carbon::parse($request->filter)->format('m'))->orderBy('created_at', 'desc')->paginate(20);
        } else {
            $transactions = $transactions->whereMonth('created_at', Carbon::now()->format('m'))->orderBy('created_at', 'desc')->paginate(20);
        }

        $arrView = [
            'transactions'  => $transactions,
        ];

        return view('pages.admin.report.lp.index', $arrView);
    }
}
