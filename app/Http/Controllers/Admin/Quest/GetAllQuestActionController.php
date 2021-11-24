<?php

namespace App\Http\Controllers\Admin\Quest;

use App\Http\Controllers\Controller;
use App\Http\Models\Quest;
use Auth;

class GetAllQuestActionController extends Controller
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
        
        $allQuests = Quest::get();

        $arrView = [
            'all_quests' => $allQuests
        ];

        return view('pages.admin.quests.index', $arrView);
    }
}
