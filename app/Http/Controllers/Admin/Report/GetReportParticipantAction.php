<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use App\Http\Models\Team;
use App\Http\Models\User;
use Auth;

use Illuminate\Pagination\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetReportParticipantAction extends Controller
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
    public function __invoke(Request $request)
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }

        $allEvents = Event::get();
        $currentEvent = [];

        $event = [];
        $eventBetRules = [];
        $eventCategory = [];
        $userET = [];
        $userEvent = [];

        $eventId = app('request')->input('event');
        $username = app('request')->input('username');
        if($eventId && $eventId !== 'all' && !$username) {
            $event = Event::find($eventId);
            $currentEvent = $event;
            $eventCategory = EventBetCategory::where('event_id', $eventId)->get();

            $userEventTransactions = EventTransaction::where('event_id', $eventId)
                ->where(function ($query) {
                    $query->orWhere('status', 2);
                    $query->orWhere('status', 3);
                })
                ->select('user_id')
                ->get()
                ->pluck('user_id')
                ->toArray();
            $userET = array_unique($userEventTransactions);

            array_push($userEvent, $eventId);
        } else if($eventId && $eventId !== 'all' && $username) {
            $event = Event::find($eventId);
            $currentEvent = $event;
            $eventCategory = EventBetCategory::where('event_id', $eventId)->get();

            $username = str_replace('%20', '', $request->username);
            $userId = User::where('username', 'like', $username)->pluck('id')->first();

            array_push($userET, $userId);
            array_push($userEvent, $eventId);
        } else if($username && !$eventId) {
            $username = str_replace('%20', '', $request->username);
            $userId = User::where('username', 'like', $username)->pluck('id')->first();

            $userEventTransactions = EventTransaction::where('user_id', $userId)
                ->where(function ($query) {
                    $query->orWhere('status', 2);
                    $query->orWhere('status', 3);
                })
                ->select('event_id')
                ->get()
                ->pluck('event_id')
                ->toArray();

            $userEvent = array_unique($userEventTransactions);

            $eventCategory = EventBetCategory::whereIn('event_id', $userEvent)->get();
            array_push($userET, $userId);
        }

        $totalBPAll = 0;
        $arrUser = [];

        // get transaction
        foreach ($userET as $key => $value) {
            $valueEventTransactions = EventTransaction::whereIn('event_id', $userEvent)
                ->where('user_id', $value)
                ->where(function ($query) {
                    $query->orWhere('status', 2);
                    $query->orWhere('status', 3);
                })
                ->select('id', 'user_id', 'transaction_number', 'event_bet_id', 'event_id', 'value_detail', 'type', 'created_at')
                ->get();

            
            foreach ($valueEventTransactions as $idx => $valET) {
                if (!$valET->event_bet_rules || !$valET->event_bet_rules->event_bet_categories) {
                    continue;
                }
                $category = $valET->event_bet_rules->event_bet_categories->type;
                $categoryName = $valET->event_bet_rules->event_bet_categories->name;
                $categoryId = $valET->event_bet_rules->event_bet_category_id;
                $valueDetail = json_decode($valET->value_detail);
                $valueDetailBetRule = json_decode($valET->event_bet_rules->value_detail);
                $totalBPAll += $valueDetail->value;
                $valET->user = $valET->users->username;
                $valET->category = $categoryName;
                $valET->value_detail = $valueDetail;
                $valET->value_detail_betrule = $valueDetailBetRule;
                $valET->event = "<span class='o3'>[".$valET->event_id."]</span> ".$valET->events->name;
                
                $choose = '';

                if ($category === '1') {
                    if ($valET->events->league_games->game_id === 1 || $valET->events->league_games->game_id === 4) {
                        $choose = $valET->events->{$valueDetail->type}->name;
                    } else if ($valET->events->league_games->game_id === 2 || $valET->events->league_games->game_id === 3) {
                        $teamName = Team::find($valueDetailBetRule->{$valueDetail->type.'_id'})->name;
                        $choose = $teamName;
                    }
                } else if ($category === '2') {

                    $display = $eventCategory->where('id', $categoryId)->where('type', $category)->first()->display;
                    $productabove = 'Over';
                    $productunder = 'Under';

                    $choose = ${'product' . $valueDetail->type};
                } else if ($category === '3') {
                    $product = $valET->events->team_left->name . " " . $valueDetailBetRule->team_left . " - " . $valueDetailBetRule->team_right . " " . $valET->events->team_right->name;
                    $choose = $product;
                } else if ($category === '4') {
                    $choose = $valueDetailBetRule->name;
                }
                $valET->choose = $choose;
                array_push($arrUser, $valET);
            }
        }

        $page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;
        $total = count($arrUser); //total items in array    
        $limit = 100; //per page    
        $totalPages = ceil($total / $limit); //calculate total pages
        $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
        $page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
        $offset = ($page - 1) * $limit;
        if ($offset < 0) $offset = 0;

        $arrUser = array_slice($arrUser, $offset, $limit);

        $arrView = [
            'all_events'        => $allEvents,
            'current_events'    => $currentEvent,
            'total_bp_all'      => $totalBPAll,
            'data_user'         => $arrUser,
            'total_pages'       => $totalPages,
            'total_data'        => $total
        ];

        return view('pages.admin.report.member', $arrView);
    }
}
