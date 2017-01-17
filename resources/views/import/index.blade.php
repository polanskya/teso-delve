@extends('layouts.app')

@section('stylesheet')
    <link href="/css/app.css" rel="stylesheet">
@endsection

@section('javascript')
    <script src="/js/importDropzone.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-9">
                <div>
                    <div>

                        <h1>Upload your ESO information</h1>
                        <p>Upload your ESO log file to submit your ESO information, which you can find here:</p>

                        <ul>
                            <li>Download and install Eso Delve Addon</li>
                            <li>Start ESO and enable the addon</li>
                            <li>Login on a character and open/close your inventory to export items (or use <strong>/tesodelve</strong> command). <br>It will only be this characters inventory and your bank that will be exported.<br>Which means you'll have to do this on all your characters you wish to import</li>
                            <li>Logout or run command /reloadui to write to your log file <br>(ESO only writes to file when reloading UI)</li>
                            <li>Find your log file here: <strong>Documents\Elder Scrolls Online\live\SavedVariables\TesoDelve.lua</strong><br>
                                Having trouble finding your log? Find your Addon folder and it'll be a folder next to it.</li>
                        </ul>

                        <div id="importDropzone" url="{{route('import.upload')}}" class="{{Auth::check() ? '' : 'dropzoneDisabled'}}">
                            <div class="dropzone-message message-default">
                                @if(Auth::check())
                                    <p><i class="fa fa-upload" aria-hidden="true" title="Item worn"></i> Drop your TesoDelve.lua file here to import all your information. <br>After that you're all set to get organized with TESO Delve!</p>
                                @else
                                    <p>You need to be logged in to use TESO Delve...</p>
                                @endif
                            </div>

                            <div class="dropzone-message message-successfull">
                                <p>TESO Delve log successfully imported!</p>
                            </div>

                            <div class="dropzone-message message-uploading">
                                <p>Uploading log file, please wait....</p>
                            </div>

                            <div class="dropzone-message message-failed">
                                <p>Uploading failed, please try again.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h3>Teso Delve addon</h3>
                        <p class="addon-version">({{$addonVersion}})</p>
                        <p>Download TESO Delve addon by clicking on the link below, then install it into your ESO addons folder.</p>
                        <a href="{{env('TESO_DELVE_ADDON_URL', 'https://github.com/HeppyKarlsson/teso-delve-addon/archive/1.0.0-beta.3.zip')}}" class="btn btn-primary"><i class="fa fa-download" aria-hidden="true" title="Item worn"></i> Download TESO Delve addon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
