<tr>
    <td class="text-nowrap">
        @if($championLevel != null)
            <img src="/gfx/champion_icon.png" class="icon-size"> {{$championLevel}}
        @else
            {{$level}}
        @endif
    </td>
    @foreach($researchLineIndexes as $researchLine)
        <td class="p-b-3">
            <?php
            $craftingItem = $levelCraftingItems->where('researchLineIndex', $researchLine->researchLineIndex)->first();
            ?>

            <select name="crafting-items[{{$level}}][material]" class="m-b-1 width-120 form-control">
                <option value="">-</option>
                @foreach($materials as $material)
                    <option {{ $craftingItem->material_id == $material->id ? " selected='selected'" : '' }} value="{{$material->id}}">{{ucfirst($material->name)}}</option>
                @endforeach
            </select>

            <input type="text" name="crafting-items[{{$level}}][{{$researchLine->researchLineIndex}}][amount]" value="{{$craftingItem->materialCount or ''}}" class="text-right width-120 form-control">
        </td>
    @endforeach
</tr>