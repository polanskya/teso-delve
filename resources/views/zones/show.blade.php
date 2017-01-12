@extends('layouts.app')

@section('meta-title')
    Sets found in {{$zone['name']}} - @parent
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-8">
                                <h1>{{$zone['name']}}</h1>
                                <ul class="list-unstyled">
                                    @foreach($dungeons as $dungeon)
                                        <li><img src="/gfx/group-instance.png" class="icon-size"> <a href="{{route('dungeon.show', [$dungeon->slug])}}">{{$dungeon->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4">
                                @if(isset($zone['image']))
                                    <img src="/gfx/zones/{{$zone['image']}}" class="max-width">
                                @endif
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
