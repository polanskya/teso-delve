@extends('layouts.app')

@section('meta-title')
    {{$guild->name}} - @parent
@endsection


@section('content')
    <div class="container-fluid sub-navbar sub-navbar__header-breadcrumbs">

        <div class="container p-b-3">
            <div class="row">
                <h1 class="col-md-12">{{$guild->name}} <small>{{$guild->world}}</small></h1>
            </div>
        </div>
    </div>

    <div class="container" id="guild-dashboard">
        <div class="row">

            @include('guild.menu')

            <div class="col-md-10">
                <div class="row m-t-1">

                    <div class="col-md-12">
                        <table class="table table-condensed table-striped guild-members">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Member</th>
                                <th colspan="2">Level</th>
                                <th>Roles</th>
                                <th class="text-right">Characters</th>
                                <th class="text-right">Sales</th>
                                <th class="text-right">Last seen</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($guild->members->sortByDesc('lastSeen_at') as $guildMember)
                                <?php
                                $rank = $ranks->get($guildMember->rank);
                                ?>
                                <tr>
                                    <td class="min-width">
                                        @if($rank)
                                            <img title="{{$rank->name}}" src="{{$rank->icon_large}}" class="icon-size guild-rank" data-toggle="tooltip">
                                        @endif
                                    </td>
                                    <td class="text-white">{{$guildMember->accountName}}</td>
                                    @if($guildMember->user)
                                        <?php
                                        $characters = $guildMember->user->characters;
                                        $level = $characters->max('level');
                                        $clevel = $characters->max('championLevel');
                                        ?>
                                        @if($level < 50)
                                            <td class="min-width"</td>
                                            <td>{{$level}}</td>
                                        @else
                                            <td class="min-width"><img class="icon-size" src="/gfx/champion_icon.png"></td>
                                            <td>{{$clevel}}</td>
                                        @endif
                                        <td>
                                            {!! $characters->where('isTank', 1)->count() > 0 ? '<span class="label-outline label label-primary">Tank</span>' : '' !!}
                                            {!! $characters->where('isDPS', 1)->count() > 0 ? '<span class="label-outline label label-warning">DPS</span>' : '' !!}
                                            {!! $characters->where('isHealer', 1)->count() > 0 ? '<span class="label-outline label label-success">Healer</span>' : '' !!}
                                        </td>
                                        <td class="text-right">{{$characters->count()}}</td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif
                                    <td class="text-right quality-text-5">{{$accountSales->has($guildMember->accountName) ? number_format($accountSales->get($guildMember->accountName)->price) : 0}}</td>
                                    <td class="text-right nowrap">{{$guildMember->lastSeen_at->format('Y-m-d')}}</td>
                                    <td class="min-width nowrap"><i class="fa fa-sticky-note popover-link {{ empty($guildMember->note) ? '' : 'active' }}" data-toggle="popover" data-trigger="hover" data-placement="top" data-html="true" title="Note" data-content="{!! $guildMember->presentNote() !!}"></i></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr><td colspan="9" class="text-right">Total members: {{$guild->members->count()}}</td></tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

