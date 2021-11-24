<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventTransaction;
use App\Http\Models\User;
use App\Http\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GetResultEventDetailUserAction extends Controller
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
    public function __invoke($id)
    {
        ini_set('memory_limit', '-1');
        
        $event = Event::find($id);
        
        $eventTransaction = EventTransaction::where('event_id', $id)->where('user_id', Auth::id())->get();
        $eventTransaction->team_left = array_sum($eventTransaction->where('team_id', $event->team_left_id)->pluck('value')->toArray());
        $eventTransaction->team_right = array_sum($eventTransaction->where('team_id', $event->team_right_id)->pluck('value')->toArray());

        $arrView = [
            'event' => $event,
            'event_transaction' => $eventTransaction
        ];

        return view('pages.profiles.hasildetail', $arrView);
    }
}
