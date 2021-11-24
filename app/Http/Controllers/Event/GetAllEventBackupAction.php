<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\League;
use App\Http\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class GetAllEventBackupAction extends Controller
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
    public function __invoke(Request $request)
    {
        ini_set('memory_limit', '-1');
        
        // initialize month
        $startMonth = Carbon::now()->format('m');
        $endMonth = Carbon::now()->addMonth(3)->format('m');

        // get all events
        $event = new Event();
        $dataEvents = $event->whereMonth('start_date', '>=', $startMonth)
            ->whereMonth('start_date', '<=', $endMonth)
            ->get();

        if ($request->month) {
            $event = $event->whereMonth('start_date', $request->month)->get();
            $currentMonth = Carbon::parse($event[0]->start_date)->format('F');
            $events[$currentMonth] = $event;
        } else {
            $events = [];
            for ($i = 0; $i <= 3; $i++) {
                $currentMonth = Carbon::now()->addMonth($i);
                $eventCurrentMonth = $event->whereMonth('start_date', $currentMonth->format('m'))->get();
                $events[$currentMonth->format('F')] = count($eventCurrentMonth) > 0 ? $eventCurrentMonth : 'There are no events in this month';
            }
        }

        // get all teams that only participate in events
        $arrTeamLeft = $dataEvents->pluck('team_left_id')->toArray();
        $arrTeamRight = $dataEvents->pluck('team_right_id')->toArray();
        $arrTeam = array_unique(array_merge($arrTeamLeft, $arrTeamRight));
        $teams = Team::whereIn('id', $arrTeam)->orderBy('name', 'asc')->get();

        // get all leagues
        $leagues = League::all();

        $lpArr = [
            7,
            14,
            28,
            56,
            112,
            224,
            448,
            896,
            1050,
            1400,
            1995,
            2450,
            3500,
            4900,
        ];

        $arrView = [
            'event'   => $event,
            'events'  => $events,
            'leagues' => $leagues,
            'teams'   => $teams,
            'lpArr'   => $lpArr,
        ];

        return view('pages.events.index-backup', $arrView);
    }
}
