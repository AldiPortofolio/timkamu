<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetRule;
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

class PostEventSupportTemporaryAction extends Controller
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
    public function __invoke(Request $request, $id)
    {
        $result = [];
        $result['status'] = 'success';

        if(!Auth::user()) {
            $result['status'] = 'error';
            $result['message'] = 'need login';

            return $result;
        }

        if(Auth::user()->phone_verified === '0') {
            $result['status'] = 'error';
            $result['message'] = 'need verify';

            return $result;
        }
        
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

        $rules = EventBetRule::find($request->id_bingo);
        $detail = json_decode($rules->value_detail);
        $bonus = $detail->{$request->type_bingo};

        $valueDetail = [
            'type'  => $request->type_bingo,
            'bonus' => $bonus
        ];

        $latestId = EventTransaction::max('id') + 1;
        $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);
        $eventTransactionExist = EventTransaction::where('event_id', $id)->where('user_id', Auth::id())->first();
        if($eventTransactionExist) {
            $transactionNumber = $eventTransactionExist->transaction_number;
        }

        try {
            DB::beginTransaction();

            $data = new EventTransaction();
            $data->event_id = $id;
            $data->event_bet_id = $request->id_bingo;
            $data->user_id = Auth::id();
            $data->value_detail = json_encode($valueDetail);
            $data->transaction_number = $transactionNumber;
            $data->status = '1';
            $data->save();

            $result['id'] = $data->id;

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
