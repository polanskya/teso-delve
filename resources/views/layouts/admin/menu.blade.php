<?php
    $request = request();
    $uri = $request->route()->uri();
    $routeName = $request->route()->getName();
?>
<aside class="navbar-default sidebar affix-top ps-container ps-theme-default hidden-xs">

    <div class="sidebar-content">
        <div class="sidebar-default-visible text-muted small text-uppercase sidebar-section p-y-2">
            <strong>Admin</strong>
        </div>

        <!-- START Tree Sidebar Common -->
        <ul class="side-menu">

            <li class="{{$uri == 'admin' ? 'active' : ''}}">
                <a href="{{route('admin.index')}}" title="">
                    <i class="fa fa-lg fa-home"></i><span class="nav-label">Dashboard</span>
                </a>
            </li>

            <li class="{{stripos($routeName, 'admin.user') !== false ? 'active' : ''}}">
                <a href="{{route('admin.users.index')}}" title="">
                    <i class="fa fa-lg fa-user"></i><span class="nav-label">Users</span>
                </a>
            </li>

            @role('super-admin')
            <li class="{{stripos($routeName, 'admin.role') !== false ? 'active' : ''}}">
                <a href="{{route('admin.role.index')}}" title="">
                    <i class="fa fa-lg fa-key"></i><span class="nav-label">Roles</span>
                </a>
            </li>
            @endrole

            <li class="{{stripos($routeName, 'admin.crafting') !== false ? 'active' : ''}}">
                <a href="{{route('admin.crafting.itemstyles')}}" title="">
                    <i class="fa fa-lg fa-question"></i><span class="nav-label">Styles & Motifs</span>
                </a>
            </li>

            <li class="{{stripos($routeName, 'admin.error') !== false ? 'active' : ''}}">
                <a href="{{route('admin.errors.index')}}" title="">
                    <i class="fa fa-lg fa-exclamation-circle"></i><span class="nav-label">Errors</span>
                </a>
            </li>

            <li class="{{stripos($routeName, 'admin.ban') !== false ? 'active' : ''}}">
            <a href="{{route('admin.ban.index')}}" title="">
                    <i class="fa fa-lg fa-gavel"></i><span class="nav-label">Bans</span>
                </a>
            </li>


            <li><hr></li>

            <li class="">
                <a href="{{route('admin.crafting-table.edit', [\App\Enum\CraftingType::BLACKSMITHING])}}" title="">
                    <i class="fa fa-lg fa-question"></i><span class="nav-label">Crafting table</span>
                </a>
            </li>

            <li class="">
                <a href="{{route('sitemap.build')}}" title="">
                    <i class="fa fa-lg fa-question"></i><span class="nav-label">Build sitemaps</span>
                </a>
            </li>

            <li class="">
                <a href="{{route('admin.generate-slugs')}}" title="">
                    <i class="fa fa-lg fa-question"></i><span class="nav-label">Generate slugs</span>
                </a>
            </li>

        </ul>
    </div>
</aside>