@extends('theme.no7.app')
@section('content')
    <section id="main" class="col-md-8">
        <article class="well clearfix page" id="post">
            <header class="entry-header"><h1 class="entry-title"> {{ $ones->title }} </h1></header>
            <div class="page-content">
                {!! $ones->description !!}
            </div> <!--分享--> <!--分享-->
            <footer class="entry-footer"> <!--评论模块-->
                <div id="comments" class="comments-area">
                    <div id="respond" class="comment-respond"></div><!-- #comments --> </div>
            </footer>
        </article>
    </section>
@endsection
