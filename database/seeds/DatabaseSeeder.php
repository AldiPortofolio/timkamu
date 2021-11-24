<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(RankTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(LeagueGameTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(ConfigBalancerTableSeeder::class);
        $this->call(PromoTableSeeder::class);
    }
}
