<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventChat;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Team;
use App\Http\Models\TeamMember;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetEventDetailAction extends Controller
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
    public function __invoke($slug)
    {
        ini_set('memory_limit', '-1');
        $event = Event::where('slug', $slug)->first();
        if($event) {
            if ($event->league_game_id && ($event->league_games->game_id === 2 || $event->league_games->game_id === 3)) {
                $teamsEvent = json_decode($event->team_detail);
                foreach ($teamsEvent as $key => $value) {
                    $tms = Team::find($value->team_id);
                    $value->logo = $tms->logo;
                    $value->alias = $tms->alias;
                    $value->name = $tms->name;
                }
                $event->team_detail = $teamsEvent;
            }

            $id = $event->id;
            if ($event->type === 'DONE') {
                $arrView = [
                    'event' => $event,
                ];

                return view('pages.events.past', $arrView);
            }
            $teamMemberLeft = TeamMember::where('team_id', $event->team_left_id)->where('league_game_id', $event->league_game_id)->get()->pluck('name');
            $teamMemberRight = TeamMember::where('team_id', $event->team_right_id)->where('league_game_id', $event->league_game_id)->get()->pluck('name');
            $event->team_left_member = $teamMemberLeft;
            $event->team_right_member = $teamMemberRight;

            $eventBetCategory = EventBetCategory::where('event_id', $id)->get();
            $eventBet = EventBetRule::where('event_id', $id)->where('active', '1')->get();

            $eventBetRules = [];
            foreach ($eventBetCategory as $key => $value) {
                if ($eventBet->where('event_bet_category_id', $value->id)->count() === 0) {
                    continue;
                }

                $eventBetRules[$key]['name'] = $value->name;
                $eventBetRules[$key]['value'] = $value->value;
                $eventBetRules[$key]['type'] = $value->type;
                $eventBetRules[$key]['items'] = $eventBet->where('event_bet_category_id', $value->id);
            }

            // if($event->type === 'ONGOING') {
            $chats = EventChat::where('event_id', $id)->get();
            foreach ($chats as $key => $value) {
                $user = User::find($value->user_id);
                $ranks = $user->ranks;
                $imgLogo = "<img src='" . asset($ranks->logo) . "' class='rank' data-toggle='tooltip' data-placement='top' title='" . $ranks->name . "'>";
                $string = "<div class='event-chat-bubble " . ($value->gift === '1' ? 'gift' : '') . "'><span class='auth'>" . $imgLogo . " " . $user->username . " : </span>" . $value->message . "</div>";
                $value->message = $string;
            }
            $chats = implode($chats->pluck('message')->toArray());

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

            $items = ItemConversion::with('childs')->get()->where('parents.name', 'LP')->where('childs.type', 'donation');

            $eventTransaction = EventTransaction::where('event_id', $id)->where('user_id', Auth::id())->get();
            $eventTransaction->team_left = array_sum($eventTransaction->where('team_id', $event->team_left_id)->pluck('value')->toArray());
            $eventTransaction->team_right = array_sum($eventTransaction->where('team_id', $event->team_right_id)->pluck('value')->toArray());

            $arrView = [
                'chats' => $chats,
                'event' => $event,
                'items' => $items,
                'lpArr' => $lpArr,
                'event_transaction' => $eventTransaction,
                'event_bingo' => $eventBetRules
            ];

            $pageName = 'detail';
            if(!$event->league_game_id) {
                $pageName = 'outright-detail';
            }

            return view('pages.events.'.$pageName, $arrView);
        } else {
            abort(404);
        }
        // }

        // $eventTransaction = EventTransaction::where('event_id', $id)->where('user_id', Auth::id())->get();
        // $eventTransaction->team_left = array_sum($eventTransaction->where('team_id', $event->team_left_id)->pluck('value')->toArray());
        // $eventTransaction->team_right = array_sum($eventTransaction->where('team_id', $event->team_right_id)->pluck('value')->toArray());

        // $arrView = [
        //     'event' => $event,
        //     'event_transaction' => $eventTransaction
        // ];

        // $view = ($event->type === 'UPCOMING') ? 'upcoming' : 'past';

        // return view('pages.events.'.$view, $arrView);
    }
}
