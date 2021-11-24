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
use App\Http\Models\TeamMember;
use App\Http\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetAllDataEventAction extends Controller
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
        $result['status'] = 'success';

        // initialize month
        $startMonth = Carbon::now()->format('m');
        // $endMonth = Carbon::now()->addMonth(3)->format('m');

        // get all events
        $event = new Event();
        $dataEvents = $event->select('id', 'type', 'team_left_score', 'team_right_score')
            ->orderBy('start_date', 'asc')
            ->get();

        $result['events'] = $dataEvents;

        return $result;
    }
}
