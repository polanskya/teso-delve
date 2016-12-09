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
                <div class="panel panel-default">
                    <div class="panel-body">

                        <h1>Upload your ESO information</h1>
                        <p>Upload your ESO log file to submit your ESO information, which you can find here:</p>

                        <ul>
                            <li>Download and install Eso Delve Addon</li>
                            <li>Start ESO and enable the addon</li>
                            <li>Login on a character and open/close your inventory to export items. <br>It will only be this characters inventory and your bank that will be exported.<br>Which means you'll have to do this on all your characters you wish to import</li>
                            <li>Logout or run command /reloadui to write to your log file <br>(ESO only writes to file when reloading UI)</li>
                            <li>Find your log file here: <strong>Documents\Elder Scrolls Online\live\SavedVariables\TesoDelve.lua</strong><br>
                            Having trouble finding your log? Find your Addon folder and it'll be a folder next to it.</li>
                        </ul>

                        <div id="importDropzone" url="{{route('import.upload')}}">
                            <div class="dropzone-message message-default">
                                <p>Drop your TesoDelve.lua file here to import all your information. <br>After that you're all set to get organized with TESO Delve!</p>
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
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
