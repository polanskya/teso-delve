<?php
    $url = route('set.show', [$result], true);
?>
<div class="row">
    <h4 class="m-b-0 col-md-6">
        <a href="{{$url}}"><span>{{ $result->name }}</span></a>
    </h4>

    <div class="col-md-6 text-right">
        <span class="label label-gray-lighter m-r-1 label-outline">Set</span>
        @if($result->setTypeEnum != 0)
            <span class="label label-gray-lighter m-r-1 label-outline">{{ trans("enums.SetType.{$result->setTypeEnum}") }}</span>
        @endif
    </div>

    <div class="col-md-12">
        <a href="{{ $url }}" class="text-success m-r-2"><span>{{ $url }}</span></a>
        <p class="m-t-1">
            {{$result->name}} set. <span class="setbonus-list">@foreach($result->bonuses as $bonus) ({{$bonus->bonusNumber}} items) @include('sets.setbonus', ['description' => $bonus->description]). @endforeach</span>
        </p>
        <hr>
    </div>

</div>
