<?php

use App\Http\Models\ConfigBalancer;
use Illuminate\Database\Seeder;

class ConfigBalancerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigBalancer::create([
            'rules' => 50,
            'value' => 90
        ]);

        ConfigBalancer::create([
            'rules' => 55,
            'value' => 85
        ]);

        ConfigBalancer::create([
            'rules' => 60,
            'value' => 70
        ]);

        ConfigBalancer::create([
            'rules' => 65,
            'value' => 50
        ]);

        ConfigBalancer::create([
            'rules' => 70,
            'value' => 40
        ]);

        ConfigBalancer::create([
            'rules' => 75,
            'value' => 35
        ]);

        ConfigBalancer::create([
            'rules' => 80,
            'value' => 30
        ]);

        ConfigBalancer::create([
            'rules' => 85,
            'value' => 15
        ]);

        ConfigBalancer::create([
            'rules' => 90,
            'value' => 10
        ]);

        ConfigBalancer::create([
            'rules' => 95,
            'value' => 5
        ]);
    }
}
