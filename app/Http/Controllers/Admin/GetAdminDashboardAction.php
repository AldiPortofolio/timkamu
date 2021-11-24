<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminAccount;
use App\Http\Models\AdminMenuGrant;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Promo;
use App\Http\Models\Quest;
use App\Http\Models\Shop;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetAdminDashboardAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('admin_accounts');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        if(!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }
        $dataStaff = AdminAccount::get();
        $user = Auth::guard('admin')->user();
        $menuGrant = '';

        if ($user) {
            $adminMenuGrants = AdminMenuGrant::where('admin_id', $user->id)->get();
            if ($user->role_id !== 1 && $user->role_id !== 2) {
                $menuGrant = $adminMenuGrants->first()->menus->name;
            }
        }

        $arrMonth = [];
        $allUsers = DB::table('users');
        $totalUsers = $allUsers->count();
        $totalUserVerified = $allUsers->where('phone_verified', '1')->count();
        $totalUserRegisteredToday = DB::table('users')->where('created_at', '>=',Carbon::today()->format('Y-m-d'))->count();
        $totalUserRegisteredWeek = DB::table('users')->where('created_at', '>=', Carbon::now()->subDays(6)->startOfDay()->toDateTimeString())->where('created_at', '<=', Carbon::now()->startOfDay()->toDateTimeString())->count();
        $totalUserRegisteredMonth = DB::table('users')->where(DB::raw('MONTH(created_at)'), Carbon::now()->format('m'))->count();

        // get recharge
        $totalRechargeLPToday = Transaction::where('created_at', '>=', Carbon::today()->format('Y-m-d'))->where('item_id', '1')->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP'])->get();
        $totalRechargeLPWeek = Transaction::where('created_at', '>=', Carbon::now()->subDays(7)->format('Y-m-d'))->where('created_at', '<', Carbon::now()->addDay()->format('Y-m-d'))->where('item_id', '1')->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP'])->get();
        $totalRechargeLPMonth = Transaction::whereMonth('created_at', Carbon::now()->format('m'))->where('item_id', '1')->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP'])->get();
        $totalRechargeLPYear = Transaction::whereYear('created_at', Carbon::now()->format('Y'))->where('item_id', '1')->where('status', 'PAID')->whereNotIn('payment_type', ['COIN', 'BP'])->get();
        $totalRechargeLP = DB::table('users')->select('total_lp')->get()->sum('total_lp');

        $thisWeek = Carbon::now()->subDays(7)->format('d M') . ' - ' . Carbon::today()->format('d M Y');
        // end of get recharge

        $arrTotalPending = [];

        // pending top up
        $itemIdMLBB = Item::where('type', 'mlbb')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionMLBB = ItemConversion::whereIn('child_id', $itemIdMLBB)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionMLBB = Transaction::whereIn('item_id', $itemIdConversionMLBB)->where('status', 'PAID')->get();
        $totalPriceLP = $totalTransactionMLBB->where('payment_type', 'LP')->sum('total_price') * 1000;
        $totalPriceRupiah = $totalTransactionMLBB->where('payment_type', '<>', 'LP')->sum('total_price');
        $totalIncome = $totalPriceLP + $totalPriceRupiah;
        array_push($arrTotalPending, ['name' => 'MLBB', 'total' => $totalTransactionMLBB->count(), 'total_income' => $totalIncome]);

        $itemIdPubgm = Item::where('type', 'pubgm')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionPubgm = ItemConversion::whereIn('child_id', $itemIdPubgm)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionPubgm = Transaction::whereIn('item_id', $itemIdConversionPubgm)->where('status', 'PAID')->get();
        $totalPriceLP = $totalTransactionPubgm->where('payment_type', 'LP')->sum('total_price') * 1000;
        $totalPriceRupiah = $totalTransactionPubgm->where('payment_type', '<>', 'LP')->sum('total_price');
        $totalIncome = $totalPriceLP + $totalPriceRupiah;
        array_push($arrTotalPending, ['name' => 'PUBGM', 'total' => count($totalTransactionPubgm), 'total_income' => $totalIncome]);

        $itemIdFreefire = Item::where('type', 'freefire')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionFreefire = ItemConversion::whereIn('child_id', $itemIdFreefire)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionFreefire = Transaction::whereIn('item_id', $itemIdConversionFreefire)->where('status', 'PAID')->get();
        $totalPriceLP = $totalTransactionFreefire->where('payment_type', 'LP')->sum('total_price') * 1000;
        $totalPriceRupiah = $totalTransactionFreefire->where('payment_type', '<>', 'LP')->sum('total_price');
        $totalIncome = $totalPriceLP + $totalPriceRupiah;
        array_push($arrTotalPending, ['name' => 'Freefire', 'total' => count($totalTransactionFreefire), 'total_income' => $totalIncome]);

        $itemIdValorant = Item::where('type', 'valorant')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionValorant = ItemConversion::whereIn('child_id', $itemIdValorant)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionValorant = Transaction::whereIn('item_id', $itemIdConversionValorant)->where('status', 'PAID')->get();
        $totalPriceLP = $totalTransactionValorant->where('payment_type', 'LP')->sum('total_price') * 1000;
        $totalPriceRupiah = $totalTransactionValorant->where('payment_type', '<>', 'LP')->sum('total_price');
        $totalIncome = $totalPriceLP + $totalPriceRupiah;
        array_push($arrTotalPending, ['name' => 'Valorant', 'total' => count($totalTransactionValorant), 'total_income' => $totalIncome]);

        $itemIdRagnarok = Item::where('type', 'ragnarok')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionRagnarok = ItemConversion::whereIn('child_id', $itemIdRagnarok)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionRagnarok = Transaction::whereIn('item_id', $itemIdConversionRagnarok)->where('status', 'PAID')->get();
        $totalPriceLP = $totalTransactionRagnarok->where('payment_type', 'LP')->sum('total_price') * 1000;
        $totalPriceRupiah = $totalTransactionRagnarok->where('payment_type', '<>', 'LP')->sum('total_price');
        $totalIncome = $totalPriceLP + $totalPriceRupiah;
        array_push($arrTotalPending, ['name' => 'Ragnarok', 'total' => count($totalTransactionRagnarok), 'total_income' => $totalIncome]);

        $itemIdTelkomselPulsa = Item::where('type', 'telkomsel')->where('name', 'like', '%IDR%')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionTelkomselPulsa = ItemConversion::whereIn('child_id', $itemIdTelkomselPulsa)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionTelkomselPulsa = Transaction::whereIn('item_id', $itemIdConversionTelkomselPulsa)->where('status', 'PAID')->get();
        $totalPriceLP = $totalTransactionTelkomselPulsa->where('payment_type', 'LP')->sum('total_price') * 1000;
        $totalPriceRupiah = $totalTransactionTelkomselPulsa->where('payment_type', '<>', 'LP')->sum('total_price');
        $totalIncome = $totalPriceLP + $totalPriceRupiah;
        array_push($arrTotalPending, ['name' => 'Telkomsel Pulsa', 'total' => count($totalTransactionTelkomselPulsa),'total_income' => $totalIncome]);

        $itemIdTelkomselKuota = Item::where('type', 'telkomsel')->where('name', 'like', '%Hari%')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionTelkomselKuota = ItemConversion::whereIn('child_id', $itemIdTelkomselKuota)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionTelkomselKuota = Transaction::whereIn('item_id', $itemIdConversionTelkomselKuota)->where('status', 'PAID')->get();
        $totalPriceLP = $totalTransactionTelkomselKuota->where('payment_type', 'LP')->sum('total_price') * 1000;
        $totalPriceRupiah = $totalTransactionTelkomselKuota->where('payment_type', '<>', 'LP')->sum('total_price');
        $totalIncome = $totalPriceLP + $totalPriceRupiah;
        array_push($arrTotalPending, ['name' => 'Telkomsel Kuota', 'total' => count($totalTransactionTelkomselKuota), 'total_income' => $totalIncome]);

        $itemIdXL = Item::where('type', 'xl')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionXL = ItemConversion::whereIn('child_id', $itemIdXL)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionXL = Transaction::whereIn('item_id', $itemIdConversionXL)->where('status', 'PAID')->get();
        $totalPriceLP = $totalTransactionXL->where('payment_type', 'LP')->sum('total_price') * 1000;
        $totalPriceRupiah = $totalTransactionXL->where('payment_type', '<>', 'LP')->sum('total_price');
        $totalIncome = $totalPriceLP + $totalPriceRupiah;
        array_push($arrTotalPending, ['name' => 'XL Kuota', 'total' => count($totalTransactionXL), 'total_income' => $totalIncome]);

        $itemIdTri = Item::where('type', 'tri')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionTri = ItemConversion::whereIn('child_id', $itemIdTri)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionTri = Transaction::whereIn('item_id', $itemIdConversionTri)->where('status', 'PAID')->get();
        $totalPriceLP = $totalTransactionTri->where('payment_type', 'LP')->sum('total_price') * 1000;
        $totalPriceRupiah = $totalTransactionTri->where('payment_type', '<>', 'LP')->sum('total_price');
        $totalIncome = $totalPriceLP + $totalPriceRupiah;
        array_push($arrTotalPending, ['name' => 'Tri', 'total' => count($totalTransactionTri),'total_income' => $totalIncome]);

        $itemIdToken = Item::where('type', 'token')->select('id')->get()->pluck('id')->toArray();
        $itemIdConversionToken = ItemConversion::whereIn('child_id', $itemIdToken)->select('id')->get()->pluck('id')->toArray();
        $totalTransactionToken = Transaction::whereIn('item_id', $itemIdConversionToken)->where('status', 'PAID')->get();
        $totalPriceLP = $totalTransactionToken->where('payment_type', 'LP')->sum('total_price') * 1000;
        $totalPriceRupiah = $totalTransactionToken->where('payment_type', '<>', 'LP')->sum('total_price');
        $totalIncome = $totalPriceLP + $totalPriceRupiah;
        array_push($arrTotalPending, ['name' => 'Token PLN', 'total' => count($totalTransactionToken), 'total_income' => $totalIncome]);
        // end of pending top up

        // get product
        $dataShops = Shop::get();
        $dataItemsId = ItemConversion::get()->where('childs.type', '<>', 'currencies')->where('childs.type', '<>', 'donation')->pluck('child_id')->toArray();
        $arrItemsId = array_unique($dataItemsId);
        $arrItems = [];
        foreach ($arrItemsId as $key => $value) {
            $item = ItemConversion::where('child_id', $value)->where('parent_id', 12)->first();

            $val = [];
            $val['name'] = $item->childs->name;
            $val['price'] = $item->value;
            $val['active'] = $item->childs->active;
            $val['type'] = $item->childs->type;

            array_push($arrItems, $val);
        }

        $arrItems = collect($arrItems)->sortBy('name')->sortBy('price');
        $arrMlbb = $arrItems->where('type', 'mlbb');
        $arrTempA = [];
        $arrTempB = [];
        foreach ($arrMlbb as $itm) {
            if (strpos($itm['name'], ' Diamond') || strpos($itm['name'], ' UC')) {
                array_push($arrTempA, $itm);
            } else {
                array_push($arrTempB, $itm);
            }
        }

        $arrTempB = collect($arrTempB)->sortBy('name')->toArray();
        $arrMlbb = array_merge($arrTempA, $arrTempB);

        $arrPubgm = $arrItems->where('type', 'pubgm');
        $arrTempA = [];
        $arrTempB = [];
        foreach ($arrPubgm as $itm) {
            if (strpos($itm['name'], ' Diamond') || strpos($itm['name'], ' UC')) {
                array_push($arrTempA, $itm);
            } else {
                array_push($arrTempB, $itm);
            }
        }

        $arrTempB = collect($arrTempB)->sortBy('name')->toArray();
        $arrPubgm = array_merge($arrTempA, $arrTempB);

        $arrFreefire = $arrItems->where('type', 'freefire');
        $arrTempA = [];
        $arrTempB = [];
        foreach ($arrFreefire as $itm) {
            if (strpos($itm['name'], ' Diamond')) {
                array_push($arrTempA, $itm);
            } else {
                array_push($arrTempB, $itm);
            }
        }

        $arrValorant = $arrItems->where('type', 'valorant');
        $arrTempA = [];
        $arrTempB = [];
        foreach ($arrValorant as $itm) {
            if (strpos($itm['name'], ' Points')) {
                array_push($arrTempA, $itm);
            } else {
                array_push($arrTempB, $itm);
            }
        }

        $arrTempB = collect($arrTempB)->sortBy('name')->toArray();
        $arrValorant = array_merge($arrTempA, $arrTempB);

        $arrRagnarok = $arrItems->where('type', 'ragnarok');
        $arrTempA = [];
        $arrTempB = [];
        foreach ($arrRagnarok as $itm) {
            if (strpos($itm['name'], ' Points')) {
                array_push($arrTempA, $itm);
            } else {
                array_push($arrTempB, $itm);
            }
        }

        $arrTempB = collect($arrTempB)->sortBy('name')->toArray();
        $arrRagnarok = array_merge($arrTempA, $arrTempB);

        $liveEvents = Event::where('type', 'ONGOING')->get();
        foreach($liveEvents as $live) {
            $live->odds = EventBetCategory::where('event_id', $live->id)->count();
        }
        $recentEvents = Event::where('type', '<>', 'ONGOING')->orderBy('start_date', 'desc')->limit(5)->get();
        // end of get product

        $totalPendingTopUp = collect($arrTotalPending);

        // get all promos
        $allPromos = Promo::get();

        // get all quests
        $allQuests = Quest::get();
        // end of get all quests

        $arrView = [
            'total_users' => $totalUsers,
            'total_user_verified' => $totalUserVerified,
            'total_user_registered_today' => $totalUserRegisteredToday,
            'total_user_registered_week' => $totalUserRegisteredWeek,
            'total_user_registered_month' => $totalUserRegisteredMonth,
            'total_recharge_lp_today' => $totalRechargeLPToday,
            'total_recharge_lp_week' => $totalRechargeLPWeek,
            'total_recharge_lp_month' => $totalRechargeLPMonth,
            'total_recharge_lp_year' => $totalRechargeLPYear,
            'total_recharge_lp' => $totalRechargeLP,
            'this_week' => $thisWeek,
            'total_pending_topup' => $totalPendingTopUp,
            'menu_grant' => $menuGrant,
            'total_pending' => $arrTotalPending,
            'data_shops' => $dataShops,
            'data_items' => $arrItems,
            'data_mlbb' => $arrMlbb,
            'data_pubgm' => $arrPubgm,
            'data_freefire' => $arrFreefire,
            'data_valorant' => $arrValorant,
            'data_ragnarok' => $arrRagnarok,
            'live_events' => $liveEvents,
            'recent_events' => $recentEvents,
            'all_promos' => $allPromos,
            'all_quests' => $allQuests
        ];

        return view('pages.admin.index', $arrView);
    }
}
