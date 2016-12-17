<tr class="{{ isset($set) ? 'set-member-'.$set->id : '' }} {{(isset($hidden) && $hidden) == true ? 'hidden' : ''}}">
    <td class="min-width"><span class="circle quality-{{$item->quality}}"></span></td>
    <td class="min-width"><img class="item-icon" src="http://esoicons.uesp.net/{{str_ireplace('.dds', '.png', $item->icon)}}"></td>
    <td><a href="{{route('item.show', [$item->id])}}">{{$item->name}}</a> {{ $item->count > 1 ? "($item->count)" : '' }}</td>
    <td>{{trans('enums.EquipType.' . $item->equipType)}}</td>
    <td>
        {{$item->armorType != null ? trans('enums.ArmorType.' . $item->armorType) : ''}}
        {{$item->weaponType != null ? trans('enums.WeaponType.' . $item->weaponType) : ''}}
    </td>
    <td>{{$item->traitCategory() !== false ? trans('enums.Trait.'. $item->traitCategory() . "." . $item->trait) : ''}}</td>
    <td>
        @if($item->character)
            <img class="characterClassImage" src="/gfx/class_{{$item->character->classId}}.png"> {{$item->character->name}}
        @endif
    </td>
    <td class="text-right item-icons">
        @if($item->bagtypeId == \App\Enum\BagType::WORN)
            <i class="fa fa-male" aria-hidden="true" data-toggle="tooltip" title="Item is worn"></i>
        @endif
        @if($item->isBound)
            <i class="fa fa-link" aria-hidden="true" data-toggle="tooltip" title="Item is bound"></i>
        @endif
        @if($item->bagtypeId == \App\Enum\BagType::BANK)
            <i class="fa fa-bank" aria-hidden="true" data-toggle="tooltip" title="Item in bank"></i>
        @endif
        @if($item->locked)
            <i class="fa fa-lock" aria-hidden="true" data-toggle="tooltip" title="Item is locked"></i>
        @endif
    </td>
</tr>