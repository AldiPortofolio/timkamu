<?php

namespace App\Http\Controllers\Admin\LeagueGame;

use App\Http\Controllers\Controller;
use App\Http\Models\LeagueGame;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostUpdateLeagueGameAction extends Controller
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
    public function __invoke(Request $request, $id)
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }

        $leagueGame = LeagueGame::find($id);
        if (!$leagueGame) {
            return redirect(url()->previous())->with('failed', 'Data not found');
        }

        try {
            DB::beginTransaction();

            LeagueGame::where('id', $id)->update([
                'game_id' => $request->game_id,
                'league_id' => $request->league_id
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollback();

            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer')->withInput();
        }

        DB::commit();
        return redirect(url()->previous())->with('success', 'Data updated');  
    }
}
