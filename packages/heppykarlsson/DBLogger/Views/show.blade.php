@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">

            <!-- START System Monitoring -->
            <div class="col-md-5">

                <div class="panel panel-default b-a-0">
                    <div class="panel-heading">Error</div>
                    <div class="panel-body">
                        <p class="text-white">
                        /{{$log->url}}
                        </p>

                        <p class="text-white">
                            {{$log->error}}
                        </p>
                        <hr>
                        <dl class="dl-horizontal">
                            <dt class="text-left"><div class="text-left">User</div></dt>
                            <dd class="text-left text-white">{{$log->user->name}}</dd>
                            <dt class="text-left"><div class="text-left">Code</div></dt>
                            <dd class="text-left text-white"><span>{{$log->code}}</span></dd>
                            <dt class="text-left"><div class="text-left">Severity</div></dt>
                            <dd class="text-left text-white"><span>{{$log->severity}}</span></dd>
                        </dl>

                        <dl class="dl-horizontal text-left">
                            <dt class="text-left"><div class="text-left">Route</div></dt>
                            <dd class="text-left text-white"><span>{{$log->route}}</span></dd>
                            <dt class="text-left"><div class="text-left">Referer</div></dt>
                            <dd class="text-left text-white"><span>{{$log->referer}}</span></dd>
                        </dl>
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
                                        {{$trace->class or ''}}{{$trace->type or ''}}{{$trace->function or ''}}</td>
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