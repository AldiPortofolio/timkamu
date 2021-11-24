<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\Quest;
use App\Http\Models\Role;
use App\Http\Models\SystemMail;
use App\Http\Models\User;
use App\Http\Models\UserQuest;
use App\Http\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthProviderController extends Controller
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
    public function __invoke($type)
    {
        ini_set('memory_limit', '-1');
        try {
            $user = Socialite::driver($type)->user();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect('/sign-in')->with('failed', 'failed-login');
        }
        
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            // log them in
            Auth::login($existingUser, true);

            $totalCoin = $existingUser->total_coin;
            $itemCoinId = Item::where('name', 'coin')->pluck('id')->first();
            $emailQuest = Quest::where('title', 'Verifikasi email')->where('active', '1')->first();
            if ($existingUser->email_verified === '1' && $emailQuest) {
                $userQuest = UserQuest::where('user_id', $existingUser->id)->where('quest_id', $emailQuest->id)->first();
                if (!$userQuest) {
                    $valueQuest = json_decode($emailQuest->value_detail)->value;
                    $totalCoin += $valueQuest;
                    UserQuest::create([
                        'user_id' => $existingUser->id,
                        'quest_id' => $emailQuest->id,
                    ]);

                    UserTransaction::create([
                        'user_id'   => $existingUser->id,
                        'item_id'   => $itemCoinId,
                        'value'     => $valueQuest,
                        'type'      => 'CR',
                        'desc'      => '[Quest Achieve] ' . $emailQuest->title
                    ]);

                    User::where('id', $existingUser->id)->update([
                        'total_coin'  => $totalCoin
                    ]);

                    $message = "<h3 class='rajdhani-bold font-size-32 mb-20'>Quest Selesai</h3>" .
                    "<p class='grey-10'>Selamat, kamu telah menyelesaikan quest <span class='white-10'>" . $emailQuest->title . "</span> dengan hadiah <span class='money money-14 right money-inline white-10'>" . $valueQuest . "<img src='" . asset('img/currencies/coin.svg') . "'></span></p>";

                    $sys = new SystemMail();
                    $sys->user_id = $existingUser->id;
                    $sys->title = 'Terima kasih telah bergabung dengan Timkamu.';
                    $sys->subject = 'Quest Selesai';
                    $sys->message = $message;
                    $sys->save();

                    $type .= 'email';
                }
            }
        } else {
            try{
                $maxUserId = DB::table('users')->max('id');
                $accountNumber = Carbon::now()->format('dmy') . str_pad(($maxUserId + 1), 4, 0, STR_PAD_LEFT);
                $roleId = Role::where('name', 'USER')->pluck('id')->first();

                $otpCode = rand(111111, 999999);
                $token = Hash::make($otpCode);

                // create a new user
                $newUser                    = new User;
                $newUser->role_id           = $roleId;
                $newUser->username          = $user->name;
                $newUser->email             = $user->email;
                $newUser->provider          = $type;
                $newUser->provider_id       = $user->id;
                $newUser->account_number    = $accountNumber;
                $newUser->otp_code          = $otpCode;
                $newUser->otp_expired       = Carbon::now()->addMinute(30);
                $newUser->token             = $token;
                $newUser->email_verified    = '1';
                $newUser->email_verified_at = Carbon::now();

                $newUser->save();
                Auth::login($newUser, true);

                return redirect('/setup-account/resend-verify?token='.$token);
            } catch (\Exception $e) {
                Log::info($e->getMessage());

                return redirect('/sign-in')->with('failed', 'failed-login');
            }
        }
        return redirect('/')->with('success-quest', $type);
    }

    public function redirect()
    {
        $provider = app('request')->input('provider');
        return Socialite::driver($provider)->redirect();
    }
}
