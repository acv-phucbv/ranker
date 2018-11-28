<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('assets/global/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/popper.js') }}"></script>
{{-- END CORE PLUGINS --}}
{{-- BEGIN PAGE LEVEL PLUGINS --}}
<script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
@yield('page_plugin_scripts')
{{-- END PAGE LEVEL PLUGINS --}}
{{-- BEGIN THEME GLOBAL SCRIPTS --}}
{{-- END THEME GLOBAL SCRIPTS --}}
{{-- BEGIN PAGE LEVEL SCRIPTS --}}
@yield('page_scripts')
{{-- END PAGE LEVEL SCRIPTS --}}
{{-- BEGIN THEME LAYOUT SCRIPTS --}}
<script src="{{ asset('assets/layout/scripts/animsition.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/layout/scripts/slick.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/layout/scripts/countdowntime.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/layout/scripts/lightbox.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/layout/scripts/sweetalert.min.js') }}" type="text/javascript"></script>
{{-- END THEME LAYOUT SCRIPTS --}}
{{-- BEGIN INLINE SCRIPTS --}}
<script src="{{ asset('assets/layout/scripts/slick-custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/layout/scripts/main.js') }}" type="text/javascript"></script>
@yield('inline_scripts')
{{-- END INLINE SCRIPTS --}}

