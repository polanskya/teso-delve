<div class="item_image">
    @if($equippedItem and $equippedItem->item)
        <img class="item-icon" src="http://esoicons.uesp.net/{{str_ireplace('.dds', '.png', $equippedItem->item->icon)}}">
    @endif

</div>
