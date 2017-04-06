@extends('layouts.admin')

@section('content')
    <table class="table table-striped">
        <thead>
        </thead>
        <tbody>
    @foreach($logs as $log)
        <tr>
            <td>{{$log->error}}</td>
        </tr>
    @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td>{{$logs->links()}}</td>
        </tr>
        </tfoot>
    </table>

@endsection