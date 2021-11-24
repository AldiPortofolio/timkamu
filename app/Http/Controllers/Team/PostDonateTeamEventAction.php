<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\Models\EventChat;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Quest;
use App\Http\Models\SystemMail;
use App\Http\Models\Team;
use App\Http\Models\TeamDonate;
use App\Http\Models\User;
use App\Http\Models\UserQuest;
use App\Http\Models\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostDonateTeamEventAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request, $id)
    {
        $result = [];
        $result['status'] = 'success';

        $userDonate = TeamDonate::where('user_id', Auth::id())->get();
        $totalDonation = 0;
        foreach ($userDonate as $key => $uds) {
            $itemConv = ItemConversion::where('id', $uds->item_conversion_id)->first();
            $totalDonation += $itemConv->value;
        }

        $currentLP = Auth::user()->total_lp;
        $currentCoin = Auth::user()->total_coin;
        $item = ItemConversion::where('child_id', $request->item_id)->first();
        $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
        
        $team = Team::where('id', $request->team_id)->pluck('name')->first();

        if($currentLP < $item->value) {
            $result['status'] = 'error';
            $result['message'] = "You don't have enough LP";
            return $result;
        }

        try {
            DB::beginTransaction();

            UserTransaction::create([
                'user_id'   => Auth::user()->id,
                'item_id'   => $itemLPId,
                'value'     => $item->value,
                'type'      => 'DB',
                'desc'      => 'Dukung Tim ' . $team
            ]);

            User::where('id', Auth::id())->update([
                'total_lp'  => $currentLP - $item->value
            ]);

            TeamDonate::create([
                'team_id'   => $request->team_id,
                'item_id'   => $request->item_id,
                'item_conversion_id' => $item->id,
                'user_id'   => Auth::id(),
                'value'     => 1
            ]);

            EventChat::create([
                'event_id'  => $id,
                'user_id'   => Auth::id(),
                'message'   => $request->message,
                'gift'      => '1'
            ]);

            $totalDonationTemp = $totalDonation + $item->value;
            $donationQuest = Quest::where('title', 'Total pemberian item support sebesar 100 LP')->first();
            $detailQuest = json_decode($donationQuest->value_detail);
            $itemCoinId = Item::where('name', 'coin')->pluck('id')->first();
            $userQuest = UserQuest::where('user_id', Auth::user()->id)->where('quest_id', $donationQuest->id)->first();
            if (!$userQuest) {
                $detail = [
                    'value' => 0,
                    'progress' => $item->value
                ];
                UserQuest::create([
                    'user_id' => Auth::user()->id,
                    'quest_id' => $donationQuest->id,
                    'value_detail' => json_encode($detail)
                ]);
            } else {
                $detail = json_decode($userQuest->value_detail);
                $detail->progress += $item->value;

                $tempValue = floor($totalDonationTemp / $detailQuest->progress);
                if ($tempValue > $detail->value) {
                    $diff = $tempValue - $detail->value;
                    $detail->value = $tempValue;

                    for ($i=0; $i < $diff; $i++) {
                        $currentCoin += $detailQuest->value;

                        UserTransaction::create([
                            'user_id'   => Auth::user()->id,
                            'item_id'   => $itemCoinId,
                            'value'     => $detailQuest->value,
                            'type'      => 'CR',
                            'desc'      => '[Quest Achieve] ' . $donationQuest->title
                        ]);

                        User::where('id', Auth::id())->update([
                            'total_coin' => $currentCoin
                        ]);

                        $message = "<h3 class='rajdhani-bold font-size-32 mb-20'>Quest Selesai</h3>" .
                        "<p class='grey-10'>Selamat, kamu telah menyelesaikan quest <span class='white-10'>" . $donationQuest->title . "</span> dengan hadiah <span class='money money-14 right money-inline white-10'>" . $detailQuest->value . "<img src='" . asset('img/currencies/coin.svg') . "'></span></p>";

                        $sys = new SystemMail();
                        $sys->user_id = Auth::user()->id;
                        $sys->title = 'Terima kasih telah bergabung dengan Timkamu.';
                        $sys->subject = 'Quest Selesai';
                        $sys->message = $message;
                        $sys->save();   
                    }

                    $result['quest_achieve'] = 'success';
                    $result['total_coin'] = $currentCoin + $detailQuest->value;
                    $result['total_achievement'] = $diff * $detailQuest->value;
                }

                UserQuest::where('quest_id', $donationQuest->id)->where('user_id', Auth::user()->id)->update([
                    'value_detail' => json_encode($detail)
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();

            $result['status'] = 'error';
            $result['message'] = 'Terjadi error. Silahkan coba beberapa saat lagi.';
            return $result;
        }

        DB::commit();

        $result['message'] = 'donate success';
        $result['total_lp'] = number_format(($currentLP - $item->value), 0, '.', ',');
        return $result;
    }
}