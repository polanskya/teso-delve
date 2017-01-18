@extends('layouts.app')

@section('meta-title')
    Sets in {{$dungeon->name}} - @parent
@endsection

@section('meta-description')
    Sets found in {{$dungeon->name}}: {{implode(', ', $dungeon->sets->pluck('name')->toArray())}}
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div>
                    <div>
                        <div class="row">
                            @if(Auth::id() == 1)
                                <div class="col-md-12">
                                    <div role="group" aria-label="" class="btn-group pull-right">
                                        <a href="{{route('dungeon.edit', [$dungeon])}}" class="btn btn-default btn-xs"><i aria-hidden="true" class="fa fa-pencil"></i></a>
                                    </div>
                                    <br>
                                    <hr>
                                </div>
                            @endif
                            <div class="col-sm-7 m-b-3">
                                <h1>{{$dungeon->name}}</h1>

                                <div>
                                    {!! nl2br($dungeon->description) !!}
                                </div>
                            </div>
                            <div class="col-sm-5 text-right dungeon-image pull-right">
                                @if(!empty($dungeon->image))
                                    <a href="{{$dungeon->image}}" class="thumbnail no-bg"><img src="{{$dungeon->image}}"  alt="{{$dungeon->name}}"></a>
                                @endif
                            </div>

                        </div>
                        <table class="table table-condensed set-table">
                            <thead>
                            </thead>
                            <tbody>
                            @if(Auth::check())
                                @foreach($sets->whereIn('id', $favourites) as $set)
                                    @include('sets.set_row')
                                @endforeach
                            @endif

                            @foreach($sets as $set)
                                @if(Auth::check() and in_array($set->id, $favourites))
                                    @continue
                                @endif

                                @include('sets.set_row')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if(Auth::id() == 1)
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <h3>Add set to Dungeon</h3>
                            <form method="post" action="{{route('dungeon.addSet', [$dungeon])}}">
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
