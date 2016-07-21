<!DOCTYPE html>
<html>
<head><title>Specs&#039; Blog-就爱PHP | Object Not Found!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="qc:admins" content="4200263000006375"/>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script> var themeConfig = {fixedNav: true, isPjax: false, postId: 0}; </script>
    <link rel='stylesheet' id='9iphp-style-css' href='{{ asset('theme/no7/style.css?ver=1.7.16') }}' type='text/css' media='all'/>
    <script type='text/javascript' src='{{ asset('theme/no7/js/jquery.min.js?ver=1.11.0') }}'></script>
    <script type='text/javascript' src='{{ asset('theme/no7/js/9iphp.js?ver=1.7.16') }}'></script>

    <meta name="generator" content="cms"/>
    <style type="text/css">body { background: #ffffff;} </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('theme/no7/js/html5shiv.js') }}"></script>
    <script src="{{ asset('theme/no7/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body class="is-loading">
<div class="loadingBar"></div>
<header>
    <div id="masthead" role="banner" class="hidden-xs">
        <div class="top-banner">
            <div class="container">
                <a class="brand brand-image" href="/" title="Specs&#039; Blog-就爱PHP" rel="home">
                    <img src="{{ asset('theme/no7/images/logo.png') }}" width="200px" height="50px" alt="Specs&#039; Blog-就爱PHP">
                    <h1 class="hidden-xs"><small>Object Not Found!</small></h1>
                </a>
            </div>
        </div>
    </div>
</header>
<div id="pjaxdata">
    @include('theme.no7.layouts.header')
    <div class="container">
        <section class="row"> <!--[if lt IE 9]>
            <div id="ie-warning" class="alert alert-danger fade in visible-lg">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <i class="fa fa-warning"></i> 请注意，本博客不支持低于IE9的浏览器，为了获得最佳效果，请下载最新的浏览器，推荐下载 <a
                    href="http://www.google.cn/intl/zh-CN/chrome/" target="_blank"><i class="fa fa-compass"></i> Chrome</a>
            </div> <![endif]-->
            @yield('content')
            @include('theme.no7.layouts.right')
        </section>
    </div>
</div>
@include('theme.no7.layouts.footer')
</body>
</html>