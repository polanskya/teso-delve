<?php namespace HeppyKarlsson\EsoImport\Import;

use App\Enum\ItemStyleChapter;
use App\Model\CharacterItemStyle;
use App\Model\ItemStyle as ItemStyleModel;

class ItemStyle
{

    public function process($line, $user) {
        if(stripos($line, 'ITEMSTYLE:') === false) {
            return false;
        }

        $data = explode(';', $line);
        $externalId = intval($data[5]);
        $itemStyle = ItemStyleModel::where('externalId', $externalId)->first();

        if(is_null($itemStyle)) {
            $itemStyle = new ItemStyleModel();
            $itemStyle->externalId = $externalId;
            $itemStyle->name = '';
            $itemStyle->image = $data[4];
            $itemStyle->material = $data[3];
            $itemStyle->save();
        }

        $character = $user->characters->where('externalId', $data[1])->first();
        if(is_null($character)) {
            return true;
        }

        $chapterKnown = explode('-', $data[7]);
        $chapters = ItemStyleChapter::order();

        foreach($chapterKnown as $key => $known) {
            if(stripos($known, 'true') !== false) {
                $characterItemStyle = CharacterItemStyle::firstOrNew([
                    'characterId' => $character->id,
                    'itemStyleId' => $itemStyle->id,
                    'itemStyleChapterEnum' => $chapters[$key],
                    'isKnown' => 1,
                ]);

                $characterItemStyle->save();
            }
        }
    }
}
