@extends('skin.apps')
@section('content')
    <div id="main" class="post" itemscope itemprop="blogPost">
    <article itemprop="articleBody">
        <header class="article-info clearfix">
            <h1 itemprop="name"><a href="#" title="{{ $ones->title }}" itemprop="url">{{ $ones->title }}</a></h1>
            <p class="article-author">By<a href="/about" title="Anigm" target="_blank" itemprop="author">Anigm</a>
            <p class="article-time"><time datetime="{{ $ones->created_at }}" itemprop="datePublished"> 发表于 {{ $ones->created_at }}</time></p>
        </header>
        <div class="article-content">
            <div id="toc" class="toc-article"><img src="{{Config::get('app.url')}}/{{ $ones->thumb }}"></div>
            {{ $ones->description }}
        </div>
    </article>
    </div>
@endsection
