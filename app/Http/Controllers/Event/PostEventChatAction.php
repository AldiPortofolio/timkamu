<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventChat;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\League;
use App\Http\Models\Team;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostEventChatAction extends Controller
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
    public function __invoke(Request $request, $id)
    {
        $result = [];
        $result['status'] = 'success';

        $event = Event::find($id);
        if((int)$event->enable_chat === 1) {
            try {
                DB::beginTransaction();

                EventChat::create([
                    'event_id'  => $id,
                    'user_id'   => Auth::id(),
                    'message'   => $request->message,
                ]);
            } catch (\Exception $e) {
                DB::rollBack();

                $result['status'] = 'error';
                $result['message'] = $e->getMessage();
                return $result;
            }

            DB::commit();
        }

        return $result;
    }
}
