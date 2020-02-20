<?php

namespace App\Helpers;

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class XLSHelper
{

    const ROOT_PARSER  = './parsers/';
    const LIB_SET_DATA = self::ROOT_PARSER . '/LibSets/LibSets/LibSets_SetData.xlsx';
    const PLEDGES_LIST_DATA = self::ROOT_PARSER . '/pledges_list.xlsx';


    public function __construct()
    {
        print("XLSHelper constructed");
    }
    
    


    public function getData($inputFileName, $sheetNumer, $rowOffset, $cellsNums)
    {
        // $cellsArray 

        $reader = ReaderEntityFactory::createXLSXReader();
        $reader->open($inputFileName);
        $output[] = (array) null; 
        $count = 0;
       # print(PHP_EOL);
        foreach ($reader->getSheetIterator() as $sheet) {

            if ($sheet->getIndex() == $sheetNumer) {
                foreach ($sheet->getRowIterator() as $row) {
                    if ($rowOffset > $count ) {
                        $count = $count +1 ;
                        continue;
                    }
                    // do stuff with the row
                    $cells = $row->getCells();
                    $record[] = (array) null;
                    foreach ($cellsNums as $cellNu) {
                     #  print('#'.$cells[$cellNu] . '#');
                        $record[$cellNu] = $cells[$cellNu]->getValue() ;
                    }
               #     print(PHP_EOL);
                   # print_r($record);
                   # $output[] = $record;
                    # print("pushng " .$record[4] . ' out count : ' . count($output).PHP_EOL);
                     $output [$count-$rowOffset] = array_filter($record, function($value) {
                        return ($value || is_numeric($value));
                      });

                     unset($record);
                     ++$count;
                    // if ($count==25) {    break; }
                }
            }
        }
        $reader->close();
        return  array_filter($output);
    }
    /**
     * doIt 
     *
     * @return void
     */
    public function doIt()
    {
        $inputFileName = XLSHelper::LIB_SET_DATA;

        $reader = ReaderEntityFactory::createXLSXReader();


        $reader->open($inputFileName);

        foreach ($reader->getSheetIterator() as $sheet) {

            if ($sheet->getIndex() == 3) {
                foreach ($sheet->getRowIterator() as $row) {
                    // do stuff with the row
                    $cells = $row->getCells();
                    print($cells[1 - 1] . ', ' . $cells[3 - 1] . ', '  . $cells[5 - 1] . ', ' .  $cells[15 - 1]  . PHP_EOL);
                }
            }
        }

        $reader->close();
    }
}
