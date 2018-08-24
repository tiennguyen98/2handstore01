<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('module')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    @include('admin.assets.css')

    @yield('css')

</head>
<body>

    @include('admin.layout.sidebar')

    <div id="right-panel" class="right-panel">

        @include('admin.layout.header')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">

                        <h1>@yield('module')</h1>

                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            
            @yield('content')
            
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @include('admin.assets.js') 
    <script src="{{ asset('js/destroy.js') }}"></script>
    <script src="{{ asset('js/admin/search.js') }}"></script>
    <script src="{{ asset('js/admin/noti_chat.js') }}"></script>
    @yield('js')

</body>
</html>
