<?php

namespace App\Http\Controllers\Admin\LeagueGame;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Http\Models\Game;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostUpdateGameAction extends Controller
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

        $game = Game::find($id);
        if (!$game) {
            return redirect(url()->previous())->with('failed', 'Data not found');
        }

        try {
            DB::beginTransaction();

            $urlFile = $game->logo;
            if ($request->hasFile('logo')) {
                $urlFile = GlobalFunction::UploadImage($request->file('logo'), $request->game_name, 'img/game-logos/');
            }

            Game::where('id', $id)->update([
                'name' => $request->game_name,
                'logo' => $urlFile
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
