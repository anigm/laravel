@extends('theme.no7.app')
@section('content')
    <section id="main" class='col-md-8'>
        @foreach ($datas as $data)
        <article class="well post clearfix">
            <header class="entry-header">
                <h1 class="entry-title"><a href="{{url('/list/'.$data->id)}}" title="{{$data->title}}"> {{$data->title}} </a></h1>
                <div class="clearfix entry-meta">
                    <span class="pull-left">
                        <time class="entry-date fa fa-calendar" datetime="{{$data->updated_at}}"> &nbsp;{{format_date($data->updated_at)}}</time>
                        <span class="dot">|</span>
                        <span class="categories-links fa fa-folder-o">
                        <a href="#" rel="category tag">{{\App\Models\Category::getone($data->category_id)[0]['name']}}</a>
                        </span>
                        <span class="dot">|</span>
                        <span class="fa fa-comments-o comments-link"> <a href="#">暂无评论</a></span>
                        <span class="dot">|</span>
                    </span>
                </div>
            </header>
            <div class="entry-summary entry-content clearfix">
                @if($data->images)
                <a class="hidden-xs thumbLink" href="" title="{{$data->title}}">
                    <img class="thumb pull-left lazyLoad" src="{{$data->images}}" data-original="" alt="{{$data->title}}"/>
                </a>
                @endif
                <p>{{$data->summary}}</p>
            </div>
            <footer class="entry-footer clearfix hidden-xs">
                <div class="pull-left footer-tag">
                    @foreach (\App\Models\Tag::getname($data->id) as $key)
                    <a href="{{url('/tag/'.$key[0]->id)}}" rel="tag">{{$key[0]->name}}</a>
                    @endforeach
                </div>
                <a class="pull-right more-link" href="{{url('/list/'.$data->id)}}" title="阅读全文">阅读全文&raquo;</a>
            </footer>
        </article>
        @endforeach
        <ul class='pagination pull-right'>
            {!! $datas->render() !!}
        </ul>
    </section>
@endsection