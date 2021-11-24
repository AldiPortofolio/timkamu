<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SILVER
        Role::create([
            'name' => 'SUPERADMIN',
        ]);

        Role::create([
            'name' => 'ADMIN',
        ]);

        Role::create([
            'name' => 'USER',
        ]);

        Role::create([
            'name' => 'MANAGER',
        ]);

        Role::create([
            'name' => 'CEO',
        ]);

        Role::create([
            'name' => 'MEMBER',
        ]);

        Role::create([
            'name' => 'STAFF',
        ]);
    }
}
