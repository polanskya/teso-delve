@extends('layouts.app')

@section('meta-title')
@endsection

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="col-md-12">

                <div>

                    <div>
                        @include('character.tabs')

                        <h3>Known motifs</h3>

                        <table class="table table-condensed table-hover">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                @foreach(\App\Enum\ItemStyleChapter::order() as $chapter)
                                    @if($chapter == \App\Enum\ItemStyleChapter::ALL)
                                        <th class="text-center">All</th>
                                    @else
                                        <th class="text-center"><img title="@lang('enums.styleItemChapter.' . $chapter.'.self')" class="icon-size" src="@lang('enums.styleItemChapter.' . $chapter .'.image')"></th>
                                    @endif
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($itemStyles as $itemStyle)
                                <tr>
                                    <td class="min-width"><img class="icon-size" title="{{$itemStyle->material}}" src="{{$itemStyle->image}}"></td>
                                    <td class="nowrap"><a href="{{route('item-styles.show', [$itemStyle])}}">{{$itemStyle->name}}</a></td>
                                    @foreach(\App\Enum\ItemStyleChapter::order() as $chapter)
                                        <td class="text-center"><span class="{{($knownItemStyles->where('itemStyleId', $itemStyle->id)->where('itemStyleChapterEnum', $chapter)->count() > 0) ? 'badge badge-success' : '' }}">&nbsp;</span></td>
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

