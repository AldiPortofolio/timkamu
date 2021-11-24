<?php

namespace App\Exports;
use App\Http\Models\User;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Queue\ShouldQueue;

class MemberExport implements FromQuery, WithHeadings, ShouldAutoSize, ShouldQueue
{
    use Exportable;

    public function query()
    {
        return User::query()
                ->leftJoin(\DB::raw("(
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
                  ) tbl_bp_placed"), 'tbl_bp_placed.user_id', '=', 'users.id')
            ->leftJoin(\DB::raw("(
                    select
                      et.user_id,
                      count(et.user_id) as bets_placed
                    from
                      event_transactions et
                    where
                      et.status = '3'
                    group by
                      et.user_id
                  ) tbl_bets_placed"), 'tbl_bets_placed.user_id', '=', 'users.id')
            ->leftJoin(\DB::raw("(
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
                  ) tbl_bp_earned"), 'tbl_bp_earned.user_id', '=', 'users.id')
            ->leftJoin(\DB::raw("(
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
                  ) tbl_bet_win "), 'tbl_bet_win.user_id', '=', 'users.id')
            ->leftJoin(\DB::raw("(
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
                  ) tbl_bet_lose"), 'tbl_bet_lose.user_id', '=', 'users.id')
            ->selectRaw(
                '
                users.username,
                users.email,
                users.phone,
                users.phone_verified,
                users.total_coin,
                users.total_lp,
                users.total_bp,
                CAST(users.created_at AS DATE) AS regiter_date, bp_placed, bets_placed, bp_earned, bet_win, bet_lose'
            );
    }

    public function headings(): array
    {
        return [
            'Username',
            'Email',
            'Phone',
            'Phone Verified',
            'Saldo coin',
            'Saldo lp',
            'Saldo bp',
            'Register date',
            'Bp placed',
            'Bets placed',
            'Bp earned',
            'Bet win',
            'Bet lose',
        ];
    }

    public function array(): array
    {
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
                  bet_lose
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
                ";

        return \DB::Select($query);
    }


}
