@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- START EDIT CONTENT -->

        <!-- START Avatar with Name -->
        <div class="media m-b-3">
            <div class="media-body">
                <h3 class="f-w-300 m-b-0 m-t-1"><a href="#"><span>{{$user->name}}</span></a> <div class="hidden"><span class="text-muted"> <span class="m-r-1 m-l-1">/</span></span> Account Edit</div></h3>
            </div>
        </div>
        <!-- END Avatar with Name -->


        <div class="row">
            <!-- START Left Column -->
            <div class="col-lg-2 m-b-2">
                <!-- START Menu Pills Vertical - Profile, Account, Billing, Sessions -->
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active"><a href="{{  route('user.settings.edit') }}">Settings</a></li>
                </ul>
                <!-- START Menu Pills Vertical - Profile, Account, Billing, Sessions -->

            </div>
            <!-- END Left Column -->

            <div class="col-lg-10">

                <div class="panel panel-default  b-a-2 no-bg b-gray-dark">
                    <div class="panel-heading">
                        <h4 class="panel-title"> Keys</h4>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" action="{{route('user.settings.update')}}" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="import-key" class="col-sm-2 control-label">Import key</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control b-dashed" disabled="disabled" id="import-key" name="import-key" placeholder="No key has been generated yet." value="{{$settings['import-key']}}">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary" id="generate-import-key" name="generate-import-key" value="update">Generate</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- END EDIT CONTENT -->
    </div>
@endsection
