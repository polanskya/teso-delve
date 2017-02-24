@extends('layouts.app')

@section('meta-title')
    Sets in Elder Scrolls Online- @parent
@endsection

@section('meta-description')
    Sets found in Elder Scrolls Online, find monster, dungeon, zone, crafted sets and where to find them throughout Tamriel.
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="">
                    <div class="">
                        <a href="{{route('set.craftable')}}"><h1 id="crafted-sets">Craftable sets</h1></a>
                        @foreach($craftedSets as $key => $set)
                            @include('sets.partial.index.set')
                        @endforeach

                        <h1 id="dungeon-sets">Dungeon sets</h1>
                        @foreach($dungeonSets as $key => $set)
                            @include('sets.partial.index.set')
                        @endforeach

                        <a href="{{route('set.monster')}}"><h1 id="monster-sets">Monster sets</h1></a>
                        @foreach($monsterSets as $key => $set)
                            @include('sets.partial.index.set')
                        @endforeach

                        <h1 id="zone-sets">Zone sets</h1>
                        @foreach($zoneSets as $key => $set)
                            @include('sets.partial.index.set')
                        @endforeach

                        <h1 id="other">Other sets</h1>
                        @foreach($sets as $key => $set)
                            @include('sets.partial.index.set')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
