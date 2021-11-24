<?php

namespace App\Http\Controllers\Admin\LeagueGame;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventTransaction;
use App\Http\Models\Game;
use App\Http\Models\League;
use App\Http\Models\LeagueGame;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetAllLeagueGameAction extends Controller
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

        $leagues = League::get();
        $games = Game::get();
        $leagueGames = LeagueGame::get();

        $arrView = [
            'leagues'       => $leagues,
            'games'         => $games,
            'league_games'  => $leagueGames
        ];

        return view('pages.admin.league.index', $arrView);
    }
}
