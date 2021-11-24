<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostUpdateEventAction extends Controller
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
        
        $event = Event::find($id);

        if($event) {
            try {
                DB::beginTransaction();

                $data = [];
                $data['name']           = $request->name;
                $data['league_game_id'] = $request->league_game_id;
                if($event->league_games->game_id === 1) {
                    $data['team_left_id']   = $request->team_left_id;
                    $data['team_right_id']  = $request->team_right_id;
                } else {
                    $teamDetail = [];
                    foreach ($request->teams as $key => $value) {
                        array_push($teamDetail, [
                            'team_id' => $value,
                            'status'  => 'alive'
                        ]);
                    }
                    $data['team_detail'] = json_encode($teamDetail);
                }
                $data['start_date']     = str_replace('T', ' ', $request->start_date);
                $data['streaming_link'] = $request->streaming_link;

                Event::where('id', $id)->update($data);
            } catch (\Exception $e) {
                Log::info($e->getMessage());
                DB::rollBack();

                return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer');
            }

            DB::commit();
            return redirect('admin-tkmu/events/'.$id)->with('success', 'Data updated');
        }

        return redirect('admin-tkmu/events/'.$id)->with('failed', 'Event not found');
    }
}
