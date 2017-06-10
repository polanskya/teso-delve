@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row m-t-2">

            <div class="col-lg-2">
                <div class="row hidden">

                    <div class="col-lg-12 col-md-4 col-sm-4  col-xs-12">
                        <ul class="nav nav-pills nav-stacked m-b-2">
                            <li role="presentation" class="active"><a href="search-results.html">All Results <span class="badge pull-right">4</span> </a></li>
                            <li role="presentation" class=""><a href="images-results.html">Images <span class="badge pull-right">34</span> </a>
                            </li>
                            <li role="presentation" class=""><a href="videos-results.html">Video <span class="badge pull-right">2</span> </a>
                            </li>
                            <li role="presentation" class=""><a href="users-results.html">Users <span class="badge pull-right">7</span> </a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-lg-10">
                <h3 class="f-w-300 m-t-0">Search Results for <strong>"{{$search}}"</strong><small class="m-l-1">Found {{number_format($counts['total'])}} result</small></h3>

                <form method="get" action="{{route('search.search')}}">
                    <div class="input-group m-t-2 m-b-3">
                        <input type="text" class="form-control" placeholder="Search again..." name="s" value="{{$search}}">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-search"></i></button>
                        </span>
                    </div>
                </form>

                <div class="hr-text hr-text-left m-b-2">
                    <h6 class="text-white"><strong>All Results</strong></h6>
                </div>

                @foreach($results as $result)
                    @if($result instanceof \App\Model\Item)
                        @include('search.results.item')
                    @endif

                    @if($result instanceof \App\Model\Set)
                        @include('search.results.set')
                    @endif

                    @if($result instanceof \App\Model\Dungeon)
                        @include('search.results.dungeon')
                    @endif

                    @if($result instanceof \App\Model\ItemStyle)
                        @include('search.results.style')
                    @endif
                @endforeach


            </div>
        </div>


    </div>
@endsection

