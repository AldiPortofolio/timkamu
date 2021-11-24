<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminMenuGrant;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Transaction;
use Auth;

use Illuminate\Http\Request;

class GetAllTransactionByTypeAction extends Controller
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
        $user = Auth::guard('admin')->user();
        $menuGrant = '';

        if ($user) {
            if ($user->role_id !== 1 && $user->role_id !== 2) {
                $menuGrant = AdminMenuGrant::where('admin_id', $user->id)->get();
            }
        }

        $itemId = Item::whereIn('type', ['mlbb', 'freefire', 'pubgm', 'valorant', 'ragnarok'])->select('id')->get()->pluck('id')->toArray();
        $itemIdConversion = ItemConversion::whereIn('child_id', $itemId)->select('id')->get()->pluck('id')->toArray();
        if ($type === 'pulsa') {
            $itemId = Item::whereIn('type', ['telkomsel', 'xl', 'tri', 'google-play'])->select('id')->get()->pluck('id')->toArray();
            $itemIdConversion = ItemConversion::whereIn('child_id', $itemId)->select('id')->get()->pluck('id')->toArray();
        } else if ($type === 'token') {
            $itemId = Item::whereIn('type', ['token'])->select('id')->get()->pluck('id')->toArray();
            $itemIdConversion = ItemConversion::whereIn('child_id', $itemId)->select('id')->get()->pluck('id')->toArray();
        }

        $items = Transaction::leftjoin('users', 'transactions.user_id', '=', 'users.id')
            ->join('item_conversions', 'transactions.item_id', '=', 'item_conversions.id')
            ->join('items', 'item_conversions.child_id', '=', 'items.id')
            ->select('users.id as user_id', 'users.username', 'users.phone as user_phone', 'users.email', 'items.name', 'items.type', 'transactions.*')
            ->whereIn('transactions.item_id', $itemIdConversion)->orderBy('transactions.created_at', 'desc');

        if ($request->status === 'pending' || $request->status === '' || $request->status === null) {
            $items = $items->where('transactions.status', 'PAID')->get();
        } else if ($request->status === 'done') {
            $items = $items->where('transactions.status', 'DONE')->get();
        } else if ($request->status === 'rejected') {
            $items = $items->where('transactions.status', 'REJECTED')->get();
        } else if ($request->status === 'refund') {
            $items = $items->where('transactions.status', 'REFUND')->get();
        }

        $page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;
        $total = count($items); //total items in array    
        $limit = 20; //per page    
        $totalPages = ceil($total / $limit); //calculate total pages
        $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
        $page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
        $offset = ($page - 1) * $limit;
        if ($offset < 0) $offset = 0;

        $items = array_slice($items->toArray(), $offset, $limit);

        $arrView = [
            'items' => $items,
            'menu_grants' => $menuGrant,
            'total' => $total,
            'total_pages' => $totalPages,
        ];

        return view('pages.admin.transactions.detail', $arrView);
    }
}
