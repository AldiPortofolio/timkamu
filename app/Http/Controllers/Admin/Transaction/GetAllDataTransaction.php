<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminMenuGrant;
use App\Http\Models\Transaction;
use Auth;

use Illuminate\Http\Request;

class GetAllDataTransaction extends Controller
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
            return redirect('admin-tkmu/sign-in');
        }
        $user = Auth::guard('admin')->user();
        $menuGrant = '';

        if ($user) {
            if ($user->role_id !== 1 && $user->role_id !== 2) {
                $menuGrant = AdminMenuGrant::where('admin_id', $user->id)->get();
            }
        }
        
        $items = Transaction::where('item_id', '<>', 1)->whereNotNull('desc')->orderBy('created_at', 'desc')->get();
        if($request->status === 'paid') {
            $items = $items->where('status', '<>', 'UNPAID');
        } else if ($request->status === 'unpaid') {
            $items = $items->where('status', 'UNPAID');
        }

        $stringResult = "<thead><tr><th>ID</th><th>Date</th><th>Order Id</th><th>Member Username</th><th>User Id</th><th>Phone</th><th>Item</th><th>Purchase by</th><th>Status</th><th>Action</th></tr></thead><tbody>";
        foreach ($items as $key => $item) {
            $detail = json_decode($item->desc);
            $userInfo = '-';
            if (isset($detail->user_id)) {
                $userInfo = $detail->user_id . '(' . $detail->server_id . ')';
                if ($item->items->childs->type === 'pubgm' || $item->items->childs->type === 'freefire') {
                    $userInfo = $detail->id_pemain ?? '';
                }
            } else if (isset($detail->id_pemain)) {
                $userInfo = $detail->id_pemain ?? '';
            } else if(isset($detail->id_pelanggan)) {
                $userInfo = $detail->id_pelanggan;
            }
            $userPhone = $item->users ? $item->users->phone : $item->phone;
            if (isset($item->phone)) {
                $userPhone = $item->phone;
            }

            $stringResult .= "<tr". ($item->status === 'DONE' ? " style='background: #F0F4C3'" : "") .">";
            $stringResult .= 
                "<td>". $item->id ."</td>".
                "<td><span class='preview-value active'>". \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') ."</span></td>".
                "<td>". $item->transaction_number ."</td>".
                "<td><span class='preview-value active'>". ($item->users ? $item->users->username : 'guest') ."</span></td>".
                "<td><span class='preview-value active'>". $userInfo ."</span></td>".
                "<td><span class='preview-value active'>". $userPhone ." </span></td>".
                "<td><span class='preview-value active'>". $item->items->childs->name ." (". ($item->items->childs->type === 'freefire' ? 'Free Fire' : strtoupper($item->items->childs->type)) .")</span></td>".
                "<td>". number_format($item->total_price, 0, '.', ',').' '.$item->items->parents->name ." (". $item->payment_type .")</td>".
                "<td><span class='preview-value item-status active'>". $item->status ."</span></td>";
                
            if($item->status === 'PAID' && ((Auth::guard('admin')->user()->role_id === 1 || Auth::guard('admin')->user()->role_id === 2) || ($menuGrant && $menuGrant->where('name', 'APPROVE')->first()))){
                $stringResult .= "<td class='text-center'><a href='#' class='btn btn-success btn-action-update btn-done ". ($item->status === 'PAID' ? 'active' : '') ."' data-id='". $item->id ."'>Done Top up</a></td>";
            } else {
                $stringResult .= "<td></td>";
            }
            $stringResult .= "</tr>";
        }
        $stringResult .= "</tbody>";

        return $stringResult;
    }
}
