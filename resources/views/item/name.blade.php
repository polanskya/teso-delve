<span class="item-hover" itemId="{{$item->id}}"><a href="{{route('item.show', [$item->id])}}" class="quality-text-{{$item->quality}}">{{$item->name}}</a></span>
@if(isset($item->pivot))
    {{ $item->pivot->count > 1 ? "(".$item->pivot->count.")" : '' }}
@elseif(isset($userItem))
    {{ $userItem->count > 1 ? "(".$userItem->count.")" : '' }}
@endif
@if($item->level < 50)
    (lvl: {{$item->level}})
@endif