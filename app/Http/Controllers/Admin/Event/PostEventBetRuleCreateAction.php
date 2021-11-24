<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventBetRule;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostEventBetRuleCreateAction extends Controller
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
        
        $eventBetCategory = EventBetCategory::find($request->event_bet_category_id);
        if($eventBetCategory->type === '2' && ($request->total === null || $request->value_under === null || $request->value_above === null)) {
            return redirect(url()->previous())->with('failed', 'Some fields are required')->withInput();
        } else if ($eventBetCategory->type === '3' && ($request->value_left_ts === null || $request->value_right_ts === null || $request->bonus === null)) {
            return redirect(url()->previous())->with('failed', 'Some fields are required')->withInput();
        }

        $valueDetail = [];
        if($request->game_id) {
            $valueDetail = [
                'team_left_id' => $request->team_left,
                'team_left' => str_replace('%', '', $request->value_left),
                'team_left_locked' => '0',
                'team_right_id' => $request->team_right,
                'team_right' => str_replace('%', '', $request->value_right),
                'team_right_locked' => '0',
            ];    
        } else {
            $valueDetail = [
                'team_left_id' => $eventBetCategory->events->team_left_id,
                'team_left' => str_replace('%', '', $request->value_left),
                'team_left_locked' => '0',
                'team_right_id' => $eventBetCategory->events->team_right_id,
                'team_right' => str_replace('%', '', $request->value_right),
                'team_right_locked' => '0',
            ];
        }

        if($eventBetCategory->type === '2') {
            $valueDetail = [
                'total' => $request->total,
                'under' => str_replace('%', '', $request->value_under),
                'under_locked' => '0',
                'above' => str_replace('%', '', $request->value_above),
                'above_locked' => '0'
            ];
        } else if ($eventBetCategory->type === '3') {
            $valueDetail = [
                'team_left' => $request->value_left_ts,
                'team_right' => $request->value_right_ts,
                'bonus' => str_replace('%', '', $request->bonus),
                'bonus_locked' => '0'
            ];
        } else if ($eventBetCategory->type === '4') {
            $count = EventBetRule::where('event_id', $request->event_id)->count();
            $valueDetail = [
                'opt_number' => ($count+1),
                'name' => $request->name,
                'image' => $request->image ?? 'https://timkamu.com/img/team-logos/na-200.png',
                'bonus' => str_replace('%', '', $request->bonus),
                'bonus_locked' => '0'
            ];
        }

        try {
            DB::beginTransaction();

            $data = new EventBetRule();
            $data->event_id = $request->event_id;
            $data->event_bet_category_id = $request->event_bet_category_id;
            $data->active = '1';
            $data->value_detail = json_encode($valueDetail);
            $data->save();

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollback();
            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer')->withInput();
        }

        DB::commit();
        return redirect(url()->previous())->with('success', 'Data created');
    }
}
