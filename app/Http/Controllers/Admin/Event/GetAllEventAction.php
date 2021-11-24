<?php

namespace App\Http\Controllers\Admin\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminMenuGrant;
use App\Http\Models\Event;
use App\Http\Models\EventBetCategory;
use App\Http\Models\LeagueGame;
use App\Http\Models\Team;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Str;

class GetAllEventAction extends Controller
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
    public function __invoke()
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }

        $user = Auth::guard('admin')->user();
        $menuGrant = '';

        if ($user) {
            if ($user->role_id !== 1 && $user->role_id !== 2) {
                $menuGrant = AdminMenuGrant::where('admin_id', $user->id)->get();
            }
        }
        
        $type = app('request')->input('type');

        $events = Event::orderBy('created_at', 'desc');
        if($type === 'past') {
            $events = $events->where('type', 'DONE');
        } else {
            $events = $events->where('type', '<>', 'DONE');
        }

        $events = $events->paginate(20);
        foreach ($events as $key => $value) {
            if ($value->slug === null) {
                $slug = strtolower($value->name . ' ' . Carbon::parse($value->start_date)->format('d M y Hi') . ' ' . $value->id);
                Event::where('id', $value->id)->update(['slug' => Str::slug($slug)]);
            }

            $teams = '';
            if($value->league_games_id && $value->league_games->game_id !== 1) {
                $temp = json_decode($value->team_detail);
                
                if($temp) {
                    $teamsTemp = [];
                    foreach ($temp as $key => $tm) {
                        $teamD = Team::find($tm->team_id);
                        array_push($teamsTemp, $teamD->name);
                    }
                    $teams = implode(', ', $teamsTemp);
                }
            }

            $value->teams = $teams;
            $value->odds = EventBetCategory::where('event_id', $value->id)->count();
        }
        
        // dd($events);

        $arrView = [
            'events' => $events,
            'menu_grants' => $menuGrant
        ];

        return view('pages.admin.events.index', $arrView);
    }
}
