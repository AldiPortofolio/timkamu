<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Models\Item;
use App\Http\Models\Quest;
use App\Http\Models\Rank;
use App\Http\Models\SystemMail;
use App\Http\Models\Team;
use App\Http\Models\TeamMember;
use App\Http\Models\Tournaments;
use App\Http\Models\Transaction;
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

class GetFinishPaymentAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function __invoke(Request $request)
    {
        ini_set('memory_limit', '-1');
        $itemId = Item::where('name', 'LP')->pluck('id')->first();
        $transactionNumber = $request->order_id;
        $dataTransaction = Transaction::where('transaction_number', $transactionNumber)->first();
        $currentLP = $dataTransaction->user_id ? $dataTransaction->users->total_lp : 0;
        $currentBP = $dataTransaction->user_id ? $dataTransaction->users->total_bp : 0;
        $currentCoin = $dataTransaction->user_id ? $dataTransaction->users->total_coin : 0;
        $currentExp = $dataTransaction->user_id ? $dataTransaction->users->total_exp : 0;
        $currentRank = $dataTransaction->user_id ? $dataTransaction->users->rank_id : 0;
        $nominalLP = 0;
        $status = 'lp';
        if ((int)$request->status_code === 200) {
            if($dataTransaction->status === 'UNPAID') {
                try {
                    DB::beginTransaction();

                    $nominalLP = Transaction::where('transaction_number', $transactionNumber)->select('total')->pluck('total')->first();
                    Transaction::where('transaction_number', $transactionNumber)->update([
                        'status' => 'PAID'
                    ]);
                    if($dataTransaction->item_id == null && $dataTransaction->id_tournament !== null){
                        $dataTournament = Tournaments::find($dataTransaction->id_tournament);
                        $transactionDetail = json_decode($dataTransaction->desc);

                        if(isset($transactionDetail->team_name)) {
                            $teamsData = $transactionDetail;
                            $team = Team::create([
                                'name' => $teamsData->team_name,
                                'alias' => strtolower($teamsData->team_name),
                                'logo' => 'img/team-logos/na',
                                'id_tournament' => $dataTransaction->id_tournament,
                                'formed_date' => Carbon::now()->toDateTimeString()
                            ]);
                            for ($i = 0; $i < count($teamsData->team_members_name); $i++) {
                                $saveMember = [
                                    'name' => $teamsData->team_members_name[$i],
                                    'username' => $teamsData->team_members_username[$i],
                                    'userid_in_game' => $teamsData->team_members_userid[$i],
                                    'id_role' => 2
                                ];
                                if ($i == 0) {
                                    $saveMember['id_user'] = $dataTransaction->user_id;
                                    $saveMember['id_role'] = 1;
                                    $saveMember['phone_number'] = $teamsData->team_members_phone_number[$i];
                                }
                                $team->members()->create($saveMember);
                            }
                        } else if(isset($transactionDetail->member_id)) {
                            TeamMember::where('id', $transactionDetail->member_id)->update(['id_user' => $dataTransaction->user_id]);
                        }

                        $message = "<h3 class='rajdhani-bold font-size-32'>Pendaftaran turnamen berhasil</h3>" .
                        "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
                        "<p>Pendaftaran untuk turnamen \"" . $dataTournament->name . "\" berhasil.</p>";

                        $sys = new SystemMail();
                        $sys->user_id = $dataTransaction->user_id;
                        $sys->title = 'Terima kasih atas pendaftaran tim di Tournament Timkamu.';
                        $sys->subject = "Pendaftaran turnamen berhasil";
                        $sys->message = $message;
                        $sys->save();

                        //insert 40 BP
                        $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
                        $nominalLP = $dataTransaction->total_price / 1000;
                        UserTransaction::create([
                            'user_id'   => $dataTransaction->user_id,
                            'item_id'   => $itemLPId,
                            'value'     => $nominalLP,
                            'type'      => 'CR',
                            'desc'      => '[Bonus Registration] Tournament - ' . $dataTournament->name . ' (' . Carbon::parse($dataTournament->tournament_start)->format('d M Y') . ')'
                        ]);

                        User::where('id', $dataTransaction->user_id)->update(['total_lp' => $currentLP + $nominalLP]);

                        DB::commit();
                        return redirect($dataTournament->slug)->with('success', 'success-tournament-registration');
                    } else if ($dataTransaction->item_id === 1) {
                        UserTransaction::create([
                            'user_id'   => $dataTransaction->user_id,
                            'item_id'   => $itemId,
                            'value'     => $nominalLP,
                            'type'      => 'CR',
                            'desc'      => '[Purchase - ' . $transactionNumber . '] +' . $nominalLP
                        ]);

                        $update = [];
                        $update['total_lp'] = $currentLP + $nominalLP;
                        $update['total_exp'] = $currentExp + $nominalLP;
                        if($update['total_exp'] >= 500 && $update['total_exp'] < 1000) {
                            $update['type'] = 'VIP';
                        } else if($update['total_exp'] >= 1000) {
                            $update['type'] = 'VVIP';
                        }

                        if ($dataTransaction->cashback > 0) {
                            // Update saldo BP
                            UserTransaction::create([
                                'user_id'   => Auth::user()->id,
                                'item_id'   => 2,
                                'value'     => $dataTransaction->cashback,
                                'type'      => 'CR',
                                'desc'      => '[Promo Cashback 10%] +' . $dataTransaction->cashback
                            ]);

                            $update['total_bp'] = $currentBP + $dataTransaction->cashback;
                        }

                        $rank = Rank::where('value', '<=', $update['total_exp'])->select('id')->orderBy('id', 'desc')->first();
                        if ((int)$currentRank !== (int)$rank->id) {
                            $diff = (int)$rank->id - (int)$currentRank;
                            $update['rank_id'] = $rank->id;

                            $status = 'rank';

                            $rankUpQuest = Quest::where('title', 'Naik level')->first();
                            $itemCoinId = Item::where('name', 'coin')->pluck('id')->first();
                            $userQuest = UserQuest::where('user_id', $dataTransaction->user_id)->where('quest_id', $rankUpQuest->id)->first();
                            if (!$userQuest) {
                                $detail = [
                                    'value' => $diff
                                ];
                                UserQuest::create([
                                    'user_id' => $dataTransaction->user_id,
                                    'quest_id' => $rankUpQuest->id,
                                    'value_detail' => json_encode($detail)
                                ]);
                            } else {
                                $detail = json_decode($userQuest->value_detail);
                                $diff = (int)$rank->id - (int)$currentRank;
                                $detail->value += $diff;

                                UserQuest::where('quest_id', $rankUpQuest->id)->where('user_id', $dataTransaction->user_id)->update([
                                    'value_detail' => json_encode($detail)
                                ]);
                            }
                            $valueQuest = json_decode($rankUpQuest->value_detail)->value;
                            $diff = (int)$rank->id - (int)$currentRank;
                            for ($i = 0; $i < $diff; $i++) {
                                UserTransaction::create([
                                    'user_id'   => $dataTransaction->user_id,
                                    'item_id'   => $itemCoinId,
                                    'value'     => $valueQuest,
                                    'type'      => 'CR',
                                    'desc'      => '[Quest Achieve] ' . $rankUpQuest->title
                                ]);

                                $message = "<h3 class='rajdhani-bold font-size-32 mb-20'>Quest Selesai</h3>" .
                                "<p class='grey-10'>Selamat, kamu telah menyelesaikan quest <span class='white-10'>" . $rankUpQuest->title . "</span> dengan hadiah <span class='money money-14 right money-inline white-10'>" . $valueQuest . "<img src='" . asset('img/currencies/coin.svg') . "'></span></p>";

                                $sys = new SystemMail();
                                $sys->user_id = $dataTransaction->user_id;
                                $sys->title = 'Terima kasih telah bergabung dengan Timkamu.';
                                $sys->subject = 'Quest Selesai';
                                $sys->message = $message;
                                $sys->save();

                                $currentCoin += $valueQuest;
                            }

                            $update['total_coin'] = $currentCoin;
                        }

                        $message = "<h3 class='rajdhani-bold font-size-32'>Pembelian LP (" . $nominalLP . ")</h3>" .
                        "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
                        "<p>Terima kasih atas pemebelian <span class='money money-14 right money-inline'>" . $nominalLP . "<img src='" . asset('img/currencies/lp.svg') . "'></span> dari Timkamu.</p>";

                        $sys = new SystemMail();
                        $sys->user_id = $dataTransaction->user_id;
                        $sys->title = 'Terima kasih atas pemebelian Loyalty Points dari Timkamu.';
                        $sys->subject = "Pembelian LP (" . $nominalLP . ")";
                        $sys->message = $message;
                        $sys->save();

                        if ($dataTransaction->cashback > 0) {
                            // send mail
                            $message = "<h3 class='rajdhani-bold font-size-32'>Cashback LP recharg (" . $nominalLP . ")</h3>" .
                            "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
                                "<p>Kamu mendapatkan <span class='money money-14 right money-inline'>" . $dataTransaction->cashback . "<img src='" . asset('img/currencies/lp.svg') . "'></span>  cashback dari pembelian LP.</p>";

                            $sys = new SystemMail();
                            $sys->user_id = $dataTransaction->user_id;
                            $sys->title = 'Terima kasih atas pemebelian Loyalty Points dari Timkamu.';
                            $sys->subject = "Cashback LP recharg (" . $nominalLP . ")";
                            $sys->message = $message;
                            $sys->save();
                        }

                        $referralCodeFrom = $dataTransaction->users->referral_code_from;
                        $isReferralCodeFromUsed = $dataTransaction->users->is_referral_used;
                        $totalReferralUsed = User::whereNotNull('referral_code')->whereNotNull('referral_code_from')->where('is_referral_used', '1')->count();
                        if ($nominalLP >= 9 && $isReferralCodeFromUsed === '0' && $totalReferralUsed <= 2500) {
                            $userReferred = User::where('referral_code', $referralCodeFrom)->first();

                            if ($userReferred) {
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
                                if($totalReferralUsed >= 50 && $totalReferralUsed < 100) {
                                    $userReferredUpdate['type'] = 'VIP';
                                } else if($totalReferralUsed >= 100) {
                                    $userReferredUpdate['type'] = 'VVIP';
                                }

                                User::where('id', $userReferred->id)->update($userReferredUpdate);

                                $update['is_referral_used'] = '1';
                            }
                        }
                        User::where('id', $dataTransaction->user_id)->update($update);
                    } else if($dataTransaction->items->childs->type === 'mlbb' || $dataTransaction->items->childs->type === 'pubgm' || $dataTransaction->items->childs->type === 'freefire'|| $dataTransaction->items->childs->type === 'valorant'|| $dataTransaction->items->childs->type === 'ragnarok') {
                        $dataUserTemp = json_decode($dataTransaction->desc);
                        $dataUser = $dataUserTemp->user_id . '(' . $dataUserTemp->server_id . ')';

                        // send notif to user
                        if ($dataTransaction->user_id) {
                            // send notif to admin
                            // Mail::to('keshia.tiffany@gmail.com')->send(new AlertDiamondRequestEmail($dataUser));
                            // Mail::to('ferdian.jahja@gmail.com')->send(new AlertDiamondRequestEmail($dataUser));
                            // Mail::to('jeffrytimkamu@gmail.com')->send(new AlertDiamondRequestEmail($dataUser));

                            $game = 'Mobile Legends: Bang Bang';
                            $userInfo = $dataUserTemp->user_id . " (" . $dataUserTemp->server_id . ")";
                            if($dataTransaction->items->childs->type === 'pubg'  || $dataTransaction->items->childs->type === 'freefire'|| $dataTransaction->items->childs->type === 'valorant') {
                                if ($dataTransaction->items->childs->type === 'pubgm') {
                                    $game = 'PUBGM';
                                } else if ($dataTransaction->items->childs->type === 'freefire') {
                                    $game = 'Garena Freefire';
                                } else if ($dataTransaction->items->childs->type === 'valorant') {
                                    $game = 'Valorant';
                                } else if ($dataTransaction->items->childs->type === 'ragnarok') {
                                    $game = 'Ragnarok Eternal Love';
                                }
                                $userInfo = $dataUserTemp->id_pemain ?? '';
                            }

                            $productName = "";
                            if(strpos($dataTransaction->items->childs->name, 'Diamond')) {
                                $productName = number_format((str_replace(' Diamond', '', $dataTransaction->items->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/mlbb-diamond.svg') . "'>";
                            } else if(strpos($dataTransaction->items->childs->name, 'UC')) {
                                $productName = number_format((str_replace(' UC', '', $dataTransaction->items->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/uc.png') . "'>";
                            } else if (strpos($dataTransaction->items->childs->name, 'Points')) {
                                $productName = number_format((str_replace(' Points', '', $dataTransaction->items->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/valorant-points.svg') . "'>";
                            } else if (strpos($dataTransaction->items->childs->name, 'BCC')) {
                                $productName = number_format((str_replace(' BCC', '', $dataTransaction->items->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/bcc.png') . "'>";
                            } else {
                                $productName = $dataTransaction->items->childs->name;
                            }

                            $messageMailSystem = "<h3 class='rajdhani-bold font-size-32'>Pembelian Game Currency (Pending)</h3>" .
                            "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
                            "<p>Terima kasih atas pembelian game currency di Timkamu. Pesanan kamu sedang diproses.</p>" .
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
                            "<td class='o5'>Game</td>" .
                            "<td>". $game ."</td>" .
                            "</tr>" .
                            "<tr>" .
                            "<td class='o5'>Username</td>" .
                            "<td>" . $userInfo ."</td>" .
                            "</tr>" .
                            "<tr>" .
                            "<td class='o5'>Phone number</td>" .
                            "<td>+62 " . $dataTransaction->phone . "</td>" .
                            "</tr>" .
                            "<tr>" .
                            "<td class='o5'>Item yang dibeli</td>" .
                            "<td><span class='money money-14 right'>" . $productName . "</span></td>" .
                            "</tr>" .
                            "<tr>" .
                            "<td class='o5'>Dibayar dengan</td>" .
                            "<td><span class='money money-14 right'>Rupiah</span></td>" .
                            "</tr>" .
                            "<tr>" .
                            "<td class='o5'>Harga</td>" .
                            "<td><span class='money money-14 right'>Rp " . number_format($dataTransaction->total_price, 0, '.', ',') . "</span></td>" .
                            "</tr>" .
                            "</table>";

                            $sys = new SystemMail();
                            $sys->user_id = $dataTransaction->user_id;
                            $sys->title = 'Terima kasih atas pembelian Diamond dari Timkamu.';
                            $sys->subject = 'Pembelian Game Currency (Pending)';
                            $sys->message = $messageMailSystem;
                            $sys->save();

                            DB::commit();
                            return redirect('purchase/detail?name=diamond')->with('success', 'success-diamond-purchase');
                        }


                        DB::commit();
                        return redirect('purchase/success?status=success&order_id=' . $transactionNumber);
                    } else if ($dataTransaction->items->childs->type === 'telkomsel' || $dataTransaction->items->childs->type === 'xl' || $dataTransaction->items->childs->type === 'tri' || $dataTransaction->items->childs->type === 'google-play') {
                        // send notif to user
                        if ($dataTransaction->user_id) {
                            $tipe = "";
                            $productName = "";
                            $paketType = '';
                            if (strpos($dataTransaction->items->childs->name, 'Hari')) {
                                $explode = explode('Hari', $dataTransaction->items->childs->name);
                                $days = str_replace(' ', ' Hari', $explode[0]);
                                $paket = str_replace(' ', '', $explode[1]);

                                $productName = "<span class='money money-14 money-inline right'>" . $paket . "</span> ". $days;
                                $paketType = 'TSEL Flash Kuota';
                                $tipe = "Telkomsel";
                            } else if (strpos($dataTransaction->items->childs->name, 'IDR ') === 0 && $dataTransaction->items->childs->type === 'telkomsel') {
                                $productName = "Pulsa <span class='money money-14 money-inline right'>" . $dataTransaction->items->childs->name . "</span>";
                                $paketType = 'Pulsa TSEL';
                                $tipe = "Telkomsel";
                            } else if (strpos($dataTransaction->items->childs->name, 'IDR ') === 0 && $dataTransaction->items->childs->type === 'google-play') {
                                $productName = "<span class='money money-14 money-inline right'>" . $dataTransaction->items->childs->name . "</span>";
                                $paketType = 'Voucher';
                                $tipe = "Google Play Voucher";
                            } else if($dataTransaction->items->childs->type === 'xl') {
                                $productName = "<span class='money money-14 money-inline right'>" . $dataTransaction->items->childs->name . "</span>";
                                $paketType = 'XL Xtra Combo + YouTube';
                                $tipe = "XL";
                            } else {
                                $productName = "<span class='money money-14 money-inline right'>" . $dataTransaction->items->childs->name . "</span>";
                                $paketType = 'Tri Kuota';
                                $tipe = "Tri";
                            }

                            $messageMailSystem = "<h3 class='rajdhani-bold font-size-32'>Pembelian Game Currency (Pending)</h3>" .
                                "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
                                "<p>Terima kasih atas pembelian paket " . $tipe . " di Timkamu. Pesanan kamu sedang diproses.</p>" .
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
                                "<td class='o5'>Top p</td>" .
                                "<td>" . $paketType . "</td>" .
                                "</tr>" .
                                "<tr>" .
                                "<td class='o5'>Phone number</td>" .
                                "<td>+62 " . $dataTransaction->phone . "</td>" .
                                "</tr>" .
                                "<tr>" .
                                "<td class='o5'>Item yang dibeli</td>" .
                                "<td>" . $productName . "</td>" .
                                "</tr>" .
                                "<tr>" .
                                "<td class='o5'>Dibayar dengan</td>" .
                                "<td><span class='money money-14 right'>Rupiah</span></td>" .
                                "</tr>" .
                                "<tr>" .
                                "<td class='o5'>Harga</td>" .
                                "<td><span class='money money-14 right'>Rp " . number_format($dataTransaction->total_price, 0, '.', ',') . "</span></td>" .
                                "</tr>" .
                                "</table>";

                            $sys = new SystemMail();
                            $sys->user_id = $dataTransaction->user_id;
                            $sys->title = 'Terima kasih atas pembelian Paket '. $tipe .' dari Timkamu.';
                            $sys->subject = 'Pembelian Paket ' . $tipe . ' (Pending)';
                            $sys->message = $messageMailSystem;
                            $sys->save();

                            DB::commit();
                            return redirect('purchase/detail?name=pulsa')->with('success-pulsa-purchase', $tipe);
                        } else if ($dataTransaction->items->childs->type === 'token') {
                            // send notif to user
                            if ($dataTransaction->user_id) {

                                $messageMailSystem = "<h3 class='rajdhani-bold font-size-32'>Pembelian Game Currency (Pending)</h3>" .
                                    "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
                                    "<p>Terima kasih atas pembelian paket Token PLN di Timkamu. Pesanan kamu sedang diproses.</p>" .
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
                                    "<td class='o5'>Top p</td>" .
                                    "<td> Token PLN</td>" .
                                    "</tr>" .
                                    "<tr>" .
                                    "<td class='o5'>Phone number</td>" .
                                    "<td>+62 " . $dataTransaction->phone . "</td>" .
                                    "</tr>" .
                                    "<tr>" .
                                    "<td class='o5'>Item yang dibeli</td>" .
                                    "<td>" . $dataTransaction->items->childs->name . "</td>" .
                                    "</tr>" .
                                    "<tr>" .
                                    "<td class='o5'>Dibayar dengan</td>" .
                                    "<td><span class='money money-14 right'>Rupiah</span></td>" .
                                    "</tr>" .
                                    "<tr>" .
                                    "<td class='o5'>Harga</td>" .
                                    "<td><span class='money money-14 right'>Rp " . number_format($dataTransaction->total_price, 0, '.', ',') . "</span></td>" .
                                    "</tr>" .
                                    "</table>";

                                $sys = new SystemMail();
                                $sys->user_id = $dataTransaction->user_id;
                                $sys->title = 'Terima kasih atas pembelian Paket Token PLN dari Timkamu.';
                                $sys->subject = 'Pembelian Paket Token PLN (Pending)';
                                $sys->message = $messageMailSystem;
                                $sys->save();

                                DB::commit();
                                return redirect('purchase/detail?name=rumah-tangga')->with('success-rumah-tangga-purchase', 'Token PLN');
                            }
                        }

                        DB::commit();
                        return redirect('purchase/success?status=success&order_id=' . $transactionNumber);
                    }


                } catch (\Exception $e) {
                    Log::info($e->getMessage());
                    DB::rollBack();

                    if ($dataTransaction->item_id === 1) {
                        return redirect('purchase/detail?name=lp')->with('failed', 'failed-recharge');
                    }

                    return redirect('purchase/detail?name=diamond')->with('failed', 'failed-recharge');
                }

                DB::commit();
                return redirect('purchase/detail?name=lp')->with('success-recharge-' . $status, $nominalLP);
            }
        }

        return redirect('/');
    }

    private function sendMessage($phone, $message)
    {
        $req = [
            'apikey'        => ENV('RAJA_SMS_API_KEY'),
            'senderid'      => '1',
            'callbackurl'   => '',
            'datapacket'    => [
                [
                    'number'  => '62' . $phone,
                    'message' => $message
                ]
            ]
        ];

        $client = new \GuzzleHttp\Client();
        $res = $client->request(
            'POST',
            ENV('RAJA_SMS_URL'),
            [
                'headers' => [
                    'Content-Type'  => 'application/json'
                ],
                'body'    => json_encode($req)
            ]
        );

        $body = json_decode($res->getBody()->getContents());

        return $body;
    }
}
