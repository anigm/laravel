@extends('theme.no7.app')
@section('content')
<section id="main" class="col-md-8">
<article class="well clearfix page" id="post">
<header class="entry-header"><h1 class="entry-title"> 留言板 </h1></header>
<div class="page-content">
    <p><img class="size-full wp-image-883 aligncenter" src="{{ asset('theme/no7/images/With-love-for-life.jpg') }}" alt="With-love-for-life" width="1030" height="324"></p>
    <p>本小站记录了我在学习中遇到的一些困难，及用到的解决方法，很多方法来源于网络，在文章最后都指出了来源。如果有版权等方面的问题，请于我联系~~~更多精彩！</p>
</div>
    <footer class="entry-footer">
    <div id="comments" class="comments-area">
    <h2 class="comments-title"> 本文共 {{$commentcount}} 个回复 </h2>
    <div id="commentshow">
        <ul class="commentlist list-unstyled">
            @include('theme.no7.layouts.comment')
        </ul>
        <p class="commentnav text-center" data-post-id="78">
        </p>
    </div>
        @include('theme.no7.layouts.comment-send')
    </div>
    </footer>
</article>
</section>
@endsection
