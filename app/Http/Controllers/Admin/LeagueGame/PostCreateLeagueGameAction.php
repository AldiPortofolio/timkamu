<?php

namespace App\Http\Controllers\Admin\LeagueGame;

use App\Http\Controllers\Controller;
use App\Http\Models\Game;
use App\Http\Models\League;
use App\Http\Models\LeagueGame;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostCreateLeagueGameAction extends Controller
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
    public function __invoke(Request $request)
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }

        try {
            DB::beginTransaction();

            LeagueGame::create([
                'league_id' => $request->league_id,
                'game_id' => $request->game_id
            ]);

            DB::commit();
            return redirect(url()->previous())->with('success', 'Data created');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollback();
            
            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer')->withInput();
        }
    }
}
