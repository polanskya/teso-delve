@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>{{$itemStyle->name}}</h1>
                        <div class="itemstyle-content">
                            {{$itemStyle->location}}
                        </div>

                        <div class="motifs-list">
                            @foreach($itemStyle->chapters as $chapter)
                                @include('item.worn_image', ['equippedItem' => $chapter->item])
                            @endforeach
                        </div>

                        <div class="clearfix"></div>
                        <hr>

                        @foreach($images as $weight => $genders)
                            <div class="itemstyle-armor row">
                                <h2 class="col-md-12">{{ucfirst($weight)}}</h2>
                                @foreach($genders as $genderName => $gender)
                                    <h4 class="col-md-12">{{ucfirst($genderName)}}</h4>
                                    @foreach($gender as $group => $images)
                                        <div class="armor-group col-md-12">
                                            @foreach($images as $image)
                                                <a target="_blank" href="/gfx/item-style/{{$itemStyle->id}}/{{$image}}"><img class="pull-left" src="/gfx/item-style/{{$itemStyle->id}}/{{$image}}"></a>
                                            @endforeach
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
