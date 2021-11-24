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

class GetAllTransactionVolumeAction extends Controller
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
        
        $filterDate = Carbon::today()->format('m');
        if($request->filter) {
            $filterDate = Carbon::parse($request->filter)->format('m');
        }

        // pending top up
        $itemIdMLBB = Item::where('type', 'mlbb')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionMLBB = ItemConversion::whereIn('child_id', $itemIdMLBB)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionMLBB = Transaction::whereIn('item_id', $itemIdConversionMLBB)->whereMonth('created_at', $filterDate)->where('status', '<>', 'UNPAID')->orderBy('created_at', 'asc')->get();

        $arrMlbb = [];
        foreach ($totalTransactionMLBB as $value) {
            $createdMonth = Carbon::parse($value->created_at)->format('Y-m-d');
            if (!isset($arrMlbb[$createdMonth])) {
                $arrMlbb[$createdMonth] = 0;
            }

            $arrMlbb[$createdMonth] += $value->total;
        }

        $itemIdPubgm = Item::where('type', 'pubgm')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionPubgm = ItemConversion::whereIn('child_id', $itemIdPubgm)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionPubgm = Transaction::whereIn('item_id', $itemIdConversionPubgm)->whereMonth('created_at', $filterDate)->where('status', '<>', 'UNPAID')->orderBy('created_at', 'asc')->get();

        $arrPubgm = [];
        foreach ($totalTransactionPubgm as $value) {
            $createdMonth = Carbon::parse($value->created_at)->format('Y-m-d');
            if (!isset($arrPubgm[$createdMonth])) {
                $arrPubgm[$createdMonth] = 0;
            }

            $arrPubgm[$createdMonth] += $value->total;
        }

        $itemIdFreefire = Item::where('type', 'freefire')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionFreefire = ItemConversion::whereIn('child_id', $itemIdFreefire)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionFreefire = Transaction::whereIn('item_id', $itemIdConversionFreefire)->whereMonth('created_at', $filterDate)->where('status', '<>', 'UNPAID')->orderBy('created_at', 'asc')->get();

        $arrFreefire = [];
        foreach ($totalTransactionFreefire as $value) {
            $createdMonth = Carbon::parse($value->created_at)->format('Y-m-d');
            if (!isset($arrFreefire[$createdMonth])) {
                $arrFreefire[$createdMonth] = 0;
            }

            $arrFreefire[$createdMonth] += $value->total;
        }

        $itemIdTelkomselPulsa = Item::where('type', 'telkomsel')->where('name', 'like', '%IDR%')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionTelkomselPulsa = ItemConversion::whereIn('child_id', $itemIdTelkomselPulsa)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionTelkomselPulsa = Transaction::whereIn('item_id', $itemIdConversionTelkomselPulsa)->whereMonth('created_at', $filterDate)->where('status', '<>', 'UNPAID')->orderBy('created_at', 'asc')->get();

        $arrTelkomselPulsa = [];
        foreach ($totalTransactionTelkomselPulsa as $value) {
            $createdMonth = Carbon::parse($value->created_at)->format('Y-m-d');
            if (!isset($arrTelkomselPulsa[$createdMonth])) {
                $arrTelkomselPulsa[$createdMonth] = 0;
            }

            $arrTelkomselPulsa[$createdMonth] += $value->total;
        }

        $itemIdTelkomselKuota = Item::where('type', 'telkomsel')->where('name', 'like', '%Hari%')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionTelkomselKuota = ItemConversion::whereIn('child_id', $itemIdTelkomselKuota)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionTelkomselKuota = Transaction::whereIn('item_id', $itemIdConversionTelkomselKuota)->whereMonth('created_at', $filterDate)->where('status', '<>', 'UNPAID')->orderBy('created_at', 'asc')->get();

        $arrTelkomselKuota = [];
        foreach ($totalTransactionTelkomselKuota as $value) {
            $createdMonth = Carbon::parse($value->created_at)->format('Y-m-d');
            if (!isset($arrTelkomselKuota[$createdMonth])) {
                $arrTelkomselKuota[$createdMonth] = 0;
            }

            $arrTelkomselKuota[$createdMonth] += $value->total;
        }

        $itemIdXL = Item::where('type', 'xl')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionXL = ItemConversion::whereIn('child_id', $itemIdXL)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionXL = Transaction::whereIn('item_id', $itemIdConversionXL)->whereMonth('created_at', $filterDate)->where('status', '<>', 'UNPAID')->orderBy('created_at', 'asc')->get();

        $arrXL = [];
        foreach ($totalTransactionXL as $value) {
            $createdMonth = Carbon::parse($value->created_at)->format('Y-m-d');
            if (!isset($arrXL[$createdMonth])) {
                $arrXL[$createdMonth] = 0;
            }

            $arrXL[$createdMonth] += $value->total;
        }

        $itemIdTri = Item::where('type', 'tri')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionTri = ItemConversion::whereIn('child_id', $itemIdTri)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionTri = Transaction::whereIn('item_id', $itemIdConversionTri)->whereMonth('created_at', $filterDate)->where('status', '<>', 'UNPAID')->orderBy('created_at', 'asc')->get();

        $arrTri = [];
        foreach ($totalTransactionTri as $value) {
            $createdMonth = Carbon::parse($value->created_at)->format('Y-m-d');
            if (!isset($arrTri[$createdMonth])) {
                $arrTri[$createdMonth] = 0;
            }

            $arrTri[$createdMonth] += $value->total;
        }

        $itemIdToken = Item::where('type', 'token')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionToken = ItemConversion::whereIn('child_id', $itemIdToken)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionToken = Transaction::whereIn('item_id', $itemIdConversionToken)->whereMonth('created_at', $filterDate)->where('status', '<>', 'UNPAID')->orderBy('created_at', 'asc')->get();

        $arrToken = [];
        foreach ($totalTransactionToken as $value) {
            $createdMonth = Carbon::parse($value->created_at)->format('Y-m-d');
            if (!isset($arrToken[$createdMonth])) {
                $arrToken[$createdMonth] = 0;
            }

            $arrToken[$createdMonth] += $value->total;
        }
        // end of pending top up

        $totalTopUpToday = Transaction::where('created_at', '>=', Carbon::today()->format('Y-m-d'))->where('status', '<>', 'UNPAID')->orderBy('created_at', 'asc')->count();
        $totalTopUpWeek = Transaction::where('created_at', '>=', Carbon::now()->subDays(7)->format('Y-m-d'))->where('created_at', '<', Carbon::now()->addDay()->format('Y-m-d'))->where('item_id', '1')->where('status', 'UNPAID')->count();
        $totalTopUpMonth = Transaction::whereMonth('created_at', Carbon::now()->format('m'))->where('item_id', '1')->where('status', 'UNPAID')->count();
        $totalTopUpYear = Transaction::whereYear('created_at', Carbon::now()->format('Y'))->where('item_id', '1')->where('status', 'UNPAID')->count();

        $arrView = [
            'arr_mlbb'              => $arrMlbb,
            'arr_pubgm'             => $arrPubgm,
            'arr_freefire'          => $arrFreefire,
            'arr_telkomsel_pulsa'   => $arrTelkomselPulsa,
            'arr_telkomsel_kuota'   => $arrTelkomselKuota,
            'arr_xl'                => $arrXL,
            'arr_tri'               => $arrTri,
            'arr_token'             => $arrToken,
            'menu_grants'           => $menuGrant,
            'total_topup_today'     => $totalTopUpToday,
            'total_topup_week'      => $totalTopUpWeek,
            'total_topup_month'     => $totalTopUpMonth,
            'total_topup_year'      => $totalTopUpYear
        ];

        return view('pages.admin.transactions.index', $arrView);
    }
}
