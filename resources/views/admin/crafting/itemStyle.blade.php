@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>{{$itemStyle->name}}</h1>

                        <form method="post" action="{{route('admin.crafting.item-style.update', [$itemStyle])}}" class="form-group form-horizontal">
                            {{csrf_field()}}

                            <div class="form-content">
                                <div class="form-group">
                                    <label for="itemStyle[name]" class="control-label col-md-2">Name</label>
                                    <div class="col-md-10">
                                        <input type="text" name="itemStyle[name]" value="{{$itemStyle->name}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="itemStyle[location]" class="control-label col-md-2">Description</label>
                                    <div class="col-md-10">
                                        <textarea name="itemStyle[location]" rows="8" name="itemStyle[location]" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="itemStyle[isHidden]" class="control-label col-md-2">Hidden</label>
                                    <div class="col-md-10">
                                        <input type="checkbox" value="1" name="itemStyle[isHidden]" {{ $itemStyle->isHidden ? 'checked="checked"' : ''}}>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="itemStyle[craftable]" class="control-label col-md-2">Craftable</label>
                                    <div class="col-md-10">
                                        <input type="checkbox" value="1" name="itemStyle[craftable]" {{ $itemStyle->craftable ? 'checked="checked"' : ''}}>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    @foreach(\App\Enum\ItemStyleChapter::order() as $chapter)
                                        <div class="form-group col-md-6">
                                            <label for="itemStyle[chapter][{{$chapter}}]" class="control-label col-md-4">@lang('enums.styleItemChapter.'.$chapter.'.self')</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="itemStyle[chapter][{{$chapter}}]">
                                                    <option>Select motif</option>
                                                    @foreach($motifs as $motif)
                                                        <option value="{{$motif->id}}">{{$motif->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" value="Save style" class="btn btn-primary">
                                    </div>
                                </div>



                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
