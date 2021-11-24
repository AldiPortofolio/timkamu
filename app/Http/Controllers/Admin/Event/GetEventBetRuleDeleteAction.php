<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use App\Http\Models\SystemMail;
use App\Http\Models\Team;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetEventBetRuleDeleteAction extends Controller
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
    public function __invoke($id)
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }
        
        $eventBetRule = EventBetRule::find($id);

        try {
            DB::beginTransaction();

            $userEventTransactions = EventTransaction::where('event_bet_id', $id)
                ->where('status', 2)
                ->select('user_id')
                ->get()
                ->pluck('user_id')
                ->toArray();

            // calculating bet
            if($userEventTransactions) {
                $userET = array_unique($userEventTransactions);
                foreach ($userET as $key => $value) {
                    $totalRefund = 0;
                    $message = '';

                    $valueEventTransactions = EventTransaction::where('event_bet_id', $id)
                    ->where('user_id', $value)
                    ->where('status', 2)
                        ->select('id', 'user_id', 'transaction_number', 'event_bet_id', 'value_detail')
                        ->get();

                    $transactionNumber = $valueEventTransactions[0]->transaction_number;
                    foreach ($valueEventTransactions as $idx => $valET) {
                        $category = $valET->event_bet_rules->event_bet_categories->type;
                        $valueDetail = json_decode($valET->value_detail);
                        $valueDetailBetRule = json_decode($valET->event_bet_rules->value_detail);
                        $totalRefund += $valueDetail->value;

                        $productName = '';
                        if ($category === '1') {
                            if ($eventBetRule->events->league_games->game_id === '1' || $eventBetRule->events->league_games->game_id === '4') {
                                $productName = 'Team ' . $eventBetRule->events->{$valueDetail->type}->name;
                            } else if ($eventBetRule->events->league_games->game_id === '1' || $eventBetRule->events->league_games->game_id === '4') {
                                $teamName = Team::find($valueDetailBetRule->{$valueDetail->type . '_id'})->name;

                                $productName = 'Team ' . $teamName;
                            }
                        } else if ($category === '2') {
                            $productName = $valueDetail->type . ' ' . $valueDetailBetRule->total;
                        } else if ($category === '3') {
                            $productName = strtoupper($eventBetRule->events->team_left->alias) . ' ' . $valueDetailBetRule->team_left . ' - ' . strtoupper($eventBetRule->events->team_right->alias) . ' ' . $valueDetailBetRule->team_right;
                        }

                        EventTransaction::where('id', $valET->id)->update([
                            'status' => '3',
                            'type'   => NULL
                        ]);

                        $message = "<div class='system-msg-content-head'>" .
                        "<div class='system-msg-content-title'>" .
                        "Product Cancel Refund" .
                        "</div>" .
                            "<div class='system-msg-content-message'>" .
                            "<p class='opacity-05'>[Order ID: " . $transactionNumber . "]</p>" .
                            "Berikut adalah rincian pengembalian dari Event <span class='system-mail-color-1'>" . $eventBetRule->events->name . ' ' . Carbon::parse($eventBetRule->events->start_date)->format('d F Y H:i') . "</span>.<br>" . strtoupper($eventBetRule->event_bet_categories->name) . ' - ' . $productName . ' (CANCELED PRODUCT)' .
                            "</div>" .
                            "</div>" .
                            "<div class='system-msg-content-additional'>" .
                            "<div class='system-msg-content-additional-title'>" .
                            "Rincian pengembalian" .
                            "</div>" .
                            "<div class='system-msg-content-additional-message'>" .
                            "<div class='system-mail-item-group'>" .
                            "<div class='system-msg-item-box'>" .
                            "<img src='" . asset('img/currencies/bp.svg') . "' class='icon'>" .
                            "<span>" . $valueDetail->value . "</span>" .
                            "</div>" .
                            "</div>" .
                            "</div>" .
                            "</div>";

                        $sys = new SystemMail();
                        $sys->user_id = $value;
                        $sys->title = 'Refund BP';
                        $sys->subject = 'Pengembalian BP';
                        $sys->message = $message;
                        $sys->save();
                    }

                    // refund BP
                    UserTransaction::create([
                        'user_id'   => $value,
                        'item_id'   => 2,
                        'value'     => $totalRefund,
                        'type'      => 'CR',
                        'desc'      => '[Refund] ' . $eventBetRule->events->name
                    ]);

                    $currBP = User::where('id', $value)->select('total_bp')->pluck('total_bp')->first();
                    User::where('id', $value)->update([
                        'total_bp' => $currBP + $totalRefund
                    ]);
                }
            }

            EventTransaction::where('event_bet_id', $id)->where('status', 1)->delete();

            EventBetRule::where('id', $id)->delete();

        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();
            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer')->withInput();
        }

        DB::commit();
        return redirect(url()->previous())->with('success', 'Data deleted');
    }
}
