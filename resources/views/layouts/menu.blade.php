<nav class="navigation">
    <!-- START Navbar -->
    <div class="navbar-inverse navbar navbar-fixed-top">
        <div class="container">

            <div class="navbar-header">
                <a class="current navbar-brand" href="/">
                    TESO Delve
                </a>
                <button class="action-right-sidebar-toggle navbar-toggle collapsed active" data-target="#navdbar" data-toggle="collapse" type="button" data-original-title="" title="">
                    <i class="fa fa-fw fa-align-right text-white"></i>
                </button>
                <button class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
                    <i class="fa fa-fw fa-user text-white"></i>
                </button>
                <button class="action-sidebar-open navbar-toggle collapsed" type="button">
                    <i class="fa fa-fw fa-bars text-white"></i>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbar">

                <!-- START Search Mobile -->
                <div class="form-group hidden-lg hidden-md hidden-sm">
                    <div class="input-group hidden-lg hidden-md">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                        <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-search"></i></button>
                    </span>
                    </div>
                </div>
                <!-- END Search Mobile -->

                <!-- START Left Side Navbar -->
                <ul class="nav navbar-nav navbar-left clearfix yamm">


                    <!-- START Menu Only Visible on Navbar -->

                    <li>
                        <a href="{{route('import.index')}}" aria-expanded="false">
                            <span class="m-r-1">Import</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{url('/home')}}" aria-expanded="false">
                            <span class="m-r-1">Inventory</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle user-dropdown" data-toggle="dropdown" href="javascript: void(0)" role="button" aria-expanded="false">
                            <span class="m-r-1">Sets</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header text-gray-lighter">
                                <strong class="text-uppercase">Sets</strong>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{route('set.my-sets')}}">My sets</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">Craftable</a>
                                <a href="{{route('dungeons.index')}}">Dungeons</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown hidden">
                        <a class="dropdown-toggle user-dropdown" data-toggle="dropdown" href="javascript: void(0)" role="button" aria-expanded="false">
                            <span class="m-r-1">Builds</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('set.my-sets')}}">Templar</a>
                                <a href="{{route('set.my-sets')}}">Dragonknight</a>
                                <a href="{{route('set.my-sets')}}">Sorcerer</a>
                                <a href="{{route('set.my-sets')}}">Nightblade</a>
                            </li>
                        </ul>
                    </li>


                    <li id="top-menu-switch" class="dropdown">
                        <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Menu <i class="fa fa-fw fa-caret-down"></i></a>


                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">

                                        <!-- START Start, Widgets Navbar Menu -->
                                        <ul class="col-sm-2 list-unstyled">
                                            <li>
                                                <p class="text-muted small text-uppercase"><strong> Start</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../start/overview.html" class="text-gray-lighter">
                                                    <span class="nav-label">Overview</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../start/projects.html" class="text-gray-lighter">
                                                    <span class="nav-label">Projects</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../start/analytics.html" class="text-gray-lighter">
                                                    <span class="nav-label">Analytics</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../start/activity-team.html" class="text-gray-lighter">
                                                    <span class="nav-label">Activity Team</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../start/e-commerce.html" class="text-gray-lighter">
                                                    <span class="nav-label">E-Commerce</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../start/financial.html" class="text-gray-lighter">
                                                    <span class="nav-label">Financial</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../start/stock.html" class="text-gray-lighter">
                                                    <span class="nav-label">Stock</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../start/performance.html" class="text-gray-lighter">
                                                    <span class="nav-label">Performance</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../start/exchange&amp;trading.html" class="text-gray-lighter">
                                                    <span class="nav-label">Exchange &amp; Trading</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../start/system.html" class="text-gray-lighter">
                                                    <span class="nav-label">System</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../start/monitor.html" class="text-gray-lighter">
                                                    <span class="nav-label">Monitor</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"><strong>Widgets</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../widgets/widgets.html" class="text-gray-lighter">
                                                    <span class="nav-label">Widgets</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a href="../graphs-widgets/widgets.html" class="text-gray-lighter">
                                                    <span class="nav-label">Graphs Widgets</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"><strong>Tables</strong></p>
                                            </li>

                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../tables/pricing-tables.html">
                                                    <span class="nav-label">Pricing Tables</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../tables/tables.html">
                                                    <span class="nav-label">Tables</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../tables/datatables.html">
                                                    <span class="nav-label">Datatables</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"> <strong> Grid</strong></p>
                                                <ul>
                                                    <li class="m-l-1">
                                                        <a class="text-gray-lighter" href="../grids/grids.html">
                                                            <span class="nav-label">Grids</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <!-- END Start, Widgets Navbar Menu -->

                                        <!-- START Layouts, Sidebars Navbar Menu -->
                                        <ul class="col-sm-2 list-unstyled">
                                            <li>
                                                <p class="text-muted small text-uppercase"><strong>Layouts</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../layouts/default-fullwidth.html">
                                                    <span class="nav-label">Default FullWidth</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../layouts/default-fixed.html">
                                                    <span class="nav-label">Default Fixed</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../layouts/default-w-navbar.html">
                                                    <span class="nav-label">Default w/ Navbar</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../layouts/default-w-footer.html">
                                                    <span class="nav-label">Default w/ Footer</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../layouts/default-footer-fixed.html">
                                                    <span class="nav-label">Default Footer Fixed</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../layouts/navbar.html">
                                                    <span class="nav-label">Navbar</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../layouts/navbar-container.html">
                                                    <span class="nav-label">Navbar Container</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../layouts/empty-page.html">
                                                    <span class="nav-label">Empty Page</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"><strong>Sidebars</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../sidebars/sidebar-default.html">
                                                    <span class="nav-label">Sidebar Default</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../sidebars/sidebar-w-progress.html">
                                                    <span class="nav-label">Sidebar w/ Progress</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../sidebars/sidebar-w-menu.html">
                                                    <span class="nav-label">Sidebar w/ Menu</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../sidebars/sidebar-w-bars.html">
                                                    <span class="nav-label">Sidebar w/ Bars</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../sidebars/sidebar-avatar-&amp;-bars.html">
                                                    <span class="nav-label">Sidebar Avatar &amp; Bars</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../sidebars/sidebar-aside.html">
                                                    <span class="nav-label">Sidebar ASide</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../sidebars/sidebar-avatar-numbers.html">
                                                    <span class="nav-label">With Avatar &amp; Numbers</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../sidebars/sidebar-avatar-stats.html">
                                                    <span class="nav-label">With Avatar &amp; Stats</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../sidebars/sidebar-slim.html">
                                                    <span class="nav-label">Sidebar Slim</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../sidebars/sidebar-big-icons.html">
                                                    <span class="nav-label">Sidebar Big Icons</span>
                                                </a>
                                            </li>

                                        </ul>
                                        <!-- END Layouts, Sidebars Navbar Menu -->

                                        <!-- START Layouts, Sidebars Navbar Menu -->
                                        <ul class="col-sm-2 list-unstyled">
                                            <li>
                                                <p class="text-muted small text-uppercase"><strong> Interface</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/colors.html">
                                                    <span class="nav-label">Colors</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/typography.html">
                                                    <span class="nav-label">Typography</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/buttons.html">
                                                    <span class="nav-label">Buttons</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/paginations&amp;pager.html">
                                                    <span class="nav-label">Paginations &amp; Pager</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/images&amp;thumbs.html">
                                                    <span class="nav-label">Images &amp; Thumbs</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/avatars.html">
                                                    <span class="nav-label">Avatars</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/navbars.html">
                                                    <span class="nav-label">Navbars</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/alerts.html">
                                                    <span class="nav-label">Alerts</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/toastr.html">
                                                    <span class="nav-label">Toastr</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/modals.html">
                                                    <span class="nav-label">Modals</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/progress-bars.html">
                                                    <span class="nav-label">Progress Bars</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/badges&amp;labels.html">
                                                    <span class="nav-label">Badges &amp; Labels</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/breadcrumps.html">
                                                    <span class="nav-label">Breadcrumbs</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/tabs&amp;pills.html">
                                                    <span class="nav-label">Tabs &amp; Pills</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/tooltips&amp;popovers.html">
                                                    <span class="nav-label">Tooltips &amp; Popovers</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../interface/list-groups.html">
                                                    <span class="nav-label">List Groups</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"><strong>Graphs</strong></p>
                                            </li>

                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../graphs/highcharts.html">
                                                    <span class="nav-label">Highcharts</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../graphs/highstock.html">
                                                    <span class="nav-label">Highstock</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../graphs/peity.html">
                                                    <span class="nav-label">Peity</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../graphs/sparklines.html">
                                                    <span class="nav-label">Sparklines</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../graphs/chartist.html">
                                                    <span class="nav-label">Chartist</span>
                                                </a>
                                            </li>

                                        </ul>
                                        <!-- END Layouts, Sidebars Navbar Menu -->

                                        <!-- START Pages Navbar Menu -->
                                        <ul class="col-sm-2 list-unstyled">
                                            <li>
                                                <p class="text-muted small text-uppercase"><strong> Pages</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../pages/register.html">
                                                    <span class="nav-label">Register</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../pages/login.html">
                                                    <span class="nav-label">Login</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../pages/forgot-password.html">
                                                    <span class="nav-label">Forgot Password</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../pages/lock-screen.html">
                                                    <span class="nav-label">Lock Screen</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../pages/error-404.html">
                                                    <span class="nav-label">Error 404</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../pages/invoice.html">
                                                    <span class="nav-label">Invoice</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../pages/timeline.html">
                                                    <span class="nav-label">Timeline</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"><strong>Projects</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/projects-list.html">
                                                    <span class="nav-label">Projects List</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/projects-grid.html">
                                                    <span class="nav-label">Projects Grid</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"> <strong> Tasks</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/tasks-list.html">
                                                    <span class="nav-label">Tasks List</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/tasks-grid.html">
                                                    <span class="nav-label">Tasks Grid</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/tasks-details.html">
                                                    <span class="nav-label">Tasks Details</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"><strong>Files Manager</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/files-list.html">
                                                    <span class="nav-label">Files List</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/files-grid.html">
                                                    <span class="nav-label">Files Grid</span>
                                                </a>
                                            </li>
                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"><strong> Search Results</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/search-results.html">
                                                    <span class="nav-label">Search Results</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/images-results.html">
                                                    <span class="nav-label">Images Results</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/videos-results.html">
                                                    <span class="nav-label">Videos Results</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/users-results.html">
                                                    <span class="nav-label">Users Results</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- END Pages Navbar Menu -->

                                        <!-- START Pages Navbar Menu -->
                                        <ul class="col-sm-2 list-unstyled">
                                            <li>
                                                <p class="text-muted small text-uppercase"><strong> Users</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/users-list.html">
                                                    <span class="nav-label">Users List</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/users-grid.html">
                                                    <span class="nav-label">Users Grid</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"><strong>Mailbox</strong></p>
                                            </li>

                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/inbox.html">
                                                    <span class="nav-label">Inbox</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/email-details.html">
                                                    <span class="nav-label">Email Details</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/new-email.html">
                                                    <span class="nav-label">New Email</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"> <strong> Profile User</strong></p>
                                            </li>

                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/profile-details.html">
                                                    <span class="nav-label">Profile Details</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/profile-edit.html">
                                                    <span class="nav-label">Profile Edit</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/account-edit.html">
                                                    <span class="nav-label">Account Edit</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/billing-edit.html">
                                                    <span class="nav-label">Billing Edit</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/settings-edit.html">
                                                    <span class="nav-label">Settings Edit</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../apps/sessions-edit.html">
                                                    <span class="nav-label">Sessions Edit</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"><strong> Icons</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../icon/fonts-awesome.html">
                                                    <span class="nav-label">Fonts Awesome</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../icon/glyphicons.html">
                                                    <span class="nav-label">Glyphicons</span>
                                                </a>
                                            </li>
                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"><strong>Versions</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../versions/jquery.html">
                                                    <span class="nav-label">JQuery</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../versions/react.html">
                                                    <span class="nav-label">React</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../versions/react.html">
                                                    <span class="nav-label">Photoshop .PSD</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- END Pages Navbar Menu -->

                                        <!-- START Pages Navbar Menu -->
                                        <ul class="col-sm-2 list-unstyled">
                                            <li>
                                                <p class="text-muted small text-uppercase"><strong>Forms</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../forms/forms.html">
                                                    <span class="nav-label">Forms</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../forms/forms-layouts.html">
                                                    <span class="nav-label">Forms Layouts</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../forms/date-range-picker.html">
                                                    <span class="nav-label">Date Range Picker</span>
                                                </a>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../forms/forms-extended.html">
                                                    <span class="nav-label">Forms Extended</span>
                                                </a>
                                            </li>

                                            <li>
                                                <p class="text-muted small text-uppercase m-t-2"><strong>Panels</strong></p>
                                            </li>
                                            <li class="m-l-1">
                                                <a class="text-gray-lighter" href="../panels/panels.html">
                                                    <span class="nav-label">Panels</span>
                                                </a>
                                            </li>

                                        </ul>
                                        <!-- END Pages Navbar Menu -->

                                    </div>
                                </div>
                            </li>
                        </ul>

                    </li>
                    <!-- END Menu Only Visible on Navbar -->


                </ul>
                <!-- START Left Side Navbar -->

                <!-- START Right Side Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <li role="separator" class="divider hidden-lg hidden-md hidden-sm"></li>
                    <li class="dropdown-header hidden-lg hidden-md hidden-sm text-gray-lighter text-uppercase">
                        <strong>Your Profile</strong>
                    </li>

                    <!-- START Notification -->
                    <li class="dropdown hidden">

                        <!-- START Icon Notification with Badge (10)-->
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript: void(0)" role="button" aria-expanded="false">
                            <i class="fa fa-lg fa-fw fa-bell hidden-xs"></i>
                            <span class="hidden-sm hidden-md hidden-lg">
                                Notifications <span class="badge badge-primary m-l-1">10</span>
                            </span>
                            <span class="label label-primary label-pill label-with-icon hidden-xs">10</span>
                            <span class="fa fa-fw fa-angle-down hidden-lg hidden-md hidden-sm"></span>
                        </a>
                        <!-- END Icon Notification with Badge (10)-->

                        <!-- START Notification Dropdown Menu -->
                        <ul class="dropdown-menu dropdown-menu-right p-t-0 b-t-0 p-b-0 b-b-0 b-a-0">
                            <li>
                                <div class="yamm-content p-t-0 p-r-0 p-l-0 p-b-0">
                                    <ul class="list-group m-b-0 b-b-0">
                                        <li class="list-group-item b-r-0 b-l-0 b-r-0 b-t-r-0 b-t-l-0 b-b-2 w-350">
                                            <small class="text-uppercase">
                                                <strong>Notifications</strong>
                                            </small>
                                            <a role="button" href="../apps/settings-edit.html" class="btn m-t-0 btn-xs btn-default pull-right">
                                                <i class="fa fa-fw fa-gear"></i>
                                            </a>
                                        </li>

                                        <!-- START Scroll Inside Panel -->
                                        <li class="list-group-item b-a-0 p-x-0 p-y-0 b-t-0">
                                            <div class="scroll-300 custom-scrollbar ps-container ps-theme-default" data-ps-id="6c88d4fc-b8ae-f440-0615-9d4c6dd92cc3">
                                                <a href="../pages/timeline.html" class="list-group-item b-r-0 b-t-0 b-l-0">
                                                    <div class="media">
                                                        <div class="media-left">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle-thin fa-stack-2x text-danger"></i>
                                                    <i class="fa fa-close fa-stack-1x fa-fw text-danger"></i>
                                                </span>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="m-t-0">
                                                                <span>You can't generate the sensor without parsing the mobile USB transmitter!</span>
                                                            </h5>
                                                            <p class="text-nowrap small m-b-0">
                                                                <span>23-Mar-2016, 12:57</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="../pages/timeline.html" class="list-group-item b-r-0 b-l-0">
                                                    <div class="media">
                                                        <div class="media-left">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle-thin fa-stack-2x text-primary"></i>
                                                    <i class="fa fa-info fa-stack-1x text-primary"></i>
                                                </span>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="m-t-0">
                                                                <span>If we bypass the card, we can get to the IB driver through the 1080p RAM bus!</span>
                                                            </h5>
                                                            <p class="text-nowrap small m-b-0">
                                                                <span>16-Jan-2013, 08:48</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="../pages/timeline.html" class="list-group-item b-r-0 b-l-0">
                                                    <div class="media">
                                                        <div class="media-left">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle-thin fa-stack-2x text-success"></i>
                                                    <i class="fa fa-check fa-stack-1x text-success"></i>
                                                </span>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="m-t-0">
                                                                <span>Try to bypass the TCP alarm, maybe it will transmit the back-end feed!</span>
                                                            </h5>
                                                            <p class="text-nowrap small m-b-0">
                                                                <span>26-Feb-2014, 05:14</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="../pages/timeline.html" class="list-group-item b-r-0 b-l-0">
                                                    <div class="media">
                                                        <div class="media-left">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle-thin fa-stack-2x text-warning"></i>
                                                    <i class="fa fa-exclamation fa-stack-1x fa-fw text-warning"></i>
                                                </span>
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="m-t-0">
                                                                <span>If we connect the card, we can get to the ADP feed through the mobile EXE program!</span>
                                                            </h5>
                                                            <p class="text-nowrap small m-b-0">
                                                                <span>03-Jan-2014, 04:48</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                                        </li>

                                        <!-- END Scroll Inside Panel -->
                                        <li class="list-group-item b-a-0 p-x-0 p-y-0 r-a-0 b-b-0">
                                            <a class="list-group-item text-center b-r-0 b-b-0 b-l-0 b-r-b-r-0 b-r-b-l-0" href="../pages/timeline.html">
                                                See All Notifications <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </li>
                        </ul>
                        <!-- END Notification Dropdown Menu -->

                    </li>
                    <!-- END Notification -->

                    <li class="dropdown hidden">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript: void(0)" role="button" aria-expanded="false">
                            <i class="fa fa-lg fa-fw fa-envelope hidden-xs"></i>
                            <span class="hidden-sm hidden-md hidden-lg">Messages <span class="badge badge-info m-l-1">3</span></span>
                            <span class="label label-info label-pill label-with-icon hidden-xs">3</span>
                            <span class="fa fa-fw fa-angle-down hidden-lg hidden-md hidden-sm"></span>
                        </a>

                        <!-- START Messages Dropdown Menu -->
                        <ul class="dropdown-menu dropdown-menu-right p-t-0 b-t-0 p-b-0 b-b-0 b-a-0">
                            <li>
                                <div class="yamm-content p-t-0 p-r-0 p-l-0 p-b-0">
                                    <ul class="list-group m-b-0">
                                        <li class="list-group-item b-r-0 b-l-0 b-r-0 b-t-r-0 b-t-l-0 b-b-2 w-350">
                                            <small class="text-uppercase">
                                                <strong>Messages</strong>
                                            </small>
                                            <a role="button" href="../apps/new-email.html" class="btn m-t-0 btn-xs btn-default pull-right">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </li>

                                        <!-- START Scroll Inside Panel -->
                                        <li class="list-group-item b-a-0 p-x-0 p-y-0 b-t-0">
                                            <div class="scroll-200 custom-scrollbar ps-container ps-theme-default" data-ps-id="bf4e2a80-3860-1c90-3b82-9e069e0368f9">

                                                <a href="../apps/email-details.html" class="list-group-item b-r-0 b-t-0 b-l-0">
                                                    <div class="media">
                                                        <div class="media-left media-middle">
                                                            <div class="avatar">
                                                                <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/spacewood_/128.jpg" alt="Avatar">
                                                                <i class="avatar-status avatar-status-bottom bg-danger b-gray-darker"></i>
                                                            </div>
                                                        </div>
                                                        <div class="media-body media-auto">
                                                            <h5 class="m-b-0 m-t-0">
                                                                <span>Braulio Stehr</span>
                                                                <small><span>04:15</span></small>
                                                            </h5>
                                                            <p class="m-t-0 m-b-0">
                                                                <span>At esse fugiat ea et vero vitae culpa repellendus.</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="../apps/email-details.html" class="list-group-item b-r-0 b-l-0">
                                                    <div class="media">
                                                        <div class="media-left media-middle">
                                                            <div class="avatar">
                                                                <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/scottgallant/128.jpg" alt="Avatar">
                                                                <i class="avatar-status avatar-status-bottom bg-warning b-gray-darker"></i>
                                                            </div>
                                                        </div>
                                                        <div class="media-body media-auto">
                                                            <h5 class="m-b-0 m-t-0">
                                                                <span>Devan Nienow</span>
                                                                <small><span>02:17</span></small>
                                                            </h5>
                                                            <p class="m-t-0 m-b-0">
                                                                <span>Quisquam hic et impedit quaerat adipisci dolorem repellat.</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="../apps/email-details.html" class="list-group-item b-r-0 b-l-0">
                                                    <div class="media">
                                                        <div class="media-left media-middle">
                                                            <div class="avatar">
                                                                <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/hermanobrother/128.jpg" alt="Avatar">
                                                                <i class="avatar-status avatar-status-bottom bg-success b-gray-darker"></i>
                                                            </div>
                                                        </div>
                                                        <div class="media-body media-auto">
                                                            <h5 class="m-b-0 m-t-0">
                                                                <span>Freeda Hegmann</span>
                                                                <small><span>11:01</span></small>
                                                            </h5>
                                                            <p class="m-t-0 m-b-0">
                                                                <span>Quisquam rem ipsa ratione est molestiae ullam.</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="../apps/email-details.html" class="list-group-item b-r-0 b-l-0">
                                                    <div class="media">
                                                        <div class="media-left media-middle">
                                                            <div class="avatar">
                                                                <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/melvindidit/128.jpg" alt="Avatar">
                                                                <i class="avatar-status avatar-status-bottom bg-danger b-gray-darker"></i>
                                                            </div>
                                                        </div>
                                                        <div class="media-body media-auto">
                                                            <h5 class="m-b-0 m-t-0">
                                                                <span>Andrew Schultz</span>
                                                                <small><span>10:40</span></small>
                                                            </h5>
                                                            <p class="m-t-0 m-b-0">
                                                                <span>Enim nisi cum.</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="../apps/email-details.html" class="list-group-item b-r-0 b-l-0">
                                                    <div class="media">
                                                        <div class="media-left media-middle">
                                                            <div class="avatar">
                                                                <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/vivekprvr/128.jpg" alt="Avatar">
                                                                <i class="avatar-status avatar-status-bottom bg-warning b-gray-darker"></i>
                                                            </div>
                                                        </div>
                                                        <div class="media-body media-auto">
                                                            <h5 class="m-b-0 m-t-0">
                                                                <span>John Robel</span>
                                                                <small><span>08:16</span></small>
                                                            </h5>
                                                            <p class="m-t-0 m-b-0">
                                                                <span>Consequatur nesciunt enim a cum.</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <a href="../apps/email-details.html" class="list-group-item b-r-0 b-l-0">
                                                    <div class="media">
                                                        <div class="media-left media-middle">
                                                            <div class="avatar">
                                                                <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/craigelimeliah/128.jpg" alt="Avatar">
                                                                <i class="avatar-status avatar-status-bottom bg-success b-gray-darker"></i>
                                                            </div>
                                                        </div>
                                                        <div class="media-body media-auto">
                                                            <h5 class="m-b-0 m-t-0">
                                                                <span>Howell Barton</span>
                                                                <small><span>02:55</span></small>
                                                            </h5>
                                                            <p class="m-t-0 m-b-0">
                                                                <span>Amet ipsam occaecati delectus consequatur cupiditate voluptatem perferendis facilis est.</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>

                                                <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                                        </li>
                                        <!-- END Scroll Inside Panel -->

                                        <li class="list-group-item b-a-0 p-x-0 b-b-0 p-y-0 r-a-0">
                                            <a class="list-group-item text-center b-b-0 b-r-0 b-l-0 b-r-b-r-0 b-r-b-l-0" href="../apps/inbox.html">
                                                See All Messages <i class="fa fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <!-- END Messages Dropdown Menu -->

                    </li>

                    <li>
                        <form action="{{route('import.upload')}}"
                              class="dropzone"
                              id="export-upload">

                            {{csrf_field()}}

                        </form>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle user-dropdown" data-toggle="dropdown" href="javascript: void(0)" role="button" aria-expanded="false">
                            <span class="m-r-1">Ubaldo Mills</span>
                            <div class="avatar avatar-image avatar-sm avatar-inline loaded">
                                <img alt="User" src="https://s3.amazonaws.com/uifaces/faces/twitter/hfalucas/128.jpg">
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header text-gray-lighter">
                                <strong class="text-uppercase">Account</strong>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="../apps/profile-details.html">Your Profile</a>
                            </li>
                            <li>
                                <a href="../apps/profile-edit.html">Settings</a>
                            </li>
                            <li>
                                <a href="../apps/faq.html">Faq</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
                <!-- END Right Side Navbar -->
            </div>


        </div>
    </div>
    <!-- END Navbar -->



</nav>