@extends('layouts.app')

@section('meta-title')
    TesoDelve.com your own little delve to organize your items/sets across all your characters in Elder Scrolls Online
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">


                    @if(!Auth::check())
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    @include('auth.login_form_sidebar')
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-12 dailyPledges">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @foreach($dailyPledges as $key => $dailyPledge)
                                    <h4>{{$key == 0 ? 'Todays pledges' : 'Tomorrows pledges' }}</h4>
                                    <ul class="list-unstyled">
                                        <li><a href="{{route('dungeon.show', [$dailyPledge->pledge1])}}">{{$dailyPledge->firstPledge->name}}</a>
                                            <ul>
                                                @foreach($dailyPledge->firstPledge->sets as $set)
                                                    <li><div class="set-hover" setId="{{$set->id}}"><a href="{{route('set.show', [$set->id])}}">{{$set->name}}</a></div></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{route('dungeon.show', [$dailyPledge->pledge2])}}">{{$dailyPledge->secondPledge->name}}</a>
                                            <ul>
                                                @foreach($dailyPledge->secondPledge->sets as $set)
                                                    <li><div class="set-hover" setId="{{$set->id}}"><a href="{{route('set.show', [$set->id])}}">{{$set->name}}</a></div></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{route('dungeon.show', [$dailyPledge->pledge3])}}">{{$dailyPledge->thirdPledge->name}}</a>
                                            <ul>
                                                @foreach($dailyPledge->thirdPledge->sets as $set)
                                                    <li><div class="set-hover" setId="{{$set->id}}"><a href="{{route('set.show', [$set->id])}}">{{$set->name}}</a></div></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>


                        <div class="col-md-12 startpage-tracked">
                            <div class="panel panel-default">
                                <div class="panel-body text-center">
                                    <h2 class="count">{{number_format($itemCount)}}</h2>
                                    Items tracked
                                    <h2 class="count">{{number_format($characterCount)}}</h2>
                                    Characters tracked
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection

