<?php

use App\Http\Models\Rank;
use Illuminate\Database\Seeder;
use App\Http\Models\User;
use App\Http\Models\UserTransaction;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'       => 'user5',
            'account_number' => '11223232',
            'phone'          => '8123996789',
            'email'          => 'test5@email.com',
            'otp_code'       => '123459',
            'phone_verified' => '1',
            'email_verified' => '1',
            'role_id'        => 3,
            'password'       => Hash::make('asdf')
        ]);
    }
}
