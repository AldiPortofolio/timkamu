<?php

namespace App\Providers;

use App\Http\Models\AdminAccount;
use App\Http\Models\AdminMenuGrant;
use App\Http\Models\Event;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Quest;
use App\Http\Models\Rank;
use App\Http\Models\SystemMail;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use App\Http\Models\UserQuest;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            $allEvents = Event::get();
            $silverRank = Rank::where('name', 'like', 'SILVER%')->pluck('id')->first();
            $totalLP = 0;
            $totalBP = 0;
            $totalCoin = 0;
            $totalExp = 0;
            $nextRank = '';
            $currentRank = '';
            $user = null;
            $newSysEmail = 0;
            $prediction = 0;
            $correctPrediction = 0;
            $arrQuests = Quest::whereIn('active', ['1'])->get();
            $arrQuestsDone = [];
            $BPQuest = false;
            $coinQuest = false;
            $referralCode = '';
            $totalReferralCodeUsed = 2500 - (User::whereNotNull('referral_code')->whereNotNull('referral_code_from')->count());
            $totalReferredCodeUsed = 2500 - (User::whereNotNull('referral_code')->whereNotNull('referral_code_from')->where('is_referral_used', '1')->count());
            $totalReferralCodeRemaining = $totalReferredCodeUsed + $totalReferralCodeUsed;

            if(Auth::user()) {
                $totalLP = Auth::user()->total_lp;
                $totalBP = Auth::user()->total_bp;
                $totalCoin = Auth::user()->total_coin;
                $totalExp = Auth::user()->total_exp;
                $referralCode = Auth::user()->referral_code;
                $maxExp = Rank::select('value')->orderBy('value', 'desc')->pluck('value')->first();
                $nextRank = Rank::where('id', (Auth::user()->rank_id + 1))->first();
                if((int)$totalExp >= (int)$maxExp) {
                    $nextRank = Rank::orderBy('id', 'desc')->first();
                }
                $currentRank = Auth::user()->ranks;
                $user = User::find(Auth::id());

                $newSysEmail = SystemMail::where('user_id', Auth::id())
                                    ->where(function ($query) {
                                        $query->orWhere('status', '0');
                                        $query->orWhere('status', '2');
                                    })->count();

                $eventTransaction = EventTransaction::where('status', '<>', '1')->where('user_id', $user->id)->get();
                $prediction = $eventTransaction->count();
                $correctPrediction = $eventTransaction->where('type', 'WIN')->count();

                // get user quest
                foreach($arrQuests as $idx => $quest) {
                    $questDetail = json_decode($quest->value_detail);
                    $quest->value = $questDetail->value;
                    $quest->progress = $questDetail->progress ?? 0;
                    $quest->item = $questDetail->item ?? 'coin' ;

                    // initialize for user
                    $quest->user_value = 0;
                    $quest->user_progress = 0;

                    $userQuests = UserQuest::where('user_id', $user->id)->where('quest_id', $quest->id)->first();
                    if($quest->title === 'Verifikasi nomor handphone'){
                        $userQuests = UserQuest::join('quests', 'quests.id', '=', 'user_quests.quest_id')
                            ->where('user_id', $user->id)->where('title', 'Verifikasi nomor handphone')
                            ->first();
                    }
                    if($userQuests) {
                        if($quest->type === 'ONCE') {
                            array_push($arrQuestsDone, $quest);
                            $arrQuests->forget($idx);
                            $coinQuest = true;
                        } elseif($quest->type === 'REPEATABLE') {
                            $decode = json_decode($userQuests->value_detail);
                            $quest->user_value = $decode->value;
                            if($decode->value > 0) {
                                $coinQuest = true;
                            }
                        } elseif($quest->type === 'REPEAT_PROGRESS') {
                            $quest->progress = $questDetail->progress;
                            $decode = json_decode($userQuests->value_detail);
                            $quest->user_value = $decode->value;
                            if($decode->value > 0) {
                                $coinQuest = true;
                            }
                            $quest->user_progress = $decode->progress;
                        } elseif ($quest->type === 'ONCE_PROGRESS') {
                            $quest->progress = $questDetail->progress;
                            $decode = json_decode($userQuests->value_detail);
                            $quest->user_progress = $decode->progress;
                            if($decode->progress >= $quest->progress) {
                                array_push($arrQuestsDone, $quest);
                                $BPQuest = true;
                                $coinQuest = true;
                                $arrQuests->forget($idx);
                            }
                        }
                    }
                }
            }

            $totalUserRegist = User::where('created_at', '>=', Carbon::parse('12-10-2020')->format('Y-m-d'))
                ->where('phone_verified_at', '>=', Carbon::parse('11-10-2020')->format('Y-m-d'))
                ->count();
            $totalRegistBonusRemaining = 1500 - $totalUserRegist;


            // nav featured
            // get all events
            $dataEvents = Event::where('type', '<>', 'DONE')->get();

            $arrEvent = [];
            $arrEvent['np'] = [];
            $arrEvent['mlbb'] = [];
            $arrEvent['freefire'] = [];
            $arrEvent['pubgm'] = [];
            $arrEvent['lol'] = [];
            foreach ($dataEvents as $key => $value) {
                // $eventTransaction = EventBetRule::where('event_id', $value->id)->where('active', '1')->get();
                // if (count($eventTransaction) > 0) {
                // }

                if ($value->league_game_id) {
                    if ($value->type === 'ONGOING') {
                        array_push($arrEvent['np'], $value);
                    } else {
                        if ($value->league_games->game_id === 1) {
                            array_push($arrEvent['mlbb'], $value);
                        } elseif ($value->league_games->game_id === 2) {
                            array_push($arrEvent['freefire'], $value);
                        } elseif ($value->league_games->game_id === 3) {
                            array_push($arrEvent['pubgm'], $value);
                        } elseif ($value->league_games->game_id === 4) {
                            array_push($arrEvent['lol'], $value);
                        }
                    }
                }
            }

            $totalRemainingPhoneNumberVerified = 0;
            $phoneQuest = Quest::where('title', 'Verifikasi nomor handphone')->where('active' ,'=','1')->first();
            if($phoneQuest !== null){
                $detailQuest = json_decode($phoneQuest->value_detail);
                $totalRemainingPhoneNumberVerified = $detailQuest->progress;
            }


            $arrView = [
                'all_events' => $allEvents,
                'current_rank' => $currentRank,
                'next_rank' => $nextRank,
                'silver_rank' => $silverRank,
                'sys_email' => $newSysEmail,
                'total_exp' => $totalExp,
                'total_lp' => $totalLP,
                'total_bp' => $totalBP,
                'total_coin' => $totalCoin,
                'user'     => $user,
                'prediction'    => $prediction,
                'correct_prediction' => $correctPrediction,
                'total_regist_bonus_remaining' => $totalRegistBonusRemaining,
                'array_event'   => $arrEvent,
                'quests'        => $arrQuests,
                'quest_done'    => $arrQuestsDone,
                'bp_quest_done' => $BPQuest,
                'coin_quest_done' => $coinQuest,
                'referral_code' => $referralCode,
                'total_referral_code_remaining' => $totalReferralCodeRemaining,
                'total_verified_phone_remaining' => $totalRemainingPhoneNumberVerified,
            ];


            $view->with($arrView);
        });

        View::composer('includes.admin.sidebar', function ($view) {
            $dataStaff = AdminAccount::get();
            $user = Auth::guard('admin')->user();
            $menuGrant = '';

            $itemIdGame = Item::whereIn('type', ['mlbb', 'pubgm', 'freefire'])->select('id')->get()->pluck('id')->toArray();
            $itemIdConversionGame = ItemConversion::whereIn('child_id', $itemIdGame)->select('id')->get()->pluck('id')->toArray();
            $totalTransactionGame = Transaction::whereIn('item_id', $itemIdConversionGame)->where('status', 'PAID')->count();

            $itemIdPulsa = Item::whereIn('type', ['telkomsel', 'xl', 'tri',  'google-play'])->where('name', 'like', '%IDR%')->select('id')->get()->pluck('id')->toArray();
            $itemIdConversionPulsa = ItemConversion::whereIn('child_id', $itemIdPulsa)->select('id')->get()->pluck('id')->toArray();
            $totalTransactionPulsa = Transaction::whereIn('item_id', $itemIdConversionPulsa)->where('status', 'PAID')->count();

            $itemIdToken = Item::where('type', 'token')->select('id')->get()->pluck('id')->toArray();
            $itemIdConversionToken = ItemConversion::whereIn('child_id', $itemIdToken)->select('id')->get()->pluck('id')->toArray();
            $totalTransactionToken = Transaction::whereIn('item_id', $itemIdConversionToken)->where('status', 'PAID')->count();

            if($user) {
                $adminMenuGrants = AdminMenuGrant::where('admin_id', $user->id)->get();
                if($user->role_id !== 1 && $user->role_id !== 2) {
                    $menuGrant = $adminMenuGrants->first()->menus->name;
                }

                $arrView = [
                    'role'       => $user->role_id,
                    'menu_grant' => $menuGrant,
                    'menu_permission' => $adminMenuGrants,
                    'data_staff' => $dataStaff,
                    'total_game' => $totalTransactionGame,
                    'total_pulsa' => $totalTransactionPulsa,
                    'total_token' => $totalTransactionToken,
                ];

                $view->with($arrView);
            }
        });
    }
}
