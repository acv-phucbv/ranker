<div class="page-sidebar-wrapper">
    <div class="{{ isset($sidebarClass) ? $sidebarClass : 'page-sidebar navbar-collapse collapse' }}">
        <ul class="page-sidebar-menu page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>

            <li class="nav-item start @yield('home_menu')">
                <a href="{{ route('homepage') }}" class="nav-link">
                    <i class="icon-home"></i>
                    <span class="title">{{ trans('common.homepage') }}</span>
                    @if (\View::hasSection('home_menu'))
                    <span class="selected"></span>
                    @endif
                </a>
            </li>

            @if (\Auth::check() && \Auth::user()->isAdmin())
            <li class="nav-item  @yield('user_menu')">
                <a href="{{ route('admin.users.index') }}" class="nav-link ">
                    <i class="icon-user"></i>
                    <span class="title">{{ trans('user.user_menu') }}</span>
                    @if (\View::hasSection('user_menu'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>
            @endif

            <li class="nav-item  @yield('staff_menu')">
                @if (\Auth::check() && \Auth::user()->isAdmin())
                <a href="{{ route('admin.staffs.index') }}" class="nav-link ">
                @elseif (\Auth::check() && \Auth::user()->isManager())
                <a href="{{ route('manager.staffs.index') }}" class="nav-link ">
                @endif
                    <i class="fa fa-users"></i>
                    <span class="title">{{ trans('common.sidebar.staff_menu') }}</span>
                    @if (\View::hasSection('staff_menu'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>

            @if (\Auth::check() && \Auth::user()->isAdmin())
            <li class="nav-item @yield('expired_menu')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <span class="title">{{ trans('common.sidebar.expired_menu') }}</span>
                    @if (\View::hasSection('expired_menu'))
                        <span class="selected"></span>
                    @endif
                    <span class="arrow @yield('expired_menu')"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('export_listexpire')">
                        <a href="{{ route('admin.staff.expire') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.expire_list') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('export_listdue')">
                        <a href="{{ route('admin.staff.due') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.due_list') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if (\Auth::check() && \Auth::user()->role == \App\Models\User::ROLE_ADMIN)
            <li class="nav-item @yield('import_menu')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-database" aria-hidden="true"></i>
                    <span class="title">{{ trans('common.sidebar.import_menu') }}</span>
                    @if (\View::hasSection('import_menu'))
                        <span class="selected"></span>
                    @endif
                    <span class="arrow @yield('import_menu')"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('import_staff')">
                        <a href="{{ route('admin.import_staff.index') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.import_staff') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if (\Auth::check() && \Auth::user()->isAdmin())
            <li class="nav-item @yield('master_data_menu')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-table" aria-hidden="true"></i>
                    <span class="title">{{ trans('common.sidebar.master_data_menu') }}</span>
                    @if (\View::hasSection('master_data_menu'))
                    <span class="selected"></span>
                    @endif
                    <span class="arrow @yield('master_data_menu')"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('master_data_companies')">
                        <a href="{{ route('admin.companies.index') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.companies') }}</span>
                        </a>
                    <li class="nav-item @yield('master_data_factories')">
                        <a href="{{ route('admin.factories.index') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.factories') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('master_data_insurance_companies')">
                        <a href="{{ route('admin.insurance_companies.index') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.insurance_companies') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('master_data_cars')">
                        <a href="{{ route('admin.cars.index') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.cars') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('master_data_contracts')">
                        <a href="{{ route('admin.contracts.index') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.contracts') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('master_data_engines')">
                        <a href="{{ route('admin.engines.index') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.engines') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('master_data_licenses')">
                        <a href="{{ route('admin.licenses.index') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.licenses') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('master_data_positions')">
                        <a href="{{ route('admin.positions.index') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.positions') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if (\Auth::check() && \Auth::user()->isAdmin())
            <li class="nav-item @yield('history_menu')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    <span class="title">{{ trans('common.sidebar.history_menu') }}</span>
                    @if (\View::hasSection('history_menu'))
                    <span class="selected"></span>
                    @endif
                    <span class="arrow @yield('history_menu')"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('history_menu_staff')">
                        <a href="{{ route('admin.histories.staff') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.staff_histories') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('history_menu_export')">
                        <a href="{{ route('admin.histories.export') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.export_histories') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('history_menu_mail')">
                        <a href="{{ route('admin.histories.mail') }}" class="nav-link ">
                            <span class="title">{{ trans('common.sidebar.mail_histories') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>
