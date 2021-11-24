<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Team;
use App\Http\Models\TeamLeagueGame;
use App\Http\Models\TeamMember;
use App\Http\Models\TeamMemberRole;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Team
        // 1
        Team::create([
            'name'          => 'ONIC',
            'alias'         => 'onic',
            'logo'          => 'img/team-logos/onic',
            'website'       => 'https://',
            'formed_date'   => '2020-08-01',
        ]);

        // 2
        Team::create([
            'name'          => 'Aura',
            'alias'         => 'aura',
            'logo'          => 'img/team-logos/aura',
            'website'       => 'https://',
            'formed_date'   => '2020-08-01',
        ]);

        // 3
        Team::create([
            'name'          => 'AE',
            'alias'         => 'alter',
            'logo'          => 'img/team-logos/alter',
            'website'       => 'https://',
            'formed_date'   => '2020-08-01',
        ]);

        // 4
        Team::create([
            'name'          => 'Bigetron',
            'alias'         => 'btr',
            'logo'          => 'img/team-logos/btr',
            'website'       => 'https://',
            'formed_date'   => '2020-08-01',
        ]);

        // 5
        Team::create([
            'name'          => 'EVOS',
            'alias'         => 'evos',
            'logo'          => 'img/team-logos/evos',
            'website'       => 'https://',
            'formed_date'   => '2020-08-01',
        ]);

        // 6
        Team::create([
            'name'          => 'GeekFam',
            'alias'         => 'geek',
            'logo'          => 'img/team-logos/geekfam',
            'website'       => 'https://',
            'formed_date'   => '2020-08-01',
        ]);

        // 7
        Team::create([
            'name'          => 'Genflix',
            'alias'         => 'gflx',
            'logo'          => 'img/team-logos/gflx',
            'website'       => 'https://',
            'formed_date'   => '2020-08-01',
        ]);

        // 8
        Team::create([
            'name'          => 'RRQ',
            'alias'         => 'RRQ',
            'logo'          => 'img/team-logos/rrq',
            'website'       => 'https://',
            'formed_date'   => '2020-08-01',
        ]);
    }
}
