<?php
    $routeName = Route::getCurrentRoute()->getName();
?>
<ul class="nav nav-tabs">
    <li role="presentation" class="{{ $routeName == 'characters.show' ? 'active' : '' }}"><a href="{{route('characters.show', [$character->id])}}">Gear</a></li>
    <li role="presentation" class="{{ $routeName == 'character.inventory' ? 'active' : '' }}"><a href="{{route('character.inventory', [$character->id])}}">Inventory</a></li>
    <li role="presentation" class="disabled"><a>Skills</a></li>
    <li role="presentation" class="disabled"><a>Champion points</a></li>
    <li role="presentation" class="dropdown {{ $routeName == 'character.crafting' ? 'active' : '' }}">
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript: void(0)" role="button" aria-haspopup="true" aria-expanded="false">
            Crafting <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="{{route('character.crafting', [$character->id, \App\Enum\CraftingType::BLACKSMITHING])}}">Blacksmithing</a></li>
            <li><a href="{{route('character.crafting', [$character->id, \App\Enum\CraftingType::CLOTHIER])}}">Clothier</a></li>
            <li><a href="{{route('character.crafting', [$character->id, \App\Enum\CraftingType::WOODWORKING])}}">Woodworking</a></li>
        </ul>
    </li>
</ul>