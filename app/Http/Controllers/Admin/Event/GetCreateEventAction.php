<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminMenuGrant;
use App\Http\Models\LeagueGame;
use App\Http\Models\Menu;
use App\Http\Models\Team;
use Auth;

class GetCreateEventAction extends Controller
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
    public function __invoke()
    {
        $user = Auth::guard('admin')->user();

        if (!$user) {
            return redirect('admin-tkmu/sign-in');
        }

        $menuId = Menu::where('name', 'EVENT')->pluck('id')->first();
        $adminMenuGrants = AdminMenuGrant::where('admin_id', $user->id)
                                    ->where('menu_id', $menuId)
                                    ->where('name', 'CREATE')
                                    ->get();

        if(!$adminMenuGrants) {
            return redirect('admin-tkmu');
        }

        $leagueGames = LeagueGame::get();
        $teams = Team::orderBy('name', 'asc')->get();

        $arrView = [
            'league_games'  => $leagueGames,
            'teams' => $teams
        ];

        return view('pages.admin.events.create', $arrView);
    }
}
