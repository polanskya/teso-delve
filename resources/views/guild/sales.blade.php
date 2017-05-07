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

    <div class="container">
        <div class="row">

            @include('guild.menu')

            <div class="col-md-10">
                <div class="row m-t-1">

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                @include('guild.partials.filter')

                                <table class="table table-condensed m-t-2">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Item</th>
                                        <th>Seller</th>
                                        <th>Buyer</th>
                                        <th>Quantity</th>
                                        <th class="text-right">Price (each)</th>
                                        <th class="text-right">Price (total)</th>
                                        <th class="text-right">Sold at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sales as $sale)
                                        <tr>
                                            @if($sale->item)
                                                <td class="min-width hidden-xs"><img class="item-row-icon" src="{{$sale->item->icon}}"></td>
                                                <td>@include('item.name', ['item' => $sale->item])</td>
                                            @else
                                                <td></td>
                                                <td>Unknown item</td>
                                            @endif
                                            <td class="text-white">{{$sale->seller}}</td>
                                            <td class="text-white">{{$sale->buyer}}</td>
                                            <td class="text-right">{{number_format($sale->quantity)}}</td>
                                            <td class="text-right quality-text-5">{{number_format($sale->price_ea)}}</td>
                                            <td class="text-right quality-text-5">{{number_format($sale->price)}}</td>
                                            <td class="text-right nowrap">{{$sale->sold_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="8" class="tex.t-right">{{$sales->links()}}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

