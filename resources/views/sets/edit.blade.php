@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('set.update', [$set->id])}}" class="form-horizontal">
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
                                    <label for="set[craftable]" class="control-label col-md-2">Craftable</label>
                                    <div class="col-md-10">
                                        <input type="checkbox" id="set[craftable]" name="set[craftable]" class="checkbox" value="1" {{$set->craftable == 1 ? 'checked="checked"' : ''}}>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="set[traitNeeded]" class="control-label col-md-2">Trait</label>
                                    <div class="col-md-2">
                                        <input id="set[traitNeeded]" name="set[traitNeeded]" value="{{$set->traitNeeded}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-content">

                                <h4>Set bonuses</h4>
                                @for($i = 0; $i < 6; $i++)
                                    <?php
                                    $setBonus = isset($set->bonuses[$i]) ? $set->bonuses[$i] : null;
                                    ?>
                                    <div class="form-group">
                                        <label for="set[description]" class="control-label col-xs-2">Bonus: {{$i + 1}}</label>
                                        <div class="col-xs-2">
                                            <input id="set_bonus[{{$i}}][bonusNumber]" name="set_bonus[{{$i}}][bonusNumber]" value="{{isset($setBonus) ? $setBonus->bonusNumber : ''}}" class="form-control">
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
