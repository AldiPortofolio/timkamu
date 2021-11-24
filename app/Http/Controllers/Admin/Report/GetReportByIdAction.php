<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use App\Http\Models\StaticTblEventPerformance;
use App\Http\Models\Team;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetReportByIdAction extends Controller
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
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }

        $event = Event::find($id);
        $eventBetRules = [];
        $eventCategory = EventBetCategory::where('event_id', $id)->get();
        if(!$event->league_game_id) {
            $winValue = $eventCategory[0]->value;

            $eventBetRules = EventBetRule::where('event_bet_category_id', $eventCategory[0]->id)->get();
            foreach ($eventBetRules as $key => $value) {
                $valueDetail = json_decode($value->value_detail);
                if((int)$winValue === (int)$valueDetail->opt_number) {
                    $event->result_winner = $valueDetail->name;
                }
            }
        }
        $finalScore = $eventCategory->where('type', 3)->first();
        if ($finalScore) {
            $finalScore->team_left = $event->team_left_score;
            $finalScore->team_right = $event->team_right_score;
        }

        $totalIncome = 0;
        $totalOutcome = 0;
        $totalBonus = 0;
        $totalBet = 0;
        $totalBPPlace = 0;
        $arrUser = [];
        $arrUserWin = [];
        $arrUserLose = [];
        $arrProducts = [];
        $arrProductsWin = [];
        $arrProductsLoss = [];
        $arrRefund = [];
        $userEventTransactions = EventTransaction::where('event_id', $event->id)
            ->where(function ($query) {
                $query->orWhere('status', 2);
                $query->orWhere('status', 3);
            })
            ->select('user_id')
            ->get()
            ->pluck('user_id')
            ->toArray();

        // get transaction
        $userET = array_unique($userEventTransactions);
        $totalBPAll = 0;
        $totalBPBonusAll = 0;
        foreach ($userET as $key => $value) {
            $totalDukungan = 0;

            $valueEventTransactions = EventTransaction::where('event_id', $event->id)
                ->where('user_id', $value)
                ->where(function ($query) {
                    $query->orWhere('status', 2);
                    $query->orWhere('status', 3);
                })
                ->select('id', 'user_id', 'transaction_number', 'event_bet_id', 'value_detail', 'type', 'created_at')
                ->get();

            foreach ($valueEventTransactions as $idx => $valET) {
                if (!$valET->event_bet_rules || !$valET->event_bet_rules->event_bet_categories) {
                    continue;
                }
                $category = $valET->event_bet_rules->event_bet_categories->type;
                $valueTeam = $valET->event_bet_rules->event_bet_categories->value;
                $categoryName = $valET->event_bet_rules->event_bet_categories->name;
                $categoryId = $valET->event_bet_rules->event_bet_category_id;
                $valueDetail = json_decode($valET->value_detail);
                $valueDetailBetRule = json_decode($valET->event_bet_rules->value_detail);
                $totalDukungan += $valueDetail->value;
                $totalBPAll += $valueDetail->value;
                $totalBPBonusAll += $valueDetail->win;
                $valET->user = $valET->users->username;
                $valET->user_email = $valET->users->email;
                $valET->category = $categoryName;
                $valET->category_type = $category;
                $valET->display = $valET->event_bet_rules->event_bet_categories->display;
                $valET->value_winner = $valET->event_bet_rules->event_bet_categories->value;
                $valET->value_detail = $valueDetail;
                $valET->category_id = $valET->event_bet_rules->event_bet_categories->type;
                $valET->value_detail_betrule = $valueDetailBetRule;
                $totalBet += 1;
                $totalBPPlace += $valueDetail->value;
                $choose = '';


                if ($category === '1') {
                    if (!isset($arrProducts[$valET->event_bet_id . '-a'])) {
                        $arrProducts[$valET->event_bet_id . '-a'] = [];
                        $arrProducts[$valET->event_bet_id . '-a']['name'] = $categoryName;
                        $arrProducts[$valET->event_bet_id . '-a']['total_bp'] = 0;
                        $arrProducts[$valET->event_bet_id . '-a']['total_bet'] = 0;
                        $arrProducts[$valET->event_bet_id . '-a']['total_income'] = 0;
                        $arrProducts[$valET->event_bet_id . '-a']['total_outcome'] = 0;
                        $arrProducts[$valET->event_bet_id . '-a']['bonus'] = $valueDetailBetRule->team_left;
                        $arrProducts[$valET->event_bet_id . '-a']['guess'] = "";
                    }

                    if (!isset($arrProducts[$valET->event_bet_id . '-b'])) {
                        $arrProducts[$valET->event_bet_id . '-b'] = [];
                        $arrProducts[$valET->event_bet_id . '-b']['name'] = $categoryName;
                        $arrProducts[$valET->event_bet_id . '-b']['total_bp'] = 0;
                        $arrProducts[$valET->event_bet_id . '-b']['total_bet'] = 0;
                        $arrProducts[$valET->event_bet_id . '-b']['total_income'] = 0;
                        $arrProducts[$valET->event_bet_id . '-b']['total_outcome'] = 0;
                        $arrProducts[$valET->event_bet_id . '-b']['bonus'] = $valueDetailBetRule->team_right;
                        $arrProducts[$valET->event_bet_id . '-b']['guess'] = "";
                    }

                    if ($event->league_games->game_id === 1 || $event->league_games->game_id === 4) {
                        $choose = $event->{$valueDetail->type}->name;
                        if ((int)$event->{$valueDetail->type . '_id'} === (int)$valueTeam) {
                            $totalOutcome += $valueDetail->win;


                            $arrProducts[$valET->event_bet_id . '-a']['name'] = $categoryName . ' - ' . $event->{$valueDetail->type}->name;
                            $arrProducts[$valET->event_bet_id . '-a']['total_bp'] += $valueDetail->value;
                            $arrProducts[$valET->event_bet_id . '-a']['total_outcome'] += $valueDetail->win;
                            $arrProducts[$valET->event_bet_id . '-a']['total_bet'] += 1;
                            $arrProducts[$valET->event_bet_id . '-a']['guess'] = "Yes";
                        } else {
                            $totalIncome += $valueDetail->value;

                            $arrProducts[$valET->event_bet_id . '-b']['name'] = $categoryName . ' - ' . $event->{$valueDetail->type}->name;
                            $arrProducts[$valET->event_bet_id . '-b']['total_bp'] += $valueDetail->value;
                            $arrProducts[$valET->event_bet_id . '-b']['total_income'] += $valueDetail->value;
                            $arrProducts[$valET->event_bet_id . '-b']['total_bet'] += 1;
                            $arrProducts[$valET->event_bet_id . '-b']['guess'] = "No";
                        }
                    } else if ($event->league_games->game_id === 2 || $event->league_games->game_id === 3) {
                        $teamName = Team::find($valueDetailBetRule->{$valueDetail->type.'_id'})->name;
                        $choose = $teamName;
                        if ((int)$valueDetailBetRule->{$valueDetail->type . '_id'} === (int)$valueTeam) {
                            $totalOutcome += $valueDetail->win;

                            $arrProducts[$valET->event_bet_id . '-a']['name'] = $categoryName . ' - ' . $teamName;
                            $arrProducts[$valET->event_bet_id . '-a']['total_bp'] += $valueDetail->value;
                            $arrProducts[$valET->event_bet_id . '-a']['total_outcome'] += $valueDetail->win;
                            $arrProducts[$valET->event_bet_id . '-a']['total_bet'] += 1;
                            $arrProducts[$valET->event_bet_id . '-a']['guess'] = "Yes";
                        } else {
                            $totalIncome += $valueDetail->value;

                            $arrProducts[$valET->event_bet_id . '-b']['name'] = $categoryName . ' - ' . $teamName;
                            $arrProducts[$valET->event_bet_id . '-b']['total_bp'] += $valueDetail->value;
                            $arrProducts[$valET->event_bet_id . '-b']['total_income'] += $valueDetail->value;
                            $arrProducts[$valET->event_bet_id . '-b']['total_bet'] += 1;
                            $arrProducts[$valET->event_bet_id . '-b']['guess'] = "No";
                        }
                    }
                } else if ($category === '2') {
                    if (!isset($arrProducts[$valET->event_bet_id . '-a'])) {
                        $arrProducts[$valET->event_bet_id . '-a'] = [];
                        $arrProducts[$valET->event_bet_id . '-a']['name'] = $categoryName;
                        $arrProducts[$valET->event_bet_id . '-a']['total_bp'] = 0;
                        $arrProducts[$valET->event_bet_id . '-a']['total_bet'] = 0;
                        $arrProducts[$valET->event_bet_id . '-a']['total_income'] = 0;
                        $arrProducts[$valET->event_bet_id . '-a']['total_outcome'] = 0;
                        $arrProducts[$valET->event_bet_id . '-a']['bonus'] = $valueDetailBetRule->under;
                        $arrProducts[$valET->event_bet_id . '-a']['guess'] = "";
                    }

                    if (!isset($arrProducts[$valET->event_bet_id . '-b'])) {
                        $arrProducts[$valET->event_bet_id . '-b'] = [];
                        $arrProducts[$valET->event_bet_id . '-b']['name'] = $categoryName;
                        $arrProducts[$valET->event_bet_id . '-b']['total_bp'] = 0;
                        $arrProducts[$valET->event_bet_id . '-b']['total_bet'] = 0;
                        $arrProducts[$valET->event_bet_id . '-b']['total_income'] = 0;
                        $arrProducts[$valET->event_bet_id . '-b']['total_outcome'] = 0;
                        $arrProducts[$valET->event_bet_id . '-b']['bonus'] = $valueDetailBetRule->above;
                        $arrProducts[$valET->event_bet_id . '-b']['guess'] = "";
                    }

                    $winValue = $eventCategory->where('id', $categoryId)->where('type', $category)->first()->value;
                    $display = $eventCategory->where('id', $categoryId)->where('type', $category)->first()->display;

                    $temp = '';
                    $product = '';
                    $productabove = $categoryName . ' (Rule ' . $valueDetailBetRule->total . ' - Result ' . $display . ') - Over';
                    $productunder = $categoryName . ' (Rule ' . $valueDetailBetRule->total . ' - Result ' . $display . ') - Under';
                    if ($display !== null) {
                        if ($winValue === 2) {
                            $temp = 'above';
                        } else if ($winValue === 1) {
                            $temp = 'under';
                        }
                    } else {
                        $productabove = $categoryName . ' (Rule ' . $valueDetailBetRule->total . ' - Result ' . $winValue . ') - Over';
                        $productunder = $categoryName . ' (Rule ' . $valueDetailBetRule->total . ' - Result ' . $winValue . ') - Under';

                        $temp = 'under';
                        if ($winValue > $valueDetailBetRule->total) {
                            $temp = 'above';
                        }
                    }

                    $choose = 'Over';
                    if($valueDetail->type === 'under') {
                        $choose = 'Under';
                    }
                    if ($valueDetail->type === $temp) {
                        $totalOutcome += $valueDetail->win;

                        $arrProducts[$valET->event_bet_id . '-a']['name'] = ${'product' . $valueDetail->type};
                        $arrProducts[$valET->event_bet_id . '-a']['total_bp'] += $valueDetail->value;
                        $arrProducts[$valET->event_bet_id . '-a']['total_outcome'] += $valueDetail->win;
                        $arrProducts[$valET->event_bet_id . '-a']['total_bet'] += 1;
                        $arrProducts[$valET->event_bet_id . '-a']['guess'] = "Yes";
                    } else {
                        $totalIncome += $valueDetail->value;

                        $arrProducts[$valET->event_bet_id . '-b']['name'] = ${'product' . $valueDetail->type};
                        $arrProducts[$valET->event_bet_id . '-b']['total_bp'] += $valueDetail->value;
                        $arrProducts[$valET->event_bet_id . '-b']['total_income'] += $valueDetail->value;
                        $arrProducts[$valET->event_bet_id . '-b']['total_bet'] += 1;
                        $arrProducts[$valET->event_bet_id . '-b']['guess'] = "No";
                    }
                } else if ($category === '3') {
                    $currScoreLeft = $eventCategory->where('id', $categoryId)->where('type', $category)->first()->team_left;
                    $currScoreRight = $eventCategory->where('id', $categoryId)->where('type', $category)->first()->team_right;

                    $product = $event->team_left->name . " " . $valueDetailBetRule->team_left . " - " . $valueDetailBetRule->team_right . " " . $event->team_right->name;
                    $result = $event->team_left->name . " " . $event->team_left_score . " - " . $event->team_right_score . " " . $event->team_right->name;

                    $choose = $product;
                    if (!isset($arrProducts[$valET->event_bet_id])) {
                        $arrProducts[$valET->event_bet_id] = [];
                        $arrProducts[$valET->event_bet_id]['udetail'] = [];
                        $arrProducts[$valET->event_bet_id]['name'] = $product . ' (Result ' . $result . ')';
                        $arrProducts[$valET->event_bet_id]['total_bp'] = 0;
                        $arrProducts[$valET->event_bet_id]['total_bet'] = 0;
                        $arrProducts[$valET->event_bet_id]['total_income'] = 0;
                        $arrProducts[$valET->event_bet_id]['total_outcome'] = 0;
                        $arrProducts[$valET->event_bet_id]['bonus'] = $valueDetailBetRule->bonus;
                        $arrProducts[$valET->event_bet_id]['guess'] = "";
                    }
                    $arrProducts[$valET->event_bet_id]['total_bp'] += $valueDetail->value;
                    $arrProducts[$valET->event_bet_id]['total_bet'] += 1;

                    if ((int)$valueDetailBetRule->team_left === (int)$currScoreLeft && (int)$valueDetailBetRule->team_right === (int)$currScoreRight) {
                        $totalOutcome += $valueDetail->win;


                        $arrProducts[$valET->event_bet_id]['total_outcome'] += $valueDetail->win;
                        $arrProducts[$valET->event_bet_id]['guess'] = "Yes";
                    } else {
                        $totalIncome += $valueDetail->value;

                        $arrProducts[$valET->event_bet_id]['total_income'] += $valueDetail->value;
                        $arrProducts[$valET->event_bet_id]['guess'] = "No";
                    }
                } else if ($category === '4') {
                    $choose = $valueDetailBetRule->name;
                    // $result = $event->team_left->name . " " . $event->team_left_score . " - " . $event->team_right_score . " " . $event->team_right->name;

                    if (!isset($arrProducts[$valET->event_bet_id])) {
                        $arrProducts[$valET->event_bet_id] = [];
                        $arrProducts[$valET->event_bet_id]['udetail'] = [];
                        $arrProducts[$valET->event_bet_id]['name'] = $choose;
                        $arrProducts[$valET->event_bet_id]['total_bp'] = 0;
                        $arrProducts[$valET->event_bet_id]['total_bet'] = 0;
                        $arrProducts[$valET->event_bet_id]['total_income'] = 0;
                        $arrProducts[$valET->event_bet_id]['total_outcome'] = 0;
                        $arrProducts[$valET->event_bet_id]['bonus'] = $valueDetailBetRule->bonus;
                        $arrProducts[$valET->event_bet_id]['guess'] = "";
                    }
                    $arrProducts[$valET->event_bet_id]['total_bp'] += $valueDetail->value;
                    $arrProducts[$valET->event_bet_id]['total_bet'] += 1;

                    $winValue = $eventCategory->where('id', $categoryId)->where('type', $category)->first()->value;

                    if ((int)$valueDetailBetRule->opt_number === (int)$winValue) {
                        $totalOutcome += $valueDetail->win;


                        $arrProducts[$valET->event_bet_id]['total_outcome'] += $valueDetail->win;
                        $arrProducts[$valET->event_bet_id]['guess'] = "Yes";
                    } else {
                        $totalIncome += $valueDetail->value;

                        $arrProducts[$valET->event_bet_id]['total_income'] += $valueDetail->value;
                        $arrProducts[$valET->event_bet_id]['guess'] = "No";
                    }
                }

                $valET->choose = $choose;
                array_push($arrUser, $valET);
                $totalBonus += $valueDetail->win;
            }
        }

        $isStaticTableExist = StaticTblEventPerformance::where('event_id', $id)->first();
        $isAllTransactionCount = EventTransaction::where('event_id', $event->id)->where('status', 2)->get();
        if($event->type === 'DONE' && count($isAllTransactionCount) === 0 && !$isStaticTableExist) {
            StaticTblEventPerformance::create([
                'event_id'      => $id,
                'payout'        => $totalOutcome,
                'bp_placed'     => $totalBPPlace,
                'our_net'       => $totalBPPlace - $totalOutcome,
                'our_net_rp'    => ($totalBPPlace - $totalOutcome) * 1000,
            ]);
        }

        $arrView = [
            'event'              => $event,
            'total_bp_all'       => $totalBPAll,
            'total_bp_all_bonus' => $totalBPBonusAll,
            'total_income'       => $totalIncome,
            'total_outcome'      => $totalOutcome,
            'total_bonus'        => $totalBonus,
            'total_bet'          => $totalBet,
            'total_bp_place'     => $totalBPPlace,
            'data_user_refund'   => $arrRefund,
            'array_product'      => collect($arrProducts),
            'array_product_win'  => $arrProductsWin,
            'array_product_loss' => $arrProductsLoss,
            'data_user'          => $arrUser,
            'data_user_win'      => $arrUserWin,
            'data_user_lose'     => $arrUserLose,
        ];

        return view('pages.admin.report.detail', $arrView);
    }
}
