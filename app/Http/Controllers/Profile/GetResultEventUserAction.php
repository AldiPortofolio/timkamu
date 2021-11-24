<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Models\EventTransaction;
use App\Http\Models\User;
use App\Http\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GetResultEventUserAction extends Controller
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
        
        $event = EventTransaction::where('user_id', Auth::id())->where('user_id', Auth::id())->get();

        $arrView = [
            'event' => $event
        ];

        return view('pages.profiles.hasil', $arrView);
    }
}
