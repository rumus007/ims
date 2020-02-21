<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>    
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                @permission('view_settings','view_users','view_roles')
                <li class="app-sidebar__heading">Settings</li>
                @permission('view_settings')
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        General Settings
                    </a>
                </li>
                @endpermission
                @permission('view_users','view_users')
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-car"></i>
                        User Management
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        @permission('view_users')
                        <li>
                            <a href="{{route('users.index')}}">
                                <i class="metismenu-icon">
                                </i>Users
                            </a>
                        </li>
                        @endpermission
                        @permission('view_roles')
                        <li>
                            <a href="{{route('roles.index')}}">
                                <i class="metismenu-icon">
                                </i>Roles
                            </a>
                        </li>
                        @endpermission
                    </ul>
                </li>
                @endpermission
                @endpermission
                @permission('view_categories')
                <li class="app-sidebar__heading">Categories and Sub-Categories</li>
                @permission('view_settings')
                <li>
                    <a href="{{route('menu.index')}}">
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Category
                    </a>
                </li>
                @endpermission
                @endpermission
            </ul>
        </div>
    </div>
</div>