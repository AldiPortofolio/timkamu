<?php

namespace App\Http\Controllers;

use App\Http\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin2Controller extends Controller
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


    public function dashboard()
    {
        return view('pages.admin2.dashboard');
    }
    public function eventIndex()
    {
        return view('pages.admin2.event-index');
    }
    public function eventView()
    {
        return view('pages.admin2.event-view');
    }
    public function eventCreate()
    {
        return view('pages.admin2.event-create');
    }
    public function eventBetters()
    {
        return view('pages.admin2.event-betters');
    }
    public function memberIndex()
    {
        return view('pages.admin2.member-index');
    }
    public function memberView()
    {
        return view('pages.admin2.member-view');
    }
    public function reports()
    {
        return view('pages.admin2.reports');
    }
    public function eventPerformance()
    {
        return view('pages.admin2.event-performance');
    }
    public function eventPerformanceRange()
    {
        return view('pages.admin2.event-performance-range');
    }
    public function reportLp()
    {
        return view('pages.admin2.report-lp');
    }
    public function reportLpCirculation()
    {
        return view('pages.admin2.report-lp-circulation');
    }
    public function reportLpTransactions()
    {
        return view('pages.admin2.report-lp-transactions');
    }
    public function reportLpPerMember()
    {
        return view('pages.admin2.report-lp-per-member');
    }
    public function reportMemberOverview()
    {
        return view('pages.admin2.report-member-overview');
    }
    public function reportTopups()
    {
        return view('pages.admin2.report-topups');
    }
    public function reportPulsa()
    {
        return view('pages.admin2.report-pulsa');
    }
    public function topupOverview()
    {
        return view('pages.admin2.topup-overview');
    }
    public function topupVolume()
    {
        return view('pages.admin2.topup-volume');
    }
    public function topupPerMember()
    {
        return view('pages.admin2.topup-per-member');
    }
    public function memberHistorical()
    {
        return view('pages.admin2.member-historical');
    }
    public function quests()
    {
        return view('pages.admin2.quests');
    }
    public function promoIndex()
    {
        return view('pages.admin2.promo-index');
    }
    public function promoViewDiskon25()
    {
        return view('pages.admin2.promo-view-diskon25');
    }
    public function promoViewCashback10()
    {
        return view('pages.admin2.promo-view-cashback10');
    }
    public function stats()
    {
        return view('pages.admin2.stats');
    }
    // Route::get('tournament-index', 'Admin2Controller@tournamentIndex');
    // Route::get('tournament-view', 'Admin2Controller@tournamentView');
    public function tournamentIndex()
    {
        return view('pages.admin2.tournament-index');
    }
    public function tournamentView()
    {
        return view('pages.admin2.tournament-view');
    }
    public function exports()
    {
        return view('pages.admin2.exports');
    }
}
