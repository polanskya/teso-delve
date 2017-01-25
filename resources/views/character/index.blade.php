@extends('layouts.app')

@section('meta-title')
    My characters - @parent
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="col-md-12">
                <div>
                    <div>
                        <h1>My characters</h1>
                        <table class="table table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th class="min-width"></th>
                                    <th class="min-width"></th>
                                    <th>Name</th>
                                    <th colspan="2">Level</th>
                                    <th>Race</th>
                                    <th>Tank</th>
                                    <th>Healer</th>
                                    <th>DPS</th>
                                    <th>Smith</th>
                                    <th>Wood</th>
                                    <th>Cloth</th>
                                    <th>Horse training</th>
                                    <th class="text-right">Inventory</th>
                                    <th class="text-right">Gold</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($characters as $i => $character)
                                <tr>
                                    <td class="min-width"><img class="icon-size" src="/gfx/alliance_{{$character->allianceId}}.png"></td>
                                    <td class="min-width"><img title="{{trans('eso.classes.'.$character->classId.'.name')}}" class="icon-size" src="/gfx/class_{{$character->classId}}.png"></td>
                                    <td><a href="{{route('characters.show', [$character->id])}}">{{$character->name}}</a></td>
                                    @if($character->level >= 50)
                                        <td class="min-width"><img class="icon-size" src="/gfx/champion_icon.png" class="champion-icon"></td><td>{{$character->championLevel}}</td>
                                    @else
                                        <td class="min-width"></td><td>{{$character->level}}</td>
                                    @endif
                                    <td>{{trans('eso.races.'.$character->raceId.'.name')}}</td>
                                    <td>{!! $character->isTank ? '<i class="fa fa-check"></i>' : '' !!}</td>
                                    <td>{!! $character->isHealer ? '<i class="fa fa-check"></i>' : '' !!}</td>
                                    <td>{!! $character->isDPS ? '<i class="fa fa-check"></i>' : '' !!}</td>
                                    <td>{!! $character->canResearch(\App\Enum\CraftingType::BLACKSMITHING) ? '' : App\Presenter\Date::until($character->nextResearch(\App\Enum\CraftingType::BLACKSMITHING)) !!}</td>
                                    <td>{!! $character->canResearch(\App\Enum\CraftingType::WOODWORKING) ? '' : App\Presenter\Date::until($character->nextResearch(\App\Enum\CraftingType::WOODWORKING)) !!}</td>
                                    <td>{!! $character->canResearch(\App\Enum\CraftingType::CLOTHIER) ? '' : App\Presenter\Date::until($character->nextResearch(\App\Enum\CraftingType::CLOTHIER)) !!}</td>
                                    <td class="min-width nowrap">{!! $character->ridingUnlocked_at < time() ? 'Available' : App\Presenter\Date::until(Carbon\Carbon::createFromTimestamp($character->ridingUnlocked_at)) !!}</td>
                                    <td class="text-right">
                                        @if(intval($character->getMeta('bag_' . App\Enum\BagType::BACKPACK)) != 0)
                                            <span title="Free inventory space">{{ intval($character->getMeta('bag_' . App\Enum\BagType::BACKPACK)) - $character->userItems->where('bagEnum', \App\Enum\BagType::BACKPACK)->count() }}</span>
                                        @endif
                                    </td>
                                    <td class="text-right">{{number_format($character->currency, 0, '.', ' ')}}</td>
                                    <td>
                                        <div class="btn-group hidden">
                                            <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript: void(0)">Action</a></li>
                                                <li><a href="javascript: void(0)">Another action</a></li>
                                                <li><a href="javascript: void(0)">Something else here</a></li>
                                                <li role="separator" class="divider"></li>
                                                <li><a href="javascript: void(0)">Separated link</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tfoot>
                            <tr>
                                <td colspan="14"></td>
                                <td class="text-right">
                                    {{ number_format($characters->sum('currency'), 0, '.', ' ')}}
                                    <img class="icon-size" src="/gfx/gold.png">
                                </td>
                                <td></td>
                            </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

