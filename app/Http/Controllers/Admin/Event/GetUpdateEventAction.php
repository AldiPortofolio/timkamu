<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use App\Http\Models\LeagueGame;
use App\Http\Models\Team;
use Auth;

class GetUpdateEventAction extends Controller
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
        $temp = collect(json_decode($event->team_detail))->pluck('team_id');
        $event->team_detail = $temp->toArray();
        $leagueGames = LeagueGame::get();
        $teams = Team::get();

        $arrView = [
            'event' => $event,
            'league_games' => $leagueGames,
            'teams' => $teams
        ];

        return view('pages.admin.events.edit', $arrView);
    }
}