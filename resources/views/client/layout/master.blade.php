<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title', $site_info['title'])
    </title>
    <meta name="description" content="@yield('description', $site_info['description'])">
    <meta name="keyword" content="@yield('keyword', $site_info['keyword'])">
    <link rel="icon" type="image/x-icon" href="{{ $site_info['favicon'] }}">
    @include('client.assets.css')

</head>
<body>
    
    @include('client.layout.header')

    <div class="main">
        
        @yield('content')

    </div>
    
    @include('client.layout.footer')
    
    @include('client.assets.js')
    
    @yield('js')
    
</body>
</html>
