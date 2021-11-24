<?php

namespace App\Http\Controllers\Admin\Export;

use App\Exports\KeystatsExport;
use App\Exports\MemberExport;
use App\Http\Controllers\Controller;
use App\Http\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class ExportsController extends Controller
{
    public function KeyStatsExport(){
        ini_set('memory_limit', '-1');
        $nama_file = 'Visitor Log-'.date('Y-m-d').'.xlsx';
        return Excel::download(new KeystatsExport, $nama_file);
    }

    public function MemberExport2(){
        ini_set('memory_limit', '-1');
        $nama_file = 'Member-'.date('Y-m-d').'.xlsx';
        (new MemberExport)->queue($nama_file);

        $path = storage_path().'/'.'app'.'/'.$nama_file;

        if (file_exists($path)) {
            return response()->download($path);
        }
        return (new MemberExport)->download($nama_file);
//        return (new MemberExport)->download($nama_file);
    }

    public function MemberExport(){
        ini_set('memory_limit', '-1');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        foreach(range('A','V') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }
        $sheet->setCellValue('A1', 'Username');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Phone');
        $sheet->setCellValue('D1', 'Phone Verified');
        $sheet->setCellValue('E1', 'Saldo coin');
        $sheet->setCellValue('F1', 'Saldo LP');
        $sheet->setCellValue('G1', 'Saldo BP');
        $sheet->setCellValue('H1', 'Register date');
        $sheet->setCellValue('I1', 'BP placed');
        $sheet->setCellValue('J1', 'BP earned');
        $sheet->setCellValue('K1', 'Bets placed');
        $sheet->setCellValue('L1', 'Bet win');
        $sheet->setCellValue('M1', 'Bet lose');
        $sheet->setCellValue('N1', 'Win ratio');
        $sheet->setCellValue('O1', 'Total LP recharge in Rp');
        $sheet->setCellValue('P1', 'Total LP recharge count');
        $sheet->setCellValue('Q1', 'Total-checkout in Rp');
        $sheet->setCellValue('R1', 'Total-checkout count');
        $sheet->setCellValue('S1', 'Checkout count (pending)');
        $sheet->setCellValue('T1', 'Checkout count (done)');
        $sheet->setCellValue('U1', 'Checkout count (rejected)');
        $sheet->setCellValue('V1', 'Checkout count (refund)');

        $members = $this->GetDataMember();
        $rows = 2;
        foreach($members as $member){
            $sheet->setCellValue('A' . $rows, $member->username);
            $sheet->setCellValue('B' . $rows, $member->email);
            $sheet->setCellValue('C' . $rows, $member->phone);
            $sheet->setCellValue('D' . $rows, $member->verified_status);
            $sheet->setCellValue('E' . $rows, $member->total_coin);
            $sheet->setCellValue('F' . $rows, $member->total_lp);
            $sheet->setCellValue('G' . $rows, $member->total_bp);
            $sheet->setCellValue('H' . $rows, date("Y-m-d", strtotime($member->created_at)));
            $sheet->setCellValue('I' . $rows, $member->bp_placed);
            $sheet->setCellValue('J' . $rows, $member->bp_earned);
            $sheet->setCellValue('K' . $rows, $member->bets_placed);
            $sheet->setCellValue('L' . $rows, $member->bet_win);
            $sheet->setCellValue('M' . $rows, $member->bet_lose);
            $winRatio = "";
            if($member->bets_placed != 0 || $member->bets_placed != null) {
                $winRatio = round(($member->bet_win / $member->bets_placed * 100), 2) . "%";
            }
            $sheet->setCellValue('N' . $rows, $winRatio);
            $sheet->setCellValue('O' . $rows, $member->lp_recharge_count);
            $sheet->setCellValue('P' . $rows, $member->lp_recharge_rp);
            $sheet->setCellValue('Q' . $rows, $member->total_checkout_rp);
            $sheet->setCellValue('R' . $rows, $member->total_checkout_count);
            $sheet->setCellValue('S' . $rows, $member->checkout_pending);
            $sheet->setCellValue('T' . $rows, $member->checkout_done);
            $sheet->setCellValue('U' . $rows, $member->checkout_rejected);
            $sheet->setCellValue('V' . $rows, $member->checkout_refund);

            $rows++;
        }

        $fileName = 'Member-'.date('Y-m-d').'.xlsx';
        $writer = new Xlsx($spreadsheet);

        $path = storage_path().'/'.'app'.'/'.$fileName;
        $writer->save($path);
        if (file_exists($path)) {
            return response()->download($path);
        }

    }

    private function GetDataMember(){
        ini_set('memory_limit', '-1');
        $query = @"select
                  u.username,
                  u.email,
                  u.phone,
                  CASE WHEN u.phone_verified = '1' THEN 1 ELSE 0 end as verified_status,
                  u.total_coin,
                  u.total_lp,
                  u.total_bp,
                  u.created_at,
                  bp_placed,
                  bets_placed,
                  bp_earned,
                  bet_win,
                  bet_lose,
                  lp_recharge_count,
                  lp_recharge_rp,
                  total_checkout_rp,
                  total_checkout_count,
                  checkout_pending,
                  checkout_done,
                  checkout_rejected,
                  checkout_refund
                from
                  users u
                  left join (
                    select
                      et.user_id,
                      Sum(
                        CAST(
                          REPLACE(
                            JSON_EXTRACT(et.value_detail, '$.value'),
                            '\"',
                            ''
                          ) as unsigned
                        )
                      ) as bp_placed
                    from
                      event_transactions et
                    where
                      et.status = '3'
                    group by
                      et.user_id
                  ) tbl_bp_placed on tbl_bp_placed.user_id = u.id
                  left join (
                    select
                      et.user_id,
                      count(et.user_id) as bets_placed
                    from
                      event_transactions et
                    where
                      et.status = '3'
                    group by
                      et.user_id
                  ) tbl_bets_placed on tbl_bets_placed.user_id = u.id
                  left join (
                    select
                      et.user_id,
                      Sum(
                        CAST(
                          REPLACE(
                            JSON_EXTRACT(et.value_detail, '$.win'),
                            '\"',
                            ''
                          ) as unsigned
                        )
                      ) as bp_earned
                    from
                      event_transactions et
                    where
                      et.`type` = 'WIN'
                      and et.status = '3'
                    group by
                      et.user_id
                  ) tbl_bp_earned on tbl_bp_earned.user_id = u.id
                  left join (
                    select
                      et.user_id,
                      count(et.user_id) as bet_win
                    from
                      event_transactions et
                    where
                      et.`type` = 'WIN'
                      and et.status = '3'
                    group by
                      et.user_id
                  ) tbl_bet_win on tbl_bet_win.user_id = u.id
                  left join (
                    select
                      et.user_id,
                      count(et.user_id) as bet_lose
                    from
                      event_transactions et
                    where
                      et.`type` = 'LOSS'
                      and et.status = '3'
                    group by
                      et.user_id
                  ) tbl_bet_lose on tbl_bet_lose.user_id = u.id
                  left join (
                    select t.user_id, Count(*) as lp_recharge_count from transactions t
                    where
                    t.item_id = 1
                    and t.payment_type not in ('BP', 'COIN')
                    and t.status = 'PAID'
                    group by t.user_id
                  ) tbl_lp_recharge_count on tbl_lp_recharge_count.user_id = u.id
                  left join (
                    select t.user_id, SUM(total_price) as lp_recharge_rp from transactions t
                    where
                    t.item_id = 1
                    and t.payment_type not in ('BP', 'COIN')
                    and t.status = 'PAID'
                    group by t.user_id
                  ) tbl_lp_recharge_rp on tbl_lp_recharge_rp.user_id = u.id
                  left join (
                    select user_id, Sum(total_price) as total_checkout_rp
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    group by t.user_id
                  ) tbl_total_checkout_rp on tbl_total_checkout_rp.user_id = u.id
                  left join (
                    select user_id, count(*) as total_checkout_count
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    group by t.user_id
                  ) tbl_total_checkout_count on tbl_total_checkout_count.user_id = u.id
                  left join (
                    select user_id, count(*) as checkout_pending
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    and t.status = 'PAID'
                    group by t.user_id
                  ) tbl_checkout_pending on tbl_checkout_pending.user_id = u.id
                  left join (
                    select user_id, count(*) as checkout_done
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    and t.status = 'DONE'
                    group by t.user_id
                  ) tbl_checkout_done on tbl_checkout_done.user_id = u.id
                  left join (
                    select user_id, count(*) as checkout_rejected
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    and t.status = 'REJECTED'
                    group by t.user_id
                  ) tbl_checkout_rejected on tbl_checkout_rejected.user_id = u.id
                  left join (
                    select user_id, count(*) as checkout_refund
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    and t.status = 'REFUND'
                    group by t.user_id
                  ) tbl_checkout_refund on tbl_checkout_refund.user_id = u.id
                ";

        return \DB::Select($query);
    }

    public function MemberHistoricalTransactionExport(){
        ini_set('memory_limit', '-1');
        $data = UserTransaction::leftJoin('users', 'users.id', '=', 'user_transactions.user_id')
            ->select(\DB::raw('user_transactions.*, users.username'))
            ->orderBy('user_id')
            ->orderBy('user_transactions.created_at')
            ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        foreach(range('A','E') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

        $sheet->setCellValue('A1', 'Username');
        $sheet->setCellValue('B1', 'Time');
        $sheet->setCellValue('C1', 'Activity');
        $sheet->setCellValue('D1', 'LP');
        $sheet->setCellValue('E1', 'BP');
        $sheet->setCellValue('F1', 'Coin');

        $rows = 2;
        for ($i = 0; $i < count($data); $i++){
            $sheet->setCellValue('A' . $rows, $data[$i]->username);
            $date = Carbon::parse($data[$i]->created_at)->format('d M Y');
            $time = Carbon::parse($data[$i]->created_at)->format('H:i');
            $sheet->setCellValue('B' . $rows, $date." ".$time);
            if(strpos($data[$i], 'Convert') > 0){
                $sheet->setCellValue('C' . $rows, "Conversion");
                if($data[$i]->item_id === 1 || $data[$i+1]->item_id === 1){
                    if($data[$i]->item_id === 1){
                        $value = $data[$i]->value;
                        if($data[$i]->type === 'DB')  $value = -1 * abs($value);

                        $sheet->setCellValue('D' . $rows, number_format($value, 0, '.', ','));
                    }elseif($data[$i+1]->item_id === 1){
                        $value = $data[$i+1]->value;
                        if($data[$i+1]->type === 'DB')  $value = -1 * abs($value);
                        $sheet->setCellValue('D' . $rows, number_format($value, 0, '.', ','));
                    }
                }else{
                    $sheet->setCellValue('D' . $rows, "");
                }

                if($data[$i]->item_id === 2 || $data[$i+1]->item_id === 2){
                    if($data[$i]->item_id === 2){
                        $value = $data[$i]->value;
                        if($data[$i]->type === 'DB')  $value = -1 * abs($value);
                        $sheet->setCellValue('E' . $rows, number_format($value, 0, '.', ','));
                    }elseif($data[$i+1]->item_id === 2){
                        $value = $data[$i+1]->value;
                        if($data[$i+1]->type === 'DB')  $value = -1 * abs($value);
                        $sheet->setCellValue('E' . $rows, number_format($value, 0, '.', ','));
                    }
                }else{
                    $sheet->setCellValue('E' . $rows, "");
                }

                if($data[$i]->item_id === 78 || $data[$i+1]->item_id === 78){
                    if($data[$i]->item_id === 78){
                        $value = $data[$i]->value;
                        if($data[$i]->type === 'DB')  $value = -1 * abs($value);
                        $sheet->setCellValue('F' . $rows, number_format($value, 0, '.', ','));
                    }elseif($data[$i+1]->item_id === 78){
                        $value = $data[$i+1]->value;
                        if($data[$i+1]->type === 'DB')  $value = -1 * abs($value);
                        $sheet->setCellValue('F' . $rows, number_format($value, 0, '.', ','));
                    }
                }else{
                    $sheet->setCellValue('F' . $rows, "");
                }
                $i++;
            }else{
                if($data[$i]->type === 'DB' && $data[$i]->item_id === 2 && (strpos($data[$i]->desc, 'Dukung Tim') > -1 || strpos($data[$i]->desc, 'Tebak') > -1 || strpos($data[$i]->desc, 'Skor Pertandingan') > -1) && strpos($data[$i]->desc, 'Place prediction') === -1){
                    $sheet->setCellValue('C' . $rows, "Pemberian prediksi : ".$data[$i]->desc);
                }else{
                    $sheet->setCellValue('C' . $rows, str_replace(']', '] ',$data[$i]->desc));
                }

                if($data[$i]->item_id === 1){
                    $value = $data[$i]->value;
                    if($data[$i]->type === 'DB')  $value = -1 * abs($value);
                    $sheet->setCellValue('D' . $rows, number_format($value, 0, '.', ','));
                }else{
                    $sheet->setCellValue('D' . $rows, "");
                }

                if($data[$i]->item_id === 2){
                    $value = $data[$i]->value;
                    if($data[$i]->type === 'DB')  $value = -1 * abs($value);
                    $sheet->setCellValue('E' . $rows, number_format($value, 0, '.', ','));
                }else{
                    $sheet->setCellValue('E' . $rows, "");
                }

                if($data[$i]->item_id === 78){
                    $value = $data[$i]->value;
                    if($data[$i]->type === 'DB')  $value = -1 * abs($value);
                    $sheet->setCellValue('F' . $rows, number_format($value, 0, '.', ','));
                }else{
                    $sheet->setCellValue('F' . $rows, "");
                }
            }
            $rows++;
        }
        $fileName = 'All Member Historical Transactions-'.date('Y-m-d').'.xlsx';
        $writer = new Xlsx($spreadsheet);

        $path = storage_path().'/'.'app'.'/'.$fileName;
        $writer->save($path);
        if (file_exists($path)) {
            return response()->download($path);
        }
    }

    public function AllCheckout(){
        ini_set('memory_limit', '-1');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        foreach(range('A','V') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

        $sheet->setCellValue('A1', 'Username');
        $sheet->setCellValue('B1', 'Email');
        $sheet->setCellValue('C1', 'Phone');
        $sheet->setCellValue('D1', 'Total-checkout in Rp');
        $sheet->setCellValue('E1', 'Total-checkout count');
        $sheet->setCellValue('F1', 'Checkout count (pending)');
        $sheet->setCellValue('G1', 'Checkout count (done)');
        $sheet->setCellValue('H1', 'Checkout count (rejected)');
        $sheet->setCellValue('I1', 'Checkout count (refund)');

        $rows = 2;
        $data = $this->DataAllCheckout();
        foreach($data as $obj){
            if($obj->total_checkout_rp === null || $obj->total_checkout_rp === 0 || $obj->total_checkout_rp === "") continue;
            $sheet->setCellValue('A' . $rows, $obj->username);
            $sheet->setCellValue('B' . $rows, $obj->email);
            $sheet->setCellValue('C' . $rows, $obj->phone);
            $sheet->setCellValue('D' . $rows, $obj->total_checkout_rp);
            $sheet->setCellValue('E' . $rows, $obj->total_checkout_count);
            $sheet->setCellValue('F' . $rows, $obj->checkout_pending);
            $sheet->setCellValue('G' . $rows, $obj->checkout_done);
            $sheet->setCellValue('H' . $rows, $obj->checkout_rejected);
            $sheet->setCellValue('I' . $rows, $obj->checkout_refund);
            $rows++;
        }

        $fileName = 'All Checkout - '.date('Y-m-d').'.xlsx';
        $writer = new Xlsx($spreadsheet);

        $path = storage_path().'/'.'app'.'/'.$fileName;
        $writer->save($path);
        if (file_exists($path)) {
            return response()->download($path);
        }
    }

    public function DataAllCheckout(){
        ini_set('memory_limit', '-1');

        $query = @"select
                  u.username,
                  u.email,
                  u.phone,
                  total_checkout_rp,
                  total_checkout_count,
                  checkout_pending,
                  checkout_done,
                  checkout_rejected,
                  checkout_refund
                from
                  users u
                    left join (
                    select user_id, Sum(total_price) as total_checkout_rp
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    group by t.user_id
                  ) tbl_total_checkout_rp on tbl_total_checkout_rp.user_id = u.id
                  left join (
                    select user_id, count(*) as total_checkout_count
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    group by t.user_id
                  ) tbl_total_checkout_count on tbl_total_checkout_count.user_id = u.id
                  left join (
                    select user_id, count(*) as checkout_pending
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    and t.status = 'PAID'
                    group by t.user_id
                  ) tbl_checkout_pending on tbl_checkout_pending.user_id = u.id
                  left join (
                    select user_id, count(*) as checkout_done
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    and t.status = 'DONE'
                    group by t.user_id
                  ) tbl_checkout_done on tbl_checkout_done.user_id = u.id
                  left join (
                    select user_id, count(*) as checkout_rejected
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    and t.status = 'REJECTED'
                    group by t.user_id
                  ) tbl_checkout_rejected on tbl_checkout_rejected.user_id = u.id
                  left join (
                    select user_id, count(*) as checkout_refund
                    from transactions t
                    where t.item_id in
                    (
                        select id from item_conversions ic
                        where child_id in
                        (
                            select id from items where type in ('mlbb', 'freefire','pubgm','valorant','ragnarok','telkomsel', 'xl', 'tri', 'google-play','token')
                        )
                    )
                    and t.status = 'REFUND'
                    group by t.user_id
                  ) tbl_checkout_refund on tbl_checkout_refund.user_id = u.id
                  ";

        return \DB::Select($query);
    }
}
