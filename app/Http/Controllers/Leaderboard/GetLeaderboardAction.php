<?php

namespace App\Http\Controllers\Leaderboard;

use App\Http\Controllers\Controller;
use App\Http\Models\TeamDonate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetLeaderboardAction extends Controller
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
    public function __invoke()
    {
        $mostLoyalMembersToday = TeamDonate::whereDate('created_at', Carbon::today()->format('Y-m-d'))
                                ->select('user_id', DB::raw('sum(value) as total_value'))
                                ->groupBy('user_id')
                                ->orderBy('total_value', 'desc')
                                ->limit(10)
                                ->get();

        $mostLoyalMembersPastSevenDays = TeamDonate::where('created_at', '>=', Carbon::today()->subDay(7)->format('Y-m-d'))
                                        ->select('user_id', DB::raw('sum(value) as total_value'))
                                        ->groupBy('user_id')
                                        ->orderBy('total_value', 'desc')
                                        ->limit(10)
                                        ->get();
        
        $mostBPMembersToday = null;
        $mostBPMembersPastSeventDays = null;

        $mostLPTeamsToday = TeamDonate::whereDate('created_at', Carbon::today()->format('Y-m-d'))
                            ->select('team_id', DB::raw('sum(value) as total_value'))
                            ->groupBy('team_id')
                            ->orderBy('total_value', 'desc')
                            ->limit(10)
                            ->get();;

        $mostLPTeamsPastSevenDays = TeamDonate::where('created_at', '>=', Carbon::today()->subDay(7)->format('Y-m-d'))
                                    ->select('team_id', DB::raw('sum(value) as total_value'))
                                    ->groupBy('team_id')
                                    ->orderBy('total_value', 'desc')
                                    ->limit(10)
                                    ->get();

        $arrView = [
            'most_loyal_members_today'  => $mostLoyalMembersToday,
            'most_loyal_members_pastsevendays'  => $mostLoyalMembersPastSevenDays,
            'most_lp_teams_today'  => $mostLPTeamsToday,
            'most_lp_teams_pastsevendays'  => $mostLPTeamsPastSevenDays
        ];

        return view('pages.leaderboards.index', $arrView);
    }
}
