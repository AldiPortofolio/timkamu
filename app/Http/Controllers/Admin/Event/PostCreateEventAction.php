<?php

namespace App\Http\Controllers\Admin\Event;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\LeagueGame;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostCreateEventAction extends Controller
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

        $leagueGame = LeagueGame::find($request->league_game_id);

        try {
            DB::beginTransaction();

            $data = new Event();
            $data->name           = $request->name;
            $data->league_game_id = $request->league_game_id;
            if($leagueGame && ($leagueGame->game_id === 1 || $leagueGame->game_id === 4)) {
                $data->team_left_id   = $request->team_left_id;
                $data->team_right_id  = $request->team_right_id;
            } else {
                $teamDetail = [];
                if($request->teams) {
                    foreach ($request->teams as $key => $value) {
                        array_push($teamDetail, [
                            'team_id' => $value,
                            'status'  => 'alive'
                        ]);
                    }
                    $data->team_detail = json_encode($teamDetail);
                }
            }
            if($request->end_date) {
                $request->end_date = str_replace('T', ' ', $request->end_date);
            }
            $data->start_date     = str_replace('T', ' ', $request->start_date);
            $data->end_date       = $request->end_date;
            $data->streaming_link = $request->streaming_link;
            $data->card_detail    = $request->card_detail;
            $data->type           = 'UPCOMING';
            $data->created_by     = Auth::guard('admin')->user()->id;
            $data->enable_chat    = '0';
            $data->save();

        } catch (\Exception $e) {
            Log::info($e);
            dd($e);
            DB::rollback();

            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer')->withInput();
        }

        DB::commit();
        return redirect('admin-tkmu/events')->with('success', 'Data created');
    }
}
