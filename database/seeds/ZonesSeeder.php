<?php

use Illuminate\Database\Seeder;
use App\Helpers\XLSHelper;
use App\Model\Zone;
use App\Enum\DLC;
use App\Enum\Alliance;
use App\Objects\Zones;

class ZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ZONES= new Zones();
        $cells = array(0, 2, 4, 13,14);

        DB::table('zones')->truncate();
        print("run seed");
        $helper = new XLSHelper();
        $arr = $helper->getData(XLSHelper::LIB_SET_DATA, 3,  2, $cells);
        print(PHP_EOL . '' . count($arr). PHP_EOL );
        foreach ($arr as $row) { 
            $zone  = new Zone();
            $zone->id = $row[0];
            $zone->parent_zone_id = $row[2];
            $zone->name = $row[4];
            $zone->dlc= $row[13];

            $zone->dlc_name =DLC::getConstant($zone->dlc);
            $zone->alliance =Alliance::NEUTRAL;
            $zone->hidden = false;
           
            if ( ($zone->id == 1192 || $zone->id == 1193) && ($zone->dlc == DLC::DLC_HARROWSTORM )) {
                   continue;
            }

          #  print($zone->isParent());
           
        //    if ($zone->isParent()) {
               $zone->generateSlug();
               $zoneObj = $ZONES->getZoneBySlug($zone->slug);
              
             if  ( isset($zoneObj)) {
                $alliance = $zoneObj['Alliance'];
                $zone->alliance = $alliance;
              #  print($aliance);
              } 
              $zone->save();
              print_r($row);
           // }
          
       }
      // DB::statement('UPDATE dungeons_new SET  alliance = zones.alliance from zones  WHERE zone = zones.id');
    }
}
