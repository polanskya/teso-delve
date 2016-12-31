@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th class="min-width"></th>
                                    <th>Name</th>
                                    <th colspan="2">Level</th>
                                    <th>Race</th>
                                    <th colspan="2">Alliance</th>
                                    <th>Tank</th>
                                    <th>Healer</th>
                                    <th>DPS</th>
                                    <th>Horse training</th>
                                    <th class="text-right">Gold</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($characters as $i => $character)
                                <tr>
                                    <td class="min-width"><img title="{{trans('eso.classes.'.$character->classId.'.name')}}" class="icon-size" src="/gfx/class_{{$character->classId}}.png"></td>
                                    <td><a href="{{route('characters.show', [$character->id])}}">{{$character->name}}</a></td>
                                    @if($character->level >= 50)
                                        <td class="min-width"><img class="icon-size" src="/gfx/champion_icon.png" class="champion-icon"></td><td>{{$character->championLevel}}</td>
                                    @else
                                        <td class="min-width"></td><td>{{$character->level}}</td>
                                    @endif
                                    <td>{{trans('eso.races.'.$character->raceId.'.name')}}</td>
                                    <td class="min-width"><img class="icon-size" src="/gfx/alliance_{{$character->allianceId}}.png"></td>
                                    <td>{{trans('alliance.'.$character->allianceId)}}</td>
                                    <td>{!! $character->isTank ? '<i class="fa fa-check"></i>' : '' !!}</td>
                                    <td>{!! $character->isHealer ? '<i class="fa fa-check"></i>' : '' !!}</td>
                                    <td>{!!$character->isDPS ? '<i class="fa fa-check"></i>' : '' !!}</td>
                                    <td class="min-width nowrap">{{$character->ridingUnlocked_at < time() ? 'Available' : date('Y-m-d H:i:s', $character->ridingUnlocked_at)}}</td>
                                    <td class="text-right">{{number_format($character->currency, 0, '.', ' ')}}</td>
                                </tr>
                            @endforeach
                            <tfoot>
                            <tr>
                                <td colspan="11"></td>
                                <td class="text-right">
                                    {{ number_format($characters->sum('currency'), 0, '.', ' ')}}
                                    <img class="icon-size" src="/gfx/gold.png">
                                </td>
                            </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

