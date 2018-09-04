<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('admin.layouts.partials.head')
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
    @include('admin.layouts.partials.header')
    <div class="page-container">
        @include('admin.layouts.partials.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
                @include('admin.layouts.partials.breadcrumb')
                @include('admin.layouts.partials.title')
                <div class="layout-message">
                    @include('admin.layouts.partials.messages')
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.layouts.partials.footer')
</div>
@include('admin.layouts.partials.javascript')
</body>
</html>
