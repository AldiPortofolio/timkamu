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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetAllUsernameByKeywordAction extends Controller
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
            return 'error';
        }

        $result = [];
        $result['status'] = 'error';
        $result['message'] = 'Data not found';

        $username = $request->username;
        $type = $request->type;
        $users = [];
        if($username && $type === 'username') {
            $users = User::where(function ($query) use ($username) {
                $query->orWhere('username', 'like', '%'. $username.'%');
                $query->orWhere('username', 'like', $username . '%');
                $query->orWhere('username', 'like', '%' . $username);
                $query->orWhere('username', $username);
            })->limit(10)->orderBy('username', 'asc')->get();
        } else if ($username && $type === 'phone') {
            // $username = GlobalFunction::normalizePhoneNumber($username);
            $users = User::where(function ($query) use ($username) {
                $query->orWhere('phone', 'like', '%' . $username . '%');
                $query->orWhere('phone', 'like', $username . '%');
                $query->orWhere('phone', 'like', '%' . $username);
            })->limit(10)->get();
        } else if ($username && $type === 'email') {
            $users = User::where(function ($query) use ($username) {
                $query->orWhere('email', 'like', '%' . $username . '%');
                $query->orWhere('email', 'like', $username . '%');
                $query->orWhere('email', 'like', '%' . $username);
            })->limit(10)->get();
        }

        $string = "<tr><td colspan='99' class='o5'><em>no user found with that ".$type."</em></td></tr>";
        if (count($users) > 0) {
            $string = '';
            foreach ($users as $user) {
                $extraInfo = '';
                if($type === 'phone') {
                    $extraInfo = "<br><span class='o3 black'><em>0" . $user->phone . "</em></span>";
                } else if($type === 'email') {
                    $extraInfo = "<br><span class='o3 black'><em>" . $user->email . "</em></span>";
                }
                
                $string .= "<tr><td><span class='o3 mr-1'>[" . $user->id . "]</span></td><td>" .
                "<div class='btn-group' role='group'>" .
                "<a href='#' class='user-drop' data-toggle='dropdown'>" .
                "<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-arrow-down-right user-more left'><line x1='7' y1='7' x2='17' y2='17'></line><polyline points='17 7 17 17 7 17'></polyline></svg>" .
                "<span>" . $user->username . $extraInfo ."</span></a>" .
                "<div class='dropdown-menu'>" .
                "<a class='dropdown-item user-detail-by-id-btn' href='#' data-toggle='modal' data-target='#member-stats' data-user='" . $user->id . "'>View quick stats</a>" .
                "<a class='dropdown-item' href='" . url('admin-tkmu/users/' . $user->id) . "'>View info</a>" .
                "<a class='dropdown-item' href='" . url('admin-tkmu/lp-transaction-member?username=' . $user->username) . "'>View LP transactions</a>" .
                "<a class='dropdown-item' href='" . url('admin-tkmu/report-participants?username=' . $user->username) . "'>View all bets</a>" .
                "<a class='dropdown-item' href='" . url('admin-tkmu/transactions-member?username=' . $user->username) . "'>View all topups</a>" .
                "<a class='dropdown-item' href='" . url('admin-tkmu/transactions-historical-member?username=' . $user->username) . "'>View historical</a>" .
                "</div></div></td></tr>";
            }
        }

        $result['users'] = $string;
        $result['status'] = 'success';
        $result['message'] = 'Data exist';

        return $result;
    }
}
