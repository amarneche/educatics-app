<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">{{ __('Schools') }}</li>
                    <li @class([
                        'active' => str_contains('admin.dashboard', Route::currentRouteName()),
                    ])>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>{{ __('Dashboard') }}</span>
                        </a>
                    </li>
                    <li @class([
                        'active' => str_contains( Route::currentRouteName(),'admin.schools'),
                    ])>
                        <a href="{{ route('admin.schools.index') }}">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>{{ __('Schools') }}</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>{{ __('Utilisateurs') }}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li @class([
                                'active' => str_contains('admin.users.index', Route::currentRouteName()),
                            ])>
                                <a href="{{route('admin.users.index')}}">
                                    <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>{{__("Tous les utilisateurs")}}
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </section>
    <div class="sidebar-footer">
        <a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Settings"><span
                class="icon-Settings-2"></span></a>
        <a href="#" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a>
        <a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Logout"><span
                class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
    </div>
</aside>
