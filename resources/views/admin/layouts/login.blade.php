<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('backend.layouts.partials.head')
<body class="login">
    @yield('content')
    @include('backend.layouts.partials.javascript')
    @yield('inline_scripts')
</body>
</html>
