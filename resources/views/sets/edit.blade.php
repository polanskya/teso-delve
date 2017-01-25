@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('set.update', [$set])}}" class="form-horizontal">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$set->name}} ({{$set->id}})</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-content">

                                @if(session('updated'))
                                    <div class="col-md-12 alert alert-success">
                                        Set {{$set->name}} has been updated
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="set[name]" class="control-label col-md-2">Set name</label>
                                    <div class="col-md-10">
                                        <input type="text" id="set[name]" disabled="disabled" value="{{$set->name}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="set[description]" class="control-label col-md-2">Description</label>
                                    <div class="col-md-10">
                                        <textarea id="set[description]" rows="8" name="set[description]" class="form-control">{{$set->description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="set[setTypeEnum]" class="control-label col-md-2">Type</label>
                                    <div class="col-md-10">
                                        <select id="set[setTypeEnum]" name="set[setTypeEnum]" class="form-control">
                                            <option>None</option>
                                            @foreach(\App\Enum\SetType::all() as $type)
                                                <option {{$type == $set->setTypeEnum ? 'selected="selected"' : ''}} value="{{$type}}">{{trans('enums.SetType.'.$type)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                @if($set->setTypeEnum == \App\Enum\SetType::CRAFTED)
                                    <div class="form-group">
                                        <label for="crafted_traitNeeded" class="control-label col-md-2">Trait</label>
                                        <div class="col-md-2">
                                            <input id="crafted_traitNeeded" name="crafted_traitNeeded" value="{{$set->getMeta('crafting_traits_needed')}}" class="form-control">
                                        </div>
                                    </div>

                                    @foreach($set->zones as $zone)
                                        <div class="form-group">
                                            <label for="craftingBench[{{$zone->zoneId}}]" class="control-label col-md-2">{{$zonesService->getZone($zone->zoneId)['name']}}</label>
                                            <div class="col-md-6">
                                                <input id="craftingBench[{{$zone->zoneId}}]" name="craftingBench[{{$zone->zoneId}}]" value="{{$set->getMeta('crafting_bench_' . $zone->zoneId)}}" class="form-control">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                @if($set->setTypeEnum == \App\Enum\SetType::MONSTER)
                                    <div class="form-group">
                                        <label for="set_meta[monster]" class="control-label col-md-2">Monster chest</label>
                                        <div class="col-md-5">
                                            <select name="set_meta[monster]" id="set_meta[monster]" class="form-control">
                                                <option>Choose a pledge chest</option>
                                                @foreach(\App\Enum\PledgeChest::all() as $pledgeChest)
                                                    <option value="{{$pledgeChest}}" {{(!is_null($set->meta->where('key', 'monster_chest')->first()) and $pledgeChest == $set->meta->where('key', 'monster_chest')->first()->value) ? 'selected="selected"' : ''}}>{{trans('eso.pledgeChest.' . $pledgeChest)}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                @endif


                            </div>
                            <hr>
                            <div class="form-content">

                                <h4>Set bonuses</h4>
                                <p>[n] number [/n]</p>

                                @for($i = 0; $i < 6; $i++)
                                    <?php
                                    $setBonus = isset($set->bonuses[$i]) ? $set->bonuses[$i] : null;
                                    ?>
                                    <div class="form-group">
                                        <label for="set[description]" class="control-label col-xs-2">Bonus: {{$i + 1}}</label>
                                        <div class="col-xs-2">
                                            <input id="set_bonus[{{$i}}][bonusNumber]" name="set_bonus[{{$i}}][bonusNumber]" value="{{isset($setBonus) ? $setBonus->bonusNumber : $i + 2}}" class="form-control">
                                        </div>
                                        <div class="col-xs-8">
                                            <input id="set_bonus[{{$i}}][description]" name="set_bonus[{{$i}}][description]" value="{{isset($setBonus) ? $setBonus->description : ''}}" class="form-control">
                                        </div>
                                    </div>
                                @endfor


                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Zone drops</h3>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <select multiple="multiple" class="form-control" name="zones[]" style="height: 300px;">
                                        <?php $zones = new \App\Objects\Zones(); ?>
                                        @foreach($zones->getZonesByAlliance() as $alliance => $zonesList)
                                            <option value="">None</option>
                                            <optgroup label="{{trans('alliance.'.$alliance)}}">
                                                @foreach($zonesList as $key => $zone)
                                                    <option value="{{$key}}" {{$set->zones->contains('zoneId', $key) ? ' selected="selected"' : ''}}>{{$zone['name']}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Dungeon drops</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <select multiple="multiple" class="form-control" name="dungeons[]" style="height: 300px;">
                                        <option value="">None</option>
                                        @foreach($dungeonsByAlliance as $alliance => $dungons)
                                            <optgroup label="{{trans('alliance.'.$alliance)}}">
                                                @foreach($dungons as $key => $dungeon)
                                                    <option value="{{$dungeon->id}}" {{$set->dungeons->contains('id', $dungeon->id) ? ' selected="selected"' : ''}}>{{$dungeon['name']}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    <br>
                                </div>
                                <div class="col-sm-12 text-right">
                                    <input type="submit" value="Save set" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
