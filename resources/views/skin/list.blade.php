@extends('skin.app')
@section('content')
    <div id="main" class="post" itemscope itemprop="blogPost">
    <article itemprop="articleBody">
        <header class="article-info clearfix">
            <h1 itemprop="name"><a href="/post/bong/" title="{{ $blogs->title }}" itemprop="url">{{ $blogs->title }}</a></h1>
            <p class="article-author">By<a href="/about" title="wsgzao" target="_blank" itemprop="author">wsgzao</a>
            <p class="article-time"><time datetime="{{ $blogs->created_at }}" itemprop="datePublished"> 发表于 {{ $blogs->created_at }}</time></p>
        </header>
        <div class="article-content">
            <div id="toc" class="toc-article"><img src="{{ $blogs->thumb }}">
                {{--<strong class="toc-title">文章目录</strong>--}}
                {{--<ol class="toc">--}}
                    {{--<li class="toc-item toc-level-2"><a class="toc-link" href="#前言"><span class="toc-number">1.</span><span class="toc-text">前言</span></a></li>--}}
                {{--</ol>--}}
            </div>
            {{ $blogs->description }}
        </div>
        <footer class="article-footer clearfix">
            <div class="article-catetags">
                <div class="article-categories"><span>当前分类</span><a class="article-category-link" href="{{url('/column/'.$blogs->column->id)}}">{{ $blogs->column->title}}</a></div>
            </div>
            <div class="article-share" id="share">
                <div data-url="http://wsgzao.github.io/post/bong/" data-title="我的第一款智能穿戴设备Bong2 | HelloDog" data-tsina="null" class="share clearfix"></div>
            </div>
        </footer>
    </article>
    <nav class="article-nav clearfix">
        <div class="prev" >
            @if($prevs)<a href="{{url('/list/'.$prevs->id)}}" title="{{$prevs->title}}"><strong>上一篇：</strong><br/><span>{{$prevs->title}}</span></a>@endif
        </div>
        <div class="next">
            @if($nexts)<a href="{{url('/list/'.$nexts->id)}}" title="{{$nexts->title}}"><strong>下一篇：</strong><br/><span>{{$nexts->title}}</span></a>@endif
        </div>
    </nav>
    <section id="comments" class="comment">
        <div class="ds-thread" data-thread-key="post/bong/" data-title="我的第一款智能穿戴设备Bong2" data-url="http://wsgzao.github.io/post/bong/"></div>
    </section>
        </div>
@endsection
