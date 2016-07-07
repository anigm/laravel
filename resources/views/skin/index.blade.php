@extends('skin.app')
@section('content')
    <link href="{{ asset('admin-assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <div id="main">
    @foreach($blogs as $blog)
        <section class="post" itemscope itemprop="blogitem">
            <a href="{{url('/list/'.$blog->id)}}" title="{{ $blog->title }}" itemprop="url">
                <h1 itemprop="name">{{ $blog->title }}</h1>
                <p itemprop="description">{{mb_substr($blog->description,0,100)}}</p>
                <time datetime="{{ $blog->datetime }}" itemprop="datePublished">{{ $blog->datetime }}</time>
            </a>
        </section>
    @endforeach
    <nav id="page-nav" class="clearfix unexpand">
        {!! $blogs->render() !!}
    </nav>
    </div>
@endsection