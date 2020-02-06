<?php namespace App\Jobs;

use App\Enum\ArmorType;
use App\Enum\CraftingType;
use App\Enum\ResearchLine;
use App\Model\CraftingItem;
use App\Model\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CraftingTable implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;


    public function handle() {

        $clothingMedium = ResearchLine::clothing(ArmorType::MEDIUM);
        $clothingLight = ResearchLine::clothing(ArmorType::LIGHT);

        $materials = [
            // Blacksmithing
            ['link' => '|H0:item:5413:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 1, 'end-level' => 14, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::BLACKSMITHING, 'armor-start' => 5],
            ['link' => '|H0:item:4487:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 16, 'end-level' => 24, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::BLACKSMITHING, 'armor-start' => 6],
            ['link' => '|H0:item:23107:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 26, 'end-level' => 34, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::BLACKSMITHING, 'armor-start' => 7],
            ['link' => '|H0:item:6000:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 36, 'end-level' => 44, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::BLACKSMITHING, 'armor-start' => 8],
            ['link' => '|H0:item:6001:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 46, 'end-level' => 50, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::BLACKSMITHING, 'armor-start' => 9],

            ['link' => '|H0:item:46127:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 10, 'end-champ' => 30, 'smithing-type' => CraftingType::BLACKSMITHING, 'armor-start' => 10],
            ['link' => '|H0:item:46128:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 40, 'end-champ' => 60, 'smithing-type' => CraftingType::BLACKSMITHING, 'armor-start' => 11],
            ['link' => '|H0:item:46129:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 70, 'end-champ' => 80, 'smithing-type' => CraftingType::BLACKSMITHING, 'armor-start' => 12],
            ['link' => '|H0:item:46130:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 90, 'end-champ' => 140, 'smithing-type' => CraftingType::BLACKSMITHING, 'armor-start' => 13],
            ['link' => '|H0:item:64489:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 150, 'end-champ' => 160, 'smithing-type' => CraftingType::BLACKSMITHING, 'armor-start' => 13],


            // Clothing light
            ['link' => '|H0:item:811:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 1, 'end-level' => 14, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 5, 'researchLines' => $clothingLight],
            ['link' => '|H0:item:4463:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 16, 'end-level' => 24, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 6, 'researchLines' => $clothingLight],
            ['link' => '|H0:item:23125:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 26, 'end-level' => 34, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 7, 'researchLines' => $clothingLight],
            ['link' => '|H0:item:23126:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 36, 'end-level' => 44, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 8, 'researchLines' => $clothingLight],
            ['link' => '|H0:item:23127:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 46, 'end-level' => 50, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 9, 'researchLines' => $clothingLight],
            ['link' => '|H0:item:46131:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 10, 'end-champ' => 30, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 10, 'researchLines' => $clothingLight],
            ['link' => '|H0:item:46132:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 40, 'end-champ' => 60, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 11, 'researchLines' => $clothingLight],
            ['link' => '|H0:item:46133:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 70, 'end-champ' => 80, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 12, 'researchLines' => $clothingLight],
            ['link' => '|H0:item:46134:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 90, 'end-champ' => 140, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 13, 'researchLines' => $clothingLight],
            ['link' => '|H0:item:64504:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 150, 'end-champ' => 160, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 13, 'researchLines' => $clothingLight],


            // Clothing medium
            ['link' => '|H0:item:794:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 1, 'end-level' => 14, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 5, 'researchLines' => $clothingMedium],
            ['link' => '|H0:item:4447:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 16, 'end-level' => 24, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 6, 'researchLines' => $clothingMedium],
            ['link' => '|H0:item:23099:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 26, 'end-level' => 34, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 7, 'researchLines' => $clothingMedium],
            ['link' => '|H0:item:23100:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 36, 'end-level' => 44, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 8, 'researchLines' => $clothingMedium],
            ['link' => '|H0:item:23101:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 46, 'end-level' => 50, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 9, 'researchLines' => $clothingMedium],
            ['link' => '|H0:item:46135:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 10, 'end-champ' => 30, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 10, 'researchLines' => $clothingMedium],
            ['link' => '|H0:item:46136:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 40, 'end-champ' => 60, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 11, 'researchLines' => $clothingMedium],
            ['link' => '|H0:item:46137:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 70, 'end-champ' => 80, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 12, 'researchLines' => $clothingMedium],
            ['link' => '|H0:item:46138:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 90, 'end-champ' => 140, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 13, 'researchLines' => $clothingMedium],
            ['link' => '|H0:item:64506:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 150, 'end-champ' => 160, 'smithing-type' => CraftingType::CLOTHIER, 'armor-start' => 13, 'researchLines' => $clothingMedium],

            // Woodworking
            ['link' => '|H0:item:803:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 1, 'end-level' => 14, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::WOODWORKING, 'armor-start' => 3],
            ['link' => '|H0:item:533:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 16, 'end-level' => 24, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::WOODWORKING, 'armor-start' => 4],
            ['link' => '|H0:item:23121:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 26, 'end-level' => 34, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::WOODWORKING, 'armor-start' => 5],
            ['link' => '|H0:item:23122:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 36, 'end-level' => 44, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::WOODWORKING, 'armor-start' => 6],
            ['link' => '|H0:item:23123:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 46, 'end-level' => 50, 'start-champ' => null, 'end-champ' => null, 'smithing-type' => CraftingType::WOODWORKING, 'armor-start' => 7],
            ['link' => '|H0:item:46139:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 10, 'end-champ' => 30, 'smithing-type' => CraftingType::WOODWORKING, 'armor-start' => 8],
            ['link' => '|H0:item:46140:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 40, 'end-champ' => 60, 'smithing-type' => CraftingType::WOODWORKING, 'armor-start' => 9],
            ['link' => '|H0:item:46141:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 70, 'end-champ' => 80, 'smithing-type' => CraftingType::WOODWORKING, 'armor-start' => 10],
            ['link' => '|H0:item:46142:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 90, 'end-champ' => 140, 'smithing-type' => CraftingType::WOODWORKING, 'armor-start' => 11],
            ['link' => '|H0:item:64502:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0:0|h|h', 'start-level' => 50, 'end-level' => 50, 'start-champ' => 150, 'end-champ' => 160, 'smithing-type' => CraftingType::WOODWORKING, 'armor-start' => 12],

        ];


        foreach($materials as $material) {
            $item = Item::where('itemLink', $material['link'])->where('lang', 'en')->first();

            $craftingItems = CraftingItem::where('smithingTypeEnum', $material['smithing-type'])
                ->where('level', '>=', $material['start-level'])
                ->where('level', '<=', $material['end-level'])
                ->when(is_null($material['start-champ']), function($query) use ($material) {
                    return $query->whereNull('championLevel');
                })
                ->when($material['start-champ'], function($query) use ($material) {
                    return $query->where('championLevel', '>=', $material['start-champ']);
                })
                ->when($material['end-champ'], function($query) use ($material) {
                    return $query->where('championLevel', '<=', $material['end-champ']);
                })
                ->orderBy('level', 'championLevel')
 //               ->orderBy('level')->orderBy('championLevel') // potential error
                ->get();

            if($craftingItems->first()->championLevel == null) {
                $craftingItemsLevel = $craftingItems->groupBy('level');
            }
            else {
                $craftingItemsLevel = $craftingItems->groupBy('championLevel');
            }

            $craftingItemsLevel = $craftingItemsLevel->sort();
            $start = $material['armor-start'];
            foreach($craftingItemsLevel as $level => $cis) {
                $this->updateCraftingItems($cis, $start, $item, $material);
                $start++;
            }

        }
    }

    private function getBonus($material, $ci, $armorStart) {
        $smithingType = $material['smithing-type'];
        $researchLineIndex = $ci->researchLineIndex;
        $bonus = 0;

        if($smithingType == CraftingType::BLACKSMITHING) {
            if ($researchLineIndex == ResearchLine::Cuirass) {
                $bonus = 2;
            }

            if ($researchLineIndex == ResearchLine::Greaves) {
                $bonus = 1;
            }

            if ($researchLineIndex == ResearchLine::Dagger) {
                $bonus = -3;
            }

            if(in_array($researchLineIndex, [ResearchLine::Sword,  ResearchLine::Axe, ResearchLine::Mace])) {
                $bonus = -2;
            }
        }

        if($smithingType == CraftingType::CLOTHIER) {

            if (in_array($researchLineIndex, [ResearchLine::Robe_AND_Jerkin, ResearchLine::Jack])) {
                $bonus = 2;
            }

            if (in_array($researchLineIndex, [ResearchLine::Breeches, ResearchLine::Guards])) {
                $bonus = 1;
            }

        }

        if($smithingType == CraftingType::WOODWORKING) {

            if($researchLineIndex == ResearchLine::Shield) {
                $bonus = 3;
            }


            if($researchLineIndex == ResearchLine::Shield and ($ci->championLevel >= 150)) {
                $bonus = $bonus - 1;
            }

        }


        if ($ci->championLevel == config('eso.champion-level.gear-max')) {
            $previous = $armorStart - 1 + $bonus;
            $bonus = $previous * 10;
            $bonus = $bonus - $armorStart;
        }

        return $bonus;
    }

    private function updateCraftingItems($craftingItems, $armorStart, $item, $material) {
        $craftingItems = $craftingItems->sort();

        foreach($craftingItems as $ci) {

            if(isset($material['researchLines']) and !in_array($ci->researchLineIndex, $material['researchLines'])) {
                continue;
            }

            $bonus = $this->getBonus($material, $ci, $armorStart);
            Log::info($item);
            Log::info($item->id);
            $ci->material_id = $item->id;
            $ci->materialCount = $bonus + $armorStart;
            $ci->save();
        }
    }

}