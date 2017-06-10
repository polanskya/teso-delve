<?php
$url = route('dungeon.show', [$result], true);
?>
<div class="row">
    @if(!empty($result->image))
        <div class="col-md-3">
            <img class="auto-size" src="{{$result->image}}">
        </div>
    @endif
    <div class="{{empty($result->image) ? 'col-md-12' : 'col-md-9'}}">
        <h4 class="m-b-0 col-md-6">
            <a href="{{$url}}"><span>{{ $result->name }}</span></a>
        </h4>

        <div class="col-md-6 text-right">
            <span class="label label-gray-lighter m-r-1 label-outline">Dungeon</span>
        </div>

        <div class="col-md-12">
            <a href="{{ $url }}" class="text-success m-r-2"><span>{{ $url }}</span></a>
            <p class="m-t-1">
                {{ $result->name }}
                drops
                @foreach($result->sets as $set)
                    <a href="{{route('set.show', [$set])}}">{{$set->name}},</a>
                @endforeach


            </p>
        </div>
    </div>

    <div class="col-md-12">
        <hr>
    </div>

</div>
