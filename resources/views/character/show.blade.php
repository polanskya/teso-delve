@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="row character-equipped">
                            <div class="col-md-12">
                                <h1>{{$character->name}}</h1>
                                <ul>
                                    @if($character->level >= 50)
                                        <li><img src="/gfx/champion_icon.png" class="champion-icon"> {{$character->championLevel}}</li>
                                    @else
                                        <li>Level: {{$character->level}}</li>
                                    @endif

                                    <li>Class: {{trans('eso.classes.'.$character->classId.'.name')}}</li>
                                    <li>Race: {{trans('eso.races.'.$character->raceId.'.name')}}</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('equipTypeEnum', \App\Enum\EquipType::HEAD)->first()])
                                    </div>

                                    <div class="col-md-6">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('equipTypeEnum', \App\Enum\EquipType::SHOULDERS)->first()])
                                    </div>
                                    <div class="col-md-6 text-right">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('equipTypeEnum', \App\Enum\EquipType::CHEST)->first()])
                                    </div>

                                    <div class="col-md-6">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('equipTypeEnum', \App\Enum\EquipType::HAND)->first()])
                                    </div>
                                    <div class="col-md-6 text-right">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('equipTypeEnum', \App\Enum\EquipType::WAIST)->first()])
                                    </div>

                                    <div class="col-md-6">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('equipTypeEnum', \App\Enum\EquipType::LEGS)->first()])
                                    </div>
                                    <div class="col-md-6 text-right">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('equipTypeEnum', \App\Enum\EquipType::FEET)->first()])
                                    </div>

                                    <hr>

                                    <div class="col-md-3">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('equipTypeEnum', \App\Enum\EquipType::COSTUME)->first()])
                                    </div>
                                    <div class="col-md-3">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('equipTypeEnum', \App\Enum\EquipType::NECK)->first()])
                                    </div>
                                    <div class="col-md-3">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('equipTypeEnum', \App\Enum\EquipType::RING)->first()])
                                    </div>
                                    <div class="col-md-3">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('equipTypeEnum', \App\Enum\EquipType::RING)->values()->all()[1]])
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                @foreach($equippedItems->groupBy('item.setId') as $setId => $items)
                                    <?php
                                    $set = $items->first()->item->set;
                                    ?>

                                    @if($set)
                                        <p>{{$set->name}}</p>
                                        <ul class="setbonus-list">
                                            @foreach($set->bonuses as $bonus)
                                                <li class="{{count($items) >= $bonus->bonusNumber ? 'text-bold' : ''}}">({{$bonus->bonusNumber}} items) @include('sets.setbonus', ['description' => $bonus->description])</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

