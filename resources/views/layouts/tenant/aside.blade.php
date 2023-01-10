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
        
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'dashboard')) active @endif ">
            <a href="{{ route('tenant.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
      


        @can('list_users')
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'users')) active @endif ">
            <a href="{{ route('tenant.users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-person"></i>
                <div data-i18n="Users">{{ __('Users') }}</div>
            </a>
        </li>
        @endcan
        @can('list_courses')
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'courses')) active @endif ">
            <a href="{{ route('tenant.courses.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bi bi-mortarboard"></i>
                <div data-i18n="Courses">{{ __('Courses') }}</div>
            </a>
        </li>
        @endcan
        {{-- @can('list_enrollments') --}}
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'enrollments')) active @endif ">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bi bi-bullseye"></i>
                <div data-i18n="Enrollments">{{ __('Enrollments') }}</div>
            </a>
        </li>
        {{-- @endcan --}}
        {{-- @can('list_enrollments') --}}
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'plannings')) active @endif ">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bi-calendar-check"></i>
                <div data-i18n="Plannings">{{ __('Plannings') }}</div>
            </a>
        </li>
        {{-- @endcan --}}
        {{-- @can('list_enrollments') --}}
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'crm')) active @endif ">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bi-bar-chart-steps"></i>
                <div data-i18n="CRM">{{ __('CRM') }}</div>
            </a>
        </li>
        {{-- @endcan --}}
        {{-- @can('list_enrollments') --}}
        <li class="menu-item @if (str_contains(Route::currentRouteName(), 'crm')) active @endif ">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bi bi-currency-dollar"></i>
                <div data-i18n="Analytics">{{ __('Finances') }}</div>
            </a>
        </li>
        {{-- @endcan --}}


        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bi bi-gear"></i>
                <div data-i18n="Settings">{{__("Settings")}}</div>
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
                        <div data-i18n="Account">{{__("Classrooms")}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Notifications">{{__("App Setting")}}</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Connections">{{__("Integrations")}}</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Tables -->

    </ul>
</aside>
