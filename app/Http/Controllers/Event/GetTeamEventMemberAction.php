<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetTeamEventMemberAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke($id)
    {
        ini_set('memory_limit', '-1');
        
        $result = [];

        $event = Event::find($id);
        $result['event'] = $event;
        $result['event']->left_team_name = $event->team_left->name;
        $result['event']->right_team_name = $event->team_right->name;
        $result['league_game_id'] = $event->league_game_id;
        $result['left_team_member'] = TeamMember::where('team_id', $event->team_left_id)->where('league_game_id', $event->league_game_id)->get();
        $result['right_team_member'] = TeamMember::where('team_id', $event->team_right_id)->where('league_game_id', $event->league_game_id)->get();

        return $result;
    }
}
