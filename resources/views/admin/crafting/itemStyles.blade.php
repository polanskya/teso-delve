@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row-fluid">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>Item styles</h1>

                        <form method="post" action="{{route('admin.crafting.updateStyles')}}" class="form-group-sm">
                            {{csrf_field()}}
                            <table class="table table-hover m-t-3">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Material</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($itemStyles as $itemStyle)
                                    <tr class="input-group-sm">
                                        <td class="min-width text-right">{{$itemStyle->id}}</td>
                                        <td class="min-width"><input {{$itemStyle->craftable ? 'checked="checked" ' : ''}} type="checkbox" name="itemStyle[{{$itemStyle->id}}][craftable]" id="itemStyle[{{$itemStyle->id}}][craftable]" value="1"></td>
                                        <td><input type="text" value="{{$itemStyle->name}}" class="form-control" id="itemStyle[{{$itemStyle->id}}][name]" name="itemStyle[{{$itemStyle->id}}][name]"></td>
                                        <td class="min-width"><img class="icon-size" src="{{$itemStyle->image}}" title="{{$itemStyle->material}}"></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="text-right" colspan="4">
                                        <input type="submit" value="Save motifs" name="save_motifs" class="btn btn-primary">
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
