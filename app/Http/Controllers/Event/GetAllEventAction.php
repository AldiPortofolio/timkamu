<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBookmark;
use App\Http\Models\EventChat;
use App\Http\Models\EventTransaction;
use App\Http\Models\Game;
use App\Http\Models\League;
use App\Http\Models\LeagueGame;
use App\Http\Models\Team;
use App\Http\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Str;

class GetAllEventAction extends Controller
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

        $slugEvents = Event::orderBy('created_at', 'desc')->orderBy('start_date', 'asc')->get();
        foreach ($slugEvents as $key => $value) {
            if ($value->slug === null) {
                $slug = strtolower($value->name . ' ' . Carbon::parse($value->start_date)->format('d M y Hi') . ' ' . $value->id);
                Event::where('id', $value->id)->update(['slug' => Str::slug($slug)]);
            }
        }
//
//        $event = Event::where('type', '!=', 'DONE')->get();
//
//        // initialize month
//        $startMonth = Carbon::now()->format('m');
//
//        // get all events
//        $event = new Event();
//
//        $events = [];
//        for ($i = 0; $i <= 11; $i++) {
//            $currentMonth = Carbon::parse(1)->addMonth($i);
//            $eventCurrentMonth = $event->whereMonth('start_date', $currentMonth->format('m'))->orderBy('start_date', 'desc')->orderBy('type', 'asc')->get();
//            $events[$currentMonth->format('F')] = count($eventCurrentMonth) > 0 ? $eventCurrentMonth : 'There are no events in this month';
//        }
//
//        $arrView = [
//            'events'     => $events,
//        ];

//        $events = Event::join('league_games as league', 'league.id','=', 'events.league_game_id')
//            ->where('events.type', '<>', 'DONE')
//            ->get();
//        $total = $events->count();

        $events = Event::join('league_games', 'league_games.id','=', 'events.league_game_id')
            ->join('leagues', 'leagues.id', '=', 'league_games.league_id')
            ->join('games', 'games.id', '=', 'league_games.game_id')
            ->where('events.type', '<>', 'DONE')
            ->select('events.*', 'leagues.name as league_games_name', 'league_games.game_id', 'games.logo as game_logo')
            ->when($request->game, function ($query) use ($request){
                if($request->game === 'mlbb'){
                    return $query->where('league_games.game_id', '=', 1);
                }elseif ($request->game === 'freefire'){
                    return $query->where('league_games.game_id', '=', 2);
                }elseif ($request->game === 'pubgm'){
                    return $query->where('league_games.game_id', '=', 3);
                }else{
                    return $query;
                }
            })
            ->with(['team_left', 'team_right'])
            ->get()
            ->each(function ($item, $index){
                $startDate = Carbon::parse($item->start_date);
                $item->formatted_date = $startDate->copy()->format('d');
                $item->formatted_month = $startDate->copy()->format('M');
                $item->formatted_time = $startDate->copy()->format('H:i');
                if(in_array($item->game_id, [2,3])){
                    $teams = collect(json_decode($item->team_detail, true))->pluck('team_id')->slice(0,3)->toArray();
                    $item->teams = Team::whereIn('id', $teams)->get();
                }
            });
        $total = $events->count();
        return view('pages.events.index', compact('events', 'total'));
    }

    public function json(Request $request)
    {
        $events = Event::join('league_games', 'league_games.id','=', 'events.league_game_id')
            ->join('leagues', 'leagues.id', '=', 'league_games.league_id')
            ->join('games', 'games.id', '=', 'league_games.game_id')
            ->select('events.*', 'leagues.name as league_games_name', 'league_games.game_id', 'games.logo as game_logo')
            ->when($request->game, function ($query) use ($request){
                if($request->game === 'mlbb'){
                    return $query->where('league_games.game_id', '=', 1);
                }elseif ($request->game === 'freefire'){
                    return $query->where('league_games.game_id', '=', 2);
                }elseif ($request->game === 'pubgm'){
                    return $query->where('league_games.game_id', '=', 3);
                }else{
                    return $query;
                }
            })
            ->with(['team_left', 'team_right'])
            ->get()
            ->each(function ($item, $index){
                $startDate = Carbon::parse($item->start_date);
                $item->formatted_date = $startDate->copy()->format('d');
                $item->formatted_month = $startDate->copy()->format('M');
                $item->formatted_time = $startDate->copy()->format('H:i');
                if(in_array($item->game_id, [2,3])){
                    $teams = collect(json_decode($item->team_detail, true))->pluck('team_id')->slice(0,3)->toArray();
                    $item->teams = Team::whereIn('id', $teams)->get();
                }
            });
        $total = $events->count();
        return [
            'events' => $events,
            'total' => $total
        ];
    }

    public function show($id)
    {

        // get event
        $event = Event::join('league_games', 'league_games.id','=', 'events.league_game_id')
            ->join('leagues', 'leagues.id', '=', 'league_games.league_id')
            ->select('events.*', 'leagues.name as league_games_name', 'league_games.game_id')
            ->where('events.id', '=', $id)
            ->withCount('betCategories')
            ->first();

        /// total team
        $event->formatted_start_date = Carbon::parse($event->start_date)->format('d M H:i');
        if($event->game_id === 2 || $event->game_id === 3){
            $teams = json_decode($event->team_detail, true);
            $event->total_teams = count($teams);
        }else{
            $event->total_teams = 2;
        }


        return $event;

    }

    public function checkStatus(Request $request)
    {
        $ids = explode(',', $request->get('ids'));
        return Event::whereIn('id', $ids)->select('type','id')->get();
    }
}
