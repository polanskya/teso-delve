@extends('layouts.app')

@section('meta-title')
    TesoDelve.com your own little delve to organize your items/sets across all your characters in Elder Scrolls Online
@endsection

@section('content')



    <div class="container">
        <div class="row">


            @if(!Auth::check())
                <div class="col-md-6">
                    <div class="row text-center">
                        <div class="col-md-6">
                            <h4>Keep track of your Gear</h4>
                            <p>
                                Teso-Delve.com gathers all your gear and gives you a simple overview of all your gear and where you can find it.
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h4>Crafting timers</h4>
                            <p>
                                Keep track of your crafting timers, at what time locally can I start another research again?
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h4>Star sets</h4>
                            <p>Star sets so you easily can see what sets you're collecting in a dungeon/zone</p>
                        </div>

                        <div class="col-md-6">
                            <h4>Character details</h4>
                            <p>See a list of your characters with misc information like horse training, free inventory space, roles </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    @include('auth.login_startpage')
                </div>


                <div class="col-md-12 m-t-3">
                    <div id="start-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <ol class="carousel-indicators">
                                <li data-target="#start-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#start-carousel" data-slide-to="1"></li>
                                <li data-target="#start-carousel" data-slide-to="2"></li>
                            </ol>

                            <div class="item active">
                                <a href="/gfx/my-sets.png" class="thumbnail no-bg m-b-0"><img src="/gfx/my-sets.png"></a>
                            </div>

                            <div class="item">
                                <a href="/gfx/my-sets.png" class="thumbnail no-bg no-bg m-b-0"><img src="/gfx/characters.png"></a>
                            </div>

                            <div class="item">
                                <a href="/gfx/my-sets.png" class="thumbnail no-bg no-bg m-b-0"><img src="/gfx/lestat.png"></a>
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#start-carousel" data-slide="prev">
                            <span class="fa fa-chevron-left v-a-m"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#start-carousel" data-slide="next">
                            <span class="fa fa-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                </div>

            @endif

        </div>

    </div>

    <div class="container">
        <div class="row">


            <div class="col-md-4">

                @if(config('eso.search'))
                    <form method="get" action="{{route('search.search')}}">
                        <div class="input-group">
                            <input type="text" name="s" class="form-control" aria-label="..." placeholder="Search...">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <br>
                @endif

                <div class="list-group">
                    <a href="{{route('set.index')}}" class="list-group-item">Sets</a>
                    <a href="{{route('item-styles.index')}}" class="list-group-item">Styles & Motifs</a>
                    <a href="{{route('dungeons.groups.index')}}" class="list-group-item">Group dungeons</a>
                    <a href="{{route('dungeons.public.index')}}" class="list-group-item">Public dungeons</a>
                    <a href="{{route('dungeons.trials.index')}}" class="list-group-item">Trials</a>
                </div>

            </div>

            <div class="col-md-4">
                <div class="row">

                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default b-a-0 bg-primary-i">
                            <div class="panel-heading b-b-0">Users</div>
                            <div class="panel-body text-center p-t-0">
                                <h1 class="m-t-0 m-b-0 f-w-300">{{ number_format($information['users']) }}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default b-a-0 bg-success-i">
                            <div class="panel-heading b-b-0">Sets</div>
                            <div class="panel-body text-center p-t-0">
                                <h1 class="m-t-0 m-b-0 f-w-300">{{ number_format($information['sets'])}}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default b-a-0 bg-danger-i">
                            <div class="panel-heading b-b-0">Characters</div>
                            <div class="panel-body text-center p-t-0">
                                <h1 class="m-t-0 m-b-0 f-w-300">{{ number_format($information['characters'])}}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default b-a-0 bg-warning-i">
                            <div class="panel-heading b-b-0">Items</div>
                            <div class="panel-body text-center p-t-0">
                                <h1 class="m-t-0 m-b-0 f-w-300">{{ number_format($information['items'])}}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default b-a-0 bg-gray-darker">
                            <div class="panel-heading b-b-0">Styles</div>
                            <div class="panel-body text-center p-t-0">
                                <h1 class="m-t-0 m-b-0 f-w-300">{{ number_format($information['styles'])}}</h1>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-default b-a-0 bg-curious-blue-i">
                            <div class="panel-heading b-b-0">Dungeons</div>
                            <div class="panel-body text-center p-t-0">
                                <h1 class="m-t-0 m-b-0 f-w-300">{{ number_format($information['dungeons'])}}</h1>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

            <div class="col-md-4">
                <div class="panel panel-default no-bg b-l-2 {{ (!$statuses['error'] and $statuses['all'])  ? 'b-l-success' : 'b-l-danger' }} b-t-gray b-r-gray b-b-gray">
                    <div class="panel-heading">Server status</div>
                    <div class="panel-body">

                        <table class="table table-hover table-striped server-status">
                            <tbody>
                            @if($statuses['error'])
                                <tr><td class="text-center">Unable to acquire current server status.</td></tr>
                            @else
                                @foreach($statuses['servers'] as $server => $status)
                                    <tr>
                                        <td class="text-white">{{$server}}</td>
                                        <td class="text-right">
                                            @if($status == 'UP')
                                                <i class="fa fa-fw fa-arrow-circle-up text-success"></i>
                                            @else
                                                <i class="fa fa-fw fa-arrow-circle-down text-danger"></i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer text-right">
                        @if(!$statuses['error'])
                            Last updated: {{$statuses['date']->format('Y-m-d H:i:s')}}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid m-b-3">
        <div class="container">

            <div class="row m-b-3">
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
                                @include('dungeon.pledge-box', ['dungeon' => $dailyPledge->firstPledge, 'giver' => "Maj al-Ragath"])
                                @include('dungeon.pledge-box', ['dungeon' => $dailyPledge->secondPledge, 'giver' => "Glirion"])
                                @include('dungeon.pledge-box', ['dungeon' => $dailyPledge->thirdPledge, 'giver' => "Urgarlag / DLC"])
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

