<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Http\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Constraint\Count;

class MessageController extends Controller
{
    public function index()
    {
        ini_set('memory_limit', '-1');
        $this->SendMessage();
    }

    private function GetDataVerifiedAndBetters(){
        $users = \DB::table('users')
            ->select(\DB::raw('users.id, users.username, users.phone, users.phone_verified'))
            ->whereRaw("users.phone_verified = '1' AND users.id NOT IN (select user_id from messages where sent = '1')")
            ->orderByRaw('users.id')
            ->limit(100)
            ->get();



        return $users;
    }

    private function SendMessage(){
        $urlendpoint = 'http://sms114.xyz/sms/api_whatsapp_send_json.php'; // url endpoint api
        $apikey      = 'd60897a1268b35b0c577c486097dc17b'; // api key
        $waid        = 'WK8W';

        $senddata = array(
            'apikey' => $apikey,
            'waid' => $waid,
            'datapacket'=>array()
        );

        $message = @'*Jadwal Pertandingan M2 Sabtu-Minggu Grand Finals 2021*

*Sabtu 23/01:*
Omega Vs Alterego - 10.00
Bren Vs Todak - 12.30
Burmese Ghouls Vs RRQ - 15.00
Pemenang Match 5 Vs Pemenang Match 6 - 19.00

*Minggu 24/01:*
Lower bracket final - 11.00
GRAND FINAL - 18.00

Link: https://timkamu.com/events

Lebih dari ratusan prediksi tersedia. Datang dan berikan dukungan dan prediksi kamu hanya di TimKamu!

*Prediksi tersedia 1-2 jam sebelum pertandingan*';

        $users = $this->GetDataVerifiedAndBetters();
        if($users == null || Count($users) <= 0){
            echo "Broadcast Telah Terkirim";
            return true;
        }
        $index = 0;
        $dataMessages = array();
        foreach ($users as $user){
            $index++;
            $number =  $this->normalizePhoneNumber($user->phone);
            array_push($senddata['datapacket'],array(
                'number' => trim($number),
                'message' => $message
            ));

            array_push($dataMessages,array(
                'user_id' => $user->id,
                'content' => $message,
                'sent' => '1',
                'sent_date'=> date("Y-m-d")
            ));



            if($index == 5){
                $response = Http::post($urlendpoint, $senddata);
                Message::insert($dataMessages);
                $index = 0;
                $senddata['datapacket'] = array();
                $dataMessages = array();
            }
        }

        if( $index > 0){
            $response = Http::post($urlendpoint, $senddata);
            Message::insert($dataMessages);
            $senddata['datapacket'] = array();
            $dataMessages = array();
        }
        echo "Broadcast Telah Terkirim";
    }

    private function normalizePhoneNumber($phone)
    {
//        $phone = str_replace("-","",$phone);
//        $phone = str_replace(" ","",$phone);

        if (substr($phone, 0, 1) == '0') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 1) == '+') {
            $phone = substr($phone, 1);
        }
        if (substr($phone, 0, 2) == '62') {
            $phone = substr($phone, 2);
        }

        return '62'.$phone;
    }

    private function CobaInsert(){
        $insert = \DB::insert('insert into coba_scheduler (name) values (?)', ['aldi']);
    }
}
