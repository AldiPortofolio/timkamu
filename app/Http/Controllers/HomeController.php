<?php

namespace App\Http\Controllers;

use App\Http\Models\Event;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Shop;
use App\Http\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    public function index()
    {
        ini_set('memory_limit', '-1');
//        $event = Event::where('type', '<>', 'DONE')->orderBy('start_date', 'asc')->get();
//        foreach($event as $value) {
//            $currentTime = Carbon::now();
//
//            $expiredTime = Carbon::parse($value->start_date)->addHour(4);
//
//            // if(Carbon::now()->format('Y-m-d H:i') > $expiredTime->format('Y-m-d H:i')) {
//            //     Event::where('id', $value->id)->update(['type' => 'DONE']);
//            // }
//        }

        $event = Event::join('league_games', 'league_games.id','=', 'events.league_game_id')
            ->join('leagues', 'leagues.id', '=', 'league_games.league_id')
            ->join('games', 'games.id', '=', 'league_games.game_id')
            ->select('events.*', 'leagues.name as league_games_name', 'league_games.game_id', 'games.logo as game_logo')
            ->with(['team_left', 'team_right'])
            ->where('events.type', '<>', 'DONE')->orderBy('events.start_date', 'asc')
            ->get()
            ->each(function ($item, $index){
                $startDate = Carbon::parse($item->start_date);
                $item->formatted_date = $startDate->copy()->format('d');
                $item->formatted_month = $startDate->copy()->format('M');
                $item->formatted_time = $startDate->copy()->format('H:i');
                if(in_array($item->game_id, [2,3])){
                    $teams = collect(json_decode($item->team_detail, true))->pluck('team_id')->slice(0,3)->toArray();
                    $item->teams = Team::whereIn('id', $teams)->get();
                }
            });

        $shops = Shop::get();

        $arrView = [
            'events' => $event,
            'shops' => $shops
        ];
        return view('pages.index', $arrView);
    }

    public function faq()
    {
        ini_set('memory_limit', '-1');
        return view('pages.mana.faq');
    }

    public function otp()
    {
        ini_set('memory_limit', '-1');
        return view('pages.otp');
    }

    /**
     * Show the resend verify page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function resendVerify()
    {
        ini_set('memory_limit', '-1');
        return view('pages.resend-verify');
    }

    public function ranks()
    {
        ini_set('memory_limit', '-1');
        return view('pages.ranks');
    }

    public function promo()
    {
        ini_set('memory_limit', '-1');
        return view('pages.promo');
    }

    public function past()
    {
        return view('pages.past');
    }

    public function upcoming()
    {
        return view('pages.upcoming');
    }

    public function backpack()
    {
        return view('pages.backpack');
    }

    public function hasil()
    {
        return view('pages.hasil');
    }

    public function hasildetail()
    {
        return view('pages.hasildetail');
    }

    public function live()
    {
        return view('pages.live');
    }

    public function systemMail()
    {
        ini_set('memory_limit', '-1');
        return view('pages.system-mail');
    }

    public function resetPassword()
    {
        ini_set('memory_limit', '-1');
        return view('pages.reset-password');
    }

    public function pastEvent()
    {
        return view('pages.past-event');
    }



    public function splash()
    {
        return view('pages.splash');
    }

    public function eventIndex()
    {
        return view('pages.mana.event-index');
    }

    public function eventView()
    {
        return view('pages.mana.event-view');
    }

    public function newHome()
    {
        return view('pages.mana.home');
    }

    public function newRegistration()
    {
        return view('pages.mana.sign-up');
    }



    public function newSignin()
    {
        return view('pages.mana.sign-in');
    }
    public function notFound()
    {
        return view('pages.mana.404');
    }
    public function topUpMlbb()
    {
        return view('pages.mana.top-up-mlbb');
    }
    public function topUpPubgm()
    {
        return view('pages.mana.top-up-pubgm');
    }
    public function topUpFreefire()
    {
        return view('pages.mana.top-up-freefire');
    }
    public function topUpValorant()
    {
        return view('pages.mana.top-up-valorant');
    }
    public function topUpRet()
    {
        return view('pages.mana.top-up-ret');
    }
    public function topUpGooglePlay()
    {
        return view('pages.mana.top-up-googleplay');
    }



    public function topUpIndex()
    {
        return view('pages.mana.top-up-index');
    }
    public function myProfile()
    {
        return view('pages.mana.my-profile');
    }
    public function systemMailMana()
    {
        return view('pages.mana.system-mail');
    }
    public function rechargeLp()
    {
        return view('pages.mana.recharge-lp');
    }
    public function newResetPassword()
    {
        return view('pages.mana.reset-password');
    }
    public function otpResend()
    {
        return view('pages.mana.otp-resend');
    }
    public function outright()
    {
        return view('pages.mana.outright');
    }
    public function tournaments()
    {
        return view('pages.mana.tournaments');
    }
    public function tournamentsView()
    {
        return view('pages.mana.tournaments-view');
    }


    public function myLpBpTransactions()
    {
        return view('pages.mana.my-lpbp-transactions');
    }
    public function promotions()
    {

        return view('pages.mana.promotions');
    }
    public function teamIndex()
    {
        return view('pages.mana.team-index');
    }
    public function teamView()
    {
        return view('pages.mana.team-view');
    }


    // isi pulsa
    public function isiPulsaIndex()
    {
        return view('pages.mana.isi-pulsa-index');
    }
    public function isiPulsaTelkomsel()
    {
        return view('pages.mana.isi-pulsa-telkomsel');
    }
    public function isiPulsaXl()
    {
        return view('pages.mana.isi-pulsa-xl');
    }
    public function isiPulsaTri()
    {
        return view('pages.mana.isi-pulsa-tri');
    }


    // rumah tangga
    public function rumahTanggaIndex()
    {
        return view('pages.mana.rumah-tangga-index');
    }
    public function rumahTanggaPln()
    {
        return view('pages.mana.rumah-tangga-pln');
    }

    public function exports()
    {
        return view('pages.admin.exports.exports');
    }
}
