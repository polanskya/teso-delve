@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach($dungeons as $alliance => $zoneDungeons)
                            {{ trans('alliance.'.$alliance . "") }}
                            <table class="table table-condensed">
                                <thead>
                                </thead>
                                <tbody>
                                @foreach($zoneDungeons->sortBy('zone') as $dungeon)
                                    <tr>
                                        <td><a href="{{route('dungeon.show', [$dungeon->id])}}">{{$dungeon->name}}</a></td>
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
