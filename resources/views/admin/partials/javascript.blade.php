<!--[if lt IE 9]>
<script src="{{ asset('assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/excanvas.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/ie8.fix.min.js') }}"></script>
<![endif]-->
{{-- END CORE PLUGINS --}}
<script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
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
<script src="{{ asset('assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>
{{-- END THEME LAYOUT SCRIPTS --}}

<script src="{{ asset('js/jquery.autotab.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/common.js') }}" type="text/javascript"></script>