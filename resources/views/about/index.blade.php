@extends('layouts.app')

@section('meta-title')
    About - @parent
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <h2 id="about-tesodelve">About Teso-Delve.com</h2>
                        <p>
                            TesoDelve.com whole idea started with the need to organize my gear across all characters in Elder Scrolls Online, since items are account bound and not bound to a specific character you can switch gear between characters.
                            Which means that you can do a dungeon with a character and still use the gear drops for another character which is neat according to me, although the effect of this is making my inventories a nightmare.
                        </p>

                        <p>This gave me the idea to make a website where you can upload your character information to help you organize and sort all of your inventory so I started the development of Teso-Delve.com the 7th December 2016.</p>

                        <p>Ofcourse, as all projects it has now grown in scope, as I noticed to efficiently give you a correct view TesoDelve needed to gather more information and now it tracks traits, horse training, where sets drops and more. Yet there are loads of stuff to come still.</p>


                    </div>

                    <div class="col-md-12">
                        <h2 id="about-me">About Me</h2>
                        <p>
                            So, who am I? Well... I'm called Heppy by most of my friends/family and currently I'm 28 years old. I have a long history of gaming all types of games since I was a kid.
                            I have also always had a big interest in websites and started building websites as a teenager. This interest has led to that today I work as a systemsdeveloper with a focus on the web
                        </p>
                        <p>I'm born and raised in Sweden and have always lived here although in a few different cities. Today I currently reside the city of Gothenburg and has done that since 2013-ish.</p>
                        <p>When I don't play games, work or working with Teso-Delve.com I spend time with my girlfriend whom I live with, and if it's summertime I usually go around southern sweden on my Motorcycle which has become my biggest passion in life.</p>
                        <p>Other than that, there's not much else to say really.</p>
                    </div>



                </div>
            </div>

            <div class="col-md-3">
                <div class="list-group margin-top-66">
                    <a href="#about-tesodelve" class="list-group-item">About Teso-Delve.com</a>
                    <a href="#about-me" class="list-group-item">About Me</a>
                </div>
            </div>

        </div>
    </div>
@endsection
