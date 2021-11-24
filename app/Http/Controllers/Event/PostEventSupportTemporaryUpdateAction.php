<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\EventTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostEventSupportTemporaryUpdateAction extends Controller
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
        
        $event = EventTransaction::find($id);

        $valueDetail = json_decode($event->value_detail);
        if($valueDetail) {
            $valueDetail->value = $request->value;
            $valueDetail->win = floor($request->value * (1 + ($valueDetail->bonus / 100)));
        }

        try {
            DB::beginTransaction();

            EventTransaction::where('id', $id)->update(['value_detail' => json_encode($valueDetail)]);

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();

            $result['status'] = 'error';
            $result['message'] = 'something wrong';
            return $result;
        }

        DB::commit();
        return $result;
    }
}
