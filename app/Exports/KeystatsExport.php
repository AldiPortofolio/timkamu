<?php

namespace App\Exports;

use App\Http\Models\StaticTblDailyKeyStat;
use App\Http\Models\StaticTblKeyStat;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Spatie\Analytics\Period;
use Analytics;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KeystatsExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        ini_set('memory_limit', '-1');
        $startDate = Carbon::parse('2020-09-01');
        $endDate = Carbon::now();
        $diffDays = $startDate->diffInDays($endDate);
        for ($i=0; $i <= $diffDays; $i++) {
            $dataStatistic = StaticTblDailyKeyStat::where('date', $startDate)->first();
            if(!$dataStatistic || $dataStatistic->status === '0') {
                $allUser = User::whereDate('created_at', $startDate->format('Y-m-d'))->count();
                $dataPhoneVerified = User::where('phone_verified', '1')->whereDate('phone_verified_at', $startDate->format('Y-m-d'))->count();

                $detailAnalyticsData = Analytics::performQuery(
                    Period::create($startDate, $startDate),
                    'ga:sessions',
                    [
                        'metrics' => 'ga:users',
                    ]
                );

                $uniqueVisitors = (int)$detailAnalyticsData->totalsForAllResults['ga:users'];
                $totalCheckout = [];

                $dataTransactions = Transaction::select('transactions.*', 'items.type', 'items.name')->join('item_conversions', 'transactions.item_id', '=', 'item_conversions.id')
                    ->join('items', 'item_conversions.child_id', '=', 'items.id')
                    ->where('transactions.status', 'DONE')
                    ->whereDate('transactions.updated_at', $startDate->format('Y-m-d'))
                    ->get();

                $dataTransactionsMLBB = $dataTransactions->where('type', 'mlbb');
                $dataLPMLBB = $dataTransactionsMLBB->where('payment_type', 'LP')->sum('total_price') * 1000;
                $dataRupiahMLBB = $dataTransactionsMLBB->whereIn('payment_type', ['GOPAY', 'DANA', 'OVO', 'SHOPEE'])->sum('total_price');
                $totalCheckout['mlbb'] = $dataLPMLBB + $dataRupiahMLBB;

                $dataTransactionsFreeFire = $dataTransactions->where('type', 'freefire');
                $dataLPFreeFire = $dataTransactionsFreeFire->where('payment_type', 'LP')->sum('total_price') * 1000;
                $dataRupiahFreeFire = $dataTransactionsFreeFire->whereIn('payment_type', ['GOPAY', 'DANA', 'OVO', 'SHOPEE'])->sum('total_price');
                $totalCheckout['freefire'] = $dataLPFreeFire + $dataRupiahFreeFire;

                $dataTransactionsPUBGM = $dataTransactions->where('type', 'pubgm');
                $dataLPPUBGM = $dataTransactionsPUBGM->where('payment_type', 'LP')->sum('total_price') * 1000;
                $dataRupiahPUBGM = $dataTransactionsPUBGM->whereIn('payment_type', ['GOPAY', 'DANA', 'OVO', 'SHOPEE'])->sum('total_price');
                $totalCheckout['pubgm'] = $dataLPPUBGM + $dataRupiahPUBGM;

                $dataTransactionsValorant = $dataTransactions->where('type', 'valorant');
                $dataLPValorant = $dataTransactionsValorant->where('payment_type', 'LP')->sum('total_price') * 1000;
                $dataRupiahValorant = $dataTransactionsValorant->whereIn('payment_type', ['GOPAY', 'DANA', 'OVO', 'SHOPEE'])->sum('total_price');
                $totalCheckout['valorant'] = $dataLPValorant + $dataRupiahValorant;

                $dataTransactionsRagnarok = $dataTransactions->where('type', 'ragnarok');
                $dataLPRagnarok = $dataTransactionsRagnarok->where('payment_type', 'LP')->sum('total_price') * 1000;
                $dataRupiahRagnarok = $dataTransactionsRagnarok->whereIn('payment_type', ['GOPAY', 'DANA', 'OVO', 'SHOPEE'])->sum('total_price');
                $totalCheckout['ragnarok'] = $dataLPRagnarok + $dataRupiahRagnarok;

                $dataTransactionsTelkomsel = Transaction::select('transactions.*')->join('item_conversions', 'transactions.item_id', '=', 'item_conversions.id')
                    ->join('items', 'item_conversions.child_id', '=', 'items.id')
                    ->where('transactions.status', 'DONE')
                    ->whereDate('transactions.updated_at', $startDate->format('Y-m-d'))
                    ->where('items.type', 'telkomsel')
                    ->where('items.name', 'like', 'IDR%')
                    ->get();

                $dataLPTelkomsel = $dataTransactionsTelkomsel->where('payment_type', 'LP')->sum('total_price') * 1000;
                $dataRupiahTelkomsel = $dataTransactionsTelkomsel->whereIn('payment_type', ['GOPAY', 'DANA', 'OVO', 'SHOPEE'])->sum('total_price');
                $totalCheckout['telkomsel_pulsa'] = $dataLPTelkomsel + $dataRupiahTelkomsel;

                $dataTransactionsTelkomsel = Transaction::select('transactions.*')->join('item_conversions', 'transactions.item_id', '=', 'item_conversions.id')
                    ->join('items', 'item_conversions.child_id', '=', 'items.id')
                    ->where('transactions.status', 'DONE')
                    ->whereDate('transactions.updated_at', $startDate->format('Y-m-d'))
                    ->where('items.type', 'telkomsel')
                    ->where('items.name', 'like', '%Hari%')
                    ->get();

                $dataLPTelkomsel = $dataTransactionsTelkomsel->where('payment_type', 'LP')->sum('total_price') * 1000;
                $dataRupiahTelkomsel = $dataTransactionsTelkomsel->whereIn('payment_type', ['GOPAY', 'DANA', 'OVO', 'SHOPEE'])->sum('total_price');
                $totalCheckout['telkomsel_kuota'] = $dataLPTelkomsel + $dataRupiahTelkomsel;

                $dataTransactionsXL = $dataTransactions->where('type', 'xl');
                $dataLPXL = $dataTransactionsXL->where('payment_type', 'LP')->sum('total_price') * 1000;
                $dataRupiahXL = $dataTransactionsXL->whereIn('payment_type', ['GOPAY', 'DANA', 'OVO', 'SHOPEE'])->sum('total_price');
                $totalCheckout['xl'] = $dataLPXL + $dataRupiahXL;

                $dataTransactionsTri = $dataTransactions->where('type', 'tri');
                $dataLPTri = $dataTransactionsTri->where('payment_type', 'LP')->sum('total_price') * 1000;
                $dataRupiahTri = $dataTransactionsTri->whereIn('payment_type', ['GOPAY', 'DANA', 'OVO', 'SHOPEE'])->sum('total_price');
                $totalCheckout['tri'] = $dataLPTri + $dataRupiahTri;

                $dataTransactionsGoogleVoucher = $dataTransactions->where('type', 'google-voucher');
                $dataLPGoogleVoucher = $dataTransactionsGoogleVoucher->where('payment_type', 'LP')->sum('total_price') * 1000;
                $dataRupiahGoogleVoucher = $dataTransactionsGoogleVoucher->whereIn('payment_type', ['GOPAY', 'DANA', 'OVO', 'SHOPEE'])->sum('total_price');
                $totalCheckout['google_voucher'] = $dataLPGoogleVoucher + $dataRupiahGoogleVoucher;

                $dataTransactionsToken = $dataTransactions->where('type', 'token');
                $dataLPToken = $dataTransactionsToken->where('payment_type', 'LP')->sum('total_price') * 1000;
                $dataRupiahToken = $dataTransactionsToken->whereIn('payment_type', ['GOPAY', 'DANA', 'OVO', 'SHOPEE'])->sum('total_price');
                $totalCheckout['token'] = $dataLPToken + $dataRupiahToken;

                $status = '0';
                $needUpdate = false;
                if ($startDate->format('Y-m-d') < Carbon::now()->format('Y-m-d')) {
                    $needUpdate = true;
                    $status = '1';
                }

                if(!$dataStatistic) {
                    $data = new StaticTblDailyKeyStat();
                    $data->date  = $startDate->format('Y-m-d');
                    $data->total_users = $allUser;
                    $data->total_member_phone_verified = $dataPhoneVerified;
                    $data->total_unique_visitors = $uniqueVisitors;
                    $data->total_check_out = json_encode($totalCheckout);
                    $data->status = $status;
                    $data->save();
                } else if($dataStatistic->status === '0' && $needUpdate) {
                    StaticTblDailyKeyStat::where('id', $dataStatistic->id)->update([
                        'total_users' => $allUser,
                        'total_member_phone_verified' => $dataPhoneVerified,
                        'total_unique_visitors' => $uniqueVisitors,
                        'total_check_out' => json_encode($totalCheckout),
                        'status' => $status
                    ]);
                }
            }

            $startDate = $startDate->addDay(1);
        }

        $weekRange = [
            'W1 - 1' => [
                '2020-09-01',
                '2020-09-07'
            ],
            'W2 - 1' => [
                '2020-09-08',
                '2020-09-14'
            ],
            'W3 - 1' => [
                '2020-09-15',
                '2020-09-21'
            ],
            'W4 - 1' => [
                '2020-09-22',
                '2020-09-30'
            ],
            'W1 - 2' => [
                '2020-10-01',
                '2020-10-07'
            ],
            'W2 - 2' => [
                '2020-10-08',
                '2020-10-14'
            ],
            'W3 - 2' => [
                '2020-10-15',
                '2020-10-21'
            ],
            'W4 - 2' => [
                '2020-10-22',
                '2020-10-31'
            ],
            'W1 - 3' => [
                '2020-11-01',
                '2020-11-07'
            ],
            'W2 - 3' => [
                '2020-11-08',
                '2020-11-14'
            ],
            'W3 - 3' => [
                '2020-11-15',
                '2020-11-21'
            ],
            'W4 - 3' => [
                '2020-11-22',
                '2020-11-30'
            ],
            'W1 - 4' => [
                '2020-12-01',
                '2020-12-07'
            ],
            'W2 - 4' => [
                '2020-12-08',
                '2020-12-14'
            ],
            'W3 - 4' => [
                '2020-12-15',
                '2020-12-21'
            ],
            'W4 - 4' => [
                '2020-12-22',
                '2020-12-31'
            ],
            'W1 - 5' => [
                '2021-01-01',
                '2021-01-07'
            ],
            'W2 - 5' => [
                '2021-01-08',
                '2021-01-14'
            ],
            'W3 - 5' => [
                '2021-01-15',
                '2021-01-21'
            ],
            'W4 - 5' => [
                '2021-01-22',
                '2021-01-31'
            ]
        ];

        $dataMembers = [];
        $dataPhoneVerified = [];
        $uniqueVisitors = [];
        $totalCheckout = [];
        $totalCheckoutAll = [];

        $dataStatistic = StaticTblKeyStat::get();
        $temp = 0;
        foreach ($weekRange as $key => $value) {
            $currentMo = explode(' - ', $key)[1];
            if((int)$temp !== (int)$currentMo) {
                $temp = $currentMo;
                $totalCheckoutAll[$temp] = 0;
            }

            $startDate = Carbon::parse($value[0]);
            $endDate = Carbon::parse($value[1]);

            $dataMembers[$key] = 0;
            $dataPhoneVerified[$key] = 0;
            $uniqueVisitors[$key] = 0;
            $totalCheckout['mlbb'][$key] = 0;
            $totalCheckout['freefire'][$key] = 0;
            $totalCheckout['pubgm'][$key] = 0;
            $totalCheckout['valorant'][$key] = 0;
            $totalCheckout['ragnarok'][$key] = 0;
            $totalCheckout['telkomsel_pulsa'][$key] = 0;
            $totalCheckout['telkomsel_kuota'][$key] = 0;
            $totalCheckout['xl'][$key] = 0;
            $totalCheckout['tri'][$key] = 0;
            $totalCheckout['google_voucher'][$key] = 0;
            $totalCheckout['token'][$key] = 0;

            $dataStatisticTemp = StaticTblDailyKeyStat::where('date', '>=', $startDate->format('Y-m-d'))->where('date', '<=', $endDate->format('Y-m-d'))->get();
            if($dataStatisticTemp) {
                $dataMembers[$key] = $dataStatisticTemp->sum('total_users');
                $dataPhoneVerified[$key] = $dataStatisticTemp->sum('total_member_phone_verified');
                $uniqueVisitors[$key] = $dataStatisticTemp->sum('total_unique_visitors');
                $dataCheckout = $dataStatisticTemp->pluck('total_check_out');
                foreach($dataCheckout as $dataJson) {
                    $decode = json_decode($dataJson);

                    $totalCheckout['mlbb'][$key] += $decode->mlbb;
                    $totalCheckout['freefire'][$key] += $decode->freefire;
                    $totalCheckout['pubgm'][$key] += $decode->pubgm;
                    $totalCheckout['valorant'][$key] += $decode->valorant;
                    $totalCheckout['ragnarok'][$key] += $decode->ragnarok;
                    $totalCheckout['telkomsel_pulsa'][$key] += $decode->telkomsel_pulsa;
                    $totalCheckout['telkomsel_kuota'][$key] += $decode->telkomsel_kuota;
                    $totalCheckout['xl'][$key] += $decode->xl;
                    $totalCheckout['tri'][$key] += $decode->tri;
                    $totalCheckout['google_voucher'][$key] += $decode->google_voucher;
                    $totalCheckout['token'][$key] += $decode->token;

                    $totalAll = $decode->mlbb + $decode->freefire + $decode->pubgm + $decode->valorant + $decode->ragnarok + $decode->telkomsel_pulsa + $decode->telkomsel_kuota + $decode->xl + $decode->tri + $decode->google_voucher + $decode->token;
                    $totalCheckoutAll[$currentMo] += $totalAll;
                }
            }
        }

        $dataMembersAllTime = array_sum($dataMembers);
        $dataPhoneVerifiedAllTime = array_sum($dataPhoneVerified);
        $uniqueVisitorsAllTime = array_sum($uniqueVisitors);

        $arrView = [
            'data_members' => $dataMembers,
            'data_phone_verified' => $dataPhoneVerified,
            'data_unique' => $uniqueVisitors,
            'data_members_all_time' => $dataMembersAllTime,
            'data_phone_verified_all_time' => $dataPhoneVerifiedAllTime,
            'data_unique_all_time' => $uniqueVisitorsAllTime,
            'total_check_out' => $totalCheckout,
            'total_check_out_all' => $totalCheckoutAll
        ];
        return view('pages.admin.exports.stats-export', $arrView);
    }
}
