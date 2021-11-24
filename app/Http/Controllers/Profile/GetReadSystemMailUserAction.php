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

class GetReadSystemMailUserAction extends Controller
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
    public function __invoke($id)
    {
        ini_set('memory_limit', '-1');
        
        $result = [];
        $result['status'] = 'success';
        $result['message'] = 'no data found';

        $item = SystemMail::find($id);
        if ($item) {
            try {
                DB::beginTransaction();

                $status = '1';
                if($item->status === '2') {
                    $status = '0';
                }
                SystemMail::where('id', $id)->update(['status' => $status]);

                $result['message'] = 'read successful';
            } catch (\Exception $e) {
                DB::rollBack();

                $result['status'] = 'error';
                $result['message'] = 'something wrong';
                return $result;
            }

            DB::commit();
        }
        
        return $result;
    }
}
