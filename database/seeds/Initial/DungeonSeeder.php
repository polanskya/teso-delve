<?php

use Illuminate\Database\Seeder;

class DungeonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dungeons = file_get_contents(storage_path('dump/dungeons.json'));

        $dungeons = json_decode($dungeons);

        foreach($dungeons as $dungeon) {
            DB::table('sets')->insert((array) $dungeon);
        }

    }
}
