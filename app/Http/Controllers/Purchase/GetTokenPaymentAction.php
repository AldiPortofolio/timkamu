<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Models\Event;
use App\Http\Models\EventTransaction;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Rank;
use App\Http\Models\SystemMail;
use App\Http\Models\Tournaments;
use App\Http\Models\Transaction;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetTokenPaymentAction extends Controller
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
        ini_set('memory_limit', '-1');
        if($request->name === 'lp' && Auth::user()->phone_verified === '0') {
            $result['status'] = 'error';
            $result['message'] = 'need verify phone';
            return $result;
        }

        if ($request->name === 'lp' && (int)$request->nominal > 2000) {
            $result['status'] = 'error';
            $result['message'] = 'maks 2000';

            return $result;
        }

        if (($request->name == 'tournament' || $request->name == 'tournament-member') && Auth::user() === null) {
            $result['status'] = 'error';
            $result['message'] = 'need-login';

            return $result;
        }

        // initialize return
        $result = [];
        $result['status'] = 'success';

        //get max id
        $latestId = Transaction::max('id') + 1;
        $transactionNumber = Carbon::now()->format('ymdis').str_pad($latestId, 4, "0", STR_PAD_LEFT);

        $itemId = Item::where('name', 'LP')->pluck('id')->first();
        $nominal = $request->nominal ?? 1;
        $price = $nominal * 1000;
        $discount = 0;
        $cashback = 0;
        $promo = null;
        $detail = '';
        $dataItem = '';
        if ($request->name === 'lp') {
            $nominal = $request->nominal;
            $cashbackPotential = $nominal * 0.1;
            $whole = (int) $cashbackPotential;  // 5
            $frac  = $cashbackPotential - $whole;  // .7
            if ($frac > 0.0 && $frac < 0.8) {
                $frac = floor($cashbackPotential);
            } else if ($frac > 0.7) {
                $frac = ceil($cashbackPotential);
            } else {
                $frac = $cashbackPotential;
            }

            if ($frac > 0) {
                $promo = 2;
                $cashback = $frac;
            }
        } else if($request->name === 'diamond' || $request->name === 'pulsa' || $request->name === 'rumah-tangga') {
            if($request->payment_method === 'GoPay') {
                $request->payment_method = 'gopay';
            } else if($request->payment_method === 'Dana') {
                $request->payment_method = 'dana';
            } else if ($request->payment_method === 'Ovo') {
                $request->payment_method = 'ovo';
            } else if ($request->payment_method === 'Shopee Pay') {
                $request->payment_method = 'shopee';
            }

            $dataItem = ItemConversion::find($request->id);
            $price = $dataItem->value;
            $itemId = $request->id;
            $detail = [];
            if($request->name === 'diamond') {
                $discount = $price * 0.20;
                $price = $price - $discount;
                $promo = 1;

                $detail['user_id'] = $request->user_id;
                $detail['server_id'] = $request->server_id;
                $detail['id_pemain'] = $request->id_pemain;
            } else if ($request->name === 'rumah-tangga') {
                $detail['id_pelanggan'] = $request->id_pelanggan;
            }
            $detail['phone'] = $this->normalizePhoneNumber($request->phone);
        }else if($request->name == 'tournament' || $request->name == 'tournament-member'){
            $id = Auth::id();
            $tournament = Tournaments::find($request->tournament_id);
            $members = $tournament->teams()->join('team_members as members', 'members.team_id', '=', 'teams.id')->get()->pluck('id_user')->toArray();
            if(in_array($id, $members)){
                abort(402, 'Anda sudah terdaftar dalam tournament ini');
            }
            $slot = $tournament->slot;
            $teamsCount = $tournament->teams->count();
            if($teamsCount >= $slot){
                abort(402, 'Registration Closed');
            }
            $price = $tournament->admission_fee;
            $request->nominal = $price;
            $itemId = null;
        }

        $req = [
            "transaction_details" => [
                "order_id" => $transactionNumber,
                "gross_amount" => (int)$price
            ],
            "customer_details" => [
                "first_name" => Auth::user()->username ?? 'guest',
                "last_name" => "",
                "phone" => Auth::user()->phone ?? $this->normalizePhoneNumber($request->phone)
            ],
            "enabled_payments" => ["gopay"],
            "gopay" => [
                "enable_callback" => true,
                "callback_url" => "{{ url('purchase/detail?name=lp') }}"
            ]
        ];

        if(Auth::user()) {
            $req['customer_details']['email'] = Auth::user()->email;
        }

        try {
            DB::beginTransaction();

            $data = new Transaction();
            $data->user_id = Auth::id();
            $data->transaction_number = $transactionNumber;
            $data->item_id = $itemId;
            $data->payment_type = strtoupper($request->payment_method);
            $data->total = $request->nominal;
            if ($request->name === 'diamond' || $request->name === 'pulsa'|| $request->name === 'rumah-tangga') {
                $data->phone = $this->normalizePhoneNumber($request->phone);
                $data->total = 1;
                $data->desc = json_encode($detail);
            }elseif ($request->name == 'tournament'){
                $data->total = 1;
                $data->id_tournament = $request->tournament_id;
                $data->desc = json_encode([
                    'team_name' => $request->team_name,
                    'team_members_name' => $request->team_members_name,
                    'team_members_username' => $request->team_members_username,
                    'team_members_userid' => $request->team_members_userid,
                    'team_members_phone_number' => $request->team_members_phone_number
                ]);
            } else if ($request->name === 'tournament-member') {
                $data->total = 1;
                $detail = [
                    'member_id' => $request->member_id
                ];

                $data->id_tournament = $request->tournament_id;
                $data->desc = json_encode($detail);
            }
            $data->total_price = $price;
            $data->discount = $discount;
            $data->cashback = $cashback;
            $data->promo_id = $promo;
            $data->save();

            $client = new \GuzzleHttp\Client();
            $res = $client->request(
                    'POST',
                    ENV("MIDTRANS_URL"),
                    [
                        'headers' => [
                            'Content-Type'  => 'application/json',
                            'Application'   => 'application/json',
                            'Authorization' => 'Basic ' . ENV("MIDTRANS_SK")
                        ],
                        'body'    => json_encode($req)
                    ]
                );

            DB::commit();
            return $res->getBody();
        } catch (\Exception $e) {
            Log::info($e);
            DB::rollBack();

            $result['status'] = 'failed';
            $result['message'] = $e->getMessage();
            return $result;
        }
    }

    private function normalizePhoneNumber($phone)
    {
        if (substr($phone, 0, 1) == '0') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 1) == '+') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 2) == '62') {
            $phone = substr($phone, 2);
        }

        return $phone;
    }
}
