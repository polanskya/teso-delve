@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div>
                    <div>
                        <h1>Users</h1>

                        <table class="table table-hover m-t-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Lang</th>
                                    <th>Characters</th>
                                    <th>Latest dump</th>
                                    <th>Last seen</th>
                                    <th></th>
                                </tr>
                            </thead>
                        @foreach($users as $user)
                            <tbody>
                            <tr>
                                <td class="min-width">{{$user->id}}</td>
                                <td><a href="">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->lang}}</td>
                                <td>{{$user->characters->count()}}</td>
                                <td class="min-width nowrap">{{$user->dumpUploaded_at}}</td>
                                <td class="min-width nowrap">{{$user->seen_at}}</td>
                                <td class="text-right v-a-m min-width nowrap">
                                    <div class="dropdown">
                                        <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fa fa-bars m-r-1"></i> <span class="caret"></span> </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="{{route('admin.users.ghost', [$user->id])}}">Ghost</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection