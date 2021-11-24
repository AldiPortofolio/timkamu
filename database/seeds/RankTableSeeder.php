<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Rank;

class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BRONZE
        Rank::create([
            'name' => 'Recruit',
            'value' => 0,
            'special_border' => '0',
            'unique_color'  => '0'
        ]);

        // BRONZE
        Rank::create([
            'name' => 'Bronze I',
            'logo'  => 'img/ranks/ranks-01.png',
            'value' => 25,
            'special_border' => '0',
            'unique_color'  => '0'
        ]);

        Rank::create([
            'name' => 'Bronze II',
            'logo'  => 'img/ranks/ranks-02.png',
            'value' => 50,
            'special_border' => '0',
            'unique_color'  => '0'
        ]);

        Rank::create([
            'name' => 'Bronze III',
            'logo'  => 'img/ranks/ranks-03.png',
            'value' => 100,
            'special_border' => '0',
            'unique_color'  => '0'
        ]);

        // SILVER
        Rank::create([
            'name' => 'Silver I',
            'logo'  => 'img/ranks/ranks-04.png',
            'value' => 200,
            'special_border' => '0',
            'unique_color'  => '0'
        ]);

        Rank::create([
            'name' => 'Silver II',
            'logo'  => 'img/ranks/ranks-05.png',
            'value' => 450,
            'special_border' => '0',
            'unique_color'  => '0'
        ]);

        Rank::create([
            'name' => 'Silver III',
            'logo'  => 'img/ranks/ranks-06.png',
            'value' => 700,
            'special_border' => '0',
            'unique_color'  => '0'
        ]);

        // GOLD
        Rank::create([
            'name' => 'Gold I',
            'logo'  => 'img/ranks/ranks-07.png',
            'value' => 1000,
            'special_border' => '1',
            'unique_color'  => '0'
        ]);

        Rank::create([
            'name' => 'Gold II',
            'logo'  => 'img/ranks/ranks-08.png',
            'value' => 1250,
            'special_border' => '1',
            'unique_color'  => '0'
        ]);

        Rank::create([
            'name' => 'Gold III',
            'logo'  => 'img/ranks/ranks-09.png',
            'value' => 1500,
            'special_border' => '1',
            'unique_color'  => '0'
        ]);

        // STAR
        Rank::create([
            'name' => 'Star I',
            'logo'  => 'img/ranks/ranks-10.png',
            'value' => 2000,
            'special_border' => '1',
            'unique_color'  => '1'
        ]);

        Rank::create([
            'name' => 'Star II',
            'logo'  => 'img/ranks/ranks-11.png',
            'value' => 3000,
            'special_border' => '1',
            'unique_color'  => '1'
        ]);

        Rank::create([
            'name' => 'Star III',
            'logo'  => 'img/ranks/ranks-12.png',
            'value' => 4000,
            'special_border' => '1',
            'unique_color'  => '1'
        ]);

        Rank::create([
            'name' => 'Diamond',
            'logo'  => 'img/ranks/ranks-13.png',
            'value' => 5000,
            'special_border' => '1',
            'unique_color'  => '1'
        ]);
    }
}
