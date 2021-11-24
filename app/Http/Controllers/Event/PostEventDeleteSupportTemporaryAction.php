<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventBetRule;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\League;
use App\Http\Models\Team;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostEventDeleteSupportTemporaryAction extends Controller
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
    public function __invoke(Request $request, $id)
    {
        $result = [];
        $result['status'] = 'success';

        $eventTransaction = EventTransaction::find($id);

        if($eventTransaction) {
            try {
                DB::beginTransaction();

                EventTransaction::where('id', $id)->delete();
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
