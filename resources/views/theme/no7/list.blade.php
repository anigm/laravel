@extends('theme.no7.app')
@section('content')
    <section id="main" class='col-md-8'>
        @include('vendor.syntaxhighlighter.syntaxhighlighter')
        <article class="well clearfix entry-common" id="post-1743">
            <header class="entry-header">
                <p>
                    <a title="首页" href=""><i class="fa fa-home"></i>首页</a> &raquo;
                    <a href="">Web技术</a> &raquo; <a href="">Laravel</a> &raquo;正文
                </p>
                <h1 class="entry-title">{{$note->title}}</h1>
                <div class="clearfix entry-meta">
                <span class="pull-left">
                <time class="entry-date fa fa-calendar" datetime="{{$note->updated_at}}"> &nbsp;{{$note->updated_at}} </time>
                <span class="dot">|</span>
                <span class="categories-links fa fa-folder-o">
                    <a href="{{url('/category/'.$note->category_id)}}" rel="category tag">{{\App\Models\Category::getone($note->category_id)[0]['name']}}</a>
                </span>
                <span class="dot">|</span>
                </div>
            </header>
            <div class="entry-content clearfix"><p>{!! $note->content !!}</p>
                <hr/>
                <div class='series-post-content'>
                    <ul>
                        @if($prevs)
                            <li> 上一篇: 《<a href='{{url('/list/'.$prevs->id)}}'>{{$prevs->title}}</a>》</li> @endif
                        @if($nexts)
                            <li> 下一篇: 《<a href='{{url('/list/'.$nexts->id)}}'>{{$nexts->title}}</a>》</li> @endif
                    </ul>
                </div>
                <div class="pull-right single-pages"></div>
            </div>
            <footer class="entry-footer">
                <div class="footer-tag clearfix">
                    <div class="pull-left">
                        @foreach (\App\Models\Tag::getname($note->id) as $key)
                            <a href="" rel="tag">{{$key[0]->name}}</a>
                        @endforeach
                    </div>
                </div>
                <ul class="pager clearfix">
                    @if($prevs)
                        <li class="previous"><a title="{{$prevs->title}}" href="{{url('/list/'.$prevs->id)}}">上一篇</a>
                        </li>@endif
                    @if($nexts)
                        <li class="next"><a title="{{$nexts->title}}" href="{{url('/list/'.$nexts->id)}}">下一篇</a>
                        </li>@endif
                </ul>
                <div class="related-posts">
                    <div class="related-title"> 你可能也喜欢：</div>
                    <ul>
                        @foreach ($rands as $key)
                            <li><a href="{{url('/list/'.$key->id)}}" title="" target="_blank">{{$key->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </footer>
            <div id="comments" class="comments-area"><h2 class="comments-title"> 本文共{{$commentcount}}个回复 </h2>
                <div id="commentshow">
                    <ul class="commentlist list-unstyled">
                        @include('theme.no7.layouts.comment')
                    </ul>
                </div>
                @include('theme.no7.layouts.comment-send')
        </article>
    </section>
@endsection