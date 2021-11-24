<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Models\Item;
use App\Http\Models\Rank;
use App\Http\Models\SystemMail;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use App\Mail\AlertDiamondPurchaseEmail;
use App\Mail\AlertDiamondRequestEmail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GetSuccessPurchaseAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke(Request $request)
    {
        ini_set('memory_limit', '-1');
        
        $orderId = $request->order_id;
        $dataTransaction = Transaction::where('transaction_number', $orderId)->first();

        if ($orderId) {
            $dataTransaction = Transaction::where('transaction_number', $orderId)->first();

            if ($dataTransaction->items->childs->type === 'pubgm' || $dataTransaction->items->childs->type === 'freefire' || $dataTransaction->items->childs->type === 'mlbb') {
                $dataUserTemp = json_decode($dataTransaction->desc);
                $game = 'Mobile Legends: Bang Bang';
                $dataUser = $dataUserTemp->user_id . '(' . $dataUserTemp->server_id . ')';
                if ($dataTransaction->items->childs->type === 'pubgm' || $dataTransaction->items->childs->type === 'freefire') {
                    if($dataTransaction->items->childs->type === 'pubgm') {
                        $game = 'PUBGM';
                    } else if ($dataTransaction->items->childs->type === 'freefire') {
                        $game = 'Garena Freefire';
                    }
                    $dataUser = $dataUserTemp->id_pemain;
                }

                $productName = "";
                if (strpos($dataTransaction->items->childs->name, 'Diamond')) {
                    $productName = number_format((str_replace(' Diamond', '', $dataTransaction->items->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/mlbb-diamond.svg') . "'>";
                } else if (strpos($dataTransaction->items->childs->name, 'UC')) {
                    $productName = number_format((str_replace(' UC', '', $dataTransaction->items->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/uc.png') . "'>";
                } else {
                    $productName = $dataTransaction->items->childs->name;
                }

                $arrView = [
                    'game' => $game,
                    'data_transaction' => $dataTransaction,
                    'data_user' => $dataUser,
                    'product_name' => $productName
                ];

                return view('pages.purchases.diamond-success', $arrView);
            } else if($dataTransaction->items->childs->type === 'telkomsel'|| $dataTransaction->items->childs->type === 'xl') {
                $tipe = "";
                $productName = "";
                $paketType = '';
                if (strpos($dataTransaction->items->childs->name, 'Hari')) {
                    $explode = explode('Hari', $dataTransaction->items->childs->name);
                    $days = str_replace(' ', ' Hari', $explode[0]);
                    $paket = str_replace(' ', '', $explode[1]);

                    $productName ="<span class='money money-14 money-inline right'>" . $paket . "</span> ". $days;
                    $paketType = 'TSEL Flash Kuota';
                    $tipe = "Telkomsel";
                } else if (strpos($dataTransaction->items->childs->name, 'IDR ') === 0) {
                    $productName = "Pulsa <span class='money money-14 money-inline right'>" . $dataTransaction->items->childs->name . "</span>";
                    $paketType = 'Pulsa TSEL';
                    $tipe = "Telkomsel";
                } else {
                    $productName = "<span class='money money-14 money-inline right'>" . $dataTransaction->items->childs->name . "</span>";
                    $paketType = 'XL Xtra Combo + YouTube';
                    $tipe = "XL";
                }

                $arrView = [
                    'tipe' => $tipe,
                    'paket_type' => $paketType,
                    'data_transaction' => $dataTransaction,
                    'product_name' => $productName
                ];

                return view('pages.purchases.pulsa-success', $arrView);
            }
        }
        
        return redirect('/');
    }
}
