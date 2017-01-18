@extends('layouts.app')

@section('meta-title')
    Dungeon sets - @parent
@endsection

@section('meta-description')
    Sets found in dungeons all around Elder Scrolls Online
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div>
                    <div>
                        <h1>Dungeon sets</h1>
                        @foreach($dungeons as $alliance => $zoneDungeons)
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th class="min-width"><img class="alliance-img" src="gfx/alliance_{{$alliance}}.png"></th>
                                    <th><h5>{{ trans('alliance.'.$alliance . "") }}</h5></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($zoneDungeons->sortBy('zone') as $dungeon)
                                    <tr>
                                        <td></td>
                                        <td><a href="{{route('dungeon.show', [$dungeon])}}">{{$dungeon->name}}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
