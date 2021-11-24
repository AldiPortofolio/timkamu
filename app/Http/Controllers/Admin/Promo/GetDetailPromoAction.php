<?php

namespace App\Http\Controllers\Admin\Promo;

use App\Http\Controllers\Controller;
use App\Http\Models\Promo;
use App\Http\Models\Transaction;
use App\Http\Models\UserTransaction;
use Auth;

class GetDetailPromoAction extends Controller
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

        $item = Promo::find($id);
        $uniqueStatsUsed = 0;
        $uniqueStatsTotalAmount = 0;
        if($id === '1') {
            $uniqueStats = Transaction::select('discount')->where('promo_id', $id)->where('status', 'DONE')->get();
            $uniqueStatsUsed = count($uniqueStats);
            $uniqueStatsTotalAmount = $uniqueStats->sum('discount');
        } else if($id === '2') {
            $uniqueStats = Transaction::where('promo_id', $id)->where('item_id', 1)->where('status', 'PAID')->get();
            $uniqueStatsUsed = count($uniqueStats);
            $uniqueStatsTotalAmount = $uniqueStats->sum('cashback');
        }

        $arrView = [
            'item' => $item,
            'total_used' => $uniqueStatsUsed,
            'total_amount' => $uniqueStatsTotalAmount
        ];

        return view('pages.admin.promos.detail', $arrView);
    }
}
