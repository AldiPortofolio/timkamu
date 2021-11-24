<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Models\EventTransaction;
use App\Http\Models\User;
use App\Http\Models\UserLog;
use App\Http\Models\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GetProfileUserAction extends Controller
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
    public function __invoke(Request $request)
    {
        ini_set('memory_limit', '-1');
        
        $user = Auth::user();
        $lastLogin = UserLog::where('user_id', $user->id)->orderBy('id', 'desc')->pluck('created_at')->first();

        $eventTransaction = EventTransaction::where('status', '<>', '1')->where('user_id', $user->id)->get();
        $prediction = $eventTransaction->count();
        $correctPrediction = $eventTransaction->where('type', 'WIN')->count();
        $totalRechargeLP = 0;
        $transactionLP = UserTransaction::where('user_id', $user->id)->where('item_id', 1)->where('type', 'CR')->where('desc', 'like', '%Purchase%')->get()->pluck('value')->toArray();
        if($transactionLP) {
            $totalRechargeLP = array_sum($transactionLP);
        }

        $arrView = [
            'user' => $user,
            'last_login' => $lastLogin,
            'prediction' => $prediction,
            'correct_prediction' => $correctPrediction,
            'total_recharge_lp' => $totalRechargeLP
        ];
        
        return view('pages.profiles.index', $arrView);
    }
}
