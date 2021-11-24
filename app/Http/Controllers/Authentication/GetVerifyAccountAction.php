<?php

namespace App\Http\Controllers\Authentication;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Http\Models\Item;
use App\Http\Models\Quest;
use App\Http\Models\SystemMail;
use App\Http\Models\User;
use App\Http\Models\UserLog;
use App\Http\Models\UserQuest;
use App\Http\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetVerifyAccountAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request)
    {
        ini_set('memory_limit', '-1');
        $request->session()->save();
        $token = app('request')->input('token');
        if($token === null) {
            if ($request->otpCode === null) {
                return redirect(url()->previous())->with('failed-verify', 'OTP required');
            }
        }

        $user = User::where('otp_code', $request->otpCode)->first();
        $type = 'phone';
        if(!$user) {
            $user = User::where('token', $token)->first();
            $type = 'email';
        }

        if($user) {
            if(Carbon::now()->format('Y-m-d H:i') > Carbon::parse($user->otp_expired)->format('Y-m-d H:i')) {
                if ($type === 'email') {
                    return redirect(url()->previous())->with('failed-verify', 'This link is expired');
                } else {
                    return redirect(url()->previous())->with('failed-verify', 'OTP code is expired');
                }
            }

            try {
                DB::beginTransaction();

                $itemIcon = asset('img/currencies/coin.svg');
                $itemValue = 10;

                if($type === 'phone') {
                    if($user->phone_verified === '1') {
                        return redirect('/');
                    }
                    $totalUserRegist = User::where('created_at', '>=', Carbon::parse('12-10-2020')->format('Y-m-d'))
                                            ->where('phone_verified_at', '>=', Carbon::parse('12-10-2020')->format('Y-m-d'))
                                            ->count();

                    $currentBP = $user->total_bp;
                    $itemBPId = Item::where('name', 'BP')->pluck('id')->first();

                    $referralCode = GlobalFunction::generateRandomString();
                    $isReferralCodeExist = User::where('referral_code', $referralCode)->first();
                    while ($isReferralCodeExist) {
                        $referralCode = GlobalFunction::generateRandomString();
                        $isReferralCodeExist = User::where('referral_code', $referralCode)->first();
                    }

                    User::where('id', $user->id)->update([
                        'phone_verified' => '1',
                        'phone_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'referral_code' => $referralCode
                    ]);

                    if ($user->email_verified === '1') {

                        $emailQuest = Quest::where('title', 'Verifikasi email')->where('active', '1')->first();
                        if($emailQuest) {
                            $userQuest = UserQuest::where('user_id', $user->id)->where('quest_id', $emailQuest->id)->first();
                            if (!$userQuest) {
                                $questDetail = json_decode($emailQuest->value_detail);
                                $itemCoinId = Item::where('name', $questDetail->item)->pluck('id')->first();
                                $totalCoin = $user->total_coin;
                                $valueQuest = $questDetail->value;
                                $totalCoin += $valueQuest;
                                UserQuest::create([
                                    'user_id' => $user->id,
                                    'quest_id' => $emailQuest->id,
                                ]);

                                UserTransaction::create([
                                    'user_id'   => $user->id,
                                    'item_id'   => $itemCoinId,
                                    'value'     => $valueQuest,
                                    'type'      => 'CR',
                                    'desc'      => '[Quest Achieve] ' . $emailQuest->title
                                ]);

                                User::where('id', $user->id)->update([
                                    'total_coin'  => $totalCoin
                                ]);

                                $message = "<h3 class='rajdhani-bold font-size-32 mb-20'>Quest Selesai</h3>" .
                                "<p class='grey-10'>Selamat, kamu telah menyelesaikan quest <span class='white-10'>" . $emailQuest->title . "</span> dengan hadiah <span class='money money-14 right money-inline white-10'>" . $valueQuest . "<img src='" . asset('img/currencies/coin.svg') . "'></span></p>";

                                $sys = new SystemMail();
                                $sys->user_id = $user->id;
                                $sys->title = 'Terima kasih telah bergabung dengan Timkamu.';
                                $sys->subject = 'Quest Selesai';
                                $sys->message = $message;
                                $sys->save();

                                $type .= 'email';
                            }
                        }
                    }

                    $referralCodeFrom = $user->referral_code_from;
                    $totalReferralUsed = User::whereNotNull('referral_code')->whereNotNull('referral_code_from')->count();
                    if($referralCodeFrom && $totalReferralUsed <= 2500) {
                        // update 8 BP for refers
                        $message = "<h3 class='rajdhani-bold font-size-32 mb-20'>Hadiah kode referral</h3>" .
                        "<p class='grey-10'>Selamat, input kode referral berhasil dan kamu mendapat <span class='money money-14 right money-inline white-10'>8<img src='" . asset('img/currencies/bp.svg') . "'></span></p>";

                        $sys = new SystemMail();
                        $sys->user_id = $user->id;
                        $sys->title = 'Terima kasih telah bergabung dengan Timkamu.';
                        $sys->subject = 'Hadiah kode referral';
                        $sys->message = $message;
                        $sys->save();

                        UserTransaction::create([
                            'user_id'   => $user->id,
                            'item_id'   => $itemBPId,
                            'value'     => 8,
                            'type'      => 'CR',
                            'desc'      => 'Hadiah kode referral'
                        ]);

                        $currentBP += 8;
                        User::where('id', $user->id)->update([
                            'total_bp' => $currentBP
                        ]);
                    }
                } else {
                    if ($user->email_verified === '1') {
                        return redirect('/');
                    }
                    User::where('id', $user->id)->update(['email_verified' => '1', 'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')]);

                    $totalCoin = $user->total_coin;
                    $emailQuest = Quest::where('title', 'Verifikasi email')->where('active', '1')->first();
                    if($emailQuest){
                        $itemCoinId = Item::where('name', 'coin')->pluck('id')->first();
                        $userQuest = UserQuest::where('user_id', $user->id)->where('quest_id', $emailQuest->id)->first();
                        if (!$userQuest) {
                            $valueQuest = json_decode($emailQuest->value_detail)->value;
                            $totalCoin += $valueQuest;
                            UserQuest::create([
                                'user_id' => $user->id,
                                'quest_id' => $emailQuest->id,
                            ]);

                            UserTransaction::create([
                                'user_id'   => $user->id,
                                'item_id'   => $itemCoinId,
                                'value'     => $valueQuest,
                                'type'      => 'CR',
                                'desc'      => '[Quest Achieve] ' . $emailQuest->title
                            ]);

                            User::where('id', $user->id)->update([
                                'total_coin'  => $totalCoin
                            ]);

                            $message = "<h3 class='rajdhani-bold font-size-32 mb-20'>Quest Selesai</h3>" .
                                "<p class='grey-10'>Selamat, kamu telah menyelesaikan quest <span class='white-10'>" . $emailQuest->title . "</span> dengan hadiah <span class='money money-14 right money-inline white-10'>" . $valueQuest . "<img src='" . asset('img/currencies/coin.svg') . "'></span></p>";

                            $sys = new SystemMail();
                            $sys->user_id = $user->id;
                            $sys->title = 'Terima kasih telah bergabung dengan Timkamu.';
                            $sys->subject = 'Quest Selesai';
                            $sys->message = $message;
                            $sys->save();

                            $type .= 'quest';
                        }
                    }

                }
                $phoneQuest = Quest::where('title', 'Verifikasi nomor handphone')->where('active' ,'=','1')->first();

                if($phoneQuest){

                    $questDetail = json_decode($phoneQuest->value_detail);

                    if(Carbon::parse($user->created_at)->greaterThanOrEqualTo($questDetail->start) && $questDetail->progress > 0){

                        $user = $user->refresh();

                        $totalItem = 'total_'.$questDetail->item;
                        $itemIcon = asset('img/currencies/'.$questDetail->item.'.svg');
                        $itemValue = $questDetail->value;
                        $totalCoin = $user->{$totalItem};
                        $itemCoinId = Item::where('name', $questDetail->item)->pluck('id')->first();

                        $userQuest = UserQuest::join('quests', 'quests.id', '=', 'user_quests.quest_id')
                            ->where('user_id', $user->id)
                            ->where('title', 'Verifikasi nomor handphone')->first();


                        if (!$userQuest && $user->phone_verified == '1' && $user->email_verified === '1') {
                            $valueQuest = $questDetail->value;
                            $totalCoin += $valueQuest;
                            UserQuest::create([
                                'user_id' => $user->id,
                                'quest_id' => $phoneQuest->id,
                            ]);

                            UserTransaction::create([
                                'user_id'   => $user->id,
                                'item_id'   => $itemCoinId,
                                'value'     => $valueQuest,
                                'type'      => 'CR',
                                'desc'      => '[Quest Achieve] ' . $phoneQuest->title
                            ]);

                            User::where('id', $user->id)->update([
                                'total_'.$questDetail->item  => $totalCoin
                            ]);

                            $message = "<h3 class='rajdhani-bold font-size-32 mb-20'>Quest Selesai</h3>" .
                                "<p class='grey-10'>Selamat, kamu telah menyelesaikan quest <span class='white-10'>" . $phoneQuest->title . "</span> dengan hadiah <span class='money money-14 right money-inline white-10'>" . $valueQuest . "<img src='" . asset('img/currencies/'.$questDetail->item.'.svg') . "'></span></p>";

                            $sys = new SystemMail();
                            $sys->user_id = $user->id;
                            $sys->title = 'Terima kasih telah bergabung dengan Timkamu.';
                            $sys->subject = 'Quest Selesai';
                            $sys->message = $message;
                            $sys->save();

                            $type .= 'quest';

                            $questDetail->progress = $questDetail->progress - 1;

                            $status = '1';
                            if($questDetail->progress == 0){
                                $status = '0';
                            }

                            $questDetail = json_encode($questDetail);
                            $phoneQuest->update([
                                'value_detail' => $questDetail,
                                'active' => $status
                            ]);

                        }
                    }
                }

                UserLog::create([
                    'user_id' => $user->id
                ]);
                Auth::login($user);

                DB::commit();

                return redirect('/')->with('success-verify', $type)->with('icon', $itemIcon)->with('value', $itemValue);
            } catch(\Exception $e) {
                Log::info($e);
                DB::rollBack();

                return redirect(url()->previous())->with('failed-verify', 'Something went wrong. Please try again later!');
            }
        }

        return redirect(url()->previous())->with('failed-verify', 'OTP incorrect');
    }
}
