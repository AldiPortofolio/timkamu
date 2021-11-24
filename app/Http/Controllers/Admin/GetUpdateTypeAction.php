<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetRule;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetUpdateTypeAction extends Controller
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

        $event = Event::find($request->event);
        $eventBetRule = EventBetRule::where('event_id', $request->event)->get();
        try {
            DB::beginTransaction();

            $status = 'ONGOING';
            $enableSupport = '1';
            $enableChat = '1';
            if (app('request')->input('type') === 'past') {
                $status = 'DONE';
                $enableSupport = '0';

                // locked all bet
                foreach ($eventBetRule as $key => $value) {
                    $valueDetail = json_decode($value->value_detail);
                    $type = $value->event_bet_categories->type;
                    if ($type === '1') {
                        $valueDetail->team_left_locked = '1';
                        $valueDetail->team_right_locked = '1';
                    } else {
                        $valueDetail->under_locked = '1';
                        $valueDetail->above_locked = '1';
                    }

                    EventBetRule::where('id', $value->id)->update([
                        'value_detail' => json_encode($valueDetail)
                    ]);
                }
            } else if($event->type === 'ONGOING' || $event->type === 'DRAFT') {
                $status = 'UPCOMING';
                $enableSupport = '1';
            }elseif($request->status === 'unpublish'){
                $status = 'DRAFT';
                $enableSupport = '1';
                $enableChat = '0';
            }

            Event::where('id', $request->event)->update([
                'type' => $status,
                'enable_support' => $enableSupport,
                'enable_chat' => $enableChat
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();

            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer');
        }

        DB::commit();
        return redirect(url()->previous())->with('success', 'Data updated');

    }
}
