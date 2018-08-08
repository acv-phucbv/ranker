<script src="{{ asset('assets/js/vendor/jquery-2.1.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/plugins.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
{{-- BEGIN PAGE LEVEL PLUGINS --}}
@yield('page_plugin_scripts')
{{-- END PAGE LEVEL PLUGINS --}}
{{-- BEGIN PAGE LEVEL SCRIPTS --}}
@yield('page_scripts')
{{-- END PAGE LEVEL SCRIPTS --}}
