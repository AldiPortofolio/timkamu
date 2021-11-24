<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use App\Http\Models\Team;
use Auth;

class GetDataDetailEventAction extends Controller
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
        $eventBetCategory = EventBetCategory::where('event_id', $id)->get();
        $eventBet = EventBetRule::where('event_id', $id)
                    ->get();
                    
        $eventBetRules = [];
        foreach ($eventBetCategory as $key => $value) {
            $eventBetRules[$key]['id'] = $value->id;
            $eventBetRules[$key]['name'] = $value->name;
            $eventBetRules[$key]['type'] = $value->type;
            $eventBetRules[$key]['items'] = $eventBet->where('event_bet_category_id', $value->id);

            foreach ($eventBetRules[$key]['items'] as $idx => $item) {
                $thisTransaction = EventTransaction::where('event_bet_id', $item->id)
                    ->where(function ($query) {
                        $query->orWhere('status', 2);
                        $query->orWhere('status', 3);
                    })->get()->pluck('value_detail');
                $valueDetail = json_decode($item->value_detail);
                if ($value->type === '1') {
                    $valueDetail->team_left_income = 0;
                    $valueDetail->team_left_outcome = 0;

                    $valueDetail->team_right_income = 0;
                    $valueDetail->team_right_outcome = 0;
                } else {
                    $valueDetail->under_income = 0;
                    $valueDetail->under_outcome = 0;

                    $valueDetail->above_income = 0;
                    $valueDetail->above_outcome = 0;
                }

                foreach ($thisTransaction as $detail) {
                    $detailDecode = json_decode($detail);

                    if(isset($valueDetail->{$detailDecode->type . '_income'})) {
                        $valueDetail->{$detailDecode->type . '_income'} += $detailDecode->value ?? 0;
                    }
                    if (isset($valueDetail->{$detailDecode->type . '_outcome'})) {
                        $valueDetail->{$detailDecode->type . '_outcome'} += $detailDecode->value ?? 0;
                    }
                }

                $item->value_detail = json_encode($valueDetail);
            }
        }

        $eventBet = $eventBetRules;

        return $eventBet;
    }
}
