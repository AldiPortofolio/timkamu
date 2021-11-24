<?php

namespace App\Http\Controllers;

use App\Http\Models\Team;
use App\Http\Models\TeamMember;
use App\Http\Models\Tournaments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TournamentsController extends Controller
{
    public function index()
    {
        ini_set('memory_limit', '-1');
        $tournaments = Tournaments::withCount('teams')->orderBy('id', 'desc')->get();
        return view('pages.tournaments.index', compact('tournaments'));
    }

    public function show($slug)
    {
        ini_set('memory_limit', '-1');
        $tournament = Tournaments::where('slug', $slug)->withCount('teams')->first();
        $isLoginLeaderRegistered = null;
        if(Auth::id()) {
            $isLoginLeaderRegistered = TeamMember::join('teams', 'teams.id', '=', 'team_members.team_id')
            ->where('teams.id_tournament', $tournament->id)
            ->where('team_members.id_user', Auth::id())
            ->first();
        }

        $teamRegistered = Team::where('id_tournament', $tournament->id)->get();

        $arrView = [
            'is_login_leader_registered' => $isLoginLeaderRegistered,
            'tournament' => $tournament,
            'team_registered' => $teamRegistered
        ];

        return view('pages.tournaments.detail', $arrView);
    }

    public function checkUserRegistration($user_id, $tournament_id)
    {
        ini_set('memory_limit', '-1');
        $memberOfTeam = TeamMember::join('teams', 'teams.id', '=', 'team_members.team_id')
            ->where('team_members.id_user', $user_id)
            ->where('teams.id_tournament',$tournament_id)
            ->first();
        if($memberOfTeam !== null){
            return response()->json(['success' => false, 'message' =>'Akun anda sudah terdaftar dalam turnament'], 422);
        }
        return response()->json(['success' => true], 200);

    }
}
