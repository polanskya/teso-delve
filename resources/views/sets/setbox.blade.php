<div class="setbox pull-right">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center bonusName">{{$set->name}} set</h2>
            <hr>
        </div>


        <div class="col-md-6 text-right"><h4>Level 50</h4></div>
        <div class="col-md-6"><h4><img class="champion-icon" src="/gfx/champion_icon.png"> 160</h4></div>


        <div class="col-md-12 text-center text-white setCount">You have <strong>{{$user->items->where('setId', $set->id)->groupBy('equipType')->count()}}/{{$set->bonuses->sortBy('bonusNumber')->last()->bonusNumber or ''}}</strong> item types of {{$set->name}}</div>

        <div class="col-md-12 setBonuses">
            <ul class="list-unstyled setbonus-list">
            @foreach($set->bonuses as $bonus)
                <li>({{$bonus->bonusNumber}} items) @include('sets.setbonus')</li>
            @endforeach
            </ul>
        </div>

    </div>
</div>
