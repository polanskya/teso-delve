@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-md-4">
                <form method="POST" action="{{route('set.update', [$set->id])}}" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="btn-group pull-right" role="group" aria-label="...">
                                <button type="button" class="btn btn-default btn-xs">Edit set</button>
                                <button type="button" class="btn btn-default btn-xs">Save</button>
                            </div>
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
                                        <input type="text" id="set[name]" name="set[name]" value="{{$set->name}}" class="form-control">
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
                                @for($i = 0; $i < 4; $i++)
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

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Save" class="btn btn-sm btn-primary pull-right">
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
