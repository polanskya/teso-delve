@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>Item styles</h1>

                            <table class="table table-hover m-t-3">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Material</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($itemStyles as $itemStyle)
                                    <tr class="input-group-sm">
                                        <td class="min-width"></td>
                                        <td><a href="{{route('item-styles.show', [$itemStyle])}}">{{$itemStyle->name}}</a></td>
                                        <td class="min-width nowrap"><img class="icon-size" src="{{$itemStyle->image}}" title="{{$itemStyle->material}}"> {{$itemStyle->material}}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
