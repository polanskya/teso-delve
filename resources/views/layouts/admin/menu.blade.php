<aside class="navbar-default sidebar affix-top ps-container ps-theme-default" data-ps-id="3d6dc09e-5e86-c431-bb09-02b47bcfec96">


    <div class="sidebar-content">
        <div class="sidebar-default-visible text-muted small text-uppercase sidebar-section p-y-2">
            <strong>Admin</strong>
        </div>

        <!-- START Tree Sidebar Common -->
        <ul class="side-menu">

            <li class="">
                <a href="{{route('admin.users.index')}}" title="">
                    <i class="fa fa-lg fa-user"></i><span class="nav-label">Users</span>
                </a>
            </li>

            <li class="">
                <a href="{{route('admin.role.index')}}" title="">
                    <i class="fa fa-lg fa-question"></i><span class="nav-label">Roles</span>
                </a>
            </li>

            <li class="">
                <a href="{{route('admin.crafting.itemstyles')}}" title="">
                    <i class="fa fa-lg fa-question"></i><span class="nav-label">Styles & Motifs</span>
                </a>
            </li>

            <li class="">
                <a href="{{route('admin.crafting-table.edit', [\App\Enum\CraftingType::BLACKSMITHING])}}" title="">
                    <i class="fa fa-lg fa-question"></i><span class="nav-label">Crafting table</span>
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