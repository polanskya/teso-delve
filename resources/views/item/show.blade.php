@extends('layouts.app')

@section('meta-title')
    {{$item->name}}
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>{{$item->name}}</h1>
                        <h1>UNDER DEVELOPMENT</h1>
                        @include('item.itembox')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

