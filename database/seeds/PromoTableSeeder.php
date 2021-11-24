<?php

use App\Http\Models\Promo;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PromoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promo::create([
            'title' => 'Diskon 25% cash (game topup)',
            'desc' => 'Potongan 25% untuk setiap pembelian Game Diamonds menggunakan uang tunai (GoPay, OVO etc) di TimKamu.com.',
            'limit' => 'No Limit',
            'start_date' => Carbon::parse('2020-11-12 18:30')->format('Y-m-d H:i')
        ]);
    }
}
