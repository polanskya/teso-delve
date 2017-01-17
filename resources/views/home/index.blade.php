@extends('layouts.app')

@section('meta-title')
    TesoDelve.com your own little delve to organize your items/sets across all your characters in Elder Scrolls Online
@endsection

@section('content')
    <div class="container">
        <div class="row">


            @if(!Auth::check())
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('auth.login_startpage')
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-12 m-t-3 m-b-3">
                <div class="row text-center">
                    <div class="col-md-3">
                        <h4>Keep track of your Gear</h4>
                        <p>
                            Teso-Delve.com gathers all your gear and gives you a simple overview of all your gear and where you can find it.
                        </p>
                    </div>

                    <div class="col-md-3">
                        <h4>Crafting timers</h4>
                        <p>
                            Keep track of your crafting timers, at what time locally can I start another research again?
                        </p>
                    </div>

                    <div class="col-md-3">
                        <h4>Star sets</h4>
                        <p>Star sets so you easily can see what sets you're collecting in a dungeon/zone</p>
                    </div>

                    <div class="col-md-3">
                        <h4>Character details</h4>
                        <p>See a list of your characters with misc information like horse training, free inventory space, roles </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <a href="/gfx/my-sets.png" class="thumbnail no-bg"><img src="/gfx/my-sets.png"></a>
            </div>

            <div id="daily-pledges-container" class="col-md-12">
                @foreach($dailyPledges as $key => $dailyPledge)
                    <div class="daily-day-{{$key}}">
                        <div class="row">
                            <h3 class="col-md-8">{{$key == 0 ? 'Todays pledges' : 'Tomorrows pledges' }}</h3>
                            <ul class="pager col-md-4 hidden">
                                <li class="previous"><a href="javascript: void(0)" class="show-pledge" day="0"><span aria-hidden="true">←</span></a></li>
                                <li class="next"><a href="javascript: void(0)" class="show-pledge" day="0"><span aria-hidden="true">→</span></a></li>
                            </ul>
                        </div>

                        <div class="row">
                            @include('dungeon.pledge-box', ['dungeon' => $dailyPledge->firstPledge])
                            @include('dungeon.pledge-box', ['dungeon' => $dailyPledge->secondPledge])
                            @include('dungeon.pledge-box', ['dungeon' => $dailyPledge->thirdPledge])
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-12 m-t-3 m-b-3">
                <div class="row text-center">
                    <div class="col-md-3">
                        <h4>{{$setsCount}}</h4>
                        <p>Total sets recorded</p>
                    </div>

                    <div class="col-md-3">
                        <h4>{{$characterCount}}</h4>
                        <p>Characters using Teso-Delve.com</p>
                    </div>

                    <div class="col-md-3">
                        <h4>{{$motifCount}}</h4>
                        <p>Motifs learnt across all characters</p>
                    </div>

                    <div class="col-md-3">
                        <h4>{{$itemCount}}</h4>
                        <p>Items found in ESO sofar</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

