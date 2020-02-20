<?php

use Illuminate\Database\Seeder;
use App\Helpers\XLSHelper;
use App\Model\Zone;
use App\Enum\DLC;
use App\Enum\Alliance;
use App\Enum\DungeonType;


use App\Model\Dungeon;
use App\Objects\Zones;

class DungeonSeederAuto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       # $ZONES= new Zones();
        $cells = array(1, 3, 4,5,7,9);
        DB::table('dungeons_new')->truncate();
      #  DB::table('zones')->truncate();
        print("run seed");
        $helper = new XLSHelper();
        $arr = $helper->getData(XLSHelper::LIB_SET_DATA, 1,  2, $cells);
      #  print(PHP_EOL . '' . count($arr). PHP_EOL );
      #  print_r($arr);
        foreach ($arr as $row) { 
          $item  = new Dungeon();
          
          $isVeteran = filter_var(    $row[3], FILTER_VALIDATE_BOOLEAN); 
          $isTrial = filter_var(    $row[4], FILTER_VALIDATE_BOOLEAN); 
         # print_r($row);
          #print($isVeteran );


          if (!$isVeteran) {     continue; }

          if( $row[9] > DLC::DLC_HARROWSTORM) {  continue;      }

          $item->name = $row[1];
          $item->id = $row[5];

          $item->zone_id = $row[7];
          $item->alliance =4;
          $item->type = $isTrial ? DungeonType::TRIAL : DungeonType::GROUP_DUNGEON;
          $item->groupsize = $isTrial ? 12: 4;
          $item->description = $item->name;
          $item->dlc =$row[9];
          $item->dlc_name =DLC::getConstant($item->dlc);
         // $item->dlcEnum = $row[13];
         $item ->save();
         
        }
        DB::statement('UPDATE dungeons_new SET  alliance = zones.alliance from zones  WHERE zone_id = zones.id');


    }
}
