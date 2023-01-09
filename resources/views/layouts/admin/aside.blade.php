<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img class="w-75" src="{{global_asset("assets/images/logo.svg")}}" alt="">

        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        @can('access_dashboard')
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'dashboard')) active @endif ">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @endcan

        <!-- Users -->
        @can('list_users')
        <li class="menu-item  @if (str_contains(Route::currentRouteName(), 'users')) active open @endif  ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Users</div>
            </a>

            <ul class="menu-sub">
                @can('list_users')
                <li class="menu-item @if (str_contains(Route::currentRouteName(), 'users.index')) active @endif">
                    <a href="{{ route('admin.users.index') }}" class="menu-link">
                        <div>{{ __('All Users') }}</div>
                    </a>
                </li>
                @endcan
                @can('create_user')
                <li class="menu-item @if (str_contains(Route::currentRouteName(), 'users.create')) active @endif">
                    <a href="{{ route('admin.users.create') }}" class="menu-link">
                        <div>{{ __('Create new user') }}</div>
                    </a>
                </li>
                @endcan
                @can('list_roles')
                <li class="menu-item @if (str_contains(Route::currentRouteName(), 'users.create')) active @endif">
                    <a href="#" class="menu-link">
                        <div>{{ __('Roles') }}</div>
                    </a>
                </li>
                @endcan
                @can('list_permissions')
                <li class="menu-item @if (str_contains(Route::currentRouteName(), 'users.create')) active @endif">
                    <a href="#" class="menu-link">
                        <div>{{ __('Permissions') }}</div>
                    </a>
                </li>
                @endcan

            </ul>
        </li>
        @endcan

        <!-- Tenants -->
        @can('list_tenants')
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'schools')) active @endif ">
            <a href="{{ route('admin.schools.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-building"></i>
                <div data-i18n="Analytics">{{ __('Schools') }}</div>
            </a>
        </li>
        @endcan

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="pages-account-settings-account.html" class="menu-link">
                        <div data-i18n="Account">Account</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-account-settings-notifications.html" class="menu-link">
                        <div data-i18n="Notifications">Notifications</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pages-account-settings-connections.html" class="menu-link">
                        <div data-i18n="Connections">Connections</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Tables -->

    </ul>
</aside>
