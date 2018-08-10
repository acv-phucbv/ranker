<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
@include('admin.partials.head')
<body class="{{ isset($bodyClass) ? $bodyClass : '' }}">
@include('admin.partials.sidebar')
<div id="right-panel" class="right-panel">
    @include('admin.partials.header')
    {{--@include('admin.partials.breadcrumb')--}}
    <div class="clearfix margin-bottom-20"> </div>
    {{--<div class="layout-message">--}}
        {{--@include('admin.partials.messages')--}}
    {{--</div>--}}
    @yield('content')
</div>
@include('admin.partials.footer')



{{--<div class="page-wrapper">--}}
    {{--@include('admin.partials.header')--}}
    {{--<div class="clearfix"> </div>--}}
    {{--<div class="page-container">--}}
        {{--<div class="page-content-wrapper">--}}
            {{--<div class="page-content">--}}
{{--                @include('partials.breadcrumbs')--}}
                {{--<div class="clearfix margin-bottom-20"> </div>--}}
                {{--<div class="layout-message">--}}
                    {{--@include('admin.partials.messages')--}}
                {{--</div>--}}
                {{--@yield('content')--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--@include('admin.partials.footer')--}}
{{--</div>--}}
@include('admin.partials.javascript')
@yield('inline_scripts')
</body>
</html>
