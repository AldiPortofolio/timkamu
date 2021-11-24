<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\ConfigBalancer;
use App\Http\Models\Event;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\League;
use App\Http\Models\Quest;
use App\Http\Models\SystemMail;
use App\Http\Models\Team;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use App\Http\Models\UserQuest;
use App\Http\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostEventSupportSementaraAction extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request, $id)
    {
        $result = [];
        $result['status'] = 'success';
        $result['quest_achieve'] = 'failed';


        if(!Auth::user()) {
            $result['status'] = 'error';
            $result['message'] = 'need login';

            return $result;
        }

        // if(Auth::user()->active === '0') {
        //     $result['status'] = 'error';
        //     $result['message'] = 'need verify';

        //     return $result;
        // }

        $rules = EventBetRule::find($request->id);
        $valueDetailBetRules = json_decode($rules->value_detail);
        if($valueDetailBetRules->{$request->type.'_locked'} === '1') {
            $result['status'] = 'error';
            $result['message'] = 'bet locked';

            return $result;
        }
        $BPPlacedDetail = json_decode($rules->bp_placed);

        $event = Event::find($id);
        $itemId = Item::where('name', 'BP')->pluck('id')->first();
        $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
        $totalBetVal = $request->value;

        $currentBP = Auth::user()->total_bp;
        $currentLP = Auth::user()->total_lp;
        $currentCoin = Auth::user()->total_coin;
        $arrPrediction = EventTransaction::where('status', '<>', '1')
            ->where('user_id', Auth::user()->id)
            ->where('created_at', '>', Carbon::parse('2020-10-12')->format('Y-m-d'))->get();

        $totalBPPredict = 0;
        $arrPredictionUnique = [];
        foreach ($arrPrediction as $i => $predict) {
            $valueDetail = json_decode($predict->value_detail);
            $totalBPPredict += $valueDetail->value;
            $stringTemp = $predict->event_bet_id . '-' . $valueDetail->type;
            if (!in_array($stringTemp, $arrPredictionUnique)) {
                array_push($arrPredictionUnique, $stringTemp);
            }
        }
        $totalPrediction = count($arrPredictionUnique);
        $totalNeedsBP = (int)$totalBetVal - $currentBP;

        if($request->auto_support === null) {
            if ($currentBP < $totalBetVal) {
                $result['status'] = 'error';
                $result['message'] = 'not enough BP';
                if ($currentLP < $totalNeedsBP) {
                    $result['message'] = 'convert to LP';
                    $result['lp_convert'] = number_format($totalNeedsBP, 0, '.', ',');
                }
                $result['total_support_bp'] = number_format($totalBetVal, 0, '.', ',');
                $result['total_bp'] = number_format($totalNeedsBP, 0, '.', ',');
                return $result;
            }
        }

        try {
            DB::beginTransaction();

            if ($request->auto_support) {
                UserTransaction::create([
                    'user_id'   => Auth::user()->id,
                    'item_id'   => $itemLPId,
                    'value'     => $totalNeedsBP,
                    'type'      => 'DB',
                    'desc'      => 'Convert to BP'
                ]);

                UserTransaction::create([
                    'user_id'   => Auth::user()->id,
                    'item_id'   => $itemId,
                    'value'     => $totalNeedsBP,
                    'type'      => 'CR',
                    'desc'      => 'Convert from LP'
                ]);

                $currentBP = $currentBP + $totalNeedsBP;
                User::where('id', Auth::id())->update([
                    'total_lp'  => $currentLP - $totalNeedsBP,
                    'total_bp'  => $currentBP
                ]);

                // Transaction Number
                $latestId = Transaction::max('id') + 1;
                $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);

                $data = new Transaction();
                $data->user_id = Auth::id();
                $data->transaction_number = $transactionNumber;
                $data->item_id = $itemId;
                $data->payment_type = 'LP';
                $data->status = 'PAID';
                $data->total = $totalNeedsBP;
                $data->total_price = $totalNeedsBP;
                $data->save();

                $message = "<h3 class='rajdhani-bold font-size-32'>Konversi LP ke BP (". $totalNeedsBP .")</h3>".
                "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>".
                "<p>Konversi Loyalty Points ke Battle Points kamu berhasil dilakukan dengan nilai tukar <span class='money money-14 right money-inline'>". $totalNeedsBP ."<img src='". asset('img/currencies/lp.svg') ."'></span> ditukar dengan <span class='money money-14 right money-inline'>". $totalNeedsBP ."<img src='". asset('img/currencies/bp.svg') ."'></span></p>";

                $sys = new SystemMail();
                $sys->user_id = Auth::id();
                $sys->title = 'Terima kasih atas pemebelian Battle Points dari Timkamu.';
                $sys->subject = 'Konversi LP ke BP ('. $totalNeedsBP .')';
                $sys->message = $message;
                $sys->save();
            }

            $bonus = $valueDetailBetRules->{$request->type};
            if(Auth::user()->type === 'VIP') {
                $bonus += 2;
            } else if(Auth::user()->type === 'VVIP') {
                $bonus += 5;
            }

            $valueDetail = [];
            $valueDetail['value'] = $request->value;
            $valueDetail['type']  = $request->type;
            $valueDetail['bonus'] = $bonus;
            $valueDetail['win']   = floor($request->value * (1 + ($bonus/100)));

            if($rules->type === '4') {
                $valueDetail['opt_number']  = $valueDetailBetRules->opt_number;
            }

            $latestId = EventTransaction::max('id') + 1;
            $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);
            $eventTransactionExist = EventTransaction::where('event_id', $id)->where('user_id', Auth::id())->first();
            if ($eventTransactionExist) {
                $transactionNumber = $eventTransactionExist->transaction_number;
            }

            $data = new EventTransaction();
            $data->event_id = $id;
            $data->event_bet_id = $request->id;
            $data->user_id = Auth::id();
            $data->value_detail = json_encode($valueDetail);
            $data->transaction_number = $transactionNumber;
            $data->status = '2';
            $data->save();

            $description = '';
            if ($rules->event_bet_categories->type === '1') {
                $teamName = '';
                if($BPPlacedDetail == NULL) {
                    $BPPlacedDetail = [
                        'team_left' => 0,
                        'team_right' => 0
                    ];
                } else {
                    $BPPlacedDetail = (array)$BPPlacedDetail;
                }

                $newValueDetail = [];
                if($event->league_games->game_id === 1 || $event->league_games->game_id === 4) {
                    $teamName = $event->{$request->type}->name;

                    $newValueDetail = [
                        'team_left' => $valueDetailBetRules->team_left,
                        'team_left_locked' => $valueDetailBetRules->team_left_locked,
                        'team_right' => $valueDetailBetRules->team_right,
                        'team_right_locked' => $valueDetailBetRules->team_right_locked,
                    ];
                } else if ($event->league_games->game_id === 2 || $event->league_games->game_id === 3) {
                    $teamName = Team::find($valueDetailBetRules->{$request->type.'_id'})->name;

                    $newValueDetail = [
                        'team_left' => $valueDetailBetRules->team_left,
                        'team_left_id' => $valueDetailBetRules->team_left_id,
                        'team_left_locked' => $valueDetailBetRules->team_left_locked,
                        'team_right' => $valueDetailBetRules->team_right,
                        'team_right_id' => $valueDetailBetRules->team_right_id,
                        'team_right_locked' => $valueDetailBetRules->team_right_locked,
                    ];
                }
                $description = $rules->event_bet_categories->name. ' - Dukung Tim ' . $teamName;
                $BPPlacedDetail[$request->type] += $request->value;

                $totalBothSide = $BPPlacedDetail['team_left'] + $BPPlacedDetail['team_right'];
                $percentageASide = floor($BPPlacedDetail['team_left'] / $totalBothSide * 100);
                $percentageBSide = floor($BPPlacedDetail['team_right'] / $totalBothSide * 100);

                $result['percentageASide'] = $percentageASide;
                $result['percentageBSide'] = $percentageBSide;
                if($totalBothSide >= 500 && $event->id !== 60) {
                    $temp = $percentageASide;
                    if($percentageBSide > $percentageASide) {
                        $temp = $percentageBSide;
                    }

                    $configBalancer = ConfigBalancer::where('rules', '>=', $temp)->first();
                    $newRules = 5;
                    if($configBalancer !== null) {
                        $newRules = $configBalancer->value;
                    }

                    if((int)$newRules !== (int)$newValueDetail['team_left']) {
                        $newValueDetail['team_left'] = $newRules;
                        $newValueDetail['team_right'] = $newRules;

                        EventBetRule::where([
                            'id' => $rules->id
                        ])->update(['active' => '0']);

                        $data = new EventBetRule();
                        $data->event_id = $rules->event_id;
                        $data->event_bet_category_id = $rules->event_bet_category_id;
                        $data->active = '1';
                        $data->value_detail = json_encode($newValueDetail);
                        $data->bp_placed = json_encode($BPPlacedDetail);
                        $data->save();
                    }

                    $result['configBalancer'] = $configBalancer;
                    $result['newValueDetail'] = $newValueDetail;
                }
            } elseif ($rules->event_bet_categories->type === '2') {
                $newValueDetail = [
                    'total' => $valueDetailBetRules->total,
                    'under' => $valueDetailBetRules->under,
                    'under_locked' => $valueDetailBetRules->under_locked,
                    'above' => $valueDetailBetRules->above,
                    'above_locked' => $valueDetailBetRules->above_locked,
                ];

                if ($BPPlacedDetail == NULL) {
                    $BPPlacedDetail = [
                        'under' => 0,
                        'above' => 0
                    ];
                } else {
                    $BPPlacedDetail = (array)$BPPlacedDetail;
                }

                $description = 'Tebak ' . $rules->event_bet_categories->name . ' ' . $request->type . ' ' . $valueDetailBetRules->total;
                $BPPlacedDetail[$request->type] += $request->value;

                $totalBothSide = $BPPlacedDetail['under'] + $BPPlacedDetail['above'];
                $percentageASide = floor($BPPlacedDetail['under'] / $totalBothSide * 100);
                $percentageBSide = floor($BPPlacedDetail['above'] / $totalBothSide * 100);

                $result['percentageASide'] = $percentageASide;
                $result['percentageBSide'] = $percentageBSide;
                if ($totalBothSide >= 500) {
                    $temp = $percentageASide;
                    if ($percentageBSide > $percentageASide) {
                        $temp = $percentageBSide;
                    }

                    $configBalancer = ConfigBalancer::where('rules', '>=', $temp)->first();
                    $newRules = 5;
                    if ($configBalancer !== null) {
                        $newRules = $configBalancer->value;
                    }

                    if ((int)$newRules !== (int)$newValueDetail['under']) {
                        $newValueDetail['under'] = $newRules;
                        $newValueDetail['above'] = $newRules;

                        EventBetRule::where([
                            'id' => $rules->id
                        ])->update(['active' => '0']);

                        $data = new EventBetRule();
                        $data->event_id = $rules->event_id;
                        $data->event_bet_category_id = $rules->event_bet_category_id;
                        $data->active = '1';
                        $data->value_detail = json_encode($newValueDetail);
                        $data->bp_placed = json_encode($BPPlacedDetail);
                        $data->save();
                    }

                    $result['configBalancer'] = $configBalancer;
                    $result['newValueDetail'] = $newValueDetail;
                }
            } elseif ($rules->event_bet_categories->type === '3') {
                $description = 'Skor Pertandingan ' . strtoupper($event->team_left->alias) . ' ' . $valueDetailBetRules->team_left . ' - ' . $valueDetailBetRules->team_right . ' ' . strtoupper($event->team_right->alias);
            } elseif ($rules->event_bet_categories->type === '4') {
                $description = 'Pilih ' . strtoupper($valueDetailBetRules->name);
            }

            // quest prediction
            $stringTemp = $request->id . '-' . $request->type;
            if (!in_array($stringTemp, $arrPredictionUnique)) {
                $prediksiQuest = Quest::where('title', 'Berikan 10 prediksi')->first();
                $detailQuest = json_decode($prediksiQuest->value_detail);
                $itemCoinId = Item::where('name', 'coin')->pluck('id')->first();
                $userQuest = UserQuest::where('user_id', Auth::user()->id)->where('quest_id', $prediksiQuest->id)->first();
                $totalPrediction += 1;
                if (!$userQuest) {
                    $detail = [
                        'value' => 0,
                        'progress' => 1
                    ];
                    UserQuest::create([
                        'user_id' => Auth::user()->id,
                        'quest_id' => $prediksiQuest->id,
                        'value_detail' => json_encode($detail)
                    ]);
                } else {
                    $detail = json_decode($userQuest->value_detail);
                    $detail->progress += 1;

                    if ($totalPrediction % $detailQuest->progress === 0) {
                        $detail->value += 1;
                        UserTransaction::create([
                            'user_id'   => Auth::user()->id,
                            'item_id'   => $itemCoinId,
                            'value'     => $detailQuest->value,
                            'type'      => 'CR',
                            'desc'      => '[Quest Achieve] ' . $prediksiQuest->title
                        ]);

                        User::where('id', Auth::id())->update([
                            'total_coin' => $currentCoin + $detailQuest->value
                        ]);

                        $message = "<h3 class='rajdhani-bold font-size-32 mb-20'>Quest Selesai</h3>" .
                        "<p class='grey-10'>Selamat, kamu telah menyelesaikan quest <span class='white-10'>" . $prediksiQuest->title . "</span> dengan hadiah <span class='money money-14 right money-inline white-10'>" . $detailQuest->value . "<img src='" . asset('img/currencies/coin.svg') . "'></span></p>";

                        $sys = new SystemMail();
                        $sys->user_id = Auth::user()->id;
                        $sys->title = 'Terima kasih telah bergabung dengan Timkamu.';
                        $sys->subject = 'Quest Selesai';
                        $sys->message = $message;
                        $sys->save();

                        $result['quest_achieve'] = 'success';
                        $result['total_coin'] = $currentCoin + $detailQuest->value;
                    }

                    UserQuest::where('quest_id', $prediksiQuest->id)->where('user_id', Auth::user()->id)->update([
                        'value_detail' => json_encode($detail)
                    ]);
                }
            }

            // quest bp predict
            $BPPRedict = Quest::where('title', 'Total pemberian prediksi 27 BP')->first();
            if($BPPRedict) {
                $detailQuest = json_decode($BPPRedict->value_detail);
                $itemCoinId = Item::where('name', 'coin')->pluck('id')->first();
                $userQuest = UserQuest::where('user_id', Auth::user()->id)->where('quest_id', $BPPRedict->id)->first();
                $totalBPPredictTemp = $totalBPPredict + $totalBetVal;
                $isFirstTime = false;
                if (!$userQuest) {
                    $isFirstTime = true;
                    $detail = [
                        'progress' => $totalBPPredictTemp
                    ];
                    UserQuest::create([
                        'user_id' => Auth::user()->id,
                        'quest_id' => $BPPRedict->id,
                        'value_detail' => json_encode($detail)
                    ]);
                } else {
                    $detail = json_decode($userQuest->value_detail);
                    if ($detail->progress < 27) {
                        $isFirstTime = true;
                    }
                    $detail->progress = $totalBPPredictTemp;
                    UserQuest::where('quest_id', $BPPRedict->id)->where('user_id', Auth::user()->id)->update([
                        'value_detail' => json_encode($detail)
                    ]);
                }

            if($totalBPPredictTemp >= 27 && $isFirstTime) {
                $message = "<h3 class='rajdhani-bold font-size-32 mb-20'>Quest Selesai</h3>" .
                "<p class='grey-10'>Selamat, kamu telah menyelesaikan quest <span class='white-10'>" . $BPPRedict->title . "</span> dengan hadiah <span class='money money-14 right money-inline white-10'>" . $detailQuest->value . "<img src='" . asset('img/currencies/coin.svg') . "'></span></p>";

                    $sys = new SystemMail();
                    $sys->user_id = Auth::user()->id;
                    $sys->title = 'Terima kasih telah bergabung dengan Timkamu.';
                    $sys->subject = 'Quest Selesai';
                    $sys->message = $message;
                    $sys->save();

                    $result['quest_bp_achieve'] = 'success';
                }
            }

            $additionalDesc = 'Place prediction on "['. $rules->event_id .'] '. $rules->events->name .' '. Carbon::parse($rules->events->start_date)->format('d F Y H.i') .'"';
            if($rules->type === '4') {
                $additionalDesc = 'Place prediction on "[' . $rules->event_id . '] ' . $rules->events->name . ' ' . Carbon::parse($rules->events->end_date)->format('d F Y H.i') . '"';
            }
            UserTransaction::create([
                'user_id'   => Auth::user()->id,
                'item_id'   => $itemId,
                'value'     => $request->value,
                'type'      => 'DB',
                'desc'      => $additionalDesc.' - '.$description
            ]);

            User::where('id', Auth::id())->update([
                'total_bp' => $currentBP - $totalBetVal
            ]);

            EventBetRule::where('id', $request->id)->update([
                'bp_placed' => json_encode($BPPlacedDetail)
            ]);
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();

            $result['status'] = 'error';
            $result['message'] = 'something wrong';
            $result['detail'] = $e->getMessage();
            return $result;
        }

        $result['request'] = $request->all();

        DB::commit();
        return $result;
    }
}
