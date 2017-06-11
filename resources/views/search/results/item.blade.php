<?php
$url = route('item.show', [$result], true);
?>
<div class="row">
    <div class="col-md-1 p-t-1">
        <img src="{{$result->icon}}" class="auto-size">
    </div>

    <div class="col-md-11">
        <div class="row">
            <h4 class="m-b-0 m-t-0 col-md-6">
                <a href="{{$url}}"><span>{{ ucfirst($result->name) }}</span></a>
            </h4>

            <div class="col-md-6 text-right">
                <span class="label label-gray-lighter m-r-1 label-outline">Item</span>
                <span class="label label-gray-lighter m-r-1 label-outline">Level: {{$result->level}}</span>
                @if($result->championLevel)
                    <span class="label label-gray-lighter m-r-1 label-outline"><img src="/gfx/champion_icon.png" class="icon-size"> {{$result->championLevel}}</span>
                @endif

            </div>

            <div class="col-md-12">
                <a href="{{ $url }}" class="text-success m-r-2"><span>{{ $url }}</span></a>
                <p class="m-t-1">
                    {{ $result->name }}
                    @if($result->set)
                        part of the <a href="{{ route('set.show', [$result]) }}">{{ $result->set->name }}</a> set.
                    @endif

                </p>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <hr>
    </div>
</div>
