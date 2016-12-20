<div class="itemBox">
    <img class="item-icon" src="http://esoicons.uesp.net/{{str_ireplace('.dds', '.png', $item->icon)}}">
    <div class="row">
        @if($item->armorType != 0)
            <div class="col-sm-6 text-left">{{trans('enums.EquipType.'. $item->equipType) }}</div>
        @elseif($item->weaponType != 0)
            <div class="col-sm-6 text-left">{{trans('enums.WeaponType.'. $item->weaponType) }}</div>
        @elseif($item->equipType != 0)
            <div class="col-sm-6 text-left">{{trans('enums.EquipType.'. $item->equipType) }}</div>
        @else
            <div class="col-sm-6 text-left"></div>
        @endif
        <div class="col-sm-6 text-right">
            @if($item->pivot and $item->pivot->isLocked)
                <i class="fa fa-lock" aria-hidden="true" data-toggle="tooltip" title="Item is locked"></i>
            @endif
        </div>
    </div>

    <div class="row">
        @if($item->armorType != 0)
            <div class="col-sm-6 text-left">({{ trans('enums.ArmorType.'. $item->armorType) }} Armor)</div>
        @elseif($item->weaponType != 0)
            <div class="col-sm-6 text-left">({{ trans('enums.EquipType.'. $item->equipType) }})</div>
        @else
            <div class="col-sm-6 text-left"></div>
        @endif
        <div class="col-sm-6 text-right">{{($item->pivot and $item->pivot->isBound) ? 'Bound' : ''}}</div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center quality-text-{{$item->quality}}">{{$item->name}}</h2>
            <hr>
        </div>

        @if($item->weaponType !== 0 or $item->armorType !== 0)
        <div class="col-sm-4 text-left"><h4>{{$item->weaponType !== 0 ? 'Damage' : ''}}{{$item->armorType !== 0 ? 'Armor' : ''}} {{$item->itemValue}}</h4></div>
        <div class="col-sm-4 text-center"><h4>Level {{$item->level}}</h4></div>
        <div class="col-sm-4 text-right"><h4><img class="champion-icon" src="/gfx/champion_icon.png"> {{$item->championLevel}}</h4></div>
            @else
            <div class="col-sm-6 text-right"><h4>Level {{$item->level}}</h4></div>
            <div class="col-sm-6 text-left"><h4><img class="champion-icon" src="/gfx/champion_icon.png"> {{$item->championLevel}}</h4></div>
        @endif

        @if($item->enchant)
            <div class="col-md-12 enchantInfo">
                <strong class="text-white">{{$item->enchant}}</strong>
                <p>@include('sets.setbonus', ['description' => $item->enchantDescription])</p>
            </div>
        @endif

        @if($item->trait != 0)
        <div class="col-md-12 traitInfo">
            <strong class="text-white">{{trans('enums.Trait.' . $item->traitCategory() . "." . $item->trait)}}</strong>
            <p>@include('sets.setbonus', ['description' => $item->traitDescription])</p>
        </div>
        @endif


        @if($item->set)
            <div class="col-md-12 text-center text-white">Part of the {{$set->name}} set (<strong>{{$items->where('setId', $set->id)->groupBy('equipType')->count()}}/{{$set->bonuses->sortBy('bonusNumber')->last()->bonusNumber or ''}}</strong> items)</div>

            <div class="col-md-12 setBonuses">
                <ul class="list-unstyled setbonus-list">
                    @foreach($set->bonuses as $bonus)
                        <li>({{$bonus->bonusNumber}} items) @include('sets.setbonus', ['description' => $bonus->description])</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

</div>