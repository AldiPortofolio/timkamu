<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\EventBookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetEventBookmarkAction extends Controller
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
        ini_set('memory_limit', '-1');
        
        $bookmarkedEvent = EventBookmark::where('event_id', $id)->where('user_id', Auth::id())->first();

        if($bookmarkedEvent) {
            return redirect(url()->previous())->with('failed', 'event-bookmarked');
        }

        try {
            DB::beginTransaction();

            EventBookmark::create([
                'event_id'  => $id,
                'user_id'   => Auth::id()
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect(url()->previous())->with('failed', 'failed-bookmark');
        }

        DB::commit();
        return redirect(url()->previous())->with('success', 'success-bookmark');
    }
}
