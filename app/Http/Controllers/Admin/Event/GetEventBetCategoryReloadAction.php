<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use App\Http\Models\Team;
use Auth;

class GetEventBetCategoryReloadAction extends Controller
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
            if ($value->type === '1') {
                $eventBetRules[$key]['type_name'] = 'Win/Lose';
                $eventBetRules[$key]['team_left_total_bp'] = 0;
                $eventBetRules[$key]['team_left_total_bets'] = 0;
                $eventBetRules[$key]['team_right_total_bp'] = 0;
                $eventBetRules[$key]['team_right_total_bets'] = 0;
            } else if ($value->type === '2') {
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
            $eventBetRules[$key]['item_active'] = $eventBet->where('event_bet_category_id', $value->id)->where('active', '1')->first();

            $value->teams = '';
            if ($value->value !== 0 && $value->type === '1') {
                $value->teams = Team::where('id', $value->value)->first()->name;
            }

            $eventBetRules[$key]['bets'] = 0;
            $eventBetRules[$key]['bp_place'] = 0;
            if (count($eventBetRules[$key]['items']) === 0) {
                $eventBetRules[$key]['locked'] = '0';
            }
            foreach ($eventBetRules[$key]['items'] as $idx => $item) {
                if ($item->deleted_at) {
                    continue;
                }
                $thisTransaction = EventTransaction::where('event_bet_id', $item->id)->get()->pluck('value_detail');
                $valueDetail = json_decode($item->value_detail);
                $item->bets = 0;
                if ($value->type === '1') {
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

                    if ($item->active === '1') {
                        $eventBetRules[$key]['total'] = str_replace(',', '.', $valueDetail->total);
                        $eventBetRules[$key]['above'] = $valueDetail->above;
                        $eventBetRules[$key]['under'] = $valueDetail->under;
                    }
                } else if ($value->type === '3' || $value->type === '4') {
                    $valueDetail->bonus_income = 0;
                    $valueDetail->bonus_outcome = 0;

                    if ((!isset($valueDetail->bonus_locked) || $valueDetail->bonus_locked === '0') && $item->active === '1') {
                        $eventBetRules[$key]['locked'] = false;
                    }
                }

                foreach ($thisTransaction as $detail) {
                    $detailDecode = json_decode($detail);

                    $valueDetail->{$detailDecode->type . '_income'} += $detailDecode->value ?? 0;
                    $valueDetail->{$detailDecode->type . '_outcome'} += $detailDecode->win ?? 0;
                    $totalBPPlace += $detailDecode->value ?? 0;
                    $eventBetRules[$key]['bp_place'] += $detailDecode->value ?? 0;

                    $eventBetRules[$key][$detailDecode->type . '_total_bp'] = $valueDetail->{$detailDecode->type . '_income'};
                    $eventBetRules[$key][$detailDecode->type . '_total_bets'] += 1;
                    
                    $item->bets += 1;
                }
                $eventBetRules[$key]['bets'] += count($thisTransaction);
                $totalBet += count($thisTransaction);

                $item->value_detail = json_encode($valueDetail);
            }
        }
        $eventBet = $eventBetRules;

        return $eventBet;
    }
}
