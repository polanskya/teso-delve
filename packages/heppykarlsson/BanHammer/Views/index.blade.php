@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default no-bg b-a-2 b-gray-dark">
                <div>
                    <form method="post" action="{{route('admin.ban.store')}}">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="small text-muted text-uppercase"><strong>IP</strong></th>
                                <th class="small text-muted text-uppercase text-right"><strong>Action</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="ip" value="{{$banIp}}" placeholder="Ban IP">
                                    {!! csrf_field() !!}
                                </td>
                                <td class="text-right"><input type="submit" value="Ban!" class="btn btn-primary"></td>
                            </tr>
                            @foreach($bans as $id => $ip)
                                <tr><td class="text-white">{{$ip}}</td><td class="text-right"><a href="{{route('admin.ban.delete', [$ip])}}" class="btn btn-default btn-xs"><i class="fa fa-trash" ></i></a></td></tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2">Total banned: {{count($bans)}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection