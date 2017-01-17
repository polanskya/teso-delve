@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div>
                <div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h1>{{$itemStyle->name}}</h1>
                                <div class="itemstyle-content">
                                    {!! nl2br($itemStyle->location) !!}
                                </div>

                                <hr>

                                @foreach($armors as $armorType => $armorsList)
                                    <h4>{{trans('enums.ArmorType.' . $armorType)}}</h4>
                                    <ul class="list-inline">
                                        @foreach($armorsList->groupBy('equipType') as $armorsListByEquipType)
                                            <li>@include('item.worn_image', ['equippedItem' => $armorsListByEquipType->first(), 'qualityBackground' => false])</li>
                                        @endforeach
                                    </ul>
                                @endforeach

                                @if($weapons->count() > 0)
                                    <h4>Weapons</h4>
                                    <ul class="list-inline">
                                        @foreach($weapons as $weaponType => $weaponList)
                                            <li>@include('item.worn_image', ['equippedItem' => $weaponList->first(), 'qualityBackground' => false])</li>
                                        @endforeach
                                    </ul>
                                @endif

                            </div>

                            <div class="motifs-list col-md-4">
                                @if($itemStyle->chapters->count() > 0)
                                    <h4>Motifs</h4>
                                    @foreach($itemStyle->chapters as $chapter)
                                        @include('item.worn_image', ['equippedItem' => $chapter->item])
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        @foreach($images as $weight => $genders)
                            <div class="itemstyle-armor row">
                                <h2 class="col-md-12">{{ucfirst($weight)}}</h2>
                                @foreach($genders as $genderName => $gender)
                                    <h4 class="col-md-12">{{ucfirst($genderName)}}</h4>
                                    @foreach($gender as $group => $images)
                                        <div class="armor-group col-md-12">
                                            @foreach($images as $image)
                                                <a target="_blank" href="/gfx/item-style/{{$itemStyle->id}}/{{$image}}" class="thumbnail no-bg"><img class="pull-left" src="/gfx/item-style/{{$itemStyle->id}}/{{$image}}"></a>
                                            @endforeach
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
