<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Http\Models\Team;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetFansTeamAction extends Controller
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
        $idTeam = Team::where('alias', $request->name)->select('id')->pluck('id')->first();
        $msg = 'success-become-fans';
        if(app('request')->input('quit')) {
            $idTeam = null;
            $msg = 'success-quit-fans';
        }
        try {
            DB::beginTransaction();

            User::where('id', Auth::id())->update([
                'fans_team_id' => $idTeam
            ]);

        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();

            return redirect(url()->previous())->with('failed', 'failed-become-fans');
        }

        DB::commit();
        return redirect(url()->previous())->with('success', $msg);
    }
}
