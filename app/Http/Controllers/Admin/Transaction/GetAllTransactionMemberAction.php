<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminMenuGrant;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use Auth;

use Illuminate\Http\Request;

class GetAllTransactionMemberAction extends Controller
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
        $user = Auth::guard('admin')->user();
        $menuGrant = '';

        if ($user) {
            if ($user->role_id !== 1 && $user->role_id !== 2) {
                $menuGrant = AdminMenuGrant::where('admin_id', $user->id)->get();
            }
        }

        $dataUserTransaction = [];
        $idPelanggan = app('request')->input('data');
        $type = app('request')->input('type');
        $username = app('request')->input('username');
        if($username) {
            $dataUser = User::where('username', $username)->first();
            $dataUserTransaction = Transaction::where('user_id', $dataUser->id)->whereNotIn('item_id', [1, 2, 78])->whereNotIn('payment_type', ['BP', 'COIN'])->where('status', '<>', 'UNPAID')->paginate(100);
        } elseif($idPelanggan) {
            if($type === 'mlbb' || $type === 'pubgm' || $type === 'freefire' || $type === 'token') {
                $explode = '';
                if($type === 'mlbb') {
                    $explode = explode('(', $idPelanggan);
                    $idPelanggan = $explode[0];
                }
                $dataUserTransaction = Transaction::where('desc', 'like', '%'.$idPelanggan.'%')->whereNotIn('item_id', [1, 2, 78])->whereNotIn('payment_type', ['BP', 'COIN'])->where('status', '<>', 'UNPAID')->paginate(100);
            } else {
                $dataUserTransaction = Transaction::where('phone', $idPelanggan)->whereNotIn('item_id', [2, 141])->whereNotIn('payment_type', ['BP', 'COIN'])->paginate(100);
            }
        }

        $arrView = [
            'items' => $dataUserTransaction,
            'menu_grants' => $menuGrant
        ];

        return view('pages.admin.transactions.more-detail', $arrView);
    }
}
