<div class="setbox pull-right">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">{{$set->name}}</h3>
            <hr>
        </div>


        <div class="col-md-6 text-right"><h4>Level 50</h4></div>
        <div class="col-md-6"><h4><img class="champion-icon" src="/gfx/champion_icon.png"> 160</h4></div>


        <div class="col-md-12 setBonuses">
            <ul class="list-unstyled">
            @foreach($set->bonuses as $bonus)
                <li>({{$bonus->bonusNumber}} items) {{$bonus->description}}</li>
            @endforeach
            </ul>
        </div>

    </div>
</div>
