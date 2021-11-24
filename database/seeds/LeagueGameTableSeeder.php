<?php

use App\Http\Models\Game;
use Illuminate\Database\Seeder;
use App\Http\Models\League;
use App\Http\Models\LeagueGame;
use Carbon\Carbon;

class LeagueGameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // League
        League::create([
            'name'  => 'MPL Season 6',
            'logo'  => 'img/leagues/mpl-50.png',
            // 'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        League::create([
            'name'  => 'MPL Season 7',
            'logo'  => 'img/leagues/mpl-50.png',
            // 'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        League::create([
            'name'  => 'LCK Season 1',
            'logo'  => 'img/leagues/mpl-50.png',
            // 'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        League::create([
            'name'  => 'MPL Regular Season 2020',
            'logo'  => 'img/leagues/mpl-50.png'
        ]);

        // Game
        Game::create([
            'name'  => 'Mobile Legends',
            'logo'  =>  'img/game-logos/mlbb-50.png'
        ]);

        Game::create([
            'name'  => 'Freefire',
            'logo'  =>  'img/game-logos/freefire-50.png'
        ]);

        Game::create([
            'name'  => 'PUBG',
            'logo'  =>  'img/game-logos/pubg-50.png'
        ]);

        // League Game
        LeagueGame::create([
            'league_id' => 1,
            'game_id'   => 1
        ]);

        LeagueGame::create([
            'league_id' => 2,
            'game_id'   => 1
        ]);

        LeagueGame::create([
            'league_id' => 3,
            'game_id'   => 3
        ]);

        LeagueGame::create([
            'league_id' => 2,
            'game_id'   => 2
        ]);

        LeagueGame::create([
            'league_id' => 4,
            'game_id'   => 1
        ]);
    }
}
