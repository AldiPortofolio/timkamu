<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use App\Http\Models\SystemMail;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetDeleteEventAction extends Controller
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
            return 'error';
        }

        $event = Event::find($id);

        if ($event) {
            try {
                DB::beginTransaction();
                $eventBetCategory = EventBetCategory::where('event_id', $id)->get();

                foreach ($eventBetCategory as $key => $ebc) {
                    $eventBetRule = EventBetRule::where('event_bet_category_id', $ebc->id)
                    ->select('id')
                    ->get()
                    ->pluck('id')
                    ->toArray();

                    $userEventTransactions = EventTransaction::whereIn('event_bet_id', $eventBetRule)
                    ->where('status', 2)
                    ->select('user_id')
                    ->get()
                    ->pluck('user_id')
                    ->toArray();

                    // calculating bet
                    $userET = array_unique($userEventTransactions);
                    foreach ($userET as $key => $value) {
                        $totalRefund = 0;
                        $message = '';

                        $valueEventTransactions = EventTransaction::whereIn('event_bet_id', $eventBetRule)
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
                                $productName = 'Team ' . $ebc->events->{$valueDetail->type}->name;
                            } else if ($category === '2') {
                                $productName = $valueDetail->type . ' ' . $valueDetailBetRule->total;
                            } else if ($category === '3') {
                                $productName = strtoupper($ebc->events->team_left->alias) . ' ' . $valueDetailBetRule->team_left . ' - ' . strtoupper($ebc->events->team_right->alias) . ' ' . $valueDetailBetRule->team_right;
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
                                "Berikut adalah rincian pengembalian dari Event <span class='system-mail-color-1'>" . $ebc->events->name . ' ' . Carbon::parse($ebc->events->start_date)->format('d F Y H:i') . "</span>.<br>" . strtoupper($ebc->name) . ' - ' . $productName . ' (CANCELED PRODUCT)' .
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
                            'desc'      => '[Refund] ' . $ebc->events->name
                        ]);

                        $currBP = User::where('id', $value)->select('total_bp')->pluck('total_bp')->first();
                        User::where('id', $value)->update([
                            'total_bp' => $currBP + $totalRefund
                        ]);
                    }

                    EventTransaction::whereIn('event_bet_id', $eventBetRule)->where('status', 1)->delete();

                    EventBetRule::where([
                        'event_bet_category_id' => $ebc->id
                    ])->delete();
                }

                EventBetCategory::where([
                    'event_id' => $id
                ])->delete();

                Event::where([
                    'id' => $id
                ])->delete();

            } catch (\Exception $e) {
                Log::info($e->getMessage());
                DB::rollback();
                return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer')->withInput();
            }

            DB::commit();
            return redirect(url()->previous())->with('success', 'Data deleted');
        }

        return redirect('admin-tkmu/events/' . $id)->with('failed', 'Event not found');
    }
}
