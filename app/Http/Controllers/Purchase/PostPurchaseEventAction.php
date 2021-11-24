<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Rank;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostPurchaseEventAction extends Controller
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
        $itemId = Item::where('name', 'LP')->pluck('id')->first();
        $currentLP = Auth::user()->total_lp;
        $currentExp = Auth::user()->total_exp;
        $currentRank = Auth::user()->rank_id;

        $result = [];
        $result['status'] = 'success';
        $result['rank_level_up'] = false;

        $data = [];
        try {
            DB::beginTransaction();

            UserTransaction::create([
                'user_id'   => Auth::user()->id,
                'item_id'   => $itemId,
                'value'     => $request->nominal,
                'type'      => 'CR',
                'desc'      => '[Purchase] +' . $request->nominal
            ]);

            $update = [];
            $update['total_lp'] = $currentLP + $request->nominal;
            $update['total_exp'] = $currentExp + $request->nominal;
            $rank = Rank::where('value', '<=', $update['total_exp'])->select('id')->orderBy('id', 'desc')->first();
            if ((int)$currentRank !== (int)$rank->id) {
                $update['rank_id'] = $rank->id;

                $result['rank_level_up'] = true;
            }
            User::where('id', Auth::id())->update($update);

            $result['total_lp'] = number_format($currentLP + $request->nominal, 0, '.', ',');
            $result['total_bp'] = number_format(Auth::user()->total_bp, 0, '.', ',');
        } catch (\Exception $e) {
            DB::rollBack();

            $result['status'] = 'error';
            $result['message'] = $e->getMessage();
            return $result;
        }

        DB::commit();
        return $result;
    }
}
