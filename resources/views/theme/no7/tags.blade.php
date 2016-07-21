@extends('theme.no7.app')
@section('content')
<section id="main" class="col-md-8">
<article class="well clearfix page" id="post">
<header class="entry-header"><h1 class="entry-title"> 标签页 </h1></header>
    <div id="tag" class="page-content">
        <ul id="all_tags" class="list-unstyled">
        <li id="A">
            @foreach (\App\Models\Tag::getall() as $key)
            <a href="{{url('/tag/'.$key->id)}}" title="" data-original-title="{{$key->name}}">{{$key->name}}<sup>(
                @foreach (\App\Models\NoteTag::count() as $keys)
                    @if($keys['tag_id']==$key['id']) {{$keys['note_id']}} @endif
                @endforeach
            )</sup></a>
            @endforeach
        </li>
        </ul>
    </div>
    <footer class="entry-footer">
        <div id="comments" class="comments-area"><div id="respond" class="comment-respond"></div></div>
    </footer>
</article>
</section>
@endsection