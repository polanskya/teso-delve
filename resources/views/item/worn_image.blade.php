<div class="item_image">
    @if($equippedItem)
        <span class="item-hover" itemId="{{$equippedItem->id}}">
            <img class="item-icon" src="http://esoicons.uesp.net/{{str_ireplace('.dds', '.png', $equippedItem->icon)}}">
        </span>
    @endif
</div>
