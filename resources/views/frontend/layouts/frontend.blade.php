<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('frontend.layouts.partials.head')
<body class="animsition">
@include('frontend.layouts.partials.header')
@yield('content')
@include('frontend.layouts.partials.footer')
@include('frontend.layouts.partials.javascript')
</body>
</html>
