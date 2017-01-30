@extends('layouts.app')

@section('meta-title')
    Sets found in {{$zone['name']}} - @parent
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div>
                    <div>

                        <div class="row">
                            <div class="col-md-8">
                                <h1>{{$zone['name']}}</h1>
                            </div>
                            <div class="col-md-4">
                                @if(isset($zone['image']))
                                    <a href="/gfx/zones/{{$zone['image']}}" class="thumbnail no-bg">
                                        <img src="/gfx/zones/{{$zone['image']}}" class="max-width">
                                    </a>
                                @endif
                            </div>

                            <div class="col-md-12">
                                @foreach($dungeons->groupBy('dungeonTypeEnum') as $dungeonTypeEnum => $dungeons)
                                    <div class="col-md-2">

                                        <h5><img src="{{config('gfx.dungeonTypes.'.$dungeons->first()->dungeonTypeEnum)}}" class="icon-size"> @lang('eso.dungeonType.'.$dungeonTypeEnum)s</h5>
                                        <ul class="list-unstyled">
                                            @foreach($dungeons as $dungeon)
                                                <li><a href="{{route('dungeon.show', [$dungeon])}}">{{$dungeon->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <br>

                        <table class="table table-condensed set-table">
                            <thead>
                            </thead>
                            <tbody>
                            @if($user)
                                @foreach($sets->whereIn('id', $favourites) as $set)
                                    @include('sets.set_row')
                                @endforeach
                            @endif

                            @foreach($sets as $set)
                                @if($user and in_array($set->id, $favourites))
                                    @continue
                                @endif

                                @include('sets.set_row')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
