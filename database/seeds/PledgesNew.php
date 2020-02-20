<?php

use Illuminate\Database\Seeder;
use App\Helpers\XLSHelper;
use App\Model\Dungeon;
use Carbon\Carbon;
use App\Model\DailyPledges;

class PledgesNew extends Seeder
{



  function findDungeonId($items, $item)
  {
    print(PHP_EOL . "INPUT  "  . $item);
    $found = array_search($item, array_column($items, 'name'));
    #  print(PHP_EOL . "FOUND  "  . $found);


    if ($found || $found == 0) {
      #print(PHP_EOL . $found. " Found: " . $items[$found]['id'] . ' -> #' . $items[$found]['name'].'#');
    } else {
      print(PHP_EOL . $found . "NOT Found: #"  . $item . '#');
    }
    return $items[$found]['id'];
  }

  function populate($startDateVar, $arr)
  {
    $startDate = Carbon::parse($startDateVar);
    $baseArray = (new ArrayObject($arr))->getArrayCopy();
    $now = Carbon::now() -> addYears(2);
    $dlc_count_offset = count($arr) - 12;

    while ($startDate->lt($now)) {
      $pledge = array_shift($arr);
      $pedgeBase =   array_shift($baseArray);

      if (!isset($pedgeBase[1])) {
        # print(PHP_EOL . 'NEED REST');
        for ($x = 0; $x < $dlc_count_offset; $x++) {
          $pedgeBase =   array_shift($baseArray);
          array_push($baseArray, $pedgeBase);
          #print(PHP_EOL . 'NEED REST');
        }
      }

      print(PHP_EOL . $startDate . ': ' .  $pedgeBase[0] . ' /  '    . $pedgeBase[1]  . '  /  '  . $pledge[2]);

      $dp = new DailyPledges();
      $dp->pledge1 = $pedgeBase[0];
      $dp->pledge2 = $pedgeBase[1];
      $dp->pledge3 = $pledge[2];
      $dp->date = $startDate;
      $dp->save();

      array_push($arr, $pledge);
      array_push($baseArray, $pedgeBase);



      $startDate->addDay();
    }
  }
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $startDateVar = '2019-10-17';

    $cells = array(0, 1, 2);
    print("run seed");
    $helper = new XLSHelper();
    $arr = $helper->getData(XLSHelper::PLEDGES_LIST_DATA, 0,  1, $cells);
    $items  = Dungeon::select('id', 'name')->get()->toArray();
    #print_r($items);
    $output[] = (array) null;
    foreach ($arr as $row) {
      # print_r($row);
      $record[] = (array) null;
      if (isset($row[0])) {
        $id = self::findDungeonId($items, $row[0]);
        print($id);
        $record[0] = $id;
        $id = self::findDungeonId($items, $row[1]);
        $record[1] = $id;
      }
      $stripDlc =  trim(substr_replace($row[2], '', stripos($row[2], "(")));
      $id = self::findDungeonId($items, $stripDlc);
      $record[2] = $id;
      array_push($output, $record);
      unset($record);
      $output = array_filter($output);
      /*$found= array_search($row[0], array_column($items, 'name'));
         
         if ($found>=0) {
           print(PHP_EOL . $found. " Found: " . $items[$found]['id'] . ' -> ' . $items[$found]['name']);
         } else {
             print(PHP_EOL . $found. "NOT Found: " .$row[0]);
         }     */
    }
    print_r($output);
    self::populate($startDateVar, $output);
  }
}
