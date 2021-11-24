<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Shop;
use Auth;

class GetAllItemAction extends Controller
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
        
        $category = Item::where('type', 'currencies')->where('name', '<>', 'BP')->get();
        $itemCategory = app('request')->input('name');
        $items = ItemConversion::get();

        $itemActive = '1';
        $shop = '';
        $dataItems = [];
        if($itemCategory === 'general') {
            $dataItems[0] = $items->whereIn('childs.type', ['currencies', 'donation']);
        } else {
            $dataItems[0] = $items->where('childs.type', $itemCategory)->where('parent_id', 12);
            $dataItems[1] = $items->where('childs.type', $itemCategory)->where('parent_id', 1);
            
            $shop = Shop::where('alias', $itemCategory)->first();
        }

        $arrView = [
            'category' => $category,
            'itcat' => $itemCategory,
            'items' => $dataItems,
            'item_active' => $itemActive,
            'shop' => $shop
        ];

        return view('pages.admin.items.index', $arrView);
    }
}
