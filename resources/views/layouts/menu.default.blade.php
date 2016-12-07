<nav class="navbar-inverse navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{url('/home') }}">Inventory</a></li>

                <li id="top-menu-switch" class="dropdown open">
                    <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Menu <i class="fa fa-fw fa-caret-down"></i></a>


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

                <li><a href="{{ route('set.my-sets') }}">Sets</a></li>
                <li><a href="{{ route('set.my-sets') }}">Characters</a></li>
                <li><a href="{{ route('set.my-sets') }}">Characters</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
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
                @endif
            </ul>
        </div>
    </div>
</nav>