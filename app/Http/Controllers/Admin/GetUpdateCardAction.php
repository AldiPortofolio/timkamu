<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetUpdateCardAction extends Controller
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
            return redirect('admin-tkmu');
        }

        try {
            DB::beginTransaction();

            Event::where('id', $id)->update([
                'card_detail' => $request->card_detail
            ]);

            $event = Event::find($id);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();

            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer');
        }

        DB::commit();
        return redirect(url()->previous())->with('success', 'Data updated');
    }
}
