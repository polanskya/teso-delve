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


                        <div class="itemstyle-armor">
                            <h2>Heavy</h2>
                            <div>
                                <img class="pull-left" src="/gfx/item-style/2/heavy/female/1.jpg">
                                <img class="pull-left" src="/gfx/item-style/2/heavy/female/2.jpg">
                            </div>
                        </div>

                        <div class="itemstyle-armor">
                            <h2>Medium</h2>
                        </div>

                        <div class="itemstyle-armor">
                            <h2>Light</h2>
                        </div>

                        <div class="itemstyle-armor">
                            <h2>Weapons</h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
