@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="col-md-12">
                <div class="">
                    <div class="">
                        @if(isset($character) and $character)
                            @include('character.tabs')
                        @endif

                        <div class="row col-md-12">
                            <h1>Inventory</h1>
                            @include('inventory.partials.filter')

                            <div class="inventory-list col-md-12">
                                <table class="table table-responsive table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="hidden-xs"></th>
                                        <th>Name</th>
                                        <th class="hidden-xs">Type</th>
                                        <th class="hidden-xs">Weight</th>
                                        <th class="hidden-xs">Trait</th>
                                        <th>Character</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                @foreach($userItems as $userItem)
                                    <tr>
                                        @include('item.useritem_row')
                                    </tr>
                                @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>

                                <hr>
                            </div>
                            <div class="col-md-6">
                                <span class="text-white">{{$userItems->count()}}</span> items
                            </div>
                            <div class="col-md-6 text-right text-white">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

