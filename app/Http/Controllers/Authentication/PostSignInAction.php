<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Models\EventTransaction;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class PostSignInAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $data = [
            'secret' => ENV('RECAPTCHA_SERVER_KEY'),
            'response' => $request->get('g-recaptcha-response'),
            'remoteip' => $remoteip
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);
        $resultJson->score = 0.3;
        $resultJson->success = true;
        if ($resultJson->success != true) {
            Log::info(json_encode($resultJson));
            return back()->with('failed', 'Terjadi error. Silahkan coba beberapa saat lagi.')->withInput();
        }
        if ($resultJson->score >= 0.3) {
            $user = User::where('email', strtolower($request->username))->first();
            if($request->remember_me === 'on') {
                $request->remember_me = true;
            } else {
                $request->remember_me = false;
            }

            if ($user) {
                if($user->active === '0') {
                    return redirect('/sign-in')->with('failed', 'Login disabled. Please contact the customer service.');
                }

                $checkPassword = Hash::check($request->password, $user->password);
                if (!$checkPassword) {
                    return redirect('/sign-in')->with('failed', 'Email atau password tidak cocok');
                }

                if ($checkPassword) {
                    try {
                        DB::beginTransaction();

                        UserLog::create([
                            'user_id' => $user->id
                        ]);

                        Auth::login($user, $request->remember_me);

                        DB::commit();

                        return redirect('/');
                    } catch (\Exception $e) {
                        Log::info($e);
                        DB::rollBack();

                        return redirect('/sign-in');
                    }
                }
            }

            return back()->with('failed', 'Email tidak ditemukan');
        } else {
            Log::info(json_encode($resultJson));

            return back()->with('failed', 'Terjadi error. Silahkan coba beberapa saat lagi.');
        }
    }
}
