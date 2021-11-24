<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Quest;
use App\Http\Models\Rank;
use App\Http\Models\SystemMail;
use App\Http\Models\Team;
use App\Http\Models\TeamMember;
use App\Http\Models\Transaction;
use App\Http\Models\Tournaments;
use App\Http\Models\User;
use App\Http\Models\UserQuest;
use App\Http\Models\UserTransaction;
use App\Mail\AlertDiamondPurchaseEmail;
use App\Mail\AlertDiamondRequestEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PostPurchaseAction extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function __invoke(Request $request)
    {
        ini_set('memory_limit', '-1');
        $request->session()->save();
        if(!Auth::user() && $request->name !== 'diamond-bypass' && $request->name !== 'pulsa-bypass' && $request->name !== 'rumah-tangga-bypass') {
            return redirect(url()->previous())->with('failed', 'purchase-require-login');
        }

        if ($request->name === 'lp' && Auth::user()->phone_verified === '0') {
            return redirect(url()->previous())->with('failed', 'purchase-require-phone-verify');
        }

        if ($request->name === 'lp' && (int)$request->nominal > 2000) {
            return redirect(url()->previous())->with('failed', 'purchase-lp-maks-2000');
        }


        $itemId = Item::where('name', strtoupper($request->name))->pluck('id')->first();
        $currentLP = Auth::user() ? Auth::user()->total_lp : 0;
        $currentCoin = Auth::user() ? Auth::user()->total_coin : 0;
        $currentExp = Auth::user() ? Auth::user()->total_exp : 0;
        $currentBP = Auth::user() ? Auth::user()->total_bp : 0;
        $currentRank = Auth::user() ? Auth::user()->rank_id : 0;
        $diffRank = 0;


        if($request->name === 'diamond' || $request->name === 'diamond-bypass' || $request->name === 'pulsa' || $request->name === 'pulsa-bypass'|| $request->name === 'rumah-tangga' || $request->name === 'rumah-tangga-bypass') {
            $dataItem = ItemConversion::find($request->id);
            $price = $dataItem->value;
            if($price > $currentLP && ($request->name === 'diamond' || $request->name === 'pulsa' || $request->name === 'rumah-tangga')) {
                return redirect(url()->previous())->with('failed', 'need-recharge-lp');
            }
        }

        $data = [];
        try {
            DB::beginTransaction();

            if($request->name === 'lp') {
                // promo cashback BP
                $promo = null;
                $cashback = 0;
                $nominal = $request->nominal;
                $cashbackPotential = $nominal * 0.1;
                $whole = (int) $cashbackPotential;  // 5
                $frac  = $cashbackPotential - $whole;  // .7
                if ($frac > 0.0 && $frac < 0.8) {
                    $frac = floor($cashbackPotential);
                } else if($frac > 0.7) {
                    $frac = ceil($cashbackPotential);
                } else {
                    $frac = $cashbackPotential;
                }

                if($frac > 0) {
                    $promo = 2;
                    $cashback = $frac;
                }

                // Transaction Number
                $latestId = Transaction::max('id') + 1;
                $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);

                $data = new Transaction();
                $data->user_id = Auth::id();
                $data->transaction_number = $transactionNumber;
                $data->item_id = $itemId;
                $data->payment_type = 'LP';
                $data->status = 'PAID';
                $data->total = $request->nominal;
                $data->total_price = $request->nominal * 1000;
                $data->cashback = $cashback;
                $data->promo_id = $promo;
                $data->save();

                // Update saldo LP
                UserTransaction::create([
                    'user_id'   => Auth::user()->id,
                    'item_id'   => $itemId,
                    'value'     => $request->nominal,
                    'type'      => 'CR',
                    'desc'      => '[Purchase] +' . $request->nominal
                ]);

                $update = [];
                $update['total_lp'] = $currentLP + $request->nominal;
                $update['total_exp'] = $currentExp + $request->nominal;
                if ($update['total_exp'] >= 500 && $update['total_exp'] < 1000) {
                    $update['type'] = 'VIP';
                } else if ($update['total_exp'] >= 1000) {
                    $update['type'] = 'VVIP';
                }

                if ($frac > 0) {
                    // Update saldo BP
                    UserTransaction::create([
                        'user_id'   => Auth::user()->id,
                        'item_id'   => 2,
                        'value'     => $frac,
                        'type'      => 'CR',
                        'desc'      => '[Promo Cashback 10%] +' . $frac
                    ]);

                    $update['total_bp'] = $currentBP + $frac;
                }

                $rank = Rank::where('value', '<=', $update['total_exp'])->select('id')->orderBy('id', 'desc')->first();
                if ((int)$currentRank !== (int)$rank->id) {
                    $diff = (int)$rank->id - (int)$currentRank;
                    $update['rank_id'] = $rank->id;

                    $request->name = 'rank';

                    $rankUpQuest = Quest::where('title', 'Naik level')->first();
                    $itemCoinId = Item::where('name', 'coin')->pluck('id')->first();
                    $userQuest = UserQuest::where('user_id', Auth::user()->id)->where('quest_id', $rankUpQuest->id)->first();
                    if (!$userQuest) {
                        $detail = [
                            'value' => $diff
                        ];
                        UserQuest::create([
                            'user_id' => Auth::user()->id,
                            'quest_id' => $rankUpQuest->id,
                            'value_detail' => json_encode($detail)
                        ]);
                    } else {
                        $detail = json_decode($userQuest->value_detail);
                        $detail->value += $diff;

                        UserQuest::where('quest_id', $rankUpQuest->id)->where('user_id', Auth::user()->id)->update([
                            'value_detail' => json_encode($detail)
                        ]);
                    }
                    $valueQuest = json_decode($rankUpQuest->value_detail)->value;
                    $diffRank = (int)$rank->id - (int)$currentRank;
                    for ($i=0; $i < $diffRank; $i++) {
                        UserTransaction::create([
                            'user_id'   => Auth::user()->id,
                            'item_id'   => $itemCoinId,
                            'value'     => $valueQuest,
                            'type'      => 'CR',
                            'desc'      => '[Quest Achieve] ' . $rankUpQuest->title
                        ]);

                        $message = "<h3 class='rajdhani-bold font-size-32 mb-20'>Quest Selesai</h3>" .
                        "<p class='grey-10'>Selamat, kamu telah menyelesaikan quest <span class='white-10'>" . $rankUpQuest->title . "</span> dengan hadiah <span class='money money-14 right money-inline white-10'>" . $valueQuest . "<img src='" . asset('img/currencies/coin.svg') . "'></span></p>";

                        $sys = new SystemMail();
                        $sys->user_id = Auth::user()->id;
                        $sys->title = 'Terima kasih telah bergabung dengan Timkamu.';
                        $sys->subject = 'Quest Selesai';
                        $sys->message = $message;
                        $sys->save();

                        $currentCoin += $valueQuest;
                    }

                    $update['total_coin'] = $currentCoin;
                }

                $message = "<h3 class='rajdhani-bold font-size-32'>Pembelian LP (". $request->nominal .")</h3>".
                "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>".
                "<p>Terima kasih atas pemebelian <span class='money money-14 right money-inline'>". $request->nominal ."<img src='". asset('img/currencies/lp.svg') ."'></span> dari Timkamu.</p>";

                $sys = new SystemMail();
                $sys->user_id = Auth::id();
                $sys->title = 'Terima kasih atas pemebelian Loyalty Points dari Timkamu.';
                $sys->subject = 'Pembelian LP ('. $request->nominal.')';
                $sys->message = $message;
                $sys->save();

                if ($frac > 0) {
                    // send mail
                    $message = "<h3 class='rajdhani-bold font-size-32'>Cashback LP recharge (" . $request->nominal . ")</h3>" .
                        "<p>Kamu mendapatkan <span class='money money-14 right money-inline'>" . $frac . "<img src='" . asset('img/currencies/lp.svg') . "'></span>  cashback dari pembelian LP.</p>";

                    $sys = new SystemMail();
                    $sys->user_id = Auth::id();
                    $sys->title = 'Terima kasih atas pemebelian Loyalty Points dari Timkamu.';
                    $sys->subject = "Cashback LP recharge (" . $request->nominal . ")";
                    $sys->message = $message;
                    $sys->save();
                }

                // reward for referred
                $referralCodeFrom = Auth::user()->referral_code_from;
                $isReferralCodeFromUsed = Auth::user()->is_referral_used;
                $totalReferralUsed = User::whereNotNull('referral_code')->whereNotNull('referral_code_from')->where('is_referral_used', '1')->count();
                if($request->nominal >= 9 && $isReferralCodeFromUsed === '0' && $totalReferralUsed <= 2500) {
                    $userReferred = User::where('referral_code', $referralCodeFrom)->first();
                    if($userReferred) {
                        // update 9 LP for referred
                        $message = "<h3 class='rajdhani-bold font-size-32 mb-20'>Kode referral digunakan</h3>" .
                            "<p class='grey-10'>Selamat, input kode referral berhasil dan kamu mendapat <span class='money money-14 right money-inline white-10'>9<img src='" . asset('img/currencies/lp.svg') . "'></span></p>";

                        $sys = new SystemMail();
                        $sys->user_id = $userReferred->id;
                        $sys->title = 'Terima kasih telah bergabung dengan Timkamu.';
                        $sys->subject = 'Kode referral digunakan';
                        $sys->message = $message;
                        $sys->save();

                        UserTransaction::create([
                            'user_id'   => $userReferred->id,
                            'item_id'   => $itemId,
                            'value'     => 9,
                            'type'      => 'CR',
                            'desc'      => 'Kode referral digunakan'
                        ]);

                        $userReferredUpdate = [];
                        $userReferredUpdate['total_lp'] = $userReferred->total_lp + 9;

                        $totalReferralUsed = (User::where('referral_code_from', $userReferred->referral_code)->where('is_referral_used', '1')->count()) + 1;
                        if ($totalReferralUsed >= 50 && $totalReferralUsed < 100) {
                            $userReferredUpdate['type'] = 'VIP';
                        } else if ($totalReferralUsed >= 100) {
                            $userReferredUpdate['type'] = 'VVIP';
                        }

                        User::where('id', $userReferred->id)->update($userReferredUpdate);

                        $update['is_referral_used'] = '1';
                    }
                }

                User::where('id', Auth::id())->update($update);

            } else if ($request->name === 'bp') {

                $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
                $itemConversion = ItemConversion::where('parent_id', $itemLPId)->where('child_id', $itemId)->pluck('value')->first();

                $request->nominal = str_replace(',', '', $request->nominal);

                $valueConversion = $request->nominal / $itemConversion;
                $currentBP = Auth::user()->total_bp;
                if($valueConversion > $currentBP) {
                    return redirect(url()->previous())->with('failed', 'over-current-bp');
                }

                UserTransaction::create([
                    'user_id'   => Auth::user()->id,
                    'item_id'   => $itemId,
                    'value'     => $request->nominal,
                    'type'      => 'DB',
                    'desc'      => 'Convert to LP'
                ]);

                UserTransaction::create([
                    'user_id'   => Auth::user()->id,
                    'item_id'   => $itemLPId,
                    'value'     => $valueConversion,
                    'type'      => 'CR',
                    'desc'      => 'Convert from BP'
                ]);

                $currentLP = $currentLP + $request->nominal;
                User::where('id', Auth::id())->update([
                    'total_lp'  => $currentLP,
                    'total_bp'  => $currentBP - $valueConversion
                ]);

                // Transaction Number
                $latestId = Transaction::max('id') + 1;
                $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);

                $data = new Transaction();
                $data->user_id = Auth::id();
                $data->transaction_number = $transactionNumber;
                $data->item_id = $itemLPId;
                $data->payment_type = 'BP';
                $data->status = 'PAID';
                $data->total = $request->nominal;
                $data->total_price = $request->nominal;
                $data->save();

                $message = "<h3 class='rajdhani-bold font-size-32'>Konversi BP ke LP (" . $request->nominal . ")</h3>" .
                "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
                "<p>Konversi Battle Points ke Loyalty Points kamu berhasil dilakukan dengan nilai tukar <span class='money money-14 right money-inline'>" . $request->nominal . "<img src='" . asset('img/currencies/bp.svg') . "'></span> ditukar dengan <span class='money money-14 right money-inline'>" . $request->nominal . "<img src='" . asset('img/currencies/lp.svg') . "'></span></p>";

                $sys = new SystemMail();
                $sys->user_id = Auth::id();
                $sys->title = 'Terima kasih atas pemebelian Battle Points dari Timkamu.';
                $sys->subject = 'Konversi BP ke LP (' . $request->nominal . ')';
                $sys->message = $message;
                $sys->save();
            } else if ($request->name === 'diamond' || $request->name === 'diamond-bypass') {
                $request->session()->save();

                //get max id
                $latestId = Transaction::max('id') + 1;
                $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);

                $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
                $dataItem = ItemConversion::find($request->id);
                $price = $dataItem->value;
                $itemId = $request->id;
                $detail = [
                    'user_id' => $request->user_id,
                    'server_id' => $request->server_id,
                    'id_pemain' => $request->id_pemain,
                    'phone_number' => $request->phone,
                ];

                if($price > $currentLP && $request->name === 'diamond') {
                    return redirect(url()->previous())->with('failed', 'need-recharge-lp');
                }

                $discount = 0;
                $promo = null;
                if ($request->name === 'diamond-bypass') {
                    $discount = $price * 0.20;
                    $price = $price - $discount;
                    $promo = 1;
                }

                $data = new Transaction();
                $data->user_id = Auth::id() ?? null;
                $data->phone = $this->normalizePhoneNumber($request->phone);
                $data->transaction_number = $transactionNumber;
                $data->item_id = $itemId;
                $data->payment_type = Auth::id() ? 'LP' : 'GOPAY';
                $data->total = 1;
                $data->desc = json_encode($detail);
                $data->total_price = (int)$price;
                $data->discount = (int)$discount;
                $data->promo_id = $promo;
                $data->status = 'PAID';
                $data->save();

                $dataUser = $request->user_id . '(' . $request->server_id . ')';

                // Mail::to('keshia.tiffany@gmail.com')->send(new AlertDiamondRequestEmail($dataUser));

                if(Auth::user()) {
                    $game = 'Mobile Legends: Bang Bang';
                    $dataUser = $request->user_id . '(' . $request->server_id . ')';
                    if ($dataItem->childs->type === 'pubgm'  || $dataItem->childs->type === 'freefire' || $dataItem->childs->type === 'valorant' || $dataItem->childs->type === 'ragnarok') {
                        if ($dataItem->childs->type === 'pubgm') {
                            $game = 'PUBGM';
                        } else if ($dataItem->childs->type === 'freefire') {
                            $game = 'Garena Freefire';
                        } else if ($dataItem->childs->type === 'valorant') {
                            $game = 'Valorant';
                        } else if ($dataItem->childs->type === 'ragnarok') {
                            $game = 'Ragnarok Eternal Love';
                        }
                        $dataUser = $request->id_pemain;
                    }

                    if ($request->name === 'diamond') {
                        User::where('id', Auth::id())->update([
                            'total_lp'  => $currentLP - $dataItem->value,
                        ]);

                        UserTransaction::create([
                            'user_id'   => Auth::user()->id,
                            'item_id'   => $itemLPId,
                            'value'     => $dataItem->value,
                            'type'      => 'DB',
                            'desc'      => '[Purchase '.$game.'] ' . $dataItem->childs->name
                        ]);
                    }

                    $product = "";
                    if (strpos($dataItem->childs->name, 'Diamond')) {
                        $product = number_format((str_replace(' Diamond', '', $dataItem->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/mlbb-diamond.svg') . "'>";
                    } else if (strpos($dataItem->childs->name, 'UC')) {
                        $product = number_format((str_replace(' UC', '', $dataItem->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/uc.png') . "'>";
                    } else if (strpos($dataItem->childs->name, 'Points')) {
                        $product = number_format((str_replace(' Points', '', $dataItem->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/valorant-points.svg') . "'>";
                    } else if (strpos($dataItem->childs->name, 'BCC')) {
                        $product = number_format((str_replace(' BCC', '', $dataItem->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/bcc.png') . "'>";
                    } else {
                        $product = $dataItem->childs->name;
                    }
                    // send system mail
                    $message = "<h3 class='rajdhani-bold font-size-32'>Pembelian Game Currency (Pending)</h3>".
					"<p class='o3'>[Order ID: " . $transactionNumber . "]</p>".
					"<p>Terima kasih atas pembelian game currency di Timkamu. Pesanan kamu sedang diproses.</p>".
					"<table class='rincian-table'>".
                    "<tr>".
                        "<td class='o5'>Status pembelian</td>".
                        "<td>Pembayaran diterima</td>".
                    "</tr>".
                    "<tr>".
                        "<td class='o5'>Waktu pembelian</td>".
                        "<td>" . Carbon::now()->format('d F Y H:i') . " WIB</td>".
                    "</tr>".
                    "<tr>".
                        "<td class='o5'>Game</td>".
                        "<td>". $game ."</td>".
                    "</tr>".
                    "<tr>".
                        "<td class='o5'>Username</td>".
                        "<td>" . $dataUser ."</td>".
                    "</tr>".
                    "<tr>".
                        "<td class='o5'>Phone number</td>".
                        "<td>+62 " . Auth::user()->phone . "</td>".
                    "</tr>".
                    "<tr>".
                        "<td class='o5'>Item yang dibeli</td>".
                        "<td><span class='money money-14 right'>" . $product ."</span></td>".
                    "</tr>".
                    "<tr>".
                        "<td class='o5'>Dibayar dengan</td>".
                        "<td><span class='money money-14 right'>".($request->name === 'diamond-bypass' ? 'Rupiah' : 'Loyalty Points')."</span></td>".
                    "</tr>".
                    "<tr>".
                        "<td class='o5'>Harga</td>".
                        "<td><span class='money money-14 right'>" . number_format($price, 0, '.', ',') . "  <img src='" . asset('img/currencies/lp.svg') . "'></span></td>".
                    "</tr>".
                    "</table>";

                    $sys = new SystemMail();
                    $sys->user_id = Auth::id();
                    $sys->title = 'Terima kasih atas pemebelian Loyalty Points dari Timkamu.';
                    $sys->subject = 'Pembelian Game Currency (Pending)';
                    $sys->message = $message;
                    $sys->save();

                    DB::commit();
                    return redirect('purchase/detail?name=diamond')->with('success', 'success-diamond-purchase');
                } else {
                    DB::commit();
                    return redirect('purchase/success?status=success&order_id='.$transactionNumber);
                }
            } else if ($request->name === 'pulsa'|| $request->name === 'pulsa-bypass') {
                $request->session()->save();

                //get max id
                $latestId = Transaction::max('id') + 1;
                $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);

                $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
                $dataItem = ItemConversion::find($request->id);
                $price = $dataItem->value;
                $itemId = $request->id;
                $detail = [
                    'phone_number' => $request->phone,
                ];

                if ($price > $currentLP && $request->name === 'pulsa') {
                    return redirect(url()->previous())->with('failed', 'need-recharge-lp');
                }

                $data = new Transaction();
                $data->user_id = Auth::id() ?? null;
                $data->phone = $this->normalizePhoneNumber($request->phone);
                $data->transaction_number = $transactionNumber;
                $data->item_id = $itemId;
                $data->payment_type = Auth::id() ? 'LP' : 'GOPAY';
                $data->total = 1;
                $data->desc = json_encode($detail);
                $data->total_price = $price;
                $data->status = 'PAID';
                $data->save();

                // $dataUser = $request->user_id . '(' . $request->server_id . ')';

                // Mail::to('keshia.tiffany@gmail.com')->send(new AlertDiamondRequestEmail($dataUser));

                if (Auth::user()) {
                    $tipe = "";
                    $product = "";
                    $paketType = '';
                    if (strpos($dataItem->childs->name, 'Hari')) {
                        $explode = explode('Hari', $dataItem->childs->name);
                        $days = str_replace(' ', ' Hari', $explode[0]);
                        $paket = str_replace(' ', '', $explode[1]);

                        $product = "<span class='money money-14 money-inline right'>". $paket ."</span> ". $days;
                        $paketType = 'TSEL Flash Kuota';
                        $tipe = "Telkomsel";
                    } else if (strpos($dataItem->childs->name, 'IDR ') === 0 && $dataItem->childs->type === 'telkomsel') {
                        $product = "Pulsa <span class='money money-14 money-inline right'>". $dataItem->childs->name ."</span>";
                        $paketType = 'Pulsa TSEL';
                        $tipe = "Telkomsel";
                    } else if (strpos($dataItem->childs->name, 'IDR ') ===0 && $dataItem->childs->type === 'google-play') {
                        $product = "<span class='money money-14 money-inline right'>" . $dataItem->childs->name . "</span>";
                        $paketType = 'Voucher';
                        $tipe = "Google Play Voucher";
                    } else if($dataItem->childs->type === 'xl') {
                        $product = "<span class='money money-14 money-inline right'>". $dataItem->childs->name ."</span>";
                        $paketType = 'XL Xtra Combo + YouTube';
                        $tipe = "XL";
                    } else {
                        $product = "<span class='money money-14 money-inline right'>" . $dataItem->childs->name . "</span>";
                        $paketType = 'Tri Kuota';
                        $tipe = "Tri";
                    }
                    // send system mail
                    $message = "<h3 class='rajdhani-bold font-size-32'>Pembelian Game Currency (Pending)</h3>" .
                        "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
                        "<p>Terima kasih atas pembelian paket ". $tipe ." di Timkamu. Pesanan kamu sedang diproses.</p>" .
                        "<table class='rincian-table'>" .
                        "<tr>" .
                        "<td class='o5'>Status pembelian</td>" .
                        "<td>Pembayaran diterima</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Waktu pembelian</td>" .
                        "<td>" . Carbon::now()->format('d F Y H:i') . " WIB</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Top up</td>" .
                        "<td>" . $paketType . "</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Phone number</td>" .
                        "<td>+62 " . $this->normalizePhoneNumber($request->phone) . "</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Item yang dibeli</td>" .
                        "<td>" . $product . "</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Dibayar dengan</td>" .
                        "<td><span class='money money-14 right'>Loyalty Points</span></td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Harga</td>" .
                        "<td><span class='money money-14 right'>" . number_format($price, 0, '.', ',') . "  <img src='" . asset('img/currencies/lp.svg') . "'></span></td>" .
                        "</tr>" .
                        "</table>";

                    $sys = new SystemMail();
                    $sys->user_id = Auth::id();
                    $sys->title = 'Terima kasih atas pemebelian Loyalty Points dari Timkamu.';
                    $sys->subject = 'Pembelian Paket '. $tipe .' (Pending)';
                    $sys->message = $message;
                    $sys->save();

                    if ($request->name === 'pulsa') {
                        User::where('id', Auth::id())->update([
                            'total_lp'  => $currentLP - $dataItem->value,
                        ]);

                        UserTransaction::create([
                            'user_id'   => Auth::user()->id,
                            'item_id'   => $itemLPId,
                            'value'     => $dataItem->value,
                            'type'      => 'DB',
                            'desc'      => '[Purchase '. $tipe .'] ' . $dataItem->childs->name
                        ]);
                    }

                    DB::commit();
                    return redirect('purchase/detail?name=pulsa')->with('success-pulsa-purchase', $tipe);
                } else {
                    DB::commit();
                    return redirect('purchase/success?status=success&order_id=' . $transactionNumber);
                }
            } else if ($request->name === 'rumah-tangga' || $request->name === 'rumah-tangga-bypass') {
                $request->session()->save();

                //get max id
                $latestId = Transaction::max('id') + 1;
                $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);

                $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
                $dataItem = ItemConversion::find($request->id);
                $price = $dataItem->value;
                $itemId = $request->id;
                $detail = [
                    'id_pelanggan' => $request->id_pelanggan,
                    'phone_number' => $request->phone,
                ];

                if ($price > $currentLP && $request->name === 'rumah-tangga') {
                    return redirect(url()->previous())->with('failed', 'need-recharge-lp');
                }

                $data = new Transaction();
                $data->user_id = Auth::id() ?? null;
                $data->phone = $this->normalizePhoneNumber($request->phone);
                $data->transaction_number = $transactionNumber;
                $data->item_id = $itemId;
                $data->payment_type = Auth::id() ? 'LP' : 'GOPAY';
                $data->total = 1;
                $data->desc = json_encode($detail);
                $data->total_price = $price;
                $data->status = 'PAID';
                $data->save();

                // $dataUser = $request->user_id . '(' . $request->server_id . ')';

                // Mail::to('keshia.tiffany@gmail.com')->send(new AlertDiamondRequestEmail($dataUser));

                if ($request->name === 'rumah-tangga') {
                    User::where('id', Auth::id())->update([
                        'total_lp'  => $currentLP - $dataItem->value,
                    ]);

                    UserTransaction::create([
                        'user_id'   => Auth::user()->id,
                        'item_id'   => $itemLPId,
                        'value'     => $dataItem->value,
                        'type'      => 'DB',
                        'desc'      => '[Purchase Token PLN] ' . $dataItem->childs->name
                    ]);
                }

                if (Auth::user()) {

                    // send system mail
                    $message = "<h3 class='rajdhani-bold font-size-32'>Pembelian Game Currency (Pending)</h3>" .
                        "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
                        "<p>Terima kasih atas pembelian Token PLN di Timkamu. Pesanan kamu sedang diproses.</p>" .
                        "<table class='rincian-table'>" .
                        "<tr>" .
                        "<td class='o5'>Status pembelian</td>" .
                        "<td>Pembayaran diterima</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Waktu pembelian</td>" .
                        "<td>" . Carbon::now()->format('d F Y H:i') . " WIB</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Top up</td>" .
                        "<td> Token PLN </td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Phone number</td>" .
                        "<td>+62 " . $this->normalizePhoneNumber($request->phone) . "</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Item yang dibeli</td>" .
                        "<td>" . $dataItem->childs->name . "</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Dibayar dengan</td>" .
                        "<td><span class='money money-14 right'>Loyalty Points</span></td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Harga</td>" .
                        "<td><span class='money money-14 right'>" . number_format($price, 0, '.', ',') . "  <img src='" . asset('img/currencies/lp.svg') . "'></span></td>" .
                        "</tr>" .
                        "</table>";

                    $sys = new SystemMail();
                    $sys->user_id = Auth::id();
                    $sys->title = 'Terima kasih atas pemebelian Token PLN dari Timkamu.';
                    $sys->subject = 'Pembelian Paket Token PLN (Pending)';
                    $sys->message = $message;
                    $sys->save();

                    DB::commit();
                    return redirect('purchase/detail?name=rumah-tangga')->with('success-rumah-tangga-purchase', 'Token PLN');
                } else {
                    DB::commit();
                    return redirect('purchase/success?status=success&order_id=' . $transactionNumber);
                }
            }else if ($request->name === 'tournament') {

                $request->session()->save();
                //get data tournament
                $tournament = Tournaments::find($request->tournament_id);
                $id = Auth::id();
                $members = $tournament->teams()->join('team_members as members', 'members.team_id', '=', 'teams.id')->get()->pluck('id_user')->toArray();
                if(in_array($id, $members)){
                    return redirect($tournament->slug)->with('failed', 'failed-tournament-registration');
                }
                $slot = $tournament->slot;
                $teamsCount = $tournament->teams->count();
                if($teamsCount >= $slot){
                    return redirect($tournament->slug)->with('closed', 'failed-tournament-registration');
                }

                //get max id
                $latestId = Transaction::max('id') + 1;
                $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);

                //get tournament price
                $price = $tournament->admission_fee;

                //save as transaction
                $data = new Transaction();
                $data->user_id = Auth::id();
                $data->transaction_number = $transactionNumber;
                $data->payment_type = 'BYPASS';
                $data->total = 1;
                $data->id_tournament = $request->tournament_id;

                //get team name
                $explode = explode('=', $request->data);
                $teamName = $explode[1];
                $data->desc = json_encode([
                    'team_name' => $teamName,
                    'team_members_name' => $request->team_members_name,
                    'team_members_username' => $request->team_members_username,
                    'team_members_userid' => $request->team_members_userid,
                    'phone_number' => $request->team_members_phone_number
                ]);
                $data->total_price = $price;
                $data->save();
                //end of save transaction

                //insert team
                $team = new Team();
                $team->id_tournament = $request->tournament_id;
                $team->name = $teamName;
                $team->alias = strtolower(str_replace(' ', '-', $teamName));
                $team->logo = 'img/team-logos/na';
                $team->formed_date = Carbon::now();
                $team->save();

                $idTeam = $team->id;

                foreach($request->team_members_name as $key => $value) {
                    $teamMember = new TeamMember();
                    $teamMember->team_id = $idTeam;
                    $teamMember->name = $request->team_members_name[$key];
                    $teamMember->username = $request->team_members_username[$key];
                    $teamMember->userid_in_game = $request->team_members_userid[$key];
                    $teamMember->id_role = 2;
                    if ($key === 0) {
                        $teamMember->id_user = Auth::id();
                        $teamMember->id_role = 1;
                        $teamMember->phone_number = $request->team_members_phone_number[$key];
                    }

                    $teamMember->save();
                }

                //insert 40 BP
                $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
                $nominalLP = $tournament->admission_fee / 1000;
                UserTransaction::create([
                    'user_id'   => Auth::user()->id,
                    'item_id'   => $itemLPId,
                    'value'     => $nominalLP,
                    'type'      => 'CR',
                    'desc'      => '[Bonus Registration] Tournament - ' . $tournament->name . ' ('. Carbon::parse($tournament->tournament_start)->format('d M Y') .')'
                ]);

                User::where('id', Auth::id())->update(['total_lp' => $currentLP + $nominalLP]);

                // send system mail
                $message = "<h3 class='rajdhani-bold font-size-32'>Pendaftaran turnamen berhasil</h3>" .
                    "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
                    "<p>Pendaftaran untuk turnamen \"" . $tournament->name . "\" berhasil.</p>";

                $sys = new SystemMail();
                $sys->user_id = Auth::id();
                $sys->title = 'Terima kasih atas pendaftaran tim di Tournament Timkamu.';
                $sys->subject = 'Pendaftaran turnamen berhasil';
                $sys->message = $message;
                $sys->save();

                DB::commit();
                return redirect($tournament->slug)->with('success', 'success-tournament-registration');
            } else if ($request->name === 'tournament-member') {
                $request->session()->save();

                //get data tournament
                $tournament = Tournaments::find($request->tournament_id);
                $id = Auth::id();
                $members = $tournament->teams()->join('team_members as members', 'members.team_id', '=', 'teams.id')->get()->pluck('id_user')->toArray();
                if(in_array($id, $members)){
                    return redirect($tournament->slug)->with('failed', 'failed-tournament-registration');
                }
                //get max id
                $latestId = Transaction::max('id') + 1;
                $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);

                //get tournament price
                $price = $tournament->admission_fee;

                //save as transaction
                $data = new Transaction();
                $data->user_id = Auth::id();
                $data->transaction_number = $transactionNumber;
                $data->payment_type = 'BYPASS';
                $data->total = 1;
                $data->id_tournament = $request->tournament_id;
                $data->total_price = $price;
                $data->save();
                //end of save transaction

                TeamMember::where('id', $request->member_id)->update(['id_user' => Auth::id()]);

                //insert 40 BP
                $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
                $nominalLP = $tournament->admission_fee / 1000;
                UserTransaction::create([
                    'user_id'   => Auth::user()->id,
                    'item_id'   => $itemLPId,
                    'value'     => $nominalLP,
                    'type'      => 'CR',
                    'desc'      => '[Bonus Registration] Tournament - ' . $tournament->name . ' ('. Carbon::parse($tournament->tournament_start)->format('d M Y') .')'
                ]);

                User::where('id', Auth::id())->update(['total_lp' => $currentLP + $nominalLP]);

                // send system mail
                $message = "<h3 class='rajdhani-bold font-size-32'>Pendaftaran turnamen berhasil</h3>" .
                    "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
                    "<p>Pendaftaran untuk turnamen \"" . $tournament->name . "\" berhasil.</p>";

                $sys = new SystemMail();
                $sys->user_id = Auth::id();
                $sys->title = 'Terima kasih atas pendaftaran tim di Tournament Timkamu.';
                $sys->subject = 'Pendaftaran turnamen berhasil';
                $sys->message = $message;
                $sys->save();

                DB::commit();
                return redirect($tournament->slug)->with('success', 'success-tournament-registration');
            }

        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();

            return redirect(url()->previous())->with('failed', 'failed-recharge');
        }

        DB::commit();
        if($request->name === 'rank') {
            $request->nominal = $request->nominal.'-'. $diffRank;
        }
        return redirect(url()->previous())->with('success-recharge-'.$request->name, $request->nominal);
    }

    private function normalizePhoneNumber($phone)
    {
        if (substr($phone, 0, 1) == '0') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 1) == '+') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 2) == '62') {
            $phone = substr($phone, 2);
        }

        return $phone;
    }
}
