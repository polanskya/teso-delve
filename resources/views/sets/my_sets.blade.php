@extends('layouts.app')

@section('meta-title')
    My sets - @parent
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="">
                    <div class="">

                        <h1>My sets</h1>
                        <form method="get" action="{{route('set.my-sets')}}" class="form-horizontal">
                            <div class="form-group col-sm-4">
                                <div class="input-group">
                                    @foreach(Request::except('search') as $key => $value)
                                        <input type="hidden" value="{{$value}}" name="{{$key}}">
                                    @endforeach
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Search set..." value="{{Request::get('search')}}">
                                    <span class="input-group-btn"><button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-search"></i></button></span>
                                </div>
                            </div>

                            <div class="input-group col-sm-8 text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn {{Request::has('characterId') ? 'btn-primary' : 'btn-default'}} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-user-o"></i> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('set.my-sets', Request::except('characterId'))}}">Reset</a></li>
                                        <li role="separator" class="divider"></li>
                                        @foreach($user->characters as $character)
                                            <li><a href="{{route('set.my-sets', ['characterId' => $character->id] + Request::query())}}">{{$character->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </form>

                        <br>

                        <table class="table table-condensed set-table table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Name</th>
                                <th> @if(Request::get('sortBy') == 'equipType')
                                        <i class="fa fa-sort-{{Request::get('sort')}}"></i>
                                    @endif
                                    <a href="{{route('set.my-sets', ['sortBy' => 'equipType', 'sort' => Request::get('sort') == 'asc' ? 'desc' : 'asc'] + Request::query())}}">Type</a></th>
                                <th>
                                    Weight
                                </th>
                                <th>
                                    @if(Request::get('sortBy') == 'trait')
                                        <i class="fa fa-sort-{{Request::get('sort')}}"></i>
                                    @endif
                                    <a href="{{route('set.my-sets', ['sortBy' => 'trait', 'sort' => Request::get('sort') == 'asc' ? 'desc' : 'asc'] + Request::query())}}">Trait</a>
                                </th>
                                <th>
                                    @if(Request::get('sortBy') == 'pivot_characterId')
                                        <i class="fa fa-sort-{{Request::get('sort')}}"></i>
                                    @endif
                                    <a href="{{route('set.my-sets', ['sortBy' => 'pivot_characterId', 'sort' => Request::get('sort') == 'asc' ? 'desc' : 'asc'] + Request::query())}}">Character</a></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($user)
                                @foreach($sets->whereIn('id', $favourites) as $set)
                                    @include('sets.set_row')
                                @endforeach
                            @endif

                            @foreach($sets as $set)
                                @if($user and in_array($set->id, $favourites))
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
