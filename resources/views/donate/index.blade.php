@extends('layouts.app')

@section('meta-title')
    Contribute to help us maintain and develop - @parent
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <h2 id="donate">Donate</h2>
                        <p>
                            Do you like Teso-Delve.com and might want to help us maintain the website and even continue developing it?
                            We love managing Teso-Delve.com but in truth it does cost some money to keep going.
                            What costs the most with running a website is time, time to develop, make content, creating images and answering/helping all the usersand I do this on my spare time and at the same time work at a full time job.

                            <br>
                            <br>
                            If you really like Teso-Delve.com consider <a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9X4LBARDN5PX2">donating money</a> and we will spend those money with making Teso-Delve.com a better tool for helping you play Elder Scrolls Online
                        </p>

                    </div>

                    <div class="col-md-12">
                        <h2 id="content">Content</h2>
                        <p>Teso-Delve.com is in it's beginning stages of development, and is currently in need of alot of content. If you're interested in helping out with content for website I'll glady take it!
                            Contact me at <a href="mailto:{{config('constants.mail')}}">{{config('constants.mail')}}</a> and we can definetly find something for you to help us with.</p>


                        <h5>Currently in need of:</h5>
                        <ul>
                            <li>Website ideas</li>
                            <li>Website layouts</li>
                            <li>Zone descriptions</li>
                            <li>Dungeon descriptions</li>
                            <li>Dungeon/boss tactics</li>
                            <li>Set misc information</li>
                        </ul>
                    </div>

                    <div class="col-md-12">
                        <h2 id="images">Images</h2>
                        <p>
                            A website really needs alot of images as it makes the website seemed filled with content. Sadly I don't have the time to both develop, maintain,
                            make content and take images all at once therefore I would really appreciate if you'd decide to help me out with images.
                            There are alot of pages on Teso-Delve.com that really needs images, just look around and send in your contribtion or ask me what's needed on <a href="mailto:{{config('constants.mail')}}">{{config('constants.mail')}}</a>
                        </p>
                    </div>

                    <div class="col-md-12 text-center">
                        <h1>Thank you for helping out!</h1>
                    </div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="list-group margin-top-66">
                    <a href="#donate" class="list-group-item">Donate</a>
                    <a href="#content" class="list-group-item">Content</a>
                    <a href="#images" class="list-group-item">Images</a>
                </div>
            </div>

        </div>
    </div>
@endsection
