<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\League;
use App\Http\Models\Team;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostEventSupportAction extends Controller
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

        if(!Auth::user()) {
            $result['status'] = 'error';
            $result['message'] = 'need login';

            return $result;
        }

        // if(Auth::user()->active === '0') {
        //     $result['status'] = 'error';
        //     $result['message'] = 'need verify';

        //     return $result;
        // }
        
        $event = Event::find($id);
        $itemId = Item::where('name', 'BP')->pluck('id')->first();
        $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
        $itemConversion = ItemConversion::where('parent_id', $itemLPId)->where('child_id', $itemId)->first();
        $currentBP = Auth::user()->total_bp;
        $currentLP = Auth::user()->total_lp;
        $totalSupportBP = $request->team_left_support + $request->team_right_support;
        $totalNeedsBP = $totalSupportBP - $currentBP;

        if($currentBP < $totalSupportBP) {
            $result['status'] = 'error';
            $result['message'] = 'not enough BP';
            $conversion = $totalNeedsBP * $itemConversion->value;
            if($conversion <= $currentLP) {
                $result['message'] = 'convert to LP';
                $result['lp_convert'] = number_format($conversion, 0, '.', ',');
            }
            $result['total_support_bp'] = number_format($totalSupportBP, 0, '.', ',');
            $result['total_bp'] = number_format($totalNeedsBP, 0, '.', ',');
            return $result;
        }

        try {
            DB::beginTransaction();

            if($request->team_left_support > 0) {
                UserTransaction::create([
                    'user_id'   => Auth::user()->id,
                    'item_id'   => $itemId,
                    'value'     => $request->team_left_support,
                    'type'      => 'DB',
                    'desc'      => 'Dukung Tim ' . $event->team_left->name
                ]);

                EventTransaction::create([
                    'event_id'  => $id,
                    'team_id'   => $event->team_left_id,
                    'user_id'   => Auth::user()->id,
                    'value'     => $request->team_left_support
                ]);
            }

            if ($request->team_right_support > 0) {
                UserTransaction::create([
                    'user_id'   => Auth::user()->id,
                    'item_id'   => $itemId,
                    'value'     => $request->team_right_support,
                    'type'      => 'DB',
                    'desc'      => 'Dukung Tim ' . $event->team_right->name
                ]);

                EventTransaction::create([
                    'event_id'  => $id,
                    'team_id'   => $event->team_right_id,
                    'user_id'   => Auth::user()->id,
                    'value'     => $request->team_right_support
                ]);
            }

            User::where('id', Auth::id())->update([
                'total_bp' => $currentBP - $totalSupportBP
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            $result['status'] = 'error';
            $result['message'] = 'something wrong';
            return $result;
        }

        DB::commit();
        return $result;
    }
}
