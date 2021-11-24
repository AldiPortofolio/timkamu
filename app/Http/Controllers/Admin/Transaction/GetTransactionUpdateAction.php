<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Models\SystemMail;
use App\Http\Models\Transaction;
use App\Mail\AlertDiamondSuccessEmail;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class GetTransactionUpdateAction extends Controller
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
            return redirect('admin-tkmu/sign-in');
        }

        $data = Transaction::find($id);
        $detail = json_decode($data->desc);

        try {
            DB::beginTransaction();

            Transaction::where('id', $id)->update([
                'status' => 'DONE'
            ]);
            if ($data->items->childs->type === 'pubgm'  || $data->items->childs->type === 'freefire' || $data->items->childs->type === 'mlbb') {
                $game = 'Mobile Legends: Bang Bang';
                $dataUser = $detail->user_id . '(' . $detail->server_id . ')';
                if ($data->items->childs->type === 'pubgm'  || $data->items->childs->type === 'freefire') {
                    if ($data->items->childs->type === 'pubgm') {
                        $game = 'PUBGM';
                    } else if ($data->items->childs->type === 'freefire') {
                        $game = 'Garena Freefire';
                    }
                    $dataUser = $detail->id_pemain;
                }

                $productName = "";
                if (strpos($data->items->childs->name, 'Diamond')) {
                    $productName = number_format((str_replace(' Diamond', '', $data->items->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/mlbb-diamond.svg') . "'>";
                } else if (strpos($data->items->childs->name, 'UC')) {
                    $productName = number_format((str_replace(' UC', '', $data->items->childs->name)), 0, '.', ',') . "<img src='" . asset('img/currencies/uc.png') . "'>";
                } else {
                    $productName = $data->items->childs->name;
                }

                if ($data->users) {
                    // send system mail
                    $message = "<h3 class='rajdhani-bold font-size-32'>Pembelian Game Currency (Success)</h3>" .
                    "<p class='o3'>[Order ID: " . $data->transaction_number . "]</p>" .
                    "<p>Terima kasih atas pembelian game currency di Timkamu. Pesanan kamu sudah berhasil diproses.</p>" .
                    "<table class='rincian-table'>" .
                    "<tr>" .
                    "<td class='o5'>Status pembelian</td>" .
                    "<td>Berhasil diproses</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Waktu pembelian</td>" .
                    "<td>" . Carbon::now()->format('d F Y H:i') . " WIB</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Game</td>" .
                    "<td>" . $game . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Username</td>" .
                    "<td>" . $dataUser . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Phone number</td>" .
                    "<td>+62 " . $data->users->phone . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Item yang dibeli</td>" .
                    "<td><span class='money money-14 right'>" . $productName . "</span></td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Dibayar dengan</td>" .
                    "<td><span class='money money-14 right'>" . ($data->payment_type === 'LP' ? 'Loyalty Points' : 'Rupiah') . "</span></td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Harga</td>" .
                    "<td><span class='money money-14 right'>" . ($data->payment_type === 'LP' ? number_format($data->total_price, 0, '.', ',') . "<img src='" . asset('img/currencies/lp.svg') . "'>" : "Rp " . number_format($data->total_price, 0, '.', ',')) . "</span></td>" .
                    "</tr>" .
                    "</table>";

                    $sys = new SystemMail();
                    $sys->user_id = $data->user_id;
                    $sys->title = 'Terima kasih atas pemebelian Diamond dari Timkamu.';
                    $sys->subject = 'Pembelian Game Currency (Success)';
                    $sys->message = $message;
                    $sys->save();
                }
            } else if ($data->items->childs->type === 'telkomsel'  || $data->items->childs->type === 'xl' || $data->items->childs->type === 'tri') {

                $tipe = '';
                $paketType = '';
                $productName = "";
                if (strpos($data->items->childs->name, 'Hari')) {
                    $explode = explode('Hari', $data->items->childs->name);
                    $days = str_replace(' ', ' Hari', $explode[0]);
                    $paket = str_replace(' ', '', $explode[1]);

                    $productName = "<span class='money money-14 money-inline right'>" . $paket . "</span> ". $days;
                    $paketType = 'TSEL Flash Kuota';
                    $tipe = "Telkomsel";
                } else if (strpos($data->items->childs->name, 'IDR ') === 0) {
                    $productName = "Pulsa <span class='money money-14 money-inline right'>" . $data->items->childs->name . "</span>";
                    $paketType = 'Pulsa TSEL';
                    $tipe = "Telkomsel";
                } else {
                    $productName = "<span class='money money-14 money-inline right'>" . $data->items->childs->name . "</span>";
                    $paketType = 'XL Xtra Combo + YouTube';
                    $tipe = "XL";
                }

                if ($data->users) {
                    // send system mail
                    $message = "<h3 class='rajdhani-bold font-size-32'>Pembelian Game Currency (Success)</h3>" .
                    "<p class='o3'>[Order ID: " . $data->transaction_number . "]</p>" .
                    "<p>Terima kasih atas pembelian paket ". $tipe ." di Timkamu. Pesanan kamu sudah berhasil diproses.</p>" .
                    "<table class='rincian-table'>" .
                    "<tr>" .
                    "<td class='o5'>Status pembelian</td>" .
                    "<td>Berhasil diproses</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Waktu pembelian</td>" .
                    "<td>" . Carbon::now()->format('d F Y H:i') . " WIB</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Top up</td>" .
                    "<td>" . $paketType . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Phone number</td>" .
                    "<td>+62 " . $data->phone . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Item yang dibeli</td>" .
                    "<td>" . $productName . "</td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Dibayar dengan</td>" .
                    "<td><span class='money money-14 right'>" . ($data->payment_type === 'LP' ? 'Loyalty Points' : 'Rupiah') . "</span></td>" .
                    "</tr>" .
                    "<tr>" .
                    "<td class='o5'>Harga</td>" .
                    "<td><span class='money money-14 right'>" . ($data->payment_type === 'LP' ? number_format($data->total_price, 0, '.', ',') . "<img src='" . asset('img/currencies/lp.svg') . "'>" : "Rp " . number_format($data->total_price, 0, '.', ',')) . "</span></td>" .
                    "</tr>" .
                    "</table>";

                    $sys = new SystemMail();
                    $sys->user_id = $data->user_id;
                    $sys->title = 'Terima kasih atas pemebelian Pulsa dari Timkamu.';
                    $sys->subject = 'Pembelian Paket ' . $tipe . ' (Success)';
                    $sys->message = $message;
                    $sys->save();
                }
            } else if ($data->items->childs->type === 'token') {

                if ($data->users) {
                    // send system mail
                    $message = "<h3 class='rajdhani-bold font-size-32'>Pembelian Game Currency (Success)</h3>" .
                        "<p class='o3'>[Order ID: " . $data->transaction_number . "]</p>" .
                        "<p>Terima kasih atas pembelian paket Token PLN di Timkamu. Pesanan kamu sudah berhasil diproses.</p>" .
                        "<table class='rincian-table'>" .
                        "<tr>" .
                        "<td class='o5'>Status pembelian</td>" .
                        "<td>Berhasil diproses</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Waktu pembelian</td>" .
                        "<td>" . Carbon::now()->format('d F Y H:i') . " WIB</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Top up</td>" .
                        "<td>Token PLN</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Phone number</td>" .
                        "<td>+62 " . $data->phone . "</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Item yang dibeli</td>" .
                        "<td>" . $data->items->childs->name . "</td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Dibayar dengan</td>" .
                        "<td><span class='money money-14 right'>" . ($data->payment_type === 'LP' ? 'Loyalty Points' : 'Rupiah') . "</span></td>" .
                        "</tr>" .
                        "<tr>" .
                        "<td class='o5'>Harga</td>" .
                        "<td><span class='money money-14 right'>" . ($data->payment_type === 'LP' ? number_format($data->total_price, 0, '.', ',') . "<img src='" . asset('img/currencies/lp.svg') . "'>" : "Rp " . number_format($data->total_price, 0, '.', ',')) . "</span></td>" .
                        "</tr>" .
                        "</table>";

                    $sys = new SystemMail();
                    $sys->user_id = $data->user_id;
                    $sys->title = 'Terima kasih atas pemebelian Diamond dari Timkamu.';
                    $sys->subject = 'Pembelian Paket Token PLN (Success)';
                    $sys->message = $message;
                    $sys->save();
                }
            }

            
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollback();

            return redirect(url()->previous());
        }

        DB::commit();
        return redirect(url()->previous());
    }

    private function sendMessage($phone, $message)
    {
        $req = [
            'apikey'        => ENV('RAJA_SMS_API_KEY'),
            'senderid'      => '1',
            'callbackurl'   => '',
            'datapacket'    => [
                [
                    'number'  => '62' . $phone,
                    'message' => $message
                ]
            ]
        ];

        $client = new \GuzzleHttp\Client();
        $res = $client->request(
            'POST',
            ENV('RAJA_SMS_URL'),
            [
                'headers' => [
                    'Content-Type'  => 'application/json'
                ],
                'body'    => json_encode($req)
            ]
        );

        $body = json_decode($res->getBody()->getContents());

        return $body;
    }
}
