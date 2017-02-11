<span class="set-hover" setId="{{$set->id}}">
            <a href="{{route('set.show', [$set])}}"><strong>{{$set->name}}</strong></a>
    @if($user and isset($setCount) and $setCount > 0)
        <span class="badge">{{$setCount}}</span>
    @endif
</span>