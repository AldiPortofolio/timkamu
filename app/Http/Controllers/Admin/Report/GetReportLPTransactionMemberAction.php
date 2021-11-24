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

class GetReportLPTransactionMemberAction extends Controller
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

        $transactions = [];
        $userNotFound = false;
        if($request->username) {
            $username = str_replace('%20', '', $request->username);
            $userId = User::where('username', 'like', $username)->pluck('id')->first();
            if(!$userId) {
                $userNotFound = true;
            }
            $transactions = Transaction::where('item_id', 1)->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP'])->where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(20);
        }

        $arrView = [
            'transactions'  => $transactions,
            'user_not_found'  => $userNotFound,
        ];

        return view('pages.admin.report.lp.member', $arrView);
    }
}
