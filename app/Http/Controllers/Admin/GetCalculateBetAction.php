<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\SystemMail;
use App\Http\Models\Team;
use App\Http\Models\User;
use App\Http\Models\UserItem;
use App\Http\Models\UserTransaction;
use App\Mail\AlertEventFinishEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GetCalculateBetAction extends Controller
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

        $event = Event::find($request->event);
        $eventCategory = EventBetCategory::where('event_id', $request->event)->get();

        $allTransaction = EventTransaction::where('event_id', $event->id)
            ->where('status', 2)
            ->select('event_bet_id')
            ->get();

        $eventCategoryZeroResult = $allTransaction->where('event_bet_rules.event_bet_categories.type', '<>', 3)->where('event_bet_rules.event_bet_categories.value', 0);
        if(count($eventCategoryZeroResult) > 0) {
            return redirect(url()->previous())->with('failed', 'failed-calculate');
        }
        // $winLose = $eventCategory->where('type', 1)->first();
        // if($winLose) {
        //     if ($event->team_left_score > $event->team_right_score) {
        //         $winLose->value = 'team_left';
        //     } else {
        //         $winLose->value = 'team_right';
        //     }
        // }

        $finalScore = $eventCategory->where('type', 3)->first();
        if($finalScore) {
            $finalScore->team_left = $event->team_left_score;
            $finalScore->team_right = $event->team_right_score;
        }

        try {
            DB::beginTransaction();

            $userEventTransactions = EventTransaction::where('event_id', $event->id)
                ->where('status', 2)
                ->select('user_id')
                ->distinct()
                ->offset($request->batch*100)
                ->limit(100)
                ->get()
                ->pluck('user_id')
                ->toArray();

            // calculating bet
            $userET = $userEventTransactions;
            // dd($userET);
            foreach ($userET as $key => $value) {
                $winReward = 0;
                $loseReward = 0;
                $totalDukungan = 0;

                $valueEventTransactions = EventTransaction::where('event_id', $event->id)
                    ->where('user_id', $value)
                    ->where('status', 2)
                    ->select('id', 'user_id', 'transaction_number', 'event_bet_id', 'value_detail')
                    ->get();

                $transactionNumber = $valueEventTransactions[0]->transaction_number;

                $message = '';
                foreach ($valueEventTransactions as $idx => $valET) {

                    $category = $valET->event_bet_rules->event_bet_categories->type;
                    $valueTeam = $valET->event_bet_rules->event_bet_categories->value;
                    $categoryName = $valET->event_bet_rules->event_bet_categories->name;
                    $categoryId = $valET->event_bet_rules->event_bet_category_id;
                    $valueDetail = json_decode($valET->value_detail);
                    $valueDetailBetRule = json_decode($valET->event_bet_rules->value_detail);
                    $totalDukungan += $valueDetail->value;

                    $winValue = $eventCategory->where('id', $categoryId)->where('type', $category)->first()->value;
                    $display = $eventCategory->where('id', $categoryId)->where('type', $category)->first()->display;

                    $message .= "<tr><td>". $categoryName. "</td><td class='text-right'>" . $valueDetail->value . " <img src='".asset('img/currencies/bp.svg'). "' class='c14 right'></td> <td>" . $valueDetail->bonus ."%</td>";

                    $type = 'WIN';
                    $additionalDesc = 'Place prediction on "[' . $event->id . '] ' . $valET->event_bet_rules->events->name . ' ' . Carbon::parse($valET->event_bet_rules->events->start_date)->format('d F Y H.i') . '"';
                    if ($category === '1') {
                        if($event->league_games->game_id === 1 || $event->league_games->game_id === 4) {
                            if ((int)$event->{$valueDetail->type . '_id'} === (int)$valueTeam) {
                                $message .= "<td>Ya</td> <td class='text-right'>" . $valueDetail->win . " <img src='" . asset('img/currencies/bp.svg') . "' class='c14 right'></td></tr>";
                                $winReward += $valueDetail->win;

                                UserTransaction::create([
                                    'user_id'   => $value,
                                    'item_id'   => 2,
                                    'value'     => $valueDetail->win,
                                    'type'      => 'CR',
                                    'desc'      => '[Win Reward] '.$additionalDesc.' - '. $categoryName .' - Dukung Tim '.$event->{$valueDetail->type}->name
                                ]);

                                // $currBP = User::where('id', $value)->select('total_bp')->pluck('total_bp')->first();
                                // User::where('id', $value)->update([
                                //     'total_bp' => $currBP + $winReward
                                // ]);

                            } else {
                                $message .= "<td>Tidak</td> <td class='text-right'>0<img src='" . asset('img/currencies/bp.svg') . "' class='c14 right'></td></tr>";
                                $loseReward += $valueDetail->value;
                                $type = 'LOSS';
                            }
                        } else if ($event->league_games->game_id === 2 || $event->league_games->game_id === 3) {
                            if ((int)$valueDetailBetRule->{$valueDetail->type . '_id'} === (int)$valueTeam) {
                                $message .= "<td>Ya</td> <td class='text-right'>" . $valueDetail->win . " <img src='" . asset('img/currencies/bp.svg') . "' class='c14 right'></td></tr>";
                                $winReward += $valueDetail->win;

                                $dataTeam = Team::find($valueDetailBetRule->{$valueDetail->type . '_id'});
                                UserTransaction::create([
                                    'user_id'   => $value,
                                    'item_id'   => 2,
                                    'value'     => $valueDetail->win,
                                    'type'      => 'CR',
                                    'desc'      => '[Win Reward] ' . $additionalDesc . ' - Dukung Tim ' . $dataTeam->name
                                ]);
                            } else {
                                $message .= "<td>Tidak</td> <td class='text-right'>0<img src='" . asset('img/currencies/bp.svg') . "' class='c14 right'></td></tr>";
                                $loseReward += $valueDetail->value;
                                $type = 'LOSS';
                            }
                        }
                    } else if ($category === '2') {
                        $temp = '';
                        if($display !== null) {
                            if ($winValue === 2) {
                                $temp = 'above';
                            } else if ($winValue === 1) {
                                $temp = 'under';
                            }
                        } else {
                            $temp = 'under';
                            if ($winValue > $valueDetailBetRule->total) {
                                $temp = 'above';
                            }
                        }

                        if ($valueDetail->type === $temp) {
                            $message .= "<td>Ya</td> <td class='text-right'>" . $valueDetail->win . " <img src='" . asset('img/currencies/bp.svg') . "' class='c14 right'></td></tr>";
                            $winReward += $valueDetail->win;

                            UserTransaction::create([
                                'user_id'   => $value,
                                'item_id'   => 2,
                                'value'     => $valueDetail->win,
                                'type'      => 'CR',
                                'desc'      => '[Win Reward] ' . $additionalDesc . ' - Tebak ' . $categoryName . ' ' . ($temp === 'under' ? 'Dibawah' : 'Diatas') . ' ' . $valueDetailBetRule->total
                            ]);
                        } else {
                            $message .= "<td>Tidak</td> <td class='text-right'>0<img src='" . asset('img/currencies/bp.svg') . "' class='c14 right'></td></tr>";
                            $loseReward += $valueDetail->value;
                            $type = 'LOSS';
                        }
                    } else if ($category === '3') {
                        $currScoreLeft = $eventCategory->where('id', $categoryId)->where('type', $category)->first()->team_left;
                        $currScoreRight = $eventCategory->where('id', $categoryId)->where('type', $category)->first()->team_right;
                        if ((int)$valueDetailBetRule->team_left === (int)$currScoreLeft && (int)$valueDetailBetRule->team_right === (int)$currScoreRight) {
                            $message .= "<td>Ya</td> <td class='text-right'>" . $valueDetail->win . " <img src='" . asset('img/currencies/bp.svg') . "' class='c14 right'></td></tr>";
                            $winReward += $valueDetail->win;

                            UserTransaction::create([
                                'user_id'   => $value,
                                'item_id'   => 2,
                                'value'     => $valueDetail->win,
                                'type'      => 'CR',
                                'desc'      => '[Win Reward] ' . $additionalDesc . ' - Skor Pertandingan ' . $event->team_left->name . ' ' . $currScoreLeft . ' - ' . $currScoreRight . ' ' . $event->team_right->name
                            ]);
                        } else {
                            $message .= "<td>Tidak</td> <td class='text-right'>0<img src='" . asset('img/currencies/bp.svg') . "' class='c14 right'></td></tr>";
                            $loseReward += $valueDetail->value;
                            $type = 'LOSS';
                        }
                    } else if ($category === '4') {
                        $additionalDesc = 'Place prediction on "[' . $event->id . '] ' . $valET->event_bet_rules->events->name . ' ' . Carbon::parse($valET->event_bet_rules->events->end_date)->format('d F Y H.i') . '"';
                        if ((int)$valueDetailBetRule->opt_number === (int)$winValue) {
                            $message .= "<td>Ya</td> <td class='text-right'>" . $valueDetail->win . " <img src='" . asset('img/currencies/bp.svg') . "' class='c14 right'></td></tr>";
                            $winReward += $valueDetail->win;

                            UserTransaction::create([
                                'user_id'   => $value,
                                'item_id'   => 2,
                                'value'     => $valueDetail->win,
                                'type'      => 'CR',
                                'desc'      => '[Win Reward] ' . $additionalDesc . ' - Pilih ' . $valueDetailBetRule->name
                            ]);
                        } else {
                            $message .= "<td>Tidak</td> <td class='text-right'>0<img src='" . asset('img/currencies/bp.svg') . "' class='c14 right'></td></tr>";
                            $loseReward += $valueDetail->value;
                            $type = 'LOSS';
                        }
                    }

                    EventTransaction::where('id', $valET->id)->update([
                        'status' => '3',
                        'type'   => $type
                    ]);
                }

                if($winReward > 0) {
                    // update win reward
                    $currBP = User::where('id', $value)->select('total_bp')->pluck('total_bp')->first();
                    User::where('id', $value)->update([
                        'total_bp' => $currBP + $winReward
                    ]);
                }

                // update lose reward
                if ($loseReward > 0) {
                    $item = Item::where('name', 'Apel Potong')->select('id')->pluck('id')->first();
                    $userItem = UserItem::where('user_id', $value)->where('item_id', $item)->first();
                    if ($userItem) {
                        UserItem::where('id', $userItem->id)->update([
                            'value' => ($userItem->value + $loseReward)
                        ]);
                    } else {
                        UserItem::create([
                            'user_id' => $value,
                            'item_id' => $item,
                            'value' => $loseReward
                        ]);
                    }
                }



                // broadcast system mail
                $sys = new SystemMail();
                $sys->user_id = $value;
                $sys->title ="Hasil prediksi kamu untuk event <span class='white-09'>" . $event->name . " " . Carbon::parse($event->start_date)->format('d M Y H:i') . "</span> sudah tersedia dan dapat dilihat di system mail.</p><p>Terimakasih sudah berpartisipasi. Silahkan cek System Mail untuk rincian hasil";
                $sys->subject = 'Hasil Games Event';
                $sys->message = "<div class='system-msg-content-head'>" .
                    "<div class='system-msg-content-title'>" .
                        "Hasil Games Event" .
                    "</div>" .
                    "<div class='system-msg-content-message'>" .
                        "<p class='opacity-05'>[Order ID: ". $transactionNumber ."]</p>" .
                        "Terima kasih atas dukungan yang kamu sudah berikan untuk event ". $event->name . ' ' . Carbon::parse($event->start_date)->format('d F Y H:i') ." WIB. " .
                    "</div>" .
                "</div>" .
                "<div class='system-msg-content-additional'>" .
                    "<div class='system-msg-content-additional-message'>" .
                        "<table class='system-mail-table-rincian'>" .
                            "<thead>" .
                                "<tr>" .
                                "<th>Dukungan</th>" .
                                "<th>Nilai Dukungan</th>" .
                                "<th>Bonus</th>" .
                                "<th>Benar</th>" .
                                "<th>Hasil</th>" .
                            "</tr>" .
                            "</thead>" .
                            "<tbody>" .
                                $message .
                                "<tr class='result'>" .
                                    "<td>Total dukungan yang diberikan</td>" .
                                    "<td class='text-right'>". $totalDukungan ." <img src='" . asset('img/currencies/bp.svg') . "' class='c14 right'></td>" .
                                    "<td></td>" .
                                    "<td>Total BP yang didapat</td>" .
                                    "<td class='text-right'>". $winReward ." <img src='". asset('img/currencies/bp.svg') ."' class='c14 right'></td>" .
                                "</tr>";
                if($loseReward > 0) {
                    $sys->message .= "<tr>" .
                        "<td></td>" .
                        "<td></td>" .
                        "<td></td>" .
                        "<td>Support item</td>" .
                        "<td class='text-right'>" . $loseReward . " <img src='" . asset('img/items/items-01.png') . "' class='c14 right'></td>" .
                        "</tr>";
                }
                $sys->message .= "</tbody>" .
                        "</table>" .
                    "</div>" .
                "</div>";
                $sys->status = '2';
                $sys->save();

                // Mail::to($valueEventTransactions[0]->users->email)->send(new AlertEventFinishEmail($valueEventTransactions[0]->users->username, 'Event <b>' . $event->name . ' ' . Carbon::parse($event->start_date)->format('d M Y H:i') . ' WIB (MLBB - ' . $event->league_games->leagues->name . ')</b> sudah berakhir.<br>Terimakasih sudah berpartisipasi.<br>Login dan cek System Mail untuk rincian hasil.'));
            }
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();

            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer');
        }

        DB::commit();
        return redirect(url()->previous())->with('success', 'Data updated');

    }
}
