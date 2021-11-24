<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetUpdateChatEventAction extends Controller
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
        
        $result = [];
        $result['status'] = 'success';
        $result['message'] = 'Data updated';
        $event = Event::find($id);
        $status = '0';
        if((int)$event->enable_chat === 0) {
            $status = '1';
        }
        
        try {
            DB::beginTransaction();

            Event::where('id', $id)->update(['enable_chat' => $status]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();

            $result['status'] = 'error';
            $result['message'] = 'Something is wrong. Please contact developer';
        }

        DB::commit();
        return $result;

    }
}
