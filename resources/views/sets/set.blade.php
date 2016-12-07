
<div class="panel {{isset($isFavourite) ? 'panel-primary' : 'panel-default'}}">
    <div class="panel-heading">
        <div class="btn-group pull-right" role="group" aria-label="...">
            <a href="{{route('set.edit', [$set->id])}}" class="btn btn-default btn-xs">Edit set</a>
            <button type="button" class="btn btn-default btn-xs">Save</button>
        </div>
        <h3 class="panel-title">{{$set->name}} ({{$set->id}})</h3>
    </div>
    <div class="panel-body">
        <?php
        $setItems = $items->where('setId', $set->id);
        $setCount = $setItems->count();
        ?>

        @if($set->bonuses->count() > 0 )
            <ol class="list-unstyled">
                @foreach($set->bonuses as $bonus)
                    <li style="{{$setCount >= $bonus->bonusNumber ? 'font-weight: bold;' : '' }}">({{$bonus->bonusNumber}}) {{$bonus->description}}</li>
                @endforeach
            </ol>
        @endif


        @if($setItems->count() > 0)
            <table class="table table-condensed table-striped">
                <tbody>
                @foreach($setItems->sortBy('name') as $item)
                    <tr>
                        <td>{{trans('enums.EquipType.' . $item->equipType)}}</td>
                        <td>
                            {{$item->armorType != null ? trans('enums.ArmorType.' . $item->armorType) : ''}}
                            {{$item->weaponType != null ? trans('enums.WeaponType.' . $item->weaponType) : ''}}
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->traitCategory() !== false ? trans('enums.Trait.'. $item->traitCategory() . "." . $item->trait) : ''}}</td>
                        <td>{{$item->enchant}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>
</div>
                