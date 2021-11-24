<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetTeamEventAction extends Controller
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
        $result['event']->left_team_name = $event->team_left->name . (Auth::user()->fans_team_id === $event->team_left_id ? ' (Kamu fan loyal tim ini)' : '');
        $result['event']->right_team_name = $event->team_right-> name . (Auth::user()->fans_team_id === $event->team_right_id ? ' (Kamu fan loyal tim ini)' : '');

        return $result;
    }
}
