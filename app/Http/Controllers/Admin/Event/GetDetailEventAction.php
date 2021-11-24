<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use App\Http\Models\LeagueGame;
use App\Http\Models\Team;
use Auth;

class GetDetailEventAction extends Controller
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
    public function __invoke($id)
    {
        ini_set('memory_limit', '-1');
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }

        $teamId = [];
        $event = Event::find($id);
        $teamsEvent = json_decode($event->team_detail);
        if($event->league_game_id && $event->league_games->game_id !== 1 && $event->league_games->game_id !== 4) {
            $teamName = [];
            foreach ($teamsEvent as $key => $value) {
                array_push($teamId, $value->team_id);
                $tms = Team::find($value->team_id);
                $value->logo = $tms->logo;
                $value->alias = $tms->alias;
                array_push($teamName, $tms->name);
            }
            $event->teams_name = implode(', ', $teamName);

            $event->team_detail = $teamsEvent;
        }
        $participatedTeams = Team::whereIn('id', $teamId)->get();
        $eventBetCategory = EventBetCategory::where('event_id', $id)->orderBy('order_list', 'asc')->get();
        $eventBet = EventBetRule::where('event_id', $id)
                    ->withTrashed()
                    ->get();

        $eventBetRules = [];
        $totalBet = 0;
        $totalBPPlace = 0;
        foreach ($eventBetCategory as $key => $value) {
            $eventBetRules[$key]['id'] = $value->id;
            $eventBetRules[$key]['name'] = $value->name;
            $eventBetRules[$key]['type'] = $value->type;
            $eventBetRules[$key]['value'] = $value->value;
            $eventBetRules[$key]['display'] = $value->display;
            $eventBetRules[$key]['deleted_at'] = $value->deleted_at;
            if($value->type === '1') {
                $eventBetRules[$key]['type_name'] = 'Win/Lose';
                $eventBetRules[$key]['team_left_total_bp'] = 0;
                $eventBetRules[$key]['team_left_total_bets'] = 0;
                $eventBetRules[$key]['team_right_total_bp'] = 0;
                $eventBetRules[$key]['team_right_total_bets'] = 0;
            } else if($value->type === '2') {
                $eventBetRules[$key]['type_name'] = 'Under/Above';
                $eventBetRules[$key]['under_total_bp'] = 0;
                $eventBetRules[$key]['under_total_bets'] = 0;
                $eventBetRules[$key]['above_total_bp'] = 0;
                $eventBetRules[$key]['above_total_bets'] = 0;
            } else if ($value->type === '3') {
                $eventBetRules[$key]['type_name'] = 'Tebak Score';
                $eventBetRules[$key]['bonus_total_bp'] = 0;
                $eventBetRules[$key]['bonus_total_bets'] = 0;
            } else if ($value->type === '4') {
                $eventBetRules[$key]['type_name'] = 'Outright';
                $eventBetRules[$key]['bonus_total_bp'] = 0;
                $eventBetRules[$key]['bonus_total_bets'] = 0;
            }
            $eventBetRules[$key]['locked'] = '1';
            $eventBetRules[$key]['order'] = $value->order_list ?? 0;
            $eventBetRules[$key]['items'] = $eventBet->where('event_bet_category_id', $value->id);
            $itemActive = $eventBet->where('event_bet_category_id', $value->id)->where('active', '1')->first();
            $eventBetRules[$key]['item_active'] = $itemActive;
            if($itemActive !== null && ($event->league_game_id && ($event->league_games->game_id === 2 || $event->league_games->game_id === 3))) {
                $decode = json_decode($itemActive->value_detail);
                $eventBetRules[$key]['team_left'] = Team::find($decode->team_left_id);
                $eventBetRules[$key]['team_right'] = Team::find($decode->team_right_id);
            }

            $value->teams = '';
            if($value->value !== 0 && $value->type === '1') {
                $value->teams = Team::where('id', $value->value)->first()->name;
            }

            $eventBetRules[$key]['bets'] = 0;
            $eventBetRules[$key]['bp_place'] = 0;
            if(count($eventBetRules[$key]['items']) === 0) {
                $eventBetRules[$key]['locked'] = '0';
            }
            foreach ($eventBetRules[$key]['items'] as $idx => $item) {
                if ($item->deleted_at) {
                    continue;
                }
                $thisTransaction = EventTransaction::where('event_bet_id', $item->id)->get()->pluck('value_detail');
                $valueDetail = json_decode($item->value_detail);
                $item->bets = 0;
                if($value->type === '1') {
                    $valueDetail->team_left_income = 0;
                    $valueDetail->team_left_outcome = 0;

                    $valueDetail->team_right_income = 0;
                    $valueDetail->team_right_outcome = 0;

                    if (
                        (!isset($valueDetail->team_left_locked) || $valueDetail->team_left_locked === '0' ||
                        !isset($valueDetail->team_right_locked) || $valueDetail->team_right_locked === '0') && $item->active === '1'
                    ) {
                        $eventBetRules[$key]['locked'] = '0';
                    }
                } else if ($value->type === '2') {
                    $valueDetail->under_income = 0;
                    $valueDetail->under_outcome = 0;

                    $valueDetail->above_income = 0;
                    $valueDetail->above_outcome = 0;

                    if (
                        (!isset($valueDetail->above_locked) || $valueDetail->above_locked === '0' ||
                        !isset($valueDetail->under_locked) || $valueDetail->under_locked === '0')
                        && $item->active === '1'
                    ) {
                        $eventBetRules[$key]['locked'] = false;
                    }

                    if($item->active === '1') {
                        $eventBetRules[$key]['total'] = str_replace(',', '.', $valueDetail->total);
                        $eventBetRules[$key]['above'] = $valueDetail->above;
                        $eventBetRules[$key]['under'] = $valueDetail->under;
                    }
                } else if ($value->type === '3') {
                    $valueDetail->bonus_income = 0;
                    $valueDetail->bonus_outcome = 0;

                    if((!isset($valueDetail->bonus_locked) || $valueDetail->bonus_locked === '0') && $item->active === '1') {
                        $eventBetRules[$key]['locked'] = false;
                    }
                } else if ($value->type === '4') {
                    $valueDetail->bonus_income = 0;
                    $valueDetail->bonus_outcome = 0;

                    if ((!isset($valueDetail->bonus_locked) || $valueDetail->bonus_locked === '0') && $item->active === '1') {
                        $eventBetRules[$key]['locked'] = false;
                    }
                }

                foreach($thisTransaction as $detail) {
                    $detailDecode = json_decode($detail);

                    $valueDetail->{$detailDecode->type. '_income'} += $detailDecode->value ?? 0;
                    $eventBetRules[$key]['bp_place'] += $detailDecode->value ?? 0;
                    $totalBPPlace += $detailDecode->value ?? 0;
                    $valueDetail->{$detailDecode->type . '_outcome'} += $detailDecode->win ?? 0;

                    $eventBetRules[$key][$detailDecode->type.'_total_bp'] = $valueDetail->{$detailDecode->type . '_income'};
                    $eventBetRules[$key][$detailDecode->type . '_total_bets'] += 1;
                    $item->bets += 1;
                }
                $eventBetRules[$key]['bets'] += count($thisTransaction);
                $totalBet += count($thisTransaction);

                $item->value_detail = json_encode($valueDetail);
            }
        }
        $eventBet = $eventBetRules;
        $isAllLock = false;
        if(collect($eventBet)->where('locked', '1')->count() === collect($eventBet)->whereNotNull('item_active')->count()) {
            $isAllLock = true;
        }

        $userEventTransactions = EventTransaction::where('event_id', $event->id)
            ->where('status', '<>', 1)
            ->select('user_id')
            ->get()
            ->pluck('user_id')
            ->toArray();

        // calculating bet
        $userET = array_unique($userEventTransactions);
        $doneCalculate = [];
        $totalUserTransaction = count($userET);
        $j = 1;
        $jx = 100;
        if($jx > $totalUserTransaction) {
            $jx = $totalUserTransaction;
        }
        $i = 0;
        $isDoneCalculate = 0;
        foreach ($userET as $idx => $uET) {
            $evT = EventTransaction::where('event_id', $event->id)->where('user_id', $uET)->get();
            $totalEvTCalculate = $evT->where('status', 3);

            $i++;
            if(count($evT) === count($totalEvTCalculate)) {
                $isDoneCalculate++;
            }

            if($i === 100 || $i === $totalUserTransaction) {
                if($isDoneCalculate === $i) {
                    $doneCalculate[$j.' - '.$jx] = 'done';
                } else {
                    $doneCalculate[$j . ' - ' . $jx] = 'calculate';
                }
                $i = 0;
                $isDoneCalculate = 0;
                $j = $j + 100;
                if($totalUserTransaction > 100) {
                    $jx = $jx + 100;
                    $totalUserTransaction = $totalUserTransaction - 100;
                } else {
                    $jx = $jx + $totalUserTransaction;
                }
            }
        }

        $leagueGames = LeagueGame::get();
        $teams = Team::get();

        $arrView = [
            'event' => $event,
            'event_bet' => $eventBet,
            'event_bet_categories' => $eventBetCategory,
            'league_games' => $leagueGames,
            'teams' => $teams,
            'is_all_lock' => $isAllLock,
            'total_bet' => $totalBet,
            'total_user_bet' => $totalUserTransaction,
            'total_bp_place' => $totalBPPlace,
            'done_calculate' => $doneCalculate,
            'participated_teams' => $participatedTeams
        ];

        $pageName = 'outright-detail';
        if($event->league_game_id) {
            $pageName = 'detail';
            if ($event->league_games->game_id === 2 || $event->league_games->game_id === 3) {
                $pageName = 'new-detail';
            }
        }

        return view('pages.admin.events.'.$pageName, $arrView);
    }
}
