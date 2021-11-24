<?php

use App\Http\Models\AdminAccount;
use App\Http\Models\Menu;
use App\Http\Models\Rank;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminAccount::create([
            'username'       => 'admin',
            'account_number' => '164378',
            'phone'          => '899999999',
            'email'          => 'admin@timkamu.com',
            'address'        => 'Jl. abcd',
            'active'         => '1',
            'role_id'        => 2,
            'password'       => Hash::make('123123tmkmu')
        ]);

        AdminAccount::create([
            'username'       => 'Tria',
            'account_number' => '203981',
            'phone'          => '811111111',
            'email'          => 'tria@timkamu.com',
            'address'        => 'Jl. abcd',
            'active'         => '1',
            'role_id'        => 2,
            'password'       => Hash::make('123tria123@')
        ]);

        AdminAccount::create([
            'username'       => 'Jeffry',
            'account_number' => '398472',
            'phone'          => '87777777777',
            'email'          => 'jeffry@timkamu.com',
            'address'        => 'Jl. abcd',
            'active'         => '1',
            'role_id'        => 2,
            'password'       => Hash::make('88jeff9908!')
        ]);

        Menu::create([
            'name'  => 'ADMIN'
        ]);

        Menu::create([
            'name'  => 'EVENT'
        ]);

        Menu::create([
            'name'  => 'TRANSACTION'
        ]);
    }
}
