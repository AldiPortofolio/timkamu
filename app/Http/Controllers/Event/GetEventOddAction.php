<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GetEventOddAction extends Controller
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
    public function __invoke()
    {
        ini_set('memory_limit', '-1');
        
        $result = [];

        // get all events
        $dataEvents = Event::where('type', '<>', 'DONE')->get();
        
        $arrEvent = [];
        $arrEvent['np'] = [];
        $arrEvent['mlbb'] = [];
        $arrEvent['freefire'] = [];
        $arrEvent['pubgm'] = [];
        $arrEvent['lol'] = [];
        foreach ($dataEvents as $key => $value) {
            // $eventTransaction = EventBetRule::where('event_id', $value->id)->where('active', '1')->get();
            // if(count($eventTransaction) > 0) {
            // }

            $string = "<a href='" . url('events/' . $value->slug) . "' class='games-nav-tray-link scale-onclick'>" . $value->name . "</a>";
            if ($value->type === 'ONGOING') {
                array_push($arrEvent['np'], $string);
            } else if($value->league_game_id) {
                if ($value->league_games->game_id === 1) {
                    array_push($arrEvent['mlbb'], $string);
                } elseif ($value->league_games->game_id === 2) {
                    array_push($arrEvent['freefire'], $string);
                } elseif ($value->league_games->game_id === 3) {
                    array_push($arrEvent['pubgm'], $string);
                } elseif ($value->league_games->game_id === 4) {
                    array_push($arrEvent['lol'], $string);
                }
            }
        }

        $stringEvent = '';
        foreach ($arrEvent as $key => $aE) {
            if(count($aE) > 0) {
                $stringEvent .= "<div class='nav-games-segment mb-20 d-flex flex-column'>";
                if($key === 'np') {
                    $stringEvent .= "<div class='nav-section-header'>Now Playing</div>";
                } else if($key === 'mlbb') {
                    $stringEvent .= "<div class='nav-section-header'>Mobile Legends</div>";
                } else if($key === 'freefire') {
                    $stringEvent .= "<div class='nav-section-header'>Free fire</div>";
                } else if ($key === 'pubgm') {
                    $stringEvent .= "<div class='nav-section-header'>PUBGM</div>";
                } else if ($key === 'lol') {
                    $stringEvent .= "<div class='nav-section-header'>League of Legends</div>";
                }
                $stringImplode = implode(" ", $aE);
                $stringEvent .= $stringImplode."</div>";
            }
        }

        if($stringEvent === '') {
            $stringEvent = "<div class='nav-games-segment mb-20 d-flex flex-column'><a href='#' class='games-nav-tray-link text-center'>No featured</a></div>";
        }

        $result['events'] = $stringEvent;

        return $result;
    }
}
