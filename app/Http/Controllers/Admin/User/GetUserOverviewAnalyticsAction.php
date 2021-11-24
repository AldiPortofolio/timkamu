<?php

namespace App\Http\Controllers\Admin\User;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\SystemMail;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Analytics\Period;
use Analytics;

class GetUserOverviewAnalyticsAction extends Controller
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
    public function __invoke()
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }
        $startDate = app('request')->input('start_date');
        $endDate = app('request')->input('end_date');


        // get data GA
        if (!$startDate) {
            $startDate = Carbon::now()->subDays(7);
        } else {
            $startDate = Carbon::parse($startDate);
        }

        if (!$endDate) {
            $endDate = Carbon::now();
        } else {
            $endDate = Carbon::parse($endDate);
        }

        $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::create($startDate, $endDate));

        $detailAnalyticsData = Analytics::performQuery(
            Period::create($startDate, $endDate),
            'ga:sessions',
            [
                'metrics' => 'ga:users, ga:newUsers, ga:sessions, ga:sessionsPerUser,ga:pageviews, ga:pageviewsPerSession,ga:avgSessionDuration,ga:bounceRate, ga:percentNewSessions, ga:sessionDuration',
            ]
        );

        $detailUsersAnalyticsData = Analytics::performQuery(
            Period::create($startDate, $endDate),
            'ga:sessions',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:userType'
            ]
        );

        $newVisitors = $detailUsersAnalyticsData->rows[0][1];
        $returningVisitors = $detailUsersAnalyticsData->rows[1][1];
        $totalAllVisitors = $newVisitors + $returningVisitors;
        $percentageNewVisitors = 0;
        $percentageReturningVisitors = 0;
        if($totalAllVisitors > 0) {
            $percentageNewVisitors = round(($newVisitors / $totalAllVisitors * 100));
            $percentageReturningVisitors = round(($returningVisitors / $totalAllVisitors * 100));
        }

        $arrView = [
            'analytics_data' => $analyticsData,
            'detail_analytics_data' => $detailAnalyticsData,
            'new_visitors' => $newVisitors,
            'returning_visitors' => $returningVisitors,
            'percentage_new_visitors' => $percentageNewVisitors,
            'percentage_returning_visitors' => $percentageReturningVisitors,
            'start_date' => $startDate,
            'end_date' => $endDate
        ];

        return view('pages.admin.users.overview-analytics', $arrView);
    }
}
