@extends('layouts.app')

@section('stylesheet')
    <link href="/css/app.css" rel="stylesheet">
@endsection

@section('javascript')
    <script src="/js/importDropzone.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form method="post" action="" class="form-horizontal" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="key" class="col-md-4 control-label">Upload key</label>
                        <div class="col-md-8">
                            <input id="key" type="text" name="key" value="" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file" class="col-md-4 control-label">File</label>
                        <div class="col-md-8">
                            <input id="file" type="file" name="file" value="" class="m-t-1">
                        </div>
                    </div>

                    <div class="text-right">
                        <input type="submit" class="btn btn-primary" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
