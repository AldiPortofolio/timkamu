<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\EventBetRule;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetAllEventBetRuleLockAction extends Controller
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

        $eventBetRule = EventBetRule::where('event_id', $id)->get();
        
        try {
            DB::beginTransaction();

            foreach ($eventBetRule as $key => $value) {
                $valueDetail = json_decode($value->value_detail);
                $type = $value->event_bet_categories->type;
                if($request->type === 'lock') {
                    if ($type === '1') {
                        $valueDetail->team_left_locked = '1';
                        $valueDetail->team_right_locked = '1';
                    } else if ($type === '2') {
                        $valueDetail->under_locked = '1';
                        $valueDetail->above_locked = '1';
                    } else if ($type === '3' || $type === '4') {
                        $valueDetail->bonus_locked = '1';
                    }
                } else {
                    if ($type === '1') {
                        $valueDetail->team_left_locked = '0';
                        $valueDetail->team_right_locked = '0';
                    } else if ($type === '2') {
                        $valueDetail->under_locked = '0';
                        $valueDetail->above_locked = '0';
                    } else if ($type === '3'|| $type === '4') {
                        $valueDetail->bonus_locked = '0';
                    }
                }

                EventBetRule::where('id', $value->id)->update([
                    'value_detail' => json_encode($valueDetail)
                ]);
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
