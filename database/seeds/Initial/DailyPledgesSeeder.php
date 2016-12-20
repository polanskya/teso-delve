<?php

use App\Enum\DailyPledges as DailyPledgesEnum;
use App\Model\DailyPledges;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DailyPledgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pledges = DailyPledgesEnum::$schedule;

        $startDate = Carbon::parse(DailyPledgesEnum::$startDate);
        $now = Carbon::now()->addYears(5);
        while($startDate->lt($now)) {
            $pledge = array_shift($pledges);

            $dp = new DailyPledges();
            $dp->pledge1 = $pledge[0];
            $dp->pledge2 = $pledge[1];
            $dp->pledge3 = $pledge[2];
            $dp->date = $startDate;
            $dp->save();

            array_push($pledges, $pledge);
            $startDate->addDay();
        }
    }
}
