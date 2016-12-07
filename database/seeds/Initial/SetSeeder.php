<?php

use Illuminate\Database\Seeder;

class SetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sets = file_get_contents(storage_path('dump/sets.json'));
        $setBonuses = file_get_contents(storage_path('dump/setBonuses.json'));
        $userFavourites = file_get_contents(storage_path('dump/userFavourites.json'));

        $sets = json_decode($sets);
        $setBonuses = json_decode($setBonuses);
        $userFavourites = json_decode($userFavourites);

        foreach($sets as $set) {
            DB::table('sets')->insert((array) $set);
        }

        foreach($setBonuses as $bonus) {
            DB::table('set_bonuses')->insert((array) $bonus);
        }
        foreach($userFavourites as $favourite) {
            DB::table('userSet_favourite')->insert((array) $favourite);
        }

    }
}
