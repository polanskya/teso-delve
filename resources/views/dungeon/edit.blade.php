@extends('layouts.app')

@section('meta-title')
  Edit dungeon {{$dungeon->name}} - @parent
@endsection


@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <form method="post" action="{{route('dungeon.update', [$dungeon->id])}}" class="form-horizontal">
                            {{csrf_field()}}

                            <div class="form-content">
                                <div class="form-group">
                                    <label for="dungeon[name]" class="control-label col-md-2">Dungeon name</label>
                                    <div class="col-md-10"><input type="text" id="dungeon[name]" name="dungeon[name]" value="{{$dungeon->name}}" class="form-control"></div>
                                </div>

                                <div class="form-group">
                                    <label for="dungeon[description]" class="control-label col-md-2">Description</label>
                                    <div class="col-md-10"><textarea id="dungeon[description]" rows="8" name="dungeon[description]" class="form-control"></textarea></div>
                                </div>

                                <div class="form-group">
                                    <label for="dungeon[groupSize]" class="control-label col-md-2">Group size</label>
                                    <div class="col-md-10"><input type="text" id="dungeon[groupSize]" name="dungeon[groupSize]" value="{{$dungeon->groupSize}}" class="form-control"></div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" value="Save set" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            @if(Auth::id() == 1)
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
            @endif
        </div>
    </div>
@endsection
