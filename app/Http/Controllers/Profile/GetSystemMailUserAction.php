<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Models\SystemMail;
use App\Http\Models\User;
use App\Http\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GetSystemMailUserAction extends Controller
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
        
        $items = SystemMail::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(20);

        $arrView = [
            'items' => $items
        ];

        return view('pages.profiles.system-mail', $arrView);
    }
}
