<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminMenuGrant;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GetAllHistoricalTransactionMemberAction extends Controller
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
        $user = Auth::guard('admin')->user();
        $menuGrant = '';

        if ($user) {
            if ($user->role_id !== 1 && $user->role_id !== 2) {
                $menuGrant = AdminMenuGrant::where('admin_id', $user->id)->get();
            }
        }


        $dataUserTransaction = [];
        $totalLPLastMonth = 0;
        $totalBPLastMonth = 0;
        $totalCoinLastMonth = 0;
        $username = app('request')->input('username');
        $filter = app('request')->input('filter');
        if ($filter) {
            $filter = Carbon::parse($filter);
        } else {
            $filter = Carbon::now();
        }
        $lastMonth = $filter->copy()->subMonth(1);
        $dataUser = [];
        if($username) {
            $dataUser = User::where('username', $username)->first();
            $month = $filter->copy()->format('m');
            $year = $filter->copy()->format('Y');
            $dataUserTransaction = UserTransaction::where('user_id', $dataUser->id)->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
            $dataUserTransactionLastMonth = UserTransaction::where('user_id', $dataUser->id)->whereYear('created_at', $lastMonth->format('Y'))->whereMonth('created_at', '<=', $lastMonth->format('m'))->get();
            foreach ($dataUserTransactionLastMonth as $trLM) {
                if ($trLM->item_id === 1) {
                    if ($trLM->type === 'CR') {
                        $totalLPLastMonth += $trLM->value;
                    } else if ($trLM->type === 'DB') {
                        $totalLPLastMonth -= $trLM->value;
                    }
                } else if ($trLM->item_id === 2) {
                    if ($trLM->type === 'CR') {
                        $totalBPLastMonth += $trLM->value;
                    } else if ($trLM->type === 'DB') {
                        $totalBPLastMonth -= $trLM->value;
                    }
                } else if ($trLM->item_id === 78) {
                    if ($trLM->type === 'CR') {
                        $totalCoinLastMonth += $trLM->value;
                    } else if ($trLM->type === 'DB') {
                        $totalCoinLastMonth -= $trLM->value;
                    }
                }
            }
        }

        $arrView = [
            'data_user' => $dataUser,
            'items' => $dataUserTransaction,
            'total_lp_last_month' => $totalLPLastMonth,
            'total_bp_last_month' => $totalBPLastMonth,
            'total_coin_last_month' => $totalCoinLastMonth,
            'menu_grants' => $menuGrant
        ];

        return view('pages.admin.transactions.historical', $arrView);
    }
}
