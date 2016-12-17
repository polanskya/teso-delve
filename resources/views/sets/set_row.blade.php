
<?php
$setItems = $items->where('setId', $set->id);
$setCount = $setItems->count();
$isFavourite = in_array($set->id, $favourites)
?>

<tr class="{{ $isFavourite ? 'bg-gray-darker' : ''}} set-row-{{$set->id}}">
    <td>
        <a href="#" class="open-set-row" setId="{{$set->id}}" ><i class="fa fa-chevron-{{$isFavourite ? 'up' : 'down'}}" aria-hidden="true"></i></a>
    </td>
    <td colspan="2">
        <div class="set-hover" setId="{{$set->id}}">
            <a href="{{route('set.show', [$set->id])}}"><strong>{{$set->name}}</strong></a> <strong>({{$setCount}})</strong>
        </div>
    </td>

    <td>

    </td>
    <td colspan="4">
        <div class="btn-group pull-right" role="group" aria-label="...">
            @if(Gate::allows('update', $set))
                <a href="{{route('set.edit', [$set->id])}}" class="btn btn-default btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            @endif
            @if($isFavourite)
                <a href="{{route('set.favourite', [$set->id])}}" class="btn btn-default btn-xs setFavourite" data-toggle="tooltip" title="Toggle as favourite set"><i class="fa fa-star text-legendary favouriteIcon" aria-hidden="true"></i></a>
            @else
                <a href="{{route('set.favourite', [$set->id])}}" class="btn btn-default btn-xs setFavourite" data-toggle="tooltip" title="Toggle as favourite set"><i class="fa fa-star-o favouriteIcon" aria-hidden="true"></i></a>
            @endif
        </div>
    </td>
</tr>


@if($setItems->count() > 0)
    @foreach($setItems->sortBy('equipType') as $item)
        @include('item.item_row', ['hidden' => !$isFavourite])
    @endforeach
@else
    <tr class="set-member-{{$set->id}} {{$isFavourite == false ? 'hidden' : ''}}">
        <td></td>
        <td colspan="7">None</td>
    </tr>
@endif
