<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <li class="nav-item start @yield('admin.index')">
                <a href="{{ route('admin') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    @if (\View::hasSection('admin.index'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>
            <li class="nav-item @yield('admin.posts')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-question"></i>
                    <span class="title">{{ trans('admin.posts.post_menu') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @yield('admin.posts.index')">
                        <a href="{{ route('admin.posts.index') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.posts.all_post') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('admin.posts.create')">
                        <a href="{{ route('admin.posts.create') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.posts.create_post') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('admin.categories.index')">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.categories') }}</span>
                        </a>
                    </li>
                    <li class="nav-item @yield('admin.tags.index')">
                        <a href="{{ route('admin.tags.index') }}" class="nav-link ">
                            <span class="title">{{ trans('admin.tags') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{--<li class="nav-item @yield('admin.user.index')">--}}
                {{--<a href="{{ route('admin.user.index') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="icon-home"></i>--}}
                    {{--<span class="title">User</span>--}}
                    {{--@if (\View::hasSection('admin.user.index'))--}}
                        {{--<span class="selected"></span>--}}
                    {{--@endif--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li class="nav-item @yield('admin.party.index')">--}}
                {{--<a href="{{ route('admin.party.index') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="icon-home"></i>--}}
                    {{--<span class="title">Party</span>--}}
                    {{--@if (\View::hasSection('admin.party.index'))--}}
                        {{--<span class="selected"></span>--}}
                    {{--@endif--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li class="nav-item @yield('admin.push')">--}}
                {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                    {{--<i class="icon-puzzle"></i>--}}
                    {{--<span class="title">Push</span>--}}
                    {{--<span class="arrow"></span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li class="nav-item @yield('admin.push.index')">--}}
                        {{--<a href="{{ route('admin.push.index') }}" class="nav-link ">--}}
                            {{--<span class="title">Push Lists</span>--}}
                            {{--<span class="badge badge-danger">2</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item @yield('admin.push.create')">--}}
                        {{--<a href="{{ route('admin.push.create') }}" class="nav-link ">--}}
                            {{--<span class="title">Create Push</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="nav-item @yield('admin.coupon')">--}}
                {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                    {{--<i class="icon-bulb"></i>--}}
                    {{--<span class="title">Coupon</span>--}}
                    {{--<span class="arrow"></span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li class="nav-item @yield('admin.coupon.index')">--}}
                        {{--<a href="{{ route('admin.coupon.index') }}" class="nav-link ">--}}
                            {{--<span class="title">Coupon Lists</span>--}}
                            {{--<span class="badge badge-danger">2</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item @yield('admin.coupon.create')">--}}
                        {{--<a href="{{ route('admin.coupon.create') }}" class="nav-link ">--}}
                            {{--<span class="title">Create Coupon</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="nav-item @yield('admin.faq')">--}}
                {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                    {{--<i class="icon-question"></i>--}}
                    {{--<span class="title">FAQ</span>--}}
                    {{--<span class="arrow"></span>--}}
                {{--</a>--}}
                {{--<ul class="sub-menu">--}}
                    {{--<li class="nav-item @yield('admin.faq.index')">--}}
                        {{--<a href="{{ route('admin.faq.index') }}" class="nav-link ">--}}
                            {{--<span class="title">FAQ Lists</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item @yield('admin.faq.create')">--}}
                        {{--<a href="{{ route('admin.faq.create') }}" class="nav-link ">--}}
                            {{--<span class="title">Create FAQ</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}


        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->