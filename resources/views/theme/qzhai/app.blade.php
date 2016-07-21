<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>衫小小寨</title>
    <meta name="keywords" content="衫小寨"/>
    <meta name="description" content="衫小寨"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name='robots' content='noindex,follow'/>
    <link rel='stylesheet' id='qzhai-css' href='{{ asset('theme/qzhai/css/style.css?ver=4.5.1') }}' type='text/css' media='all'/>
    <script type='text/javascript' src='{{ asset('theme/qzhai/js/jquery.min.js?ver=4.5.1') }}'></script>
    <meta name="generator" content="cms"/>
</head>
<body>
<div id="main" class="wp uk-grid uk-grid-collapse" style="max-width:1120px">
    <div class="uk-width-small-1-1 uk-width-medium-1-4 uk-width-large-1-6 posr">
        @include('theme.qzhai.layouts.header')
    </div>
    <div id="content" class="uk-width-small-1-1 uk-width-medium-3-4 uk-width-large-5-6 uk-grid uk-grid-collapse">
    @yield('content')
    @include('theme.qzhai.layouts.right')
        <div class="ft uk-visible-small">
            <p>
                <a href="#my-link" data-uk-modal>友情链接</a> -
                <a href="http://qzhai.net" target="_black" title="主题制作:衫小寨" data-uk-tooltip="{pos:'bottom'}"> Theme by Qzhai</a>
            </p>
        </div>
    </div>
    @include('theme.qzhai.layouts.footer')
</body>
</html>