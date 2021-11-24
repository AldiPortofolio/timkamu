<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Auth;

class PostItemUpdateAction extends Controller
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
    public function __invoke(Request $request, $id)
    {
        if (!Auth::guard('admin')->user()) {
            return 'error';
        }

        $result = [];
        $result['status'] = 'success';
        $result['message'] = 'Data updated';

        $data = ItemConversion::find($id);

        try {
            DB::beginTransaction();

            Item::where('id', $data->childs->id)->update([
                'name' => $request->name
            ]);

            ItemConversion::where('id', $id)->update([
                'value' => $request->value
            ]);

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollback();

            $result['status'] = 'error';
            $result['message'] = 'Something is wrong. Please contact developer';
        }

        DB::commit();

        $result['name'] = $request->name;
        $result['value'] = number_format($request->value, 0, '.', ',');
        return $result;
    }
}