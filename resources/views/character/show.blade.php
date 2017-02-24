@extends('layouts.app')

@section('meta-title')
    {{$character->name}} with gear, and set bonuses - @parent
@endsection


@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="col-md-12">

                <div>

                    <div>
                        @include('character.tabs')

                        <div class="row character-equipped">
                            <div class="col-md-4 character-equipped-items">
                                <h1>Gear</h1>
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

                                <h3>Info</h3>
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
                                    <div class="col-sm-3 text-bold">Horse skills:</div>
                                    <div class="col-sm-8">
                                        <span class="title" data-toggle="tooltip" data-placement="top" title="Speed">{{$character->getMeta('ridingskill-0')}}</span> /
                                        <span class="title" data-toggle="tooltip" data-placement="top" title="Endurance">{{$character->getMeta('ridingskill-2')}}</span> /
                                        <span class="title" data-toggle="tooltip" data-placement="top" title="Storage">{{$character->getMeta('ridingskill-4')}}</span></div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3 text-bold">Horse training:</div>
                                    <div class="col-sm-8">{{$character->ridingUnlocked_at < time() ? 'Available now' : date('Y-m-d H:i:s', $character->ridingUnlocked_at)}}</div>
                                </div>

                                <div class="row character-attributes">
                                    <h3 class="col-sm-12">Attributes</h3>
                                    <div class="col-sm-2 text-center">
                                        Magicka
                                        <div class="progress h-9">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                        <span class="text-white">{{$character->getMeta('character-attribute-0')}}</span>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        Health
                                        <div class="progress h-9">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                        <span class="text-white">{{$character->getMeta('character-attribute-1')}}</span>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        Stamina
                                        <div class="progress h-9">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                        <span class="text-white">{{$character->getMeta('character-attribute-2')}}</span>
                                    </div>
                                </div>

                                <h3>Set bonuses</h3>
                                @foreach($equippedItems->groupBy('setId') as $setId => $items)
                                    <?php
                                    $set = $items->first()->set;
                                    ?>

                                    @if($set)
                                        <p>{{$set->name}} <span class="badge">{{count($items)}}/{{$set->bonuses->max('bonusNumber')}}</span></p>
                                        <ul class="setbonus-list">
                                            @foreach($set->bonuses as $bonus)
                                                @if(count($items) >= $bonus->bonusNumber)
                                                    <li>@include('sets.setbonus', ['description' => $bonus->description])</li>
                                                @endif
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

