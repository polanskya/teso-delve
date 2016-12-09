
<?php
$setItems = $items->where('setId', $set->id);
$setCount = $setItems->count();
$isFavourite = in_array($set->id, $favourites)
?>

<tr class="{{ $isFavourite ? 'bg-gray-darker' : ''}}">
    <td>
        <a href="#" class="open-set-row" setId="{{$set->id}}" ><i class="fa fa-chevron-{{$isFavourite ? 'up' : 'down'}}" aria-hidden="true"></i></a>
    </td>
    <td colspan="2"><a href="{{route('set.show', [$set->id])}}"><strong>{{$set->name}}</strong></a> <strong>({{$setCount}})</strong></td>

    <td>
        <span class="label label-success">Healing</span>
        <span class="label label-danger">DPS</span>
        <span class="label label-primary">Tank</span>
    </td>
    <td colspan="4">
        <div class="btn-group pull-right" role="group" aria-label="...">
            @if(Gate::allows('update', $set))
                <a href="{{route('set.edit', [$set->id])}}" class="btn btn-default btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            @endif
            @if($isFavourite)
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-star text-legendary" aria-hidden="true"></i></button>
            @else
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-star-o" aria-hidden="true"></i></button>
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
