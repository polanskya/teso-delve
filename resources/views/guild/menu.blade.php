<?php
    $request = request();
    $routeName = $request->route()->getName();
?>

<div class="col-md-2">
    <div class="hr-text hr-text-left m-t-2 m-b-1">
        <h6 class="text-white"><strong>Guild pages</strong></h6>
    </div>
    <ul class="nav nav-pills nav-stacked">
        <li class="{{ $routeName == 'guilds.show' ? 'active' : '' }}"><a href="{{ route('guilds.show', [$guild]) }}"></i>Dashboard</a></li>
        <li class="{{ $routeName == 'guilds.members' ? 'active' : '' }}"><a href="{{ route('guilds.members', [$guild]) }}"></i>Members </a></li>
        <li class="{{ $routeName == 'guilds.bank' ? 'active' : '' }}"><a href="{{ route('guilds.bank', [$guild]) }}"></i>Bank </a></li>
        <li class="{{ $routeName == 'guilds.sales' ? 'active' : '' }}"><a href="{{ route('guilds.sales', [$guild]) }}"></i>Sales </a></li>
        <li class="{{ $routeName == 'guilds.ranks' ? 'active' : '' }}"><a href="{{ route('guilds.ranks', [$guild]) }}"></i>Ranks </a></li>
    </ul>
</div>
