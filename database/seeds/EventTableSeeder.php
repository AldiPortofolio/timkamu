<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Event;
use App\Http\Models\EventSession;
use Carbon\Carbon;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'name'              => 'BTR VS GFLX',
            'league_game_id'    => 1,
            'team_left_id'      => 4,
            'team_right_id'     => 7,
            'team_left_score'   => 2,
            'team_right_score'  => 1,
            'start_date'        => Carbon::parse('2020-09-11 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'GEEK VS AE',
            'league_game_id'    => 1,
            'team_left_id'      => 6,
            'team_right_id'     => 3,
            'team_left_score'   => 0,
            'team_right_score'  => 2,
            'start_date'        => Carbon::parse('2020-09-11 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'ONIC VS AURA',
            'league_game_id'    => 1,
            'team_left_id'      => 1,
            'team_right_id'     => 2,
            'team_left_score'   => 2,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-12 13:00:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'RRQ VS GEEK',
            'league_game_id'    => 1,
            'team_left_id'      => 8,
            'team_right_id'     => 6,
            'team_left_score'   => 2,
            'team_right_score'  => 1,
            'start_date'        => Carbon::parse('2020-09-12 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'AE VS BTR',
            'league_game_id'    => 1,
            'team_left_id'      => 3,
            'team_right_id'     => 4,
            'team_left_score'   => 2,
            'team_right_score'  => 1,
            'start_date'        => Carbon::parse('2020-09-12 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'AURA VS EVOS',
            'league_game_id'    => 1,
            'team_left_id'      => 2,
            'team_right_id'     => 5,
            'team_left_score'   => 0,
            'team_right_score'  => 2,
            'start_date'        => Carbon::parse('2020-09-13 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'RRQ VS ONIC',
            'league_game_id'    => 1,
            'team_left_id'      => 8,
            'team_right_id'     => 1,
            'team_left_score'   => 2,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-13 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'GFLX VS ONIC',
            'league_game_id'    => 1,
            'team_left_id'      => 7,
            'team_right_id'     => 1,
            'team_left_score'   => 2,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-18 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'AURA VS BTR',
            'league_game_id'    => 1,
            'team_left_id'      => 2,
            'team_right_id'     => 4,
            'team_left_score'   => 0,
            'team_right_score'  => 2,
            'start_date'        => Carbon::parse('2020-09-18 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'EVOS VS GEEK',
            'league_game_id'    => 1,
            'team_left_id'      => 5,
            'team_right_id'     => 6,
            'team_left_score'   => 2,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-19 13:00:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'RRQ VS AURA',
            'league_game_id'    => 1,
            'team_left_id'      => 8,
            'team_right_id'     => 2,
            'team_left_score'   => 2,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-19 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'ONIC VS AE',
            'league_game_id'    => 1,
            'team_left_id'      => 1,
            'team_right_id'     => 3,
            'team_left_score'   => 0,
            'team_right_score'  => 2,
            'start_date'        => Carbon::parse('2020-09-19 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'BTR VS GEEK',
            'league_game_id'    => 1,
            'team_left_id'      => 4,
            'team_right_id'     => 6,
            'team_left_score'   => 2,
            'team_right_score'  => 1,
            'start_date'        => Carbon::parse('2020-09-20 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'EVOS VS GFLX',
            'league_game_id'    => 1,
            'team_left_id'      => 5,
            'team_right_id'     => 7,
            'team_left_score'   => 0,
            'team_right_score'  => 2,
            'start_date'        => Carbon::parse('2020-09-20 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'GFLX VS AE',
            'league_game_id'    => 1,
            'team_left_id'      => 7,
            'team_right_id'     => 3,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-25 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'BTR VS ONIC',
            'league_game_id'    => 1,
            'team_left_id'      => 4,
            'team_right_id'     => 1,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-25 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'GEEK VS AURA',
            'league_game_id'    => 1,
            'team_left_id'      => 6,
            'team_right_id'     => 2,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-26 13:00:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'AE VS EVOS',
            'league_game_id'    => 1,
            'team_left_id'      => 3,
            'team_right_id'     => 5,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-26 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'RRQ VS BTR',
            'league_game_id'    => 1,
            'team_left_id'      => 8,
            'team_right_id'     => 4,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-26 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'GFLX VS RRQ',
            'league_game_id'    => 1,
            'team_left_id'      => 7,
            'team_right_id'     => 8,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-27 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'ONIC VS EVOS',
            'league_game_id'    => 1,
            'team_left_id'      => 1,
            'team_right_id'     => 5,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-09-27 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'RRQ VS AE',
            'league_game_id'    => 1,
            'team_left_id'      => 8,
            'team_right_id'     => 3,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-10-02 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'AURA VS GFLX',
            'league_game_id'    => 1,
            'team_left_id'      => 2,
            'team_right_id'     => 7,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-10-02 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'AE VS AURA',
            'league_game_id'    => 1,
            'team_left_id'      => 3,
            'team_right_id'     => 2,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-10-03 13:00:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'ONIC VS GEEK',
            'league_game_id'    => 1,
            'team_left_id'      => 1,
            'team_right_id'     => 6,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-10-03 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'EVOS VS BTR',
            'league_game_id'    => 1,
            'team_left_id'      => 5,
            'team_right_id'     => 4,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-10-03 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'GFLX VS GEEK',
            'league_game_id'    => 1,
            'team_left_id'      => 7,
            'team_right_id'     => 6,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-10-04 15:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);

        Event::create([
            'name'              => 'EVOS VS RRQ',
            'league_game_id'    => 1,
            'team_left_id'      => 5,
            'team_right_id'     => 8,
            'team_left_score'   => 0,
            'team_right_score'  => 0,
            'start_date'        => Carbon::parse('2020-10-04 18:30:00')->format('Y-m-d H:i:s'),
            'enable_support'    => '0',
            'streaming_link'    => '<iframe src="https://www.nimo.tv/embed/5348200" frameborder="0" scrolling="false" allow="autoplay; fullscreen" width="100%" height="100%" id="ininimotv"></iframe>',
            'type'              => 'UPCOMING',
            'created_by'        => 1
        ]);
    }
}
