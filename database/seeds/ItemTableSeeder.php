<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Item;
use App\Http\Models\ItemConversion;
use App\Http\Models\Shop;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Shop
        Shop::create([
            'name' => 'Mobile Legends',
            'alias' => 'mlbb',
            'logo' => 'https://timkamu.com/img/game-thumbs/mlbb.jpg',
            'meta' => 'Diamonds',
            'active' => '1'
        ]);

        Shop::create([
            'name' => 'Garena Freefire',
            'alias' => 'freefire',
            'logo' => 'https://timkamu.com/img/game-thumbs/freefire.jpg',
            'meta' => 'Diamonds',
            'active' => '1'
        ]);

        Shop::create([
            'name' => 'PUBGM',
            'alias' => 'pubg',
            'logo' => 'https://timkamu.com/img/game-thumbs/pubgm.jpg',
            'meta' => 'Unknown Cash',
            'active' => '1'
        ]);

        Shop::create([
            'name' => 'Valoran',
            'alias' => 'valoran',
            'logo' => 'https://timkamu.com/img/game-thumbs/valorant.jpg',
            'meta' => 'Coming Soon'
        ]);

        Shop::create([
            'name' => 'Ragnarok Frontier',
            'alias' => 'ragnarok',
            'logo' => 'https://timkamu.com/img/game-thumbs/ragnarok-frontier.jpg',
            'meta' => 'Coming Soon'
        ]);

        Shop::create([
            'name' => 'COD Mobile',
            'alias' => 'codm',
            'logo' => 'https://timkamu.com/img/game-thumbs/cod-mobile.jpg',
            'meta' => 'Coming Soon'
        ]);

        // Item
        Item::create([
            'name' => 'LP',
            'logo' => 'img/currencies/lp.svg',
            'type' => 'currencies'
        ]);

        Item::create([
            'name' => 'BP',
            'logo' => 'img/currencies/bp.svg',
            'type' => 'currencies'
        ]);

        Item::create([
            'name' => 'Apel Potong',
            'logo' => 'img/items/items-01.png',
            'type' => 'donation'
        ]);

        Item::create([
            'name' => 'Bola Kristal',
            'logo' => 'img/items/items-02.png',
            'type' => 'donation'
        ]);

        Item::create([
            'name' => 'Coklat Mini',
            'logo' => 'img/items/items-03.png',
            'type' => 'donation'
        ]);

        Item::create([
            'name' => 'French Fries Large',
            'logo' => 'img/items/items-04.png',
            'type' => 'donation'
        ]);

        Item::create([
            'name' => 'Ayam Betina',
            'logo' => 'img/items/items-05.png',
            'type' => 'donation'
        ]);

        Item::create([
            'name' => 'Persediaan Bom Nuklir',
            'logo' => 'img/items/items-06.png',
            'type' => 'donation'
        ]);

        Item::create([
            'name' => 'Durian Monthong Besar',
            'logo' => 'img/items/items-07.png',
            'type' => 'donation'
        ]);

        Item::create([
            'name' => 'Mobil Sport',
            'logo' => 'img/items/items-08.png',
            'type' => 'donation'
        ]);

        Item::create([
            'name' => 'Rupiah',
            'type' => 'currencies'
        ]);

        Item::create([
            'name' => '86 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '17 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '25 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '34 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '42 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '51 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '70 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '87 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '96 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '14 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '21 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '29 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '36 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '55 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '92 Diamond',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => 'Starlight Member',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => 'Twilight Pass',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => 'Starlight Member Plus',
            'type' => 'mlbb'
        ]);

        Item::create([
            'name' => '20 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '50 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '70 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '100 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '140 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '210 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '355 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '720 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '860 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '1075 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '1440 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '2000 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '2720 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '4000 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '7290 Diamond',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => 'Freefire Member Mingguan',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => 'Freefire Member Bulanan',
            'type' => 'freefire'
        ]);

        Item::create([
            'name' => '8700 UC',
            'type' => 'pubg'
        ]);

        // Item Conversion
        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 1,
            'value'     => 1000
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 2,
            'value'     => 1
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 4,
            'value'     => 1
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 5,
            'value'     => 5
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 6,
            'value'     => 10
        ]);


        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 7,
            'value'     => 25
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 8,
            'value'     => 50
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 9,
            'value'     => 100
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 10,
            'value'     => 200
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 11,
            'value'     => 500
        ]);

        // diamond mlbb - rupiah
        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 13,
            'value'     => 22000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 14,
            'value'     => 43000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 15,
            'value'     => 63000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 16,
            'value'     => 85000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 17,
            'value'     => 106000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 18,
            'value'     => 127000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 19,
            'value'     => 170000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 20,
            'value'     => 217000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 21,
            'value'     => 214000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 22,
            'value'     => 342000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 23,
            'value'     => 508000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 24,
            'value'     => 683000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 25,
            'value'     => 872000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 26,
            'value'     => 1310000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 27,
            'value'     => 2156000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 28,
            'value'     => 138000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 29,
            'value'     => 138000
        ]);

        ItemConversion::create([
            'parent_id' => 12,
            'child_id'  => 30,
            'value'     => 303000
        ]);

        // diamond mlbb - lp
        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 13,
            'value'     => 22
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 14,
            'value'     => 43
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 15,
            'value'     => 63
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 16,
            'value'     => 85
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 17,
            'value'     => 106
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 18,
            'value'     => 127
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 19,
            'value'     => 170
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 20,
            'value'     => 217
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 21,
            'value'     => 214
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 22,
            'value'     => 342
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 23,
            'value'     => 508
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 24,
            'value'     => 683
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 25,
            'value'     => 872
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 26,
            'value'     => 1310
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 27,
            'value'     => 2156
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 28,
            'value'     => 138
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 29,
            'value'     => 138
        ]);

        ItemConversion::create([
            'parent_id' => 1,
            'child_id'  => 30,
            'value'     => 303
        ]);
    }
}
