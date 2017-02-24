@extends('layouts.app')

@section('meta-title')
    {{trans('enums.CraftingType.' . $craftingTypeEnum)}} crafting for {{$character->name}} - @parent
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="col-md-12">
                <div>
                    <div>
                        @include('character.tabs')

                        <h3>{{trans('enums.CraftingType.' . $craftingTypeEnum)}}</h3>

                        <table class="table table-condensed table-hover">
                            <thead>
                            <tr>
                                <th>Trait</th>
                                @foreach($researchGrid as $researchLineIndexNumber => $researchLine)
                                    <th class="min-width text-center"><img title="{{$researchLine['researchLine']->name}}" class="item-icon size-40" src="{{$researchLine['researchLine']->image}}"></th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>

                            @foreach(\App\Enum\ItemTrait::matris($craftingTypeEnum) as $trait)
                                <tr>
                                    <td class="text-capitalize">{{strtolower(trans('enums.TraitType.'.$trait))}}</td>
                                    @foreach($researchGrid as $researchLineIndexNumber => $researchLine)
                                        <td class="text-center">

                                            @if($researchLine['traits'][$trait]['characterKnown']->count() == 1)
                                                <a tabindex="0" class="popover-link" role="button" data-toggle="popover" data-html="true" data-trigger="focus" data-placement="top" title="Trait known" data-content="<ul><?php foreach($researchLine['traits'][$trait]['known'] as $known) { echo "<li>".$known->character->name . "</li>"; } ?></ul>">
                                                    @if($researchLine['traits'][$trait]['known']->count() == $characters->count() and $character->userId == Auth::id())
                                                        <i class="fa fa-check-circle"></i>
                                                    @else
                                                        <i class="fa fa-check"></i>
                                                    @endif
                                                </a>
                                            @elseif($researchLine['traits'][$trait]['characterResearching']->count() == 1)
                                                <a tabindex="0" class="popover-link" role="button" data-toggle="popover" data-html="true" data-trigger="focus" data-placement="top" title="Currently researching" data-content="Currently researching and done at: <br>{{$researchLine['traits'][$trait]['characterResearching']->first()->researchDone_at}}">
                                                    <i class="fa fa-clock-o"></i>
                                                </a>
                                            @elseif($researchLine['traits'][$trait]['known']->count() >= 1)
                                                <a tabindex="0" class="popover-link" role="button" data-toggle="popover" data-html="true" data-trigger="focus" data-placement="top" title="Known by" data-content="<ul><?php foreach($researchLine['traits'][$trait]['known'] as $known) { echo "<li>".$known->character->name . "</li>"; } ?></ul>">
                                                    <i class="fa fa-check fa-gray"></i>
                                                </a>
                                            @elseif($researchLine['traits'][$trait]['researching']->count() >= 1)
                                                <a tabindex="0" class="popover-link" role="button" data-toggle="popover" data-html="true" data-trigger="focus" data-placement="top" title="Currently being researched by" data-content="<ul><?php foreach($researchLine['traits'][$trait]['researching'] as $known) { echo "<li>".$known->character->name . "</li>"; } ?></ul>">
                                                    <i class="fa fa-clock-o fa-gray"></i>
                                                </a>
                                            @endif

                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach

                            <tr>
                                <td><h3>Craftable sets</h3></td>
                                @foreach($researchGrid as $researchLineIndexNumber => $researchLine)
                                    <td class="min-width text-center valign-bottom"><img title="{{$researchLine['researchLine']->name}}" class="item-icon size-40" src="{{$researchLine['researchLine']->image}}"></td>
                                @endforeach
                            </tr>
                            @foreach($craftableSets as $set)
                                <tr>
                                    <td><span class="set-hover" setId="{{$set->id}}"><a href="{{route('set.show', [$set->slug])}}">{{$set->name}}</a></span></td>
                                    @foreach($researchGrid as $researchLineIndexNumber => $researchLine)
                                        <td class="text-center">
                                            @if($traitsGrouped->has($researchLine['researchLine']->researchLineIndex))
                                                {!! $traitsGrouped->get($researchLine['researchLine']->researchLineIndex)->where('isKnown', 1)->count() >= $set->getMeta('crafting_traits_needed') ? '<i class="fa fa-check"></i>' : '' !!}
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

