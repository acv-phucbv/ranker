<head>
<meta charset="utf-8"/>
<title>{{ trans('common.app_name') }} | @yield('title', trans('Dashboard'))</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/fonts/themify/themify-icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />
<link href="{{ asset('assets/fonts/elegant-font/html-css/style.css') }}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
{{-- BEGIN PAGE LEVEL PLUGIN STYLES --}}
@yield('plugin_styles')
{{-- END PAGE LEVEL PLUGIN STYLES --}}
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
<!-- END THEME GLOBAL STYLES -->
<!-- BEGIN THEME LAYOUT STYLES -->
<link href="{{ asset('assets/layout/css/animate.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/layout/css/hamburgers.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/layout/css/animsition.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/layout/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/layout/css/slick.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/layout/css/lightbox.css') }}" rel="stylesheet" type="text/css" />
{{-- END THEME LAYOUT STYLES --}}
{{-- BEGIN PAGE LEVEL STYLES --}}
@yield('page_styles')
<link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/util.css') }}" rel="stylesheet" type="text/css" />
{{-- END PAGE LEVEL STYLES --}}
<link rel="shortcut icon" href="{{ asset('icon.ico') }}" />
</head>
