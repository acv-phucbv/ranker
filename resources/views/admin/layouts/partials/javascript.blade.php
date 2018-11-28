<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('assets/global/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap-switch.min.js') }}"></script>
{{-- END CORE PLUGINS --}}
{{-- BEGIN PAGE LEVEL PLUGINS --}}
<script src="{{ asset('assets/global/plugins/bootbox/bootbox.min.js') }}" type="text/javascript"></script>
@yield('page_plugin_scripts')
{{-- END PAGE LEVEL PLUGINS --}}
{{-- BEGIN THEME GLOBAL SCRIPTS --}}
<script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
{{-- END THEME GLOBAL SCRIPTS --}}
{{-- BEGIN PAGE LEVEL SCRIPTS --}}
@yield('page_scripts')
{{-- END PAGE LEVEL SCRIPTS --}}
{{-- BEGIN THEME LAYOUT SCRIPTS --}}
<script src="{{ asset('assets/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
{{-- END THEME LAYOUT SCRIPTS --}}
{{-- BEGIN INLINE SCRIPTS --}}
@yield('inline_scripts')
{{-- END INLINE SCRIPTS --}}

