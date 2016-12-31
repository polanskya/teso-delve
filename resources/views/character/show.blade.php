@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="col-md-12">

                <div class="panel panel-default">

                    <div class="panel-body">
                        @include('character.tabs')

                        <div class="row">

                            <div class="col-md-6">
                                <div class="row character-name">
                                    <div class="col-md-2">
                                        <img title="{{trans('alliance.'.$character->allianceId)}}" src="/gfx/alliance_{{$character->allianceId}}.png">
                                    </div>
                                    <div class="col-md-10">
                                        <h1>{{$character->name}}</h1>
                                        <h3>{{trans('eso.races.'.$character->raceId.'.name')}} {{trans('eso.classes.'.$character->classId.'.name')}}</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    @if($character->level >= 50)
                                        <div class="col-sm-3 text-bold">Champion: </div>
                                        <div class="col-sm-8"><img class="icon-size" src="/gfx/champion_icon.png" class="champion-icon"> {{$character->championLevel}}</div>
                                    @else
                                        <div class="col-sm-3 text-bold">Level:</div>
                                        <div class="col-sm-8">{{$character->level}}</div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-sm-3 text-bold">Roles:</div>
                                    <div class="col-sm-8">{{implode(', ', $character->roles())}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3 text-bold">Horse training:</div>
                                    <div class="col-sm-8">{{$character->ridingUnlocked_at < time() ? 'Available now' : date('Y-m-d H:i:s', $character->ridingUnlocked_at)}}</div>
                                </div>


                            </div>
                        </div>

                        <br>

                        <div class="row character-equipped">
                            <div class="col-md-4 character-equipped-items">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::HEAD)->first()])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::SHOULDERS)->first()])
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3 text-right">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::CHEST)->first()])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::BRACERS)->first()])
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3 text-right">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::BELT)->first()])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::LEGS)->first()])
                                    </div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3 text-right">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::FEET)->first()])
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Jewelry -->
                                    <div class="col-md-3">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::COSTUME)->first()])
                                    </div>
                                    <div class="col-md-3 text-center">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::NECKLACE)->first()])
                                    </div>
                                    <div class="col-md-3 text-center">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::RING_ONE)->first()])
                                    </div>
                                    <div class="col-md-3 text-right">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::RING_TWO)->first()])
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Weapon: 1 -->
                                    <div class="col-md-3">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::WEAPON_FIRST_LEFT)->first()])
                                    </div>
                                    <div class="col-md-3 text-center">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::WEAPON_FIRST_RIGHT)->first()])
                                    </div>
                                    <div class="col-md-3 text-center">&nbsp;</div>
                                    <div class="col-md-3">&nbsp;</div>
                                </div>
                                <div class="row">
                                    <!-- Weapon: 2 -->
                                    <div class="col-md-3">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::WEAPON_SECOND_LEFT)->first()])
                                    </div>
                                    <div class="col-md-3 text-center">
                                        @include('item.worn_image', ['equippedItem' => $equippedItems->where('pivot.slotId', \App\Enum\WornBag::WEAPON_SECOND_RIGHT)->first()])
                                    </div>
                                    <div class="col-md-3 text-center">&nbsp;</div>
                                    <div class="col-md-3">&nbsp;</div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <h3>Set bonuses</h3>
                                @foreach($equippedItems->groupBy('setId') as $setId => $items)
                                    <?php
                                    $set = $items->first()->set;
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


                            <div class="col-md-12">
                                <h3>List</h3>
                                <table class="table table-condensed set-table">
                                    <thead>
                                    <th></th>
                                    <th></th>
                                    <th>Item</th>
                                    <th>Weight</th>
                                    <th>Trait</th>
                                    <th>Set</th>
                                    <th>Glyph</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($equippedItems->sortBy('pivot.equipTypeEnum') as $item)
                                        @include('item.item_row_worn', ['item' => $item, 'character' => $character])
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

