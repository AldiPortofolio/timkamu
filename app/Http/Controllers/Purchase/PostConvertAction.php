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

class PostConvertAction extends Controller
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

        $request->nominal = str_replace(',', '', $request->nominal);
        if ($request->nominal % 9 !== 0) {
            $result['message'] = 'kelipatan 9';
            return $result;
        }
        
        $itemId = Item::where('name', 'BP')->pluck('id')->first();
        $currentLP = Auth::user() ? Auth::user()->total_lp : 0;

        $data = [];
        try {
            DB::beginTransaction();

            $itemLPId = Item::where('name', 'LP')->pluck('id')->first();
            $itemConversion = ItemConversion::where('parent_id', $itemLPId)->where('child_id', $itemId)->pluck('value')->first();

            $valueConversion = $request->nominal / $itemConversion;
            $currentBP = Auth::user()->total_bp;
            if($valueConversion > $currentBP) {
                $result['message'] = 'over current bp';
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
                'desc'      => 'Convert from BP'
            ]);

            $currentLP = $currentLP + $request->nominal;
            User::where('id', Auth::id())->update([
                'total_lp'  => $currentLP,
                'total_bp'  => $currentBP - $valueConversion
            ]);

            $result['total_lp'] = number_format($currentLP, 0, '.', ',');
            $result['total_bp'] = number_format(($currentBP - $valueConversion), 0, '.', ',');
            $result['nominal'] = number_format($request->nominal, 0, '.', ',');

            // Transaction Number
            $latestId = Transaction::max('id') + 1;
            $transactionNumber = Carbon::now()->format('ymdis') . str_pad($latestId, 4, "0", STR_PAD_LEFT);

            $data = new Transaction();
            $data->user_id = Auth::id();
            $data->transaction_number = $transactionNumber;
            $data->item_id = $itemLPId;
            $data->payment_type = 'BP';
            $data->status = 'PAID';
            $data->total = $request->nominal;
            $data->total_price = $request->nominal;
            $data->save();

            $message = "<h3 class='rajdhani-bold font-size-32'>Konversi BP ke LP (" . $request->nominal . ")</h3>" .
            "<p class='o3'>[Order ID: " . $transactionNumber . "]</p>" .
            "<p>Konversi Battle Points ke Loyalty Points kamu berhasil dilakukan dengan nilai tukar <span class='money money-14 right money-inline'>" . $request->nominal . "<img src='" . asset('img/currencies/bp.svg') . "'></span> ditukar dengan <span class='money money-14 right money-inline'>" . $request->nominal . "<img src='" . asset('img/currencies/lp.svg') . "'></span></p>";

            $sys = new SystemMail();
            $sys->user_id = Auth::id();
            $sys->title = 'Terima kasih atas pemebelian Battle Points dari Timkamu.';
            $sys->subject = 'Konversi BP ke LP (' . $request->nominal . ')';
            $sys->message = $message;
            $sys->save();

        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();

            return $result;
        }

        DB::commit();
        $result['status'] = 'success';
        return $result;
    }
}
