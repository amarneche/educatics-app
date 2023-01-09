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



        <!-- Users  -->
        @can('list_users')
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'users')) active @endif ">
            <a href="{{ route('admin.users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-person"></i>
                <div data-i18n="Analytics">{{ __('Users') }}</div>
            </a>
        </li>
        @endcan
        {{-- End users --}}

        {{-- Tenants --}}
        @can('list_tenants')
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'schools')) active @endif ">
            <a href="{{ route('admin.schools.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-building"></i>
                <div data-i18n="Analytics">{{ __('Schools') }}</div>
            </a>
        </li>
        @endcan
        {{-- End Tenants --}}
        {{-- Pacakges --}}

        {{-- @can('list_subscriptions') --}}
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'subscriptions')) active @endif ">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bi bi-receipt"></i>
                <div data-i18n="Packages">{{ __('Subscriptions') }}</div>
            </a>
        </li>
        {{-- @endcan --}}

        {{-- End Pacakges --}}
        {{-- Pacakges --}}

        @can('list_packages')
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'packages')) active @endif ">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bi bi-box"></i>
                <div data-i18n="Packages">{{ __('Packages') }}</div>
            </a>
        </li>
        @endcan

        {{-- End Pacakges --}}
        {{-- Pacakges --}}

        @can('list_features')
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'features')) active @endif ">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bi bi-sliders2-vertical"></i>
                <div data-i18n="Packages">{{ __('Features') }}</div>
            </a>
        </li>
        @endcan

        {{-- End Pacakges --}}

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bi bi-gear"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
            <ul class="menu-sub">
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
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="App Setting">{{__("App Setting")}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Integrations">{{__("Integrations")}}</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- Tables -->

    </ul>
</aside>
