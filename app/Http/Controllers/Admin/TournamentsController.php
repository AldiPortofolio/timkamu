<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Team;
use App\Http\Models\TeamMember;
use App\Http\Models\Tournaments;
use Illuminate\Http\Request;

class TournamentsController extends Controller
{
    public function index()
    {
        ini_set('memory_limit', '-1');
        $tournaments = Tournaments::withCount('teams')->paginate(10);
        return view('pages.admin.tournaments.index', compact('tournaments'));
    }

    public function show($id)
    {
        ini_set('memory_limit', '-1');
        $tournament = Tournaments::withCount('teams')->find($id);
        $teamTournament = Team::where('id_tournament', $id)->get();
        foreach($teamTournament as $value) {
            $teamMember = TeamMember::where('team_id', $value->id)->get();
            $value->team_member = $teamMember;
        }

        $arrView = [
            'tournament' => $tournament,
            'team_tournament' => $teamTournament
        ];

        return view('pages.admin.tournaments.detail', $arrView);
    }


}
