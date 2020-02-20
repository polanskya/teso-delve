<div class="daily-pledge col-md-4">
    <div class="pledge-image" style="background-image: url({{$dungeon->image}})">
        <h5><a href="{{route('dungeon.show', [$dungeon])}}">{{$dungeon->name}}</a> &nbsp;&nbsp; &nbsp;&nbsp;({{$giver}})</h5>
        <div class="sets">
            @foreach($dungeon->sets as $set)
                <span class="set-hover" setid="{{$set->id}}"><a href="{{route('set.show', $set)}}">{{$set->name}}</a></span>
            @endforeach
        </div>
    </div>
</div>