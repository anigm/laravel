<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Anigm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta name="author" content="wsgzao">
    <meta name="description" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Anigm">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Anigm">
    <meta name="twitter:description" content="">
    <link rel="alternative" href="/atom.xml" title="Anigm" type="application/atom+xml">
    <link rel="icon" href="{{ asset('skin/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('skin/jacman.jpg') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('skin/jacman.jpg') }}">
    <link href="{{ asset('skin/style.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<header>
    @include('skin.layouts.header')
</header>
<div id="container">
    @yield('content')
    <div class="openaside"><a class="navbutton" href="#" title="显示侧边栏"></a></div>
    @include('skin.layouts.right')
</div>
<footer>
    @include('skin.layouts.footer')
</footer>
<script src="{{ asset('admin-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>
<div id="totop"><a title="返回顶部"><img src="{{ asset('skin/scrollup.png') }}"/></a></div>
<script src="{{ asset('skin/totop.js') }}" type="text/javascript"></script>
</body>
</html>
