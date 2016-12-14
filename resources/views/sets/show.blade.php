@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="btn-group pull-right" role="group" aria-label="...">
                            @if(Gate::allows('update', $set))
                                <a href="{{route('set.edit', [$set->id])}}" class="btn btn-default btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            @endif
                            @if($isFavourite)
                                <a href="{{route('set.favourite', [$set->id])}}" class="btn btn-default btn-xs setFavourite"><i class="fa fa-star text-legendary favouriteIcon" aria-hidden="true"></i></a>
                            @else
                                <a href="{{route('set.favourite', [$set->id])}}" class="btn btn-default btn-xs setFavourite"><i class="fa fa-star-o favouriteIcon" aria-hidden="true"></i></a>
                            @endif
                        </div>


                        <div class="row">
                            <div class="col-md-8">
                                <h1>{{$set->name}}</h1>

                                {{$set->description}}

                                <h4>Where to find</h4>
                                <ul>
                                    @foreach($set->dungeons as $dungeon)
                                        <li><a href="{{route('dungeon.show', [$dungeon->id])}}">{{$dungeon->name}}</a></li>
                                    @endforeach
                                    @if($set->craftable)
                                        <li>Craftable: {{$set->traitNeeded}} traits
                                            <ul>
                                                @foreach($set->zones as $zone)
                                                    <li>{{$zone->getZoneInfo()['name']}}</li>
                                                @endforeach
                                            </ul>
                                        </li>

                                    @else
                                        @foreach($set->zones as $zone)
                                            <li>{{$zone->getZoneInfo()['name']}}</li>
                                        @endforeach
                                    @endif

                                </ul>

                                @if(Gate::allows('update', $set))
                                    <form method="post" class="form-horizontal" action="{{route('set.editZones', [$set->id])}}">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <select multiple="multiple" class="form-control" name="zones[]" style="height: 250px;">
                                                    <?php $zones = new \App\Objects\Zones(); ?>
                                                    @foreach($zones->getZonesByAlliance() as $alliance => $zonesList)
                                                        <optgroup label="{{trans('alliance.'.$alliance)}}">
                                                            @foreach($zonesList as $key => $zone)
                                                                <option value="{{$key}}" {{$set->zones->contains('zoneId', $key) ? ' selected="selected"' : ''}}>{{$zone['name']}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <input type="submit" value="Add zones" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                @endif

                                @if($set->bonuses->count() > 0)
                                    <h4>Bonuses</h4>
                                    <ul>
                                        @foreach($set->bonuses as $bonus)
                                            <li class="{{$items->count() >= $bonus->bonusNumber ? 'text-bold' : ''}}">({{$bonus->bonusNumber}} items) {!! $bonus->description !!}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <br>
                                @include('sets/setbox')
                            </div>

                            <div class="col-md-12">

                                <h4>Items you have</h4>
                                <table class="table table-condensed set-table">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        @include('item.item_row', ['hidden' => false])
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
