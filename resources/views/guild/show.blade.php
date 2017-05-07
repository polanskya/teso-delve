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

                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default b-a-2 b-r-3 no-bg b-gray-dark">
                                    <div class="panel-heading">Guild information</div>
                                    <div class="panel-body">

                                        <dl class="dl-horizontal text-left">

                                            <dt class="text-left">Guild master</dt>
                                            <dd class="text-left text-white"><span>{{$guild->guild_master}}</span></dd>

                                            <dt class="text-left">Founded at</dt>
                                            <dd class="text-left text-white"><span>{{$guild->founded_at->format('Y-m-d')}}</span></dd>

                                            <dt class="text-left">Guild trader</dt>
                                            <dd class="text-left text-white"><span>{{$guild->kiosk_name or 'None'}}</span></dd>

                                            <dt class="text-left">Last updated</dt>
                                            <dd class="text-left text-white"><span>{{$guild->updated_at->format('Y-m-d')}}</span></dd>

                                        </dl>

                                        <ul class="nav nav-tabs m-t-3">
                                            <li role="presentation" class="active">
                                                <a aria-expanded="true" data-toggle="tab" href="#tab-motd" role="tab">MOTD</a></li>

                                            <li role="presentation" class="">
                                                <a aria-expanded="false" data-toggle="tab" href="#tab-description" role="tab">Description</a></li>
                                        </ul>
                                        <div class="tab-content p-t-3 scroll-245">
                                            <div class="tab-pane fade p-r-1 active in" id="tab-motd" role="tabpanel">
                                                {!! $guild->presentMOTD() !!}
                                            </div>
                                            <div class="tab-pane fade p-r-1" id="tab-description" role="tabpanel">
                                                {!! $guild->presentDescription() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="panel panel-default b-a-0 bg-gray-dark">
                                    <div class="panel-heading">Your sales <small class="pull-right text-gray-lighter">{{$dates['start']->format('Y-m-d')}} - {{$dates['end']->format('Y-m-d')}}</small></div>
                                    <div class="panel-body">
                                        <h2 class="m-t-0 f-w-300">{{ number_format($mySales['price']) }}</h2>
                                        @include('number.arrow-compare', ['numberOne' => $mySales['priceCompare'], 'numberTwo' => $mySales['price'], $subText = 'between ' . $dates['startCompare']->format('Y-m') . " - " . $dates['endCompare']->format('Y-m')])
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default b-a-0 bg-gray-dark">
                                    <div class="panel-heading">Your sales <small class="pull-right text-gray-lighter">{{$dates['start']->format('Y-m-d')}} - {{$dates['end']->format('Y-m-d')}}</small></div>
                                    <div class="panel-body">
                                        <h2 class="m-t-0 f-w-300">{{ number_format($mySales['sales']) }}</h2>
                                        @include('number.arrow-compare', ['numberOne' => $mySales['salesCompare'], 'numberTwo' => $mySales['sales'], $subText = 'between ' . $dates['startCompare']->format('Y-m') . " - " . $dates['endCompare']->format('Y-m')])
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default b-a-0 bg-gray-dark">
                                    <div class="panel-heading">Total sold <small class="pull-right text-gray-lighter">{{$dates['start']->format('Y-m-d')}} - {{$dates['end']->format('Y-m-d')}}</small></div>
                                    <div class="panel-body">
                                        <h2 class="m-t-0 f-w-300">{{number_format($salesSum)}}</h2>
                                        @include('number.arrow-compare', ['numberOne' => $salesSumMonth, 'numberTwo' => $salesSum, $subText = 'between ' . $dates['startCompare']->format('Y-m') . " - " . $dates['endCompare']->format('Y-m')])
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default b-a-0 bg-gray-dark">
                                    <div class="panel-heading">Sales count <small class="pull-right text-gray-lighter">{{$dates['start']->format('Y-m-d')}} - {{$dates['end']->format('Y-m-d')}}</small></div>
                                    <div class="panel-body">
                                        <h2 class="m-t-0 f-w-300">{{number_format($salesCount['active'])}}</h2>
                                        @include('number.arrow-compare', ['numberOne' => $salesCount['compare'], 'numberTwo' => $salesCount['active'], $subText = 'between ' . $dates['startCompare']->format('Y-m') . " - " . $dates['endCompare']->format('Y-m')])
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default b-a-0 bg-gray-dark">
                                    <div class="panel-heading">Guild trader sales <small class="pull-right text-gray-lighter">{{$dates['start']->format('Y-m-d')}} - {{$dates['end']->format('Y-m-d')}}</small></div>
                                    <div class="panel-body">
                                        <h2 class="m-t-0 f-w-300">{{number_format($traderSales['active'])}}</h2>
                                        @include('number.arrow-compare', ['numberOne' => $traderSales['compare'], 'numberTwo' => $traderSales['active'], $subText = 'between ' . $dates['startCompare']->format('Y-m') . " - " . $dates['endCompare']->format('Y-m')])
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default b-a-0 bg-gray-dark">
                                    <div class="panel-heading">Guild members <span class="pull-right">{{$guild->members()->count()}}</span></div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h3 class="m-t-0 f-w-300">{{$membersInfo['24hrs']}}</h3>
                                                <small>Last 24 hours</small>
                                            </div>
                                            <div class="col-md-6">
                                                <h3 class="m-t-0 f-w-300">{{$membersInfo['7days']}}</h3>
                                                <small>Last 7 days</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="row sales-tables">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <h5 class="m-b-0 m-t-0 f-w-300">Biggest sales</h5></div>
                                    <div class="col-md-4 col-sm-4 col-sm-4 col-sm-offset-4 col-md-offset-4 col-xs-offset-2 text-right">

                                    </div>
                                </div>
                                <table class="table table-condensed m-t-2">
                                    <thead>
                                    <tr>
                                        <th>Seller</th>
                                        <th colspan="2">Item</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($biggestSales as $bigSale)
                                        <tr>
                                            <td class="text-white"><a href="{{route('guilds.sales', [$guild])}}?seller={{$bigSale->seller}}">{{$bigSale->seller}}</a></td>
                                            @if(is_null($bigSale->item))
                                                <td></td>
                                                <td>-</td>
                                            @else
                                                <td class="min-width hidden-xs"><img class="item-row-icon" src="{{$bigSale->item->icon}}"></td>
                                                <td>@include('item.name', ['item' => $bigSale->item])</td>
                                            @endif
                                            <td class="text-right">{{number_format($bigSale->quantity)}}</td>
                                            <td class="text-right quality-text-5">{{number_format($bigSale->price)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <h5 class="m-b-0 m-t-0 f-w-300">Top sellers</h5></div>
                                    <div class="col-md-4 col-sm-4 col-sm-4 col-sm-offset-4 col-md-offset-4 col-xs-offset-2 text-right">

                                    </div>
                                </div>
                                <table class="table table-condensed m-t-2">
                                    <thead>
                                    <tr>
                                        <th>Seller</th>
                                        <th class="text-right">Total sales</th>
                                        <th class="text-right">Total sold</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($accountSales->take(10) as $account => $accountsSale)
                                        <tr>
                                            <td class="text-white"><a href="{{route('guilds.sales', [$guild])}}?seller={{$account}}">{{$account}}</a></td>
                                            <td class="text-right">{{number_format($accountsSale->sales)}}</td>
                                            <td class="text-right quality-text-5">{{number_format($accountsSale->price)}}</td>
                                        </tr>
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

