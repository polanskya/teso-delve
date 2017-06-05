@extends('layouts.app')

@section('meta-title')
    Crafting calculator - @parent
@endsection


@section('content')

    <div class="container" id="crafting-calculator">
        <h4>Item</h4>

        <div class="row">
            <div class="col-md-8">
                <div class="row">

                    <div class="col-md-12">
                        <div>
                            @foreach($researchLinesGrouped as $key => $researchLines)
                                @foreach($researchLines as $ri_key => $researchLine)
                                    <div class="research-line crafting-box {{ ($key == 'armors' and $ri_key == 0) ? 'active' : '' }} text-center" data-itemType="{{$key}}" data-research-line="{{$researchLine}}">
                                        <img class="big-image" src="{{trans('researchline.'.$craftingType.".".$researchLine.".image")}}">
                                        <div class="name">{{trans('researchline.'.$craftingType.".".$researchLine.".name")}}</div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4>Material</h4>
                        <div>
                            @foreach($craftingItemsGrouped as $material_id => $craftingItems)
                                <?php
                                $material = $materials->get($material_id);
                                $craftingItems = $craftingItems->sortBy('sort');
                                ?>

                                <div class="material crafting-box {{ $loop->first ? 'active' : '' }}" data-itemId="">
                                    <div class="material-count pull-right">
                                        <a href=""><i class="fa fa-minus text-danger"></i></a>
                                        <div class="crafting-items">
                                            <ul class="list-unstyled">
                                                @foreach($craftingItems as $craftingItem)
                                                    <li class="crafting-item" data-research-line="{{$craftingItem->researchLineIndex}}" data-level="{{$craftingItem->level}}" data-champion-level="{{$craftingItem->championLevel}}">{{$craftingItem->materialCount}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <a href=""><i class="fa fa-plus text-success"></i></a>
                                    </div>

                                    <span><img src="{{$material->icon}}"> </span>
                                    <span class="name">{{$material->name}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4>Quality</h4>

                        <div>
                            <div class="crafting-box temper">
                                <span class="image"></span>
                                <span class="name">{{trans('quality.names.'. \App\Enum\Quality::NORMAL)}}</span>
                                <br>
                                <span class="description"></span>
                            </div>

                            @foreach($tempers as $key => $temper)

                                <div class="crafting-box temper">
                                    <span class="image"><img src="{{$temper->icon}}"></span>
                                    <span class="name">{{trans('quality.names.'.($key + 1))}}</span>
                                    <br>
                                    <span class="description">{{config('crafting.quality.'.($key + 1).'.tempers')}} x {{$temper->name}}</span>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="col-md-12">
                        <h4>Style</h4>

                        <div>
                            @foreach($itemStyles as $itemStyle)
                                <div class="crafting-box item-style {{ $loop->first ? 'active' : '' }}">
                                    <div class="pull-left"><img src="{{$itemStyle->materialItem->icon}}" class="icon-size-40"></div>
                                    <span class="name">{{$itemStyle->name}}</span>
                                    <br>
                                    <span class="description">{{$itemStyle->materialItem->name}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4>Trait</h4>


                        <div class="weapon-traits">
                            <div class="crafting-box trait active">
                                <div class="image"></div>
                                <span class="name">None</span>
                                <br>
                                <span class="description"></span>
                            </div>

                            @foreach($traits['weapons'] as $trait)

                                <div class="crafting-box trait">
                                    <span class="image"><img src="{{$trait->icon}}"></span>
                                    <span class="name">{{trans('enums.Trait.1.'.$trait->trait)}}</span>
                                    <br>
                                    <span class="description">{{$trait->name}}</span>
                                </div>
                            @endforeach
                        </div>


                        <div class="armor-traits hidden">
                            <div class="crafting-box trait active">
                                <div class="image"></div>
                                <span class="name">None</span>
                                <br>
                                <span class="description"></span>
                            </div>

                            @foreach($traits['armors'] as $trait)
                                <div class="crafting-box trait">
                                    <span class="image"><img src="{{$trait->icon}}"></span>
                                    <span class="name">{{trans('enums.Trait.2.'.$trait->trait)}}</span>
                                    <br>
                                    <span class="description">{{$trait->name}}</span>
                                </div>
                            @endforeach
                        </div>

                    </div>




                </div>
            </div>


            <div class="col-md-4">

                <div class="panel text-center" id="item-preview">
                    <div class="row">
                        <div class="col-md-12 item-icon"><img src="/esoui/art/icons/gear_redguard_light_shirt_d.dds" class="item-icon"></div>

                        <div class="col-md-12"><h2 class="quality-text-4">Jerkin of the Combat Physician</h2></div>

                        <div class="col-md-6 item-stat">Armor 1348</div>
                        <div class="col-md-6 level"><img src="/gfx/champion_icon.png" class="icon-size-40"> <span class="value">160</span></div>

                        <div class="col-md-10 col-md-offset-1"><hr></div>

                        <div class="col-md-12 trait-name">Divines</div>
                        <div class="col-md-12 trait-description">Increases Mundus Stone effects by 6.5%.</div>

                        <div class="col-md-12 set-name">Part of the Combat Physician set (<strong>6/5</strong> items)</div>
                        <div class="col-md-10 col-md-offset-1 setBonuses">
                            <ul class="list-unstyled setbonus-list">
                                <li>(2 items) Adds <span class="number">967</span> <span class="magicka">Max Magicka</span></li>
                                <li>(3 items) Adds <span class="number">688</span> Spell Critical</li>
                                <li>(4 items) Adds <span class="number">688</span> Spell Critical</li>
                                <li>(5 items) Critically Healing an ally grants them a <span class="number">8195</span> Damage Shield for 8 seconds. This effect has a cooldown of 6 seconds. </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="panel" id="item-cost">
                    <div class="panel-body">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th colspan="2">Item</th>
                                <th class="text-right">Amount</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Total price</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td class="min-width"><img src="/esoui/art/icons/crafting_style_item_abahs_watch_r2.dds"></td>
                                <td>Polished Shilling</td>
                                <td class="text-right">1</td>
                                <td class="text-right">58</td>
                                <td class="text-right">58</td>
                            </tr>
                            <tr>
                                <td class="min-width"><img src="http://eso.app/esoui/art/icons/crafting_tempering_alloy.dds"></td>
                                <td>Tempering Alloy</td>
                                <td class="text-right">8</td>
                                <td class="text-right">6 250</td>
                                <td class="text-right">50 000</td>
                            </tr>
                            <tr>
                                <td class="min-width"><img src="http://eso.app/esoui/art/icons/crafting_potent_nirncrux_dust.dds"></td>
                                <td>Potent Nirncrux</td>
                                <td class="text-right">1</td>
                                <td class="text-right">3 000</td>
                                <td class="text-right">3 000</td>
                            </tr>
                            <tr>
                                <td class="min-width"><img src="/esoui/art/icons/crafting_colossus_iron.dds"></td>
                                <td>Rubedite Ingot</td>
                                <td class="text-right">150</td>
                                <td class="text-right">11</td>
                                <td class="text-right">1 650</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3">Total price</td>
                                <td colspan="2" class="text-right">54 708</td>
                            </tr>
                            </tfoot>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

