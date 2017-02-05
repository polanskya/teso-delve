@extends('layouts.app')

@section('meta-title')
    {{isset($giverKey) ? trans('eso.pledgeChest.'.$giverKey) . ' ' : 'Monster'}} sets in Elder Scrolls Online - @parent
@endsection

@section('meta-description')
    {{isset($giverKey) ? trans('eso.pledgeChest.'.$giverKey) . ' ' : 'Monster'}} sets, helmet drops by end boss in dungeons (veteran) and shoulders comes from Undaunted Chest using pledge key
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="">
                    <div class="">
                        @if(isset($giverKey))
                            <h1>{{trans('eso.pledgeChest.'.$giverKey)}} monster sets</h1>
                        @else
                            <h1>Monster sets</h1>
                        @endif
                        <table class="table table-condensed set-table">
                            <thead>
                            <tr>
                                <th></th>
                                <th colspan="2">Name</th>
                                <th colspan="2">Helm drop</th>
                                <th colspan="2">Shoulder chest</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($user)
                                @foreach($sets->whereIn('id', $favourites) as $set)
                                    @include('sets.partial.monster_row')
                                @endforeach
                            @endif

                            @foreach($sets as $set)
                                @if($user and in_array($set->id, $favourites))
                                    @continue
                                @endif

                                @include('sets.partial.monster_row')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
