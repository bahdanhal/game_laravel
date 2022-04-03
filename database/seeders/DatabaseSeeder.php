<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        $player1 = new \App\Models\User([
            'name' => 'player1',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => '$2a$10$rn6MR79Ubs.q4iHaZgSIN.PDOkHx0kQ9FOjCBEfN37ReAJOb0FLLu', // password
            'remember_token' => Str::random(10),
        ]);
        $player1->save();

        $player2 = new \App\Models\User([
            'name' => 'player2',
            'email' => 'test2@test.com',
            'email_verified_at' => now(),
            'password' => '$2a$10$rn6MR79Ubs.q4iHaZgSIN.PDOkHx0kQ9FOjCBEfN37ReAJOb0FLLu', // password
            'remember_token' => Str::random(10),
        ]);
        $player2->save();

        $map = new \App\Models\Map(['length' => 7, 'width' => 7, 'players_count' => 2, 'turns' => 25, 'rounds' => 10]);
        $map->save();

        $pig = new \App\Models\GameObjectType(['name' => 'pig']);
        $pig->save();
        $player = new \App\Models\GameObjectType(['name' => 'player']);
        $player->save();
        $platform = new \App\Models\GameObjectType(['name' => 'platform']);
        $platform->save();

        $up = new \App\Models\Skill(['name' => 'up', 'game_object_type_id' => $player->id]);
        $up->save();
        
        $down = new \App\Models\Skill(['name' => 'down', 'game_object_type_id' => $player->id]);
        $down->save();
        
        $left = new \App\Models\Skill(['name' => 'left', 'game_object_type_id' => $player->id]);
        $left->save();
        
        $right = new \App\Models\Skill(['name' => 'right', 'game_object_type_id' => $player->id]);
        $right->save();
        
        $stay = new \App\Models\Skill(['name' => 'stay', 'game_object_type_id' => $player->id]);
        $stay->save();
        
    }
}
