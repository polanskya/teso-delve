@extends('layouts.app')

@section('meta-title')
Zone sets - @parent
@endsection

@section('meta-description')
    Sets found in zones throughout Elder Scrolls Online
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div>
                    <div>
                        <h1>Zones</h1>
                        @foreach($zones as $alliance => $azones)
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th class="min-width"><img class="alliance-img" src="gfx/alliance_{{$alliance}}.png"></th>
                                    <th><h5>{{ trans('alliance.'.$alliance . "") }}</h5></th>
                                    <th>DLC</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($azones as $zoneId => $z)
                                    <tr>
                                        <td></td>
                                        <td><a href="{{route('zone.show', [$z['slug']])}}">{{$z['name']}}</a></td>
                                        <td>{{$z->dlc_name}}</td>
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
