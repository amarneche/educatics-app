<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Dashboard & Apps</li>
                    <li>
                        <a href="{{ route('tenant.dashboard') }}">
                            <i class="icon-Layout-4-blocks">
                                <span class="path1"></span>
                                <span class="path2"></span></i>{{ __('Dashboard') }}
                        </a>
                    </li>

                    {{-- Utilisateurs  --}}
                    <li class="treeview">
                        <a href="#">
                            <i span class="icon-Layout-grid"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <span>{{ __('Utilisateurs') }}</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{route('tenant.users.index')}}">
                                    <i class="icon-Commit"><span class="path1"></span><span  class="path2"></span></i>{{__("Tous les utilisateurs")}}
                                </a>
                            </li>
                            <li>
                                <a href="{{route('tenant.users.create')}}">
                                    <i class="icon-Commit"><span class="path1"></span><span  class="path2"></span></i>{{__("Créer")}}
                                </a>
                            </li>
                            <li>
                                <a href="{{route('tenant.users.index')}}">
                                    <i class="icon-Commit"><span class="path1"></span><span  class="path2"></span></i>{{__("Roles")}}
                                </a>
                            </li>
                            <li>
                                <a href="{{route('tenant.users.index')}}">
                                    <i class="icon-Commit"><span class="path1"></span><span  class="path2"></span></i>{{__("Permissions")}}
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i span class="icon-Layout-grid"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <span>Apps</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="extra_#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Calendar</a></li>
                            <li><a href="contact_#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Contact List</a></li>
                            <li><a href="contact_app_#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Chat</a>
                            </li>
                            <li><a href="extra_#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Todo</a></li>
                            <li><a href="#"><i class="icon-Commit"><span class="path1"></span><span
                                            class="path2"></span></i>Mailbox</a></li>
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
