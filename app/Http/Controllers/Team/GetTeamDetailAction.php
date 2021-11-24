<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\Models\ItemConversion;
use App\Http\Models\Team;
use App\Http\Models\TeamDonate;
use App\Http\Models\User;
use Illuminate\Http\Request;

class GetTeamDetailAction extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request)
    {
        ini_set('memory_limit', '-1');

        $user = auth()->user();

        $alias = app('request')->input('name');

        $filter = explode('-', $request->name);

        $teams = Team::where('logo', '=', 'img/team-logos/'.$filter[0])->get();

        $arrTopSupporters = [];
        $teamsArray = $teams->where('id', $filter[1])->first();
        $totalFans = 0;
        $totalDonation = 0;
        $donationsArray = collect([]);
        $itemsArray = ItemConversion::with('childs')->get()->where('parents.name', 'LP')->where('childs.type', 'donation');

        $statusFans = false;
        foreach ($teams as $team){
            $donations = TeamDonate::join('item_conversions', 'team_donates.item_conversion_id', '=', 'item_conversions.id')
                ->join('users', 'team_donates.user_id', '=', 'users.id')
                ->select('item_conversions.value as total_donation', 'users.*')
                ->where('team_id', $team->id)
                ->orderBy('team_donates.id', 'desc')
                ->get();

            $totalDonation += $donations->sum('total_donation');

            $totalFans += User::where('fans_team_id', $team->id)->count();

            $topSupporters = $donations->groupBy('username');

            foreach($topSupporters as $username => $supporters) {
                array_push($arrTopSupporters, [
                    'name' => $username,
                    'total' => $supporters->sum('total_donation')
                ]);
            }
            $donationsArray = $donationsArray->merge($donations);
            if($user !== null && $user->fans_team_id == $team->id){
                $statusFans = true;
            }
        }
        $arrView = [
            'alias' => $alias,
            'arr_topsupporters' => $arrTopSupporters,
            'team' => $teamsArray ? $teamsArray : $teams[0],
            'total_fans' => $totalFans,
            'total_donation' => $totalDonation,
            'donations' => $donationsArray,
            'items' => $itemsArray->values(),
            'status_fans' => $statusFans
        ];

        return view('pages.teams.detail', $arrView);
    }

}
