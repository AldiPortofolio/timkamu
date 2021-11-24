<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminMenuGrant;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Transaction;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GetAllTransactionOverviewAction extends Controller
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
        $user = Auth::guard('admin')->user();
        $menuGrant = '';

        if ($user) {
            if ($user->role_id !== 1 && $user->role_id !== 2) {
                $menuGrant = AdminMenuGrant::where('admin_id', $user->id)->get();
            }
        }
        
        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        if(!$request->start_date) {
            $startDate = Carbon::now()->firstOfMonth()->format('Y-m-d');
        }

        $endDate = Carbon::parse($request->end_date)->format('Y-m-d');
        if (!$request->end_date) {
            $endDate = Carbon::now()->lastOfMonth()->format('Y-m-d');
        }

        $filterType = ['mlbb', 'freefire', 'pubgm', 'valorant', 'ragnarok'];
        $wordingType = ['MLBB', 'Free Fire', 'PUBGM', 'Valorant', 'Ragnarok Eternal Love'];
        if($request->type === 'pulsa') {
            $filterType = ['telkomsel', 'xl', 'tri', 'google-voucher'];
            $wordingType = ['TSEL Pulsa', 'TSEL Kuota', 'XL', 'Tri', 'Google Voucher'];
        } else if($request->type === 'token') {
            $filterType = ['token'];
            $wordingType = ['Token PLN'];
        }

        $arrTselPulsaId = Item::where('type', 'telkomsel')->where('name', 'like', '%IDR%')->select('id')->get()->pluck('id')->toArray();
        $arrTselKuotaId = Item::where('type', 'telkomsel')->where('name', 'like', '%Hari%')->select('id')->get()->pluck('id')->toArray();

        $dataTransactions = Transaction::select('transactions.*', 'items.type', 'items.name as item_name', 'items.id as item_id')
            ->join('item_conversions', 'transactions.item_id', '=', 'item_conversions.id')
            ->join('items', 'item_conversions.child_id', '=', 'items.id')
            ->whereIn('items.type', $filterType)
            ->where('transactions.created_at', '>=', $startDate)
            ->where('transactions.created_at', '<=', $endDate)
            ->get();

        $filterTransactions = [];
        foreach ($filterType as $value) {
            if($value === 'telkomsel') {
                $dataTempPulsa = $dataTransactions->where('type', $value)->whereIn('item_id', $arrTselPulsaId);
                $dataTempPendingPulsa = $dataTempPulsa->where('status', 'PAID');
                $filterTransactions['tsel_pulsa']['pending']['count'] = count($dataTempPendingPulsa);

                $totalLP = $dataTempPendingPulsa->where('payment_type', 'LP')->sum('total_price');
                $totalRupiah = $dataTempPendingPulsa->whereIn('payment_type', ['GOPAY', 'OVO', 'SHOPEE', 'DANA'])->sum('total_price');
                $filterTransactions['tsel_pulsa']['pending']['total'] = ($totalLP * 1000) + $totalRupiah;

                $dataTempApprovePulsa = $dataTempPulsa->where('status', 'DONE');
                $filterTransactions['tsel_pulsa']['approve']['count'] = count($dataTempApprovePulsa);

                $totalLP = $dataTempApprovePulsa->where('payment_type', 'LP')->sum('total_price');
                $totalRupiah = $dataTempApprovePulsa->whereIn('payment_type', ['GOPAY', 'OVO', 'SHOPEE', 'DANA'])->sum('total_price');
                $filterTransactions['tsel_pulsa']['approve']['total'] = ($totalLP * 1000) + $totalRupiah;

                $dataTempRejectedPulsa = $dataTempPulsa->where('status', 'REJECTED');
                $filterTransactions['tsel_pulsa']['rejected']['count'] = count($dataTempRejectedPulsa);

                $totalLP = $dataTempRejectedPulsa->where('payment_type', 'LP')->sum('total_price');
                $totalRupiah = $dataTempRejectedPulsa->whereIn('payment_type', ['GOPAY', 'OVO', 'SHOPEE', 'DANA'])->sum('total_price');
                $filterTransactions['tsel_pulsa']['rejected']['total'] = ($totalLP * 1000) + $totalRupiah;


                $dataTempKuota = $dataTransactions->where('type', $value)->whereIn('item_id', $arrTselKuotaId);

                $dataTempPendingKuota = $dataTempKuota->where('status', 'PAID');
                $filterTransactions['tsel_kuota']['pending']['count'] = count($dataTempPendingKuota);

                $totalLP = $dataTempPendingKuota->where('payment_type', 'LP')->sum('total_price');
                $totalRupiah = $dataTempPendingKuota->whereIn('payment_type', ['GOPAY', 'OVO', 'SHOPEE', 'DANA'])->sum('total_price');
                $filterTransactions['tsel_kuota']['pending']['total'] = ($totalLP * 1000) + $totalRupiah;

                $dataTempApproveKuota = $dataTempKuota->where('status', 'DONE');
                $filterTransactions['tsel_kuota']['approve']['count'] = count($dataTempApproveKuota);

                $totalLP = $dataTempApproveKuota->where('payment_type', 'LP')->sum('total_price');
                $totalRupiah = $dataTempApproveKuota->whereIn('payment_type', ['GOPAY', 'OVO', 'SHOPEE', 'DANA'])->sum('total_price');
                $filterTransactions['tsel_kuota']['approve']['total'] = ($totalLP * 1000) + $totalRupiah;

                $dataTempRejectedKuota = $dataTempKuota->where('status', 'REJECTED');
                $filterTransactions['tsel_kuota']['rejected']['count'] = count($dataTempRejectedKuota);

                $totalLP = $dataTempRejectedKuota->where('payment_type', 'LP')->sum('total_price');
                $totalRupiah = $dataTempRejectedKuota->whereIn('payment_type', ['GOPAY', 'OVO', 'SHOPEE', 'DANA'])->sum('total_price');
                $filterTransactions['tsel_kuota']['rejected']['total'] = ($totalLP * 1000) + $totalRupiah;
            } else {
                $dataTemp = $dataTransactions->where('type', $value);

                $dataTempPending = $dataTemp->where('status', 'PAID');
                $filterTransactions[$value]['pending']['count'] = count($dataTempPending);

                $totalLP = $dataTempPending->where('payment_type', 'LP')->sum('total_price');
                $totalRupiah = $dataTempPending->whereIn('payment_type', ['GOPAY', 'OVO', 'SHOPEE', 'DANA'])->sum('total_price');
                $filterTransactions[$value]['pending']['total'] = ($totalLP * 1000) + $totalRupiah;

                $dataTempApprove = $dataTemp->where('status', 'DONE');
                $filterTransactions[$value]['approve']['count'] = count($dataTempApprove);

                $totalLP = $dataTempApprove->where('payment_type', 'LP')->sum('total_price');
                $totalRupiah = $dataTempApprove->whereIn('payment_type', ['GOPAY', 'OVO', 'SHOPEE', 'DANA'])->sum('total_price');
                $filterTransactions[$value]['approve']['total'] = ($totalLP * 1000) + $totalRupiah;

                $dataTempRejected = $dataTemp->where('status', 'REJECTED');
                $filterTransactions[$value]['rejected']['count'] = count($dataTempRejected);

                $totalLP = $dataTempRejected->where('payment_type', 'LP')->sum('total_price');
                $totalRupiah = $dataTempRejected->whereIn('payment_type', ['GOPAY', 'OVO', 'SHOPEE', 'DANA'])->sum('total_price');
                $filterTransactions[$value]['rejected']['total'] = ($totalLP * 1000) + $totalRupiah;
            }
        }

        $arrView = [
            'data_transactions' => $filterTransactions,
            'menu_grants'       => $menuGrant,
            'type_topup'        => $wordingType
        ];

        return view('pages.admin.transactions.index', $arrView);
    }
}
