<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\SystemMail;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostCoinConvertAction extends Controller
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
        $result = [];
        $result['status'] = 'error';

        if (!Auth::user()) {
            $result['message'] = 'need login';
            return $result;
        }

        if (Auth::user()->phone_verified === '0') {
            $result['message'] = 'need verify';
            return $result;
        }
        
        $itemId = Item::where('name', 'coin')->pluck('id')->first();
        $currentLP = Auth::user() ? Auth::user()->total_lp : 0;

        $data = [];
        try {
            DB::beginTransaction();

            $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
            $itemConversion = ItemConversion::where('parent_id', $itemLPId)->where('child_id', $itemId)->pluck('value')->first();

            $request->nominal = str_replace(',', '', $request->nominal);

            $valueConversion = $request->nominal / $itemConversion;
            $currentCoin = Auth::user()->total_coin;
            if($valueConversion > $currentCoin) {
                $result['message'] = 'over current coin';
                return $result;
            }
            
            UserTransaction::create([
                'user_id'   => Auth::user()->id,
                'item_id'   => $itemId,
                'value'     => $request->nominal,
                'type'      => 'DB',
                'desc'      => 'Convert to LP'
            ]);

            UserTransaction::create([
                'user_id'   => Auth::user()->id,
                'item_id'   => $itemLPId,
                'value'     => $valueConversion,
                'type'      => 'CR',
                'desc'      => 'Convert from Coin'
            ]);

            $currentLP = $currentLP + $valueConversion;
            User::where('id', Auth::id())->update([
                'total_lp'  => $currentLP,
                'total_coin'=> $currentCoin - $request->nominal
            ]);

            $result['total_lp'] = number_format($currentLP, 0, '.', ',');
            $result['total_coin'] = number_format(($currentCoin - $request->nominal), 0, '.', ',');
            $result['nominal'] = number_format($valueConversion, 0, '.', ',');

            // Transaction Number
            $latestId = Transaction::max('id') + 1;
            $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);

            $data = new Transaction();
            $data->user_id = Auth::id();
            $data->transaction_number = $transactionNumber;
            $data->item_id = $itemLPId;
            $data->payment_type = 'COIN';
            $data->status = 'PAID';
            $data->total = $valueConversion;
            $data->total_price = $request->nominal;
            $data->save();

            $message = "<h3 class='rajdhani-bold font-size-32'>Konversi Coins ke LP (" . $request->nominal . ")</h3>" .
            "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
            "<p>Konversi Coins ke Loyalty Points kamu berhasil dilakukan dengan nilai tukar <span class='money money-14 right money-inline'>" . $request->nominal . "<img src='" . asset('img/currencies/coin.svg') . "'></span> ditukar dengan <span class='money money-14 right money-inline'>" . $valueConversion . "<img src='" . asset('img/currencies/lp.svg') . "'></span></p>";

            $sys = new SystemMail();
            $sys->user_id = Auth::id();
            $sys->title = 'Terima kasih atas pembelian Battle Points dari Timkamu.';
            $sys->subject = 'Konversi Coin ke LP (' . $request->nominal . ')';
            $sys->message = $message;
            $sys->save();

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();

            return $result;
        }

        DB::commit();
        $result['status'] = 'success';
        return $result;
    }
}
