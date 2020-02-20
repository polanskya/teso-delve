@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h1>{{$log->error}}</h1>
            </div>

            <!-- START System Monitoring -->
            <div class="col-md-5">

                <div class="panel panel-default b-a-0">
                    <div class="panel-heading">Error</div>
                    <div class="panel-body">

                        <table class="table table-condensed m-b-0">
                            <tbody>

                            <tr>
                                <td class="v-a-m b-t-0" colspan="2">
                                    Occured at<br><span class="text-white">{{$log->created_at}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="v-a-m" colspan="2">
                                    User<br><span class="text-white">{{$log->user->name or '-'}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="v-a-m" colspan="2">
                                    Session<br><span class="text-white">{{$log->session or '-'}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="v-a-m">
                                    IP<br><span class="text-white">{{$log->ip or '-'}}</span>
                                </td>
                                <td class="text-right"><a href="{{route('admin.ban.index')}}?ip={{$log->ip}}" class="btn btn-danger" title="Ban IP"><i class="fa fa-gavel"></i></a></td>
                            </tr>
                            <tr>
                                <td class="v-a-m" colspan="2">
                                    User agent<br><span class="text-white">{{$log->user_agent or '-'}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="v-a-m" colspan="2">
                                    Method<br><span class="text-white">{{$log->method or '-'}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="v-a-m" colspan="2">
                                    Severity<br><span class="text-white">{{$log->severity or '-'}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="v-a-m" colspan="2">
                                    URL<br><span class="text-white">{{$log->url or '-'}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="v-a-m" colspan="2">
                                    Route<br><span class="text-white">{{$log->route or '-'}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="v-a-m" colspan="2">
                                    Referer<br><span class="text-white">{{$log->referer or '-'}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="v-a-m" colspan="2">
                                    Exception<br><span class="text-white">{{$log->exception or '-'}}</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="panel panel-default bg-gray-dark b-a-0">
                    <div class="panel-heading">File: {{$log->file}}:{{$log->row}} </div>
                    <pre class="m-b-0">@foreach($lines as $line){!! $line !!}@endforeach</pre>
                    <div class="panel-footer text-right">
                        This doesn't show the entire truth, code might have changed.
                    </div>
                </div>

            </div>

            <div class="col-md-12">
                <div class="panel panel-default no-bg b-gray-dark">
                    <div class="panel-heading">
                        <h2 class="panel-title">Trace</h2>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>File</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($log->trace as $key => $trace)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><span class="text-white">
                                        @if(!empty($trace->file))
                                                {{$trace->file or ''}}({{$trace->line or ''}})</span><br>
                                        @endif
                                        {{isset($trace->class) ? $trace->class : ''}}{{isset($trace->type) ? $trace->type : ''}}{{isset($trace->function) ? $trace->function : ''}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection