@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>{{$dungeon->name}}</h1>
                        <table class="table table-condensed set-table">
                            <thead>
                            </thead>
                            <tbody>
                            @foreach($sets->whereIn('id', $favourites) as $set)
                                @include('sets.set_row')
                            @endforeach

                            @foreach($sets as $set)
                                @if(in_array($set->id, $favourites))
                                    @continue
                                @endif

                                @include('sets.set_row')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h3>Add set to Dungeon</h3>
                        <form method="post" action="{{route('dungeon.addSet', [$dungeon->id])}}">
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
            </div>

        </div>
    </div>
@endsection
