<tr class="{{ isset($set) ? 'set-member-'.$set->id : '' }} {{(isset($hidden) && $hidden) == true ? 'hidden' : ''}}">
    <td class="min-width"><span class="circle quality-{{$item->quality}}"></span></td>
    <td class="min-width"><img class="item-icon" src="http://esoicons.uesp.net/{{str_ireplace('.dds', '.png', $item->icon)}}"></td>
    <td><a href="{{route('item.show', [$item->id])}}">{{$item->name}}</a> {{ $item->pivot->count > 1 ? "(".$item->pivot->count.")" : '' }}</td>
    <td>{{$item->equipType !== 0 ? trans('enums.EquipType.' . $item->equipType) : ''}}</td>
    <td>
        {{$item->armorType != null ? trans('enums.ArmorType.' . $item->armorType) : ''}}
        {{$item->weaponType != null ? trans('enums.WeaponType.' . $item->weaponType) : ''}}
    </td>
    @if($item->traitCategory() !== false)
    <td>
        {{trans('enums.Trait.'. $item->traitCategory() . "." . $item->trait)}}
    </td>
    @endif
    <td>
        @if(!is_null($item->pivot->characterId))
            <?php $character = $user->characters->where('id', $item->pivot->characterId)->first(); ?>
            @if($character)
                <img class="characterClassImage" src="/gfx/class_{{$character->classId}}.png"> {{$character->name}}
            @endif
        @endif
    </td>
    <td class="text-right item-icons">
        @if($item->pivot->bagEnum == \App\Enum\BagType::WORN)
            <i class="fa fa-male" aria-hidden="true" data-toggle="tooltip" title="Item is worn"></i>
        @endif
        @if($item->pivot->isBound)
            <i class="fa fa-link" aria-hidden="true" data-toggle="tooltip" title="Item is bound"></i>
        @endif
        @if($item->pivot->bagEnum == \App\Enum\BagType::BANK)
            <i class="fa fa-bank" aria-hidden="true" data-toggle="tooltip" title="Item in bank"></i>
        @endif
        @if($item->pivot->isLocked)
            <i class="fa fa-lock" aria-hidden="true" data-toggle="tooltip" title="Item is locked"></i>
        @endif
    </td>
</tr>