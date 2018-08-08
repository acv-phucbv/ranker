<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    {{-- BEGIN GLOBAL MANDATORY STYLES --}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    {{-- END GLOBAL MANDATORY STYLES --}}
    {{-- BEGIN PAGE LEVEL PLUGIN STYLES --}}
    @yield('plugin_styles')
    {{-- END PAGE LEVEL PLUGIN STYLES --}}
    {{-- BEGIN THEME LAYOUT STYLES --}}
    <link href="{{ asset('assets/scss/style.css') }}" rel="stylesheet" type="text/css" />
    {{-- END THEME LAYOUT STYLES --}}
    {{-- BEGIN PAGE LEVEL STYLES --}}
    @yield('page_styles')
    {{-- END PAGE LEVEL STYLES --}}
    @yield('inline_styles')
</head>
