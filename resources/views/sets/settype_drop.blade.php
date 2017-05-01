
@if($set->setTypeEnum == \App\Enum\SetType::ZONE)
    <ul>
        <li><strong>Delve Bosses</strong>: Waist, feet & unique pieces</li>
        <li><strong>World Bosses</strong>: Head, chest, legs, weapons and unique Pieces</li>
        <li><strong>Public dungeon bosses</strong>: Shoulders, hands, weapons and unique pieces</li>
        <li><strong>Dark Anchors</strong>: Jewelry pieces</li>
        <li><strong>Zone treasure chests</strong>: Any set piece</li>
        <li><strong>Random monsters</strong>: Any set piece</li>
    </ul>

@elseif($set->setTypeEnum == \App\Enum\SetType::MONSTER)
    <ul>
        <li><strong>Monster helm</strong>: Drops from the final boss in the dungeon on Veteran mode</li>
        @if(!is_null($set->meta->where('key', 'monster_chest')->first()))
            <li><strong>Shoulders</strong>: Drops from <u><strong>{{ trans('eso.pledgeChest.'.$set->meta->where('key', 'monster_chest')->first()->value) }}'s</strong></u> chest using pledge keys.</li>
        @endif
    </ul>
@elseif($set->setTypeEnum == \App\Enum\SetType::DUNGEON)
    <ul>
        <li><strong>Normal mode</strong>: Bosses will drop blue-quality items</li>
        <li><strong>Veteran mode</strong>: Bosses will drop purple-quality items</li>
        <li><strong>Minibosses</strong>: Hands, waist & feet pieces</li>
        <li><strong>Bosses</strong>: Chest, shoulders, legs and head piece</li>
        <li><strong>Final boss</strong>: Weapon & jewelry pieces</li>
    </ul>
@endif
