<!DOCTYPE html>
<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="{{ app()->getLocale() }}"> <!--<![endif]-->
@include('admin.partials.head')
<body class="{{ isset($bodyClass) ? $bodyClass : 'page-sidebar-fixed page-header-fixed page-sidebar-closed-hide-logo page-content-white' }}">
<div class="page-wrapper">
    @include('admin.partials.header')
    <div class="clearfix"> </div>
    <div class="page-container">
        @include('admin.partials.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
{{--                @include('partials.breadcrumbs')--}}
                <div class="clearfix margin-bottom-20"> </div>
                <div class="layout-message">
                    @include('admin.partials.messages')
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.partials.footer')
</div>
@include('admin.partials.javascript')
@yield('inline_scripts')
</body>
</html>
