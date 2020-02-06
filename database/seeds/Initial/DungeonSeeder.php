<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        $dungeonsSets = file_get_contents(storage_path('dump/dungeonSets.json'));

        $dungeons = json_decode($dungeons);
        $dungeonSets = json_decode($dungeonsSets);

        foreach ($dungeons as $dungeon) {
            DB::table('dungeons')->insert((array) $dungeon);
        }

        foreach ($dungeonSets as $dungeonSet) {
            DB::table('dungeon_sets')->insert((array) $dungeonSet);
        }
    }
}
