<div class="item_image">
    @if($equippedItem)
        @if(isset($qualityBackground) and $qualityBackground == false)
            <img class="item-icon" src="{{$equippedItem->icon}}">
        @else
            <span class="item-hover quality-square quality-opacity-{{$equippedItem->quality}}" itemId="{{$equippedItem->id}}">
                <img class="item-icon" src="{{$equippedItem->icon}}">
            </span>
        @endif
    @endif
</div>
