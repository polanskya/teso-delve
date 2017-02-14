@extends('layouts.app')

@section('meta-title')
    {{$guild->name}} - @parent
@endsection


@section('content')
    <div class="container">
        <div class="row-fluid">
            <h1 class="col-md-12">{{$guild->name}} <small>{{$guild->world}}</small></h1>

            <div class="col-md-8"><p>{!! \App\Presenter\StringPresenter::ColorReplace($guild->description) !!}</p></div>
            <div class="col-md-4">

            </div>

            <div class="col-md-12">
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>Member</th>
                        <th>Roles</th>
                        <th>Character count</th>
                        <th>Rank</th>
                        <th>Last seen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($guild->members->sortByDesc('lastSeen_at') as $guildMember)
                        <tr>
                            <td>{{$guildMember->accountName}}</td>
                            @if($guildMember->user)
                                <?php $characters = $guildMember->user->characters; ?>
                                <td>
                                    {!! $characters->where('isTank', 1)->count() > 0 ? '<span class="label-outline label label-primary">Tank</span>' : '' !!}
                                    {!! $characters->where('isDPS', 1)->count() > 0 ? '<span class="label-outline label label-warning">DPS</span>' : '' !!}
                                    {!! $characters->where('isHealer', 1)->count() > 0 ? '<span class="label-outline label label-success">Healer</span>' : '' !!}
                                </td>
                                <td>{{$characters->count()}}</td>
                            @else
                                <td></td>
                                <td></td>
                            @endif
                            <td>{{$guildMember->rank}}</td>
                            <td class="min-width nowrap">{{$guildMember->lastSeen_at->format('Y-m-d')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr><td colspan="5" class="text-right">Total members: {{$guild->members->count()}}</td></tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

