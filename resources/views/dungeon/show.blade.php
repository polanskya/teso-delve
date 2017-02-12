@extends('layouts.app')

@section('meta-title')
    {{$dungeon->name}} {{ lcfirst(trans('eso.dungeonType.' . $dungeon->dungeonTypeEnum)) }} - @parent
@endsection

@section('meta-description')
    {{$dungeon->name}} is a {{$dungeon->groupSize}} man {{lcfirst(trans('eso.dungeonType.'.$dungeon->dungeonTypeEnum))}} in {{$dungeon->zone()['name']}} that drops: {{implode(', ', $dungeon->sets->pluck('name')->toArray())}}
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div>
                    <div>
                        <div class="row">
                            @if(Auth::id() == 1)
                                <div class="col-md-12">
                                    <div role="group" aria-label="" class="btn-group pull-right">
                                        <a href="{{route('admin.dungeon.edit', [$dungeon])}}" class="btn btn-default btn-xs"><i aria-hidden="true" class="fa fa-pencil"></i></a>
                                    </div>
                                    <br>
                                    <hr>
                                </div>
                            @endif
                            <div class="col-sm-7 m-b-3">
                                <h1>{{$dungeon->name}}</h1>

                                <div>
                                    <p>
                                        {{$dungeon->name}} is a {{$dungeon->groupSize}} man {{lcfirst(trans('eso.dungeonType.'.$dungeon->dungeonTypeEnum))}} in Elder Scrolls Online and can be found in {{$dungeon->zone()['name']}}.
                                    </p>
                                    {!! nl2br($dungeon->description) !!}
                                </div>
                            </div>
                            <div class="col-sm-5 text-right dungeon-image pull-right">
                                @if(!empty($dungeon->image))
                                    <a href="{{$dungeon->image}}" class="thumbnail no-bg"><img src="{{$dungeon->image}}"  alt="{{$dungeon->name}}"></a>
                                @endif
                            </div>


                            <div class="col-md-12">

                                @if($pledge or $dungeon->sets->count > 0)
                                <div class="panel panel-default col-md-3 col-md-offset-9">
                                    <div class="panel-body">
                                        @if($pledge)
                                            <h4>Pledge</h4>
                                            Pledge issued in {!! App\Presenter\Date::untilDate($pledge->date) !!}
                                        @endif

                                        @if($dungeon->sets->count() > 0)
                                            <h4>Sets</h4>
                                            <ul class="list-unstyled">
                                                @foreach($dungeon->sets as $set)
                                                    <li>
                                                        @if(!$loop->last)
                                                            @include('sets.name'),
                                                        @else
                                                            @include('sets.name')
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                    </div>
                                </div>
                                @endif

                                @if(Auth::id() == 1)
                                    <div class="panel panel-default col-md-3 col-md-offset-9">
                                        <div class="panel-body">

                                            <h3>Add set to Dungeon</h3>
                                            <form method="post" action="{{route('dungeon.addSet', [$dungeon])}}">
                                                {{method_field('PUT')}}
                                                {{csrf_field()}}

                                                <div class="form-group">
                                                    <select class="form-control" name="setId">
                                                        @foreach($all_sets as $set)
                                                            <option value="{{$set->id}}">{{$set->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-default pull-right" value="Add set">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>

                        @include('dungeon.partials.navbar')
                        <div class="tab-content">
                            <div id="set-drops" class="tab-pane fade in active">
                                <table class="table table-condensed set-table">
                                    <thead>
                                    </thead>
                                    <tbody>
                                    @if(Auth::check())
                                        @foreach($sets->whereIn('id', $favourites) as $set)
                                            @include('sets.set_row')
                                        @endforeach
                                    @endif

                                    @foreach($sets as $set)
                                        @if(Auth::check() and in_array($set->id, $favourites))
                                            @continue
                                        @endif

                                        @include('sets.set_row')
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="guide" class="tab-pane fade">

                                <div class="row">
                                    @if(Auth::id() == 1)
                                        <div class="col-md-12">
                                            <div role="group" aria-label="" class="btn-group pull-right">
                                                <a href="{{route('admin.boss.create')}}?dungeon_id={{$dungeon->id}}" class="btn btn-default btn-xs"><i aria-hidden="true" class="fa fa-pencil"></i></a>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-9">
                                        @foreach($bosses as $boss)
                                            <div class="boss row" id="boss-{{$boss->slug}}" >
                                                <h3 class="col-md-9">{{$boss->name}}</h3>
                                                <div class="col-md-3 text-right">
                                                    @if(Auth::id() == 1)
                                                        <div role="group" aria-label="" class="btn-group pull-right">
                                                            <a href="{{route('admin.boss.delete', [$boss])}}" class="btn btn-default btn-xs"><i aria-hidden="true" class="fa fa-trash"></i></a>
                                                        </div>
                                                        <div role="group" aria-label="" class="btn-group pull-right">
                                                            <a href="{{route('admin.boss.edit', [$boss])}}" class="btn btn-default btn-xs"><i aria-hidden="true" class="fa fa-pencil"></i></a>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="col-md-12">
                                                    @if(!empty($boss->strategy))
                                                        <h5>Boss mechanics</h5>
                                                        {!! $boss->mechanics !!}
                                                    @endif
                                                </div>

                                                <div class="col-md-12">
                                                    @if(!empty($boss->strategy))
                                                        <h5>Strategy</h5>
                                                        {!! $boss->strategy !!}
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="col-md-3">
                                        <ul class="list-group">
                                            @foreach($bosses as $boss)
                                                <li class="list-group-item"><a href="#boss-{{$boss->slug}}">{{$boss->name}}</a></li>
                                            @endforeach
                                        </ul>

                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <p>Is there something wrong, or missing in this guide? Please send information to <a href="mailto:{{config('constants.mail')}}">{{config('constants.mail')}}</a> and we'll update it asap!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
