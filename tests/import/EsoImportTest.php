<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class EsoImportTest extends TestCase
{
    /**
     * A basic functional test1 example.
     *
     * @return void
     */
    public function testImportData()
    {
        $user = \App\Models\User::find(1);

        $this->be($user)
            ->visit('/import-data')
            ->see('works');
    }

    /**
     * @dataProvider testItemImportData
     */
    public function testItemImport($expectedResult, $user_id, $line)
    {
        $item = new \HeppyKarlsson\EsoImport\Import\Item();
        $itemStyles = \App\Model\ItemStyle::all();
        $user = \App\Models\User::find($user_id);

        $result = $item->process($line, $user, $itemStyles, $user->userItems);
        $this->assertEquals($expectedResult, $result);
    }

    public function testItemImportData()
    {
        return [
            [true, 1, '["BAG-14"] = "ITEM:3.9623432159432;Bogdan the Nightflame\'s Epaulets;18;4;Nightflame;4;1;true;Maximum Magicka Enchantment;/esoui/art/icons/gear_undaunted_titan_shoulders_a.dds;2;160;50;0;8798292061724666;1;true;1;false;|H0:item:59595:363:50:0:0:0:0:0:0:0:0:0:0:0:1:0:0:1:0:10000:0|h|h;Adds |cffffff324|r Maximum Magicka.;Increases Mundus Stone effects by |cffffff6.5|r%.;1179;14;300;0;en",'],
            [false, 1, '["BAG-116"] = "ITE:3.9623432159432;Bogdan the Nightflame\'s Epaulets;18;4;Nightflame;4;1;true;Maximum Magicka Enchantment;/esoui/art/icons/gear_undaunted_titan_shoulders_a.dds;2;160;50;0;8798292061724666;1;true;1;false;|H0:item:59595:363:50:0:0:0:0:0:0:0:0:0:0:0:1:0:0:1:0:10000:0|h|h;Adds |cffffff324|r Maximum Magicka.;Increases Mundus Stone effects by |cffffff6.5|r%.;1179;14;300;0;en",'],
        ];
    }

    /**
     * @dataProvider testCharacterImportData
     */
    public function testCharacterImport($expectedResult, $user_id, $line)
    {
        $user = \App\Models\User::find($user_id);

        $character = new \HeppyKarlsson\EsoImport\Import\Character();
        $result = $character->process($line, $user);

        $this->assertEquals($expectedResult, $result);
    }

    public function testCharacterImportData()
    {
        return [
            [true, 1, '["8798292063127480"] = "CHARACTER:8798292063127480;Zair Rylanor;Sorcerer;2;3;0;Khajiit;9;3;71903000;1487849446;true-false-false;9608;1-1-1;EU Megaserver;@Heppy;114;140;en;34-60-0-60-0-60;0-0-0",'],
            [false, 1, '["8798292063127480"] = "CHARACT:8798292063127480;Zair Rylanor;Sorcerer;2;3;0;Khajiit;9;3;71903000;1487849446;true-false-false;9608;1-1-1;EU Megaserver;@Heppy;114;140;en;34-60-0-60-0-60;0-0-0",'],
        ];
    }
}
