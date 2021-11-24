<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\EventBetCategory;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostEventBetCategoryCreateAction extends Controller
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

        $ebcExist = EventBetCategory::where('event_id', $request->event_id)->orderBy('order_list', 'desc')->first();
        $lastOrder = 0;
        if($ebcExist) {
            $lastOrder = $ebcExist->order_list;
        }
        
        try {
            DB::beginTransaction();

            if($request->type === '1' || $request->type === '2') {
                foreach ($request->categories as $key => $value) {
                    $lastOrder += 10;
                    if($value) {
                        $data = new EventBetCategory();
                        $data->event_id = $request->event_id;
                        $data->name     = $value;
                        $data->type     = $request->type;
                        $data->order_list = $lastOrder;
                        $data->save();
                    }
                }
            } else {
                $lastOrder += 10;
                EventBetCategory::create([
                    'event_id' => $request->event_id,
                    'name'     => $request->name,
                    'type'     => $request->type,
                    'order_list' => $lastOrder
                ]);
            }

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollback();

            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer')->withInput();
        }

        DB::commit();
        return redirect(url()->previous())->with('success', 'Data created');
    }
}
