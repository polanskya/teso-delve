<tr class="{{ isset($set) ? 'set-member-'.$set->id : '' }} {{(isset($hidden) && $hidden) == true ? 'hidden' : ''}}">
    <td class="min-width"><span class="circle quality-{{$item->quality}}"></span></td>
    <td class="min-width"><img class="item-icon" src="http://esoicons.uesp.net/{{str_ireplace('.dds', '.png', $item->icon)}}"></td>
    <td>{{$item->name}}</td>
    <td>{{trans('enums.EquipType.' . $item->equipType)}}</td>
    <td>
        {{$item->armorType != null ? trans('enums.ArmorType.' . $item->armorType) : ''}}
        {{$item->weaponType != null ? trans('enums.WeaponType.' . $item->weaponType) : ''}}
    </td>
    <td>{{$item->traitCategory() !== false ? trans('enums.Trait.'. $item->traitCategory() . "." . $item->trait) : ''}}</td>
    <td>{{$item->character->name}}</td>
    <td class="text-right">
        @if($item->locked)
            <a type="button" class="btn btn-xs"><i class="fa fa-lock" aria-hidden="true"></i></a>
        @endif
    </td>
</tr>