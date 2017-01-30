@extends('layouts.app')

@section('meta-title')
    @lang('eso.dungeonType.'.$dungeonType)s - @parent
@endsection

@section('meta-description')
    Sets found in @lang('eso.dungeonType.'.$dungeonType) all around Elder Scrolls Online
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div>
                    <div>
                        <div class="row">
                            <h1 class="col-md-8">@lang('eso.dungeonType.'.$dungeonType)s</h1>
                            <div class="col-md-4 text-right">
                                @if(Auth::id() == 1)
                                    <div role="group" aria-label="" class="btn-group pull-right">
                                        <a href="{{route('admin.dungeon.create')}}?dungeonType={{$dungeonType}}" class="btn btn-default btn-xs"><i aria-hidden="true" class="fa fa-plus"></i></a>
                                    </div>
                                @endif
                            </div>
                        </div>

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
                                        <td>{{$dungeon->zone() ? $dungeon->zone()['name'] : ''}}</td>
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
