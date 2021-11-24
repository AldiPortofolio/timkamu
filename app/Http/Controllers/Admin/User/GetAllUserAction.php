<?php

namespace App\Http\Controllers\Admin\User;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\SystemMail;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetAllUserAction extends Controller
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
        $filter = app('request')->input('filter');
        $username = app('request')->input('username');
        
        $users = User::where('role_id', 3);
        if($username) {
            $users = $users->where('username', $username);
        } else {
            if ($filter === 'lp') {
                $users = $users->orderBy('total_lp', 'desc');
            } else if ($filter === 'bp') {
                $users = $users->orderBy('total_bp', 'desc');
            } else if ($filter === 'coin') {
                $users = $users->orderBy('total_coin', 'desc');
            } else {
                $users = $users->orderBy('id', 'desc');
            }
        }
        $users = $users->paginate(100);
        $arrView = [
            'users' => $users
        ];

        return view('pages.admin.users.index', $arrView);
    }
}
