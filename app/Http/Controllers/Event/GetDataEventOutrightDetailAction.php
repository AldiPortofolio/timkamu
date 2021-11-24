<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventChat;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Quest;
use App\Http\Models\SystemMail;
use App\Http\Models\Team;
use App\Http\Models\TeamMember;
use App\Http\Models\User;
use App\Http\Models\UserQuest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetDataEventOutrightDetailAction extends Controller
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
    public function __invoke($id)
    {
        ini_set('memory_limit', '-1');

        $result = [];
        $result['status'] = 'success';

        $event = Event::where('id', $id)->first();
        $rankLogo = '';
        $result['user'] = Auth::user()->username ?? 'guest';
        $userType = Auth::user() ? Auth::user()->type : '';
        $bonusBingo = 0;
        if($userType === 'VIP') {
            $bonusBingo = 2;
        } else if($userType === 'VVIP') {
            $bonusBingo = 5;
        }
        $result['event_type'] = $event->type;
        $result['card_detail'] = $event->card_detail;

        $result['total_lp'] = 0;
        $result['total_bp'] = 0;
        $result['sys'] = 0;
        if(Auth::user()) {
            $result['total_lp'] = number_format(Auth::user()->total_lp, 0, '.', ',');
            $result['total_bp'] = number_format(Auth::user()->total_bp, 0, '.', ',');

            // get unread system mail
            $sys = SystemMail::where('user_id', Auth::id())
                ->where(function ($query) {
                    $query->orWhere('status', '0');
                    $query->orWhere('status', '2');
                })->count();

            $result['sys'] = $sys;
        }

        // get bingo slips
        $subtotalSlipBP = 0;
        $totalSlipBP = 0;
        $stringBingoSlips = '';
        $prediction = 0;
        $correctPrediction = 0;
        if (Auth::user()) {
            $eventTransactions = EventTransaction::where('user_id', Auth::id())->get();
            $prediction = $eventTransactions->where('status', '<>', '1')->count();
            $correctPrediction = $eventTransactions->where('status', '<>', '1')->where('type', 'WIN')->count();
            foreach ($eventTransactions as $key => $value) {
                if ($value->status === '3' || !$value->event_bet_rules) {
                    continue;
                }
                $bingoType = $value->event_bet_rules->event_bet_categories->type;
                $valueDetailRule = json_decode($value->event_bet_rules->value_detail);

                $valueDetail = json_decode($value->value_detail);
                $bonus = $valueDetail->bonus;

                $subtotalSlipBP += $valueDetail->value;
                $totalSlipBP += $valueDetail->win;
                $betVal = $valueDetail->value;

                $categoriesName = $value->event_bet_rules->event_bet_categories->name;
                $productName = '';
                $teamAlias = '';
                if ($bingoType === '1') {
                    if($value->events->league_games->game_id === 1 || $value->events->league_games->game_id === 4) {
                        $teamAlias = strtoupper($value->events->{$valueDetail->type}->alias);
                    } else if ($value->events->league_games->game_id === 2 || $value->events->league_games->game_id === 3) {
                        $teamAlias = Team::find($valueDetailRule->{$valueDetail->type.'_id'})->name;
                        if (strpos($categoriesName, 'Head to Head Placement') > -1) {
                            $explode = explode('-', $categoriesName);
                            $categoriesName = $explode[0];
                        }
                    }
                    $productName = $teamAlias;
                } else if ($bingoType === '2') {
                    $type = 'Di bawah';
                    if($valueDetail->type === 'above') {
                        $type = 'Di atas';
                    }
                    $productName = $type . ' ' . $valueDetailRule->total;
                } else if ($bingoType === '3' && $event->league_games->game_id === 1 && $event->league_games->game_id === 4) {
                    $productName = $event->team_left->name . ' ' . $valueDetailRule->team_left . ' - ' . $valueDetailRule->team_right . ' ' . $event->team_right->name;
                }

                $stringBingoSlips .= "<div class='prediction-card confirmed active bg8345168 bd20 mt-20'>".
                "<div class='prediction-card-meta d-flex flex-column justify-content-center position-relative'>".
                "<div class='prediction-card-meta-name'>" . $value->events->name . "</div>".
                "<div class='prediction-card-meta-time o5'>" . Carbon::parse($event->start_date)->format('d M Y H:i') . "</div>".
                "<div class='prediction-card-meta-status o5 position-absolute top-translate-50 cursor-ptr' data-toggle='modal' data-target='#result-prediction-info'>".
                "Waiting <img src='". asset('icons/clock-white.svg') ."' class='icon'>".
                "</div>".
                "</div>".
                "<div class='prediction-card-details bg25510 bd20'>".
                "<div class='odds-item d-flex flex-wrap'>".
                "<div class='odds-item-title position-relative'>".
                "<h4 class='font-size-16 o5'>" . $categoriesName . "</h4>".
                "<div class='cart-item-amount position-absolute'>".
                "<span class='money money-14 right white-09'>" . $betVal . "<img src='" . asset('img/currencies/bp.svg') . "'></span>".
                "</div>".
                "</div>".
                "<div class='odds-item-name odds-item-row d-flex align-items-center bg040 bd50'>".
                "<span class='o5'>" . $productName . "</span>".
                "</div>".
                "<div class='odds-item-bonus odds-item-row cursor-ptr d-flex justify-content-center bg040 bd50 poetsenone-reg font-size-14' data-toggle='modal' data-target='#modal-odd-bonus'>".
                "<span class='o5'>" . $bonus . "%</span>".
                "</div>".
                "</div>".
                "</div>".
                "</div>";
            }
        }

//        // get bingo rules

        $eventBetCategory = EventBetCategory::where('event_id', $id)
            ->with(['rules' => function ($query) {
                return $query->where('active', '=', '1');
            }])
            ->orderBy('order_list', 'asc')
            ->get()
            ->each(function ($item, $index){
                $item->rules->each(function ($item, $index){
                    $item->value_detail = json_decode($item->value_detail);
                });
            });
//
//        $eventBetRules = [];
//        foreach ($eventBetCategory as $key => $value) {
//            if ($eventBet->where('event_bet_category_id', $value->id)->count() === 0) {
//                continue;
//            }
//
//            $eventBetRules[$key]['name'] = $value->name;
//            $eventBetRules[$key]['value'] = $value->value;
//            $eventBetRules[$key]['display'] = $value->display;
//            $eventBetRules[$key]['type'] = $value->type;
//            $eventBetRules[$key]['items'] = $eventBet->where('event_bet_category_id', $value->id);
//        }
//
//        $stringResult = '';
//        $currentPlacement = '';
//        $result['testing'] = '';
//        $result['section'] = [];
//        foreach ($eventBetRules as $key => $value) {
//            foreach ($value['items'] as $idx => $item) {
//                $valueDetail = json_decode($item->value_detail);
//
//                $stringResult .= "<div class='col-6 col-md-4 odds-item-action' data-bonus='".$valueDetail->bonus."' data-type='bonus' data-id='".$item->id."'>".
//                    "<div class='outright-item scale-onclick'>".
//                        "<img src='". $valueDetail->image ."' class='outright-team-logo'>".
//                        "<h4 class='outright-h4'>". $valueDetail->name ."</h4>".
//                    "</div>";
//
//                if ($valueDetail->bonus_locked === '1') {
//                    $stringResult .= "<div class='outright-action locked'>" .
//                    "<img src='" . asset('icons/lock-white.svg') . "' class='icon'>";
//                } else {
//                    $stringResult .= "<div class='outright-action'>" .
//                    "<img src='" . asset('icons/arrow-right-white.svg') . "' class='icon'>";
//                }
//
//                $stringResult .= "</div></div>";
//            }
//        }
//
        $result['event_bingo'] = $eventBetCategory;

        $arrQuests = Quest::where('active','1')->get();
        $arrQuestsDone = [];
        $stringQuest = "";
        foreach ($arrQuests as $idx => $quest) {
            $questDetail = json_decode($quest->value_detail);
            $quest->value = $questDetail->value;
            $quest->progress = $questDetail->progress ?? 0;

            // initialize for user
            $quest->user_value = 0;
            $quest->user_progress = 0;

            $userQuests = UserQuest::where('user_id', Auth::id())->where('quest_id', $quest->id)->first();
            if ($userQuests) {
                if ($quest->type === 'ONCE') {
                    array_push($arrQuestsDone, $quest);
                    $arrQuests->forget($idx);
                } elseif ($quest->type === 'REPEATABLE') {
                    $decode = json_decode($userQuests->value_detail);
                    $quest->user_value = $decode->value;
                } elseif ($quest->type === 'REPEAT_PROGRESS') {
                    $quest->progress = $questDetail->progress;
                    $decode = json_decode($userQuests->value_detail);
                    $quest->user_value = $decode->value;
                    $quest->user_progress = $decode->progress;
                } elseif ($quest->type === 'ONCE_PROGRESS') {
                    $quest->progress = $questDetail->progress;
                    $decode = json_decode($userQuests->value_detail);
                    $quest->user_progress = $decode->progress;
                    if ($decode->progress >= $quest->progress) {
                        array_push($arrQuestsDone, $quest);
                        $arrQuests->forget($idx);
                    }
                }
            }
        }

        foreach ($arrQuests as $key => $item) {
            $isLeft = "";
            if($item->type === 'ONCE_PROGRESS') {
                $isLeft = "half";
            }
            $stringQuest .= "<div class='quest-item'>" .
            "<div class='left ".$isLeft."'>" . $item->title . "</div>";
            if ($item->type === 'ONCE' && $item->status !== 'DONE') {
                $stringQuest .= "<div class='right'><span class='money money-14 right white-09 money-inline white-10'>" . $item->value . "<img src='" . asset('img/currencies/coin.svg') . "'></span></div>";
            } elseif ($item->type === 'REPEATABLE') {
                $stringQuest .= "<div class='right'><span class='money money-14 right white-09 money-inline white-10'>" . $item->value . "<img src='" . asset('img/currencies/coin.svg') . "'></span></div>" .
                "<div class='lower'>Sudah tercapai " . $item->user_value . " kali</div>";
            } elseif ($item->type === 'REPEAT_PROGRESS') {
                $stringQuest .= "<div class='right'><span class='money money-14 right white-09 money-inline white-10'>" . $item->value . "<img src='" . asset('img/currencies/coin.svg') . "'></span></div>" .
                "<div class='quest-exp'>" .
                "<div class='quest-exp-bar'>" .
                "<div class='quest-exp-gained-bar' style='width:" . ((($item->user_progress % $item->progress) / $item->progress) * 100) . "%'></div>" .
                "<div class='quest-exp-stats'>" . $item->user_progress % $item->progress . " / " . $item->progress . "</div>" .
                    "</div>" .
                    "</div>" .
                    "<div class='lower'>Sudah tercapai " . $item->user_value . " kali</div>";
            } elseif($item->type === 'ONCE_PROGRESS') {
                $stringQuest .=	"<div class='right half poetsenone-reg text-right'>".$item->value. "</div>".
						"<div class='quest-exp'>".
							"<div class='quest-exp-bar'>".
								"<div class='quest-exp-gained-bar' style='width:". (($item->user_progress % $item->progress)/$item->progress) * 100 ."%'></div>".
                                "<div class='quest-exp-stats'>". $item->user_progress % $item->progress ." / ". $item->progress ."</div>".
                            "</div></div>";
            }
            $stringQuest .= "</div>";
        }

        foreach ($arrQuestsDone as $qdone) {
            $stringQuest .= "<div class='quest-item completed'>" .
            "<div class='left'>" . $qdone->title . "</div>" .
                "<div class='right'><span class='poetsenone-reg font-size-12'>completed</span></div></div>";
        }

        $result['data_quests'] = $stringQuest;

        $result['slips'] = $stringBingoSlips;
        $result['subtotal_slip_bp'] = number_format($subtotalSlipBP, 0, '.', ',');
        $result['total_slip_bp'] = number_format($totalSlipBP, 0, '.', ',');
        $result['prediction'] = number_format($prediction, 0, '.', ',');
        $result['correct_prediction'] = number_format($correctPrediction, 0, '.', ',');

        return $result;
    }
}
