@extends('layouts.app')

@section('meta-title')
    {{trans('enums.CraftingType.' . $caftingTypeEnum)}} crafting for {{$character->name}}
@endsection

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
                            </div>
                        </div>

                        <h3>{{trans('enums.CraftingType.' . $caftingTypeEnum)}}</h3>

                        @if($craftingTraits->count() == 0)
                            <div class="text-center">Crafting export not found<br> Please upload a TesoDelve dump with this character.</div>
                        @else
                            <table class="table table-condensed">
                                <thead>
                                <th>Trait</th>
                                @foreach($researchLineIndex as $key => $researchLineIndexNumber)
                                    <th class="min-width"><img title="{{$researchLineIndexNumber->first()->name}}" class="item-icon size-40" src="http://esoicons.uesp.net/{{str_ireplace('.dds', '.png', $researchLineIndexNumber->first()->image)}}"></th>
                                @endforeach
                                </thead>
                                <tbody>
                                @foreach(\App\Enum\ItemTrait::matris() as $traitId)
                                    <tr>
                                        <td>{{trans('enums.TraitType.' . $traitId)}}</td>

                                        @foreach($researchLineIndex as $key => $researchLineIndexNumber)
                                            <?php
                                            $craftingTrait = $craftingTraits->where('researchLineIndex', $key)->where('traitId', $traitId)->first();
                                            ?>
                                            <td class="text-center">
                                                {!! ($craftingTrait and $craftingTrait->isResearched()) ? '<i class="fa fa-check"></i>' : '' !!}
                                                {!! ($craftingTrait and $craftingTrait->isResearching()) ? '<i class="fa fa-clock-o" title="Researching, done at: ' . $craftingTrait->researchDone_at . '"></i>' : ''!!}
                                            </td>
                                        @endforeach

                                    </tr>
                                @endforeach

                                <tr><td colspan="{{count($researchLineIndex) + 1}}"><h3>Craftable sets</h3></td></tr>

                                @foreach($craftableSets as $set)
                                    <tr>
                                        <td><span class="set-hover" setId="{{$set->id}}"><a href="{{route('set.show', [$set->id])}}">{{$set->name}}</a></span></td>
                                        @foreach($researchLineIndex as $key => $researchLineIndexNumber)
                                            <td class="text-center">{!! $researchLineIndexNumber->where('isKnown', 1)->count() >= $set->traitNeeded ? '<i class="fa fa-check"></i>' : '' !!}</td>
                                        @endforeach
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

