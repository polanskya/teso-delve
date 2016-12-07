@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">

             <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

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
        </div>
    </div>
@endsection
