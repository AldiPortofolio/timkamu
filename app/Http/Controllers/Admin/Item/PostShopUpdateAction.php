<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Auth;

class PostShopUpdateAction extends Controller
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
    public function __invoke(Request $request, $type)
    {
        if (!Auth::guard('admin')->user()) {
            return redirect('admin-tkmu/sign-in');
        }

        $status = '0';
        $data = Shop::where('alias', $type)->first();

        $id = app('request')->input('id');
        if($id) {
            $data = ItemConversion::where('id', $id)->first();
            $data->active = $data->childs->active;
        }

        if($data->active === '0') {
            $status = '1';
        }
        $update = [];
        $update['reason'] = $request->reason ?? 'System maintenance';
        $update['open_date'] = $request->open_date;
        $update['active'] = $status;

        try {
            DB::beginTransaction();

            if($id) {
                $idParConv = $data->child_id;
                Item::where('id', $idParConv)->update([
                    'active' => $status
                ]);
            } else {
                Shop::where('alias', $type)->update($update);
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollback();

            return redirect(url()->previous())->with('failed', 'Something is wrong. Please contact developer');
        }

        DB::commit();

        return redirect(url()->previous())->with('success', 'Data updated');
    }
}
