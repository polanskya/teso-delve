@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            @foreach($sets->whereIn('id', $favourites) as $set)
                <div class="col-md-6">
                    @include('sets.set', ['isFavourite' => 1])
                </div>
            @endforeach
        </div>
    </div>
@endsection
