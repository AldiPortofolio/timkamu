<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\EventBetCategory;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostEventBetCategoryUpdateAction extends Controller
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
    public function __invoke(Request $request, $id)
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }

        $eventBetCategory = EventBetCategory::find($id);
        
        try {
            DB::beginTransaction();

            $data = [];
            $data['name'] = $request->name ?? $eventBetCategory->name;
            if ($eventBetCategory->type === '1') {
                $data['value'] = $request->teams;
            } else if($eventBetCategory->type === '2') {
                $data['display'] = $request->display;
            }
            
            EventBetCategory::where('id', $id)->update($data);

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollback();
            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer')->withInput();
        }

        DB::commit();
        return redirect(url()->previous())->with('success', 'Data updated');
    }
}
