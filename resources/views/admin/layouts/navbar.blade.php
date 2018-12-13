<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15">
                <!-- Mini Mode -->
                <div class="content-header-section sidebar-mini-visible-b">
                    <!-- Logo -->
                    <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                                </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="">
                            <i class="si si-fire text-primary"></i>
                            <span class="font-size-xl text-dual-primary-dark">code</span><span class="font-size-xl text-primary">base</span>
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- Side User -->
            <div class="content-side content-side-full content-side-user px-10 align-parent">
                <!-- Visible only in mini mode -->
                <div class="sidebar-mini-visible-b align-v animated fadeIn">
                    <img class="img-avatar img-avatar32" src="{{asset('backend/img/avatars/avatar15.jpg')}}" alt="">
                </div>
                <!-- END Visible only in mini mode -->

                <!-- Visible only in normal mode -->
                <div class="sidebar-mini-hidden-b text-center">
                    <a class="img-link" href="">
                        <img class="img-avatar" src="{{asset('backend/img/avatars/avatar15.jpg')}}" alt="">
                    </a>
                    <ul class="list-inline mt-10">
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="">{{Auth()->user()->name}}</a>
                        </li>
                        <li class="list-inline-item">
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                                <i class="si si-drop"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-effect text-dual-primary-dark" href="">
                                <i class="si si-logout"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Visible only in normal mode -->
            </div>
            <!-- END Side User -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a href="{{route('dashboard')}}"><i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>
                    <li class="">
                        <a class="nav-submenu" data-toggle="nav-submenu" href="{{route('admin.index')}}"><i class="si si-users fa-2x"></i><span class="sidebar-mini-hide">Admin</span></a>
                        <ul>
                            <li>
                                <a href="{{route('admin.index')}}"><span class="sidebar-mini-hide">Users</span></a>
                            </li>

                            <li>
                                <a href="{{route('admin.create')}}"><span class="sidebar-mini-hide">Create user</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    <li>
                        <a href="{{url('admin/product')}}"><i class="fa fa-shopping-basket fa-2x"></i><span class="sidebar-mini-hide">Products</span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/media')}}"><i class="fa fa-youtube-play fa-2x"></i><span class="sidebar-mini-hide">Media</span></a>
                    </li>
                    <li>
                        <a href="{{route('order.index')}}"><i class="fa fa-shopping-bag fa-2x"></i><span class="sidebar-mini-hide">Orders</span></a>
                    </li>
                    <li class="">
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Blog</span></a>
                        <ul>
                            <li>
                                <a href="{{url('/admin/tag')}}"><span class="sidebar-mini-hide">Tags</span></a>
                            </li>
                            <li>
                                <a href="{{url('/admin/post')}}"><span class="sidebar-mini-hide">Posts</span></a>
                            </li>
                            <li>
                                <a href="{{url('/admin/blogcategory')}}"><span class="sidebar-mini-hide">Categories</span></a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</nav>

<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-navicon"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Open Search Section -->
            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->

            <!-- END Open Search Section -->

            <!-- Layout Options (used just for demonstration) -->
            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
            <div class="btn-group" role="group">

                <div class="dropdown-menu" aria-labelledby="page-header-options-dropdown">
                    <h6 class="dropdown-header">Header</h6>
                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary" data-toggle="layout" data-action="header_fixed_toggle">Fixed Mode</button>
                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary d-none d-lg-block mb-10" data-toggle="layout" data-action="header_style_classic">Classic Style</button>
                    <div class="d-none d-xl-block">
                        <h6 class="dropdown-header">Main Content</h6>
                        <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="content_layout_toggle">Toggle Layout</button>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="">
                        <i class="si si-chemistry"></i> All Options (API)
                    </a>
                </div>
            </div>
            <!-- END Layout Options -->

            <!-- Color Themes (used just for demonstration) -->
            <!-- Themes functionality initialized in Codebase() -> uiHandleTheme() -->
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-circle btn-dual-secondary" id="page-header-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-paint-brush"></i>
                </button>
                <div class="dropdown-menu min-width-150" aria-labelledby="page-header-themes-dropdown">
                    <h6 class="dropdown-header text-center">Color Themes</h6>
                    <div class="row no-gutters text-center mb-5">
                        <div class="col-4 mb-5">
                            <a class="text-default" data-toggle="theme" data-theme="default" href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                        <div class="col-4 mb-5">
                            <a class="text-elegance" data-toggle="theme" data-theme="{{asset('backend/css/themes/elegance.min.css')}}" href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                        <div class="col-4 mb-5">
                            <a class="text-pulse" data-toggle="theme" data-theme="{{asset('backend/css/themes/pulse.min.css')}}" href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                        <div class="col-4 mb-5">
                            <a class="text-flat" data-toggle="theme" data-theme="{{asset('backend/css/themes/flat.min.css')}}" href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                        <div class="col-4 mb-5">
                            <a class="text-corporate" data-toggle="theme" data-theme="{{asset('backend/css/themes/corporate.min.css')}}" href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                        <div class="col-4 mb-5">
                            <a class="text-earth" data-toggle="theme" data-theme="{{asset('backend/css/themes/earth.min.css')}}" href="javascript:void(0)">
                                <i class="fa fa-2x fa-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <button type="button" class="btn btn-sm btn-block btn-alt-secondary mb-10" data-toggle="layout" data-action="sidebar_style_inverse_toggle">Sidebar Style</button>
                    <div class="dropdown-divider"></div>

                </div>
            </div>
            <!-- END Color Themes -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="content-header-section">
            <!-- User Dropdown -->
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Howdy, {{Auth()->user()->name}} <i class="fa fa-angle-down ml-5"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                    <a class="dropdown-item" href="{{route('admin.logout')}}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Signout') }}
                    </a>

                    <form id="logout-form" action="{{route('admin.logout')}}" method="POST" style="display: none;">
                        {{csrf_field()}}
                    </form>

                </div>
                <!-- END User Dropdown -->

                <!-- Toggle Side Overlay -->
                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->

                <!-- END Toggle Side Overlay -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header">
            <div class="content-header content-header-fullrow">
                <form action="" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Close Search Section -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- END Close Search Section -->
                        </div>
                        <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-primary">
            <div class="content-header content-header-fullrow text-center">
                <div class="content-header-item">
                    <i class="fa fa-sun-o fa-spin text-white"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
</header>
