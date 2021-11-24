<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\EventBetRule;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostEventBetRuleUpdateAction extends Controller
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
    public function __invoke(Request $request, $id)
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }
        
        $eventBetRule = EventBetRule::find($id);
        if($eventBetRule->event_bet_categories->type === '2' && ($request->total === null || $request->value_under === null || $request->value_above === null)) {
            return redirect(url()->previous())->with('failed', 'Some fields are required')->withInput();
        }

        $eventValueDetail = json_decode($eventBetRule->value_detail);

        if(isset($request->value_left)) {
            $request->value_left = str_replace('%', '', $request->value_left);
        }
        if (isset($request->value_right)) {
            $request->value_right = str_replace('%', '', $request->value_right);
        }
        if (isset($request->value_under)) {
            $request->value_under = str_replace('%', '', $request->value_under);
        }
        if (isset($request->value_above)) {
            $request->value_above = str_replace('%', '', $request->value_above);
        }
        if (isset($request->bonus)) {
            $request->bonus = str_replace('%', '', $request->bonus);
        }

        $valueDetail = [];
        $skip = false;
        if ($eventBetRule->event_bet_categories->type === '1') {
            if($request->value_left === $eventValueDetail->team_left && $request->value_right === $eventValueDetail->team_right) {
                $skip = true;
            } else {
                if($eventBetRule->events->league_games->game_id === 1 || $eventBetRule->events->league_games->game_id === 4) {
                    $valueDetail = [
                        'team_left' => $request->value_left ?? $eventValueDetail->team_left,
                        'team_left_locked' => $request->value_left === null ? $eventValueDetail->team_left_locked : '0',
                        'team_right' => $request->value_right ?? $eventValueDetail->team_right,
                        'team_right_locked' => $request->value_right === null ? $eventValueDetail->team_right_locked : '0',
                    ];
                } else if ($eventBetRule->events->league_games->game_id === 2 || $eventBetRule->events->league_games->game_id === 3) {
                    $valueDetail = [
                        'team_left' => $request->value_left ?? $eventValueDetail->team_left,
                        'team_left_id' => $request->value_left_id ?? $eventValueDetail->team_left_id,
                        'team_left_locked' => $request->value_left === null ? $eventValueDetail->team_left_locked : '0',
                        'team_right' => $request->value_right ?? $eventValueDetail->team_right,
                        'team_right_id' => $request->value_right_id ?? $eventValueDetail->team_right_id,
                        'team_right_locked' => $request->value_right === null ? $eventValueDetail->team_right_locked : '0',
                    ];
                }
            }
        } else if ($eventBetRule->event_bet_categories->type === '2') {
            if ($request->value_under === $eventValueDetail->under && $request->value_above === $eventValueDetail->above) {
                $skip = true;
            } else {
                $valueDetail = [
                    'total' => $request->total,
                    'under' => $request->value_under ?? $eventValueDetail->under,
                    'under_locked' => $request->value_under === null ? $eventValueDetail->under_locked : '0',
                    'above' => $request->value_above ?? $eventValueDetail->above,
                    'above_locked' => $request->value_above === null ? $eventValueDetail->above_locked : '0',
                ];
            }
        } else if ($eventBetRule->event_bet_categories->type === '3') {
            if ($request->bonus === $eventValueDetail->bonus) {
                $skip = true;
            } else {
                $valueDetail = [
                    'team_left' => $eventValueDetail->team_left,
                    'team_right' => $eventValueDetail->team_right,
                    'bonus' => $request->bonus,
                    'bonus_locked' => $request->bonus === null ? $eventValueDetail->bonus_locked : '0',
                ];
            }
        } else if ($eventBetRule->event_bet_categories->type === '4') {
            if ($request->bonus === $eventValueDetail->bonus) {
                $skip = true;
            } else {
                $valueDetail = [
                    'name' => $eventValueDetail->name,
                    'image' => $eventValueDetail->image,
                    'opt_number' => $eventValueDetail->opt_number,
                    'bonus' => $request->bonus,
                    'bonus_locked' => $request->bonus === null ? $eventValueDetail->bonus_locked : '0',
                ];
            }
        }

        if(!$skip) {
            try {
                DB::beginTransaction();

                EventBetRule::where([
                    'id' => $id
                ])->update(['active' => '0']);

                $data = new EventBetRule();
                $data->event_id = $eventBetRule->event_id;
                $data->event_bet_category_id = $eventBetRule->event_bet_category_id;
                $data->active = '1';
                $data->value_detail = json_encode($valueDetail);
                $data->save();
            } catch (\Exception $e) {
                Log::info($e->getMessage());
                DB::rollback();
                return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer')->withInput();
            }

            DB::commit();
            return redirect(url()->previous())->with('success', 'Data updated');
        }

        return redirect(url()->previous())->with('warning', 'No data changes');
    }
}
