
@if($set->setTypeEnum == \App\Enum\SetType::ZONE)
    <li>Delve bosses have a chance to drop a waist or feet set piece from the zone they are located in.</li>
    <li>Each boss also has a small chance to drop a unique set piece.</li>
    <li>Overland group bosses have a 100% chance to drop head, chest, legs, or weapon set piece from the zone they are located in.</li>
    <li>Public dungeon bosses have a chance to drop a shoulder, hand, or weapon set piece from the zone they are located in.</li>
    <li>Treasure Chests gained from defeating a Dark Anchor have a 100% chance to drop a ring or amulet set piece form the zone they are located in.</li>
    <li>Treasure chests found in the world have a chance to grant any set piece that can drop in that zone:
        <ul class="bbcode_list">
            <li>Simple chests have a slight chance of dropping an item set piece.</li>
            <li>Intermediate chests have a good chance of dropping an item set piece</li>
            <li>Advanced and Master chests have a guaranteed chance of dropping an item set piece.</li>
        </ul> </li>
    <li>If you have the Treasure Hunter Champion Passive, both the above chances and quality of an item will be improved.</li>
    <li>Treasure chests found from a Treasure Map have a guaranteed chance to drop one random set piece that can drop in that zone.</li>
    <li>Major quests have been updated to reward a green or blue-quality set piece.</li>
    <li>Regular monsters throughout Tamriel have a small chance of dropping any item set piece that can drop in that zone.</li>
@elseif($set->setTypeEnum == \App\Enum\SetType::MONSTER)
    <li>Monster Masks will drop 100% of the time from the final boss in Veteran mode.</li>
    <li>
        Shoulders have a chance to drop from Pledge

        Chest using Pledge Key.
    </li>
@elseif($set->setTypeEnum == \App\Enum\SetType::DUNGEON)
    <li>Dungeon bosses and mini bosses will now drop a set piece 100% of the time.</li>
    <li>Mini bosses will drop either a hand, waist, or feet set piece.</li>
    <li>Bosses will drop either a chest, shoulder, head or leg set piece.</li>
    <li>The final Boss of a dungeon will drop weapons or jewelry.</li>
    <li>Normal mode dungeon bosses will drop blue-quality items.</li>
    <li>Veteran mode dungeon bosses will drop purple-quality items.</li>
@endif
