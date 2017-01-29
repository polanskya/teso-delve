@extends('layouts.app')

@section('meta-title')
    @lang('eso.dungeonType.'.$dungeonType)s - @parent
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
                        <h1>@lang('eso.dungeonType.'.$dungeonType)s</h1>

                        <table class="table table-condensed table-hover">
                            <thead>
                            <tr>
                                <th colspan="2">Name</th>
                                <th>Bosses</th>
                                <th>Zone</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dungeons as $alliance => $zoneDungeons)
                                <tr class="bg-gray-darker">
                                    <td class="min-width"><img class="alliance-img" src="/gfx/alliance_{{$alliance}}.png"></td>
                                    <td><h5>{{ trans('alliance.'.$alliance . "") }}</h5></td>
                                    <td colspan="3"></td>
                                </tr>
                                @foreach($zoneDungeons->sortBy('zone') as $dungeon)
                                    <tr>
                                        <td colspan="2"><a href="{{route('dungeon.show', [$dungeon])}}">{{$dungeon->name}}</a></td>
                                        <td>{{$dungeon->bosses->count()}}</td>
                                        <td>{{$dungeon->zone()['name']}}</td>
                                        <td class="min-width text-center">
                                            @if(in_array($dungeon->id, $pledges))
                                                <img src="/gfx/icons/ON-icon-UndauntedEnclave.png" title="Undaunted pledge today" class="icon-size">
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
