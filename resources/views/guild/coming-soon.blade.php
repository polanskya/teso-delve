@extends('layouts.app')

@section('meta-title')
    {{$guild->name}} - @parent
@endsection


@section('content')
    <div class="container-fluid sub-navbar sub-navbar__header-breadcrumbs">

        <div class="container p-b-3">
            <div class="row">
                <h1 class="col-md-12">{{$guild->name}} <small>{{$guild->world}}</small></h1>
            </div>
        </div>
    </div>

    <div class="container" id="guild-dashboard">
        <div class="row">

            @include('guild.menu')

            <div class="col-md-10 p-t-3">

                <div class="alert alert-info no-bg b-l-2 b-l-primary b-t-gray b-r-gray b-b-gray col-md-6 col-md-offset-3" role="alert">
                    <div class="media">
                        <div class="media-left">
                            <i class="fa fa-info fa-fw fa-lg text-primary"></i>
                        </div>
                        <div class="media-body media-middle">
                            <h5 class="text-white m-t-0 m-b-1">Coming soon!</h5>
                            <p class="m-b-1 text-gray-lighter">Feature coming soon, consider donating to speed up development.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

