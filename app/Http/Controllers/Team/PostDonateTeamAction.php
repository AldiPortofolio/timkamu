<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\Models\EventChat;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Team;
use App\Http\Models\TeamDonate;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostDonateTeamAction extends Controller
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
    public function __invoke(Request $request, $id)
    {
        $result = [];
        $result['status'] = 'success';

        $currentLP = Auth::user()->total_lp;

        $item = ItemConversion::where('child_id', $request->item_id)->first();
        $itemLPId = Item::where('name', 'LP')->pluck('id')->first();

        $team = Team::where('id', $id)->pluck('name')->first();

        if($currentLP < $item->value) {
            $result['status'] = 'error';
            $result['message'] = "You don't have enough LP";
            return $result;
        }

        try {
            DB::beginTransaction();

            UserTransaction::create([
                'user_id'   => Auth::user()->id,
                'item_id'   => $itemLPId,
                'value'     => $item->value,
                'type'      => 'DB',
                'desc'      => 'Dukung Tim ' . $team
            ]);

            User::where('id', Auth::id())->update([
                'total_lp'  => $currentLP - $item->value
            ]);

            TeamDonate::create([
                'team_id'   => $id,
                'item_id'   => $request->item_id,
                'item_conversion_id' => $item->id,
                'user_id'   => Auth::id(),
                'value'     => 1
            ]);
        } catch (\Exception $e) {

            
            $result['status'] = 'error';
            $result['message'] = 'something error';
            return $result;
        }

        DB::commit();

        $result['message'] = 'donate success';
        $result['total_lp'] = number_format(($currentLP - $item->value), 0, '.', ',');
        return $result;
    }
}
