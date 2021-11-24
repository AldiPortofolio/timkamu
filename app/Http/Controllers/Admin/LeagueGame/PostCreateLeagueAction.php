<?php

namespace App\Http\Controllers\Admin\LeagueGame;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\EventTransaction;
use App\Http\Models\Game;
use App\Http\Models\League;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostCreateLeagueAction extends Controller
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

            $urlFile = '';
            if ($request->hasFile('logo')) {
                $urlFile = GlobalFunction::UploadImage($request->file('logo'), $request->game_name, 'img/leagues/');
            }

            League::create([
                'name' => $request->league_name,
                'logo' => $urlFile
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
