<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventBetRule;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetUpdateWinLoseAction extends Controller
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
    public function __invoke($id, $winner)
    {
        if (!Auth::guard('admin')->user()) {
            return 'error';
        }

        $result = [];
        $result['status'] = 'success';
        $result['message'] = 'Data updated';

        $eventBetCategory = EventBetCategory::find($id);
        $dataEvent = Event::find($eventBetCategory->event_id);
        $data = [];
        if ($eventBetCategory->type === '1') {
            if($dataEvent->league_games->game_id === 2 || $dataEvent->league_games->game_id === 3) {
                $dataBetRules = EventBetRule::where('event_bet_category_id', $id)->where('active', '1')->first();
                $decode = json_decode($dataBetRules->value_detail);
                $winner = $decode->{'team_' . $winner . '_id'};
            } else {
                $winner = $dataEvent->{'team_' . $winner . '_id'};
            }
            
            $data['value'] = $winner;
        } else if ($eventBetCategory->type === '2') {
            $winner = 1;
            if($winner === 'above') {
                $winner = 2;
            }
            $data['value'] = $winner;
        } else if ($eventBetCategory->type === '4') {
            $data['value'] = $winner;
        }

        try {
            DB::beginTransaction();

            EventBetCategory::where('id', $id)->update($data);
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();
            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer');
        }

        DB::commit();
        return redirect(url()->previous())->with('success', 'Data updated');
    }
}
