<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\EventBetRule;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetEventBetRuleLockAction extends Controller
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
            return 'error';
        }
        
        $result = [];
        $result['status'] = 'success';
        $result['message'] = 'Data updated';

        $eventBetRule = EventBetRule::find($id);
        $eventValueDetail = json_decode($eventBetRule->value_detail);
        $abc = json_decode($eventBetRule->value_detail);

        if($request->type == '') {
            if($eventBetRule->event_bet_categories->type === '1') {
                if ($eventValueDetail->team_left_locked === '1' && $eventValueDetail->team_left_locked === '1') {
                    $eventValueDetail->team_left_locked = '0';
                    $eventValueDetail->team_right_locked = '0';
                } else {
                    $eventValueDetail->team_left_locked = '1';
                    $eventValueDetail->team_right_locked = '1';
                }
            } else if ($eventBetRule->event_bet_categories->type === '2') {
                if ($eventValueDetail->under_locked === '1' && $eventValueDetail->above_locked === '1') {
                    $eventValueDetail->under_locked = '0';
                    $eventValueDetail->above_locked = '0';
                } else {
                    $eventValueDetail->under_locked = '1';
                    $eventValueDetail->above_locked = '1';
                }
            } else if($eventBetRule->event_bet_categories->type === '3' || $eventBetRule->event_bet_categories->type === '4') {
                if ($eventValueDetail->bonus_locked === '1') {
                    $eventValueDetail->bonus_locked = '0';
                } else {
                    $eventValueDetail->bonus_locked = '1';
                }
            }
            
        } else {
            if ($eventValueDetail->{$request->type . '_locked'} === '0') {
                $eventValueDetail->{$request->type . '_locked'} = '1';
            } else {
                $eventValueDetail->{$request->type . '_locked'} = '0';
            }
        }

        try {
            DB::beginTransaction();

            EventBetRule::where([
                'id' => $id
            ])->update(['value_detail' => json_encode($eventValueDetail)]);

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollback();

            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer');
        }

        DB::commit();
        return redirect(url()->previous())->with('success', 'Data updated');
    }
}
