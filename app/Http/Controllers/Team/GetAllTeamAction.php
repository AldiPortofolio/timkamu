<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\Models\Team;
use App\Http\Models\TeamDonate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;
use function GuzzleHttp\Psr7\str;

class GetAllTeamAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function query(Request  $request)
    {
        $teams = Team::when($request->team_name, function ($query) use ($request){

                    $teamName = strtolower($request->team_name);
                    return $query->where('alias', 'like', '%'.$teamName.'%')
                        ->orWhere('alias', 'like', '%'.$teamName)
                        ->orWhere('alias', 'like', $teamName.'%')
                        ->orWhere('alias', 'like', $teamName)
                        ->orWhere('name', 'like', '%'.$teamName.'%')
                        ->orWhere('name', 'like', '%'.$teamName)
                        ->orWhere('name', 'like', $teamName.'%')
                        ->orWhere('name', 'like', $teamName);
                })
            ->get()
            ->filter(function ($item, $index){
                return $item->published && $item->logo !== 'img//team-logos//na';
            })
            ->groupBy('logo');

        $totalTeam = $teams->count();

        $returnTeams = [];
        $i = 0;
        foreach ($teams as $team){
            $returnTeams[$i] = $team[0];
            $returnTeams[$i]->total_donation = 0;
            if($request->team_name !== null){
                $team = Team::where('logo', $team[0]->logo)->get();
            }
            foreach ($team as $t){
                $returnTeams[$i]->team_fans_count += $t->teamFans->count();
                if($request->sort_by == 'lp'){
                    $donations = TeamDonate::join('item_conversions', 'team_donates.item_conversion_id', '=', 'item_conversions.id')
                        ->select('item_conversions.value as total_donation')
                        ->where('team_id', $t->id)->get();
                    $returnTeams[$i]->total_donation += $donations->sum('total_donation');
                }
            }
            $i++;
        }
        return compact('totalTeam', 'returnTeams');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        ini_set('memory_limit', '-1');

        $teams = $this->query($request);
        extract($teams);

        if ($request->sort_by == 'lp'){
            $returnTeams = collect($returnTeams)->sortByDesc('total_donation')->take(20)->values();
        }elseif ($request->sort_by == 'name'){
            $returnTeams = collect($returnTeams)->sortBy('name')->values();
        }else{
            $returnTeams = collect($returnTeams)->sortByDesc('team_fans_count')->take(20)->values();
        }

        return view('pages.teams.index', compact('returnTeams', 'totalTeam'));
    }

    public function searchByName(Request $request)
    {
        $teams = $this->query($request);
        extract($teams);

        $take = $request->team_name !== null ? 10 : 20;

        if ($request->sort_by == 'lp'){
            $returnTeams = collect($returnTeams)->sortByDesc('total_donation')->take($take);
        }elseif ($request->sort_by == 'name'){
            $returnTeams = $request->team_name !== null ?
                collect($returnTeams)->sortBy('name')->take(10) :
                collect($returnTeams)->sortBy('name');
        }else{
            $returnTeams = collect($returnTeams)->sortByDesc('team_fans_count')->take($take);
        }
        return [
            'teams' => $returnTeams->values(),
            'total' => $totalTeam
        ];
    }
}
