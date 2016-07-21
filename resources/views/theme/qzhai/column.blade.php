@extends('skin.apps')
@section('content')
    <link href="{{ asset('admin-assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <div class="archive-title" >
        <h2 class="category-icon">{{$column->title}}</h2>
    </div>
    <div id="main" class="archive-part clearfix">
        <div id="archive-page">
            @foreach($blogs as $blog)
            <section class="post" itemscope itemprop="blogPost">
                <a href="{{url('/list/'.$blog->id)}}" class="title" itemprop="url">
                    <time datetime="{{ $blog->datetime }}" itemprop="datePublished">{{ $blog->datetime }}</time>
                    <h1 itemprop="name">{{ $blog->title }}</h1>
                </a>
            </section>
            @endforeach
        </div>
        <nav id="page-nav" class="clearfix unexpand">
            {!! $blogs->render() !!}
        </nav>
    </div>
@endsection