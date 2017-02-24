
@if(true)
    <div class="row {{$key % 2 == 0 ? ' bg-gray-darker' : ''}}">
        <div class="col-md-2 p-t-2">@include('sets.name')</div>
        <div class="col-md-3 p-t-2">
            <ul class="list-unstyled">

                @if($set->setTypeEnum == \App\Enum\SetType::MONSTER)
                    @if($set->dungeons->first())
                        <li><a href="{{route('dungeon.show', [$set->dungeons->first()])}}">{{$set->dungeons->first()->name}}</a> (Helm)</li>
                    @endif
                    @if($set->meta->where('key', 'monster_chest')->first())
                        <li class="text-nowrap"><a href="{{route('set.monster.chest', [str_slug(trans('eso.pledgeChest.' . $set->meta->where('key', 'monster_chest')->first()->value))])}}">{{ trans('eso.pledgeChest.' . $set->meta->where('key', 'monster_chest')->first()->value) }}</a> (Shoulder)</li>
                    @endif
                @endif

                @if($set->setTypeEnum == \App\Enum\SetType::DUNGEON)
                    <ul class="list-unstyled">
                        @foreach($set->dungeons as $dungeon)
                            <li><a href="{{route('dungeon.show', [$dungeon])}}">{{$dungeon->name}}</a></li>
                        @endforeach
                    </ul>
                @endif

                @if($set->setTypeEnum == \App\Enum\SetType::CRAFTED)
                    <ul class="list-unstyled">
                        <li>Craftable: {{$set->getMeta('crafting_traits_needed')}} traits</li>
                        @foreach($set->zones as $zone)
                            <li><a href="{{route('zone.show', [$zone->getZoneInfo()['slug']])}}">{{$zone->getZoneInfo()['name']}}</a> - {{$set->getMeta('crafting_bench_' . $zone->zoneId)}}</li>
                        @endforeach
                    </ul>
                @endif

                @if($set->setTypeEnum == \App\Enum\SetType::ZONE)
                    <ul class="list-unstyled">
                    @foreach($set->zones as $zoneId => $zone)
                        <li><a href="{{route('zone.show', [$zone->getZoneInfo()['slug']])}}">{{$zone->getZoneInfo()['name']}}</a></li>
                    @endforeach
                    </ul>
                @endif

            </ul>
        </div>
        <div class="col-md-7 p-t-2">
            <ul class="list-unstyled setbonus-list">
                @foreach($set->bonuses as $bonus)
                    <li>({{$bonus->bonusNumber}}) items @include('sets.setbonus', ['description' => $bonus->description])</li>
                @endforeach
            </ul>
        </div>
    </div>
@else
    <tr>
        <td class="text-nowrap">@include('sets.name')</td>
        <td class="text-nowrap">
            <ul class="list-unstyled">

                @if($set->setTypeEnum == \App\Enum\SetType::MONSTER)
                    @if($set->dungeons->first())
                        <li><a href="{{route('dungeon.show', [$set->dungeons->first()])}}">{{$set->dungeons->first()->name}}</a> (Helm)</li>
                    @endif
                    @if($set->meta->where('key', 'monster_chest')->first())
                        <li class="text-nowrap"><a href="{{route('set.monster.chest', [str_slug(trans('eso.pledgeChest.' . $set->meta->where('key', 'monster_chest')->first()->value))])}}">{{ trans('eso.pledgeChest.' . $set->meta->where('key', 'monster_chest')->first()->value) }}</a> (Shoulder)</li>
                    @endif
                @endif

                @if($set->setTypeEnum == \App\Enum\SetType::DUNGEON)
                    <ul class="list-unstyled">
                        @foreach($set->dungeons as $dungeon)
                            <li><a href="{{route('dungeon.show', [$dungeon])}}">{{$dungeon->name}}</a></li>
                        @endforeach
                    </ul>
                @endif

                @if($set->setTypeEnum == \App\Enum\SetType::CRAFTED)
                    <ul>
                        <li>Craftable: {{$set->getMeta('crafting_traits_needed')}} traits</li>
                        @foreach($set->zones as $zone)
                            <li><a href="{{route('zone.show', [$zone->getZoneInfo()['slug']])}}">{{$zone->getZoneInfo()['name']}}</a> - {{$set->getMeta('crafting_bench_' . $zone->zoneId)}}</li>
                        @endforeach
                    </ul>
                @endif
            </ul>
        </td>
        <td>
            <ul class="list-unstyled setbonus-list">
                @foreach($set->bonuses as $bonus)
                    <li>({{$bonus->bonusNumber}}) items @include('sets.setbonus', ['description' => $bonus->description])</li>
                @endforeach
            </ul>
        </td>
    </tr>
@endif