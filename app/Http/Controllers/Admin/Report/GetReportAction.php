<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventTransaction;
use App\Http\Models\StaticTblEventPerformance;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetReportAction extends Controller
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

        $staticTableEP = [];
        $totalAllIncome = 0;
        $totalAllOutcome = 0;
        if($request->end_date && $request->start_date) {
            $events = Event::select('id')->whereDate('start_date', '<=', $request->end_date)
                ->whereDate('start_date', '>=', $request->start_date)
                ->where('type', 'DONE')
                ->get()
                ->pluck('id')
                ->toArray();

            $staticTableEP = StaticTblEventPerformance::whereIn('event_id', $events)->orderBy('event_id', 'asc')->paginate(100);
        }

        $arrView = [
            'events'        => $staticTableEP
        ];

        return view('pages.admin.report.index', $arrView);
    }
}
