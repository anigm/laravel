@extends('theme.no7.app')
@section('content')
<section id="main" class="col-md-8">
<article class="well clearfix page" id="post">
<header class="entry-header"><h1 class="entry-title"> 归档文章 </h1></header>
@foreach (\App\Models\Note::years() as $key)
<div id="archives" class="page-content">
<h2>{{$key->years}} 年( {{$key->count}} 篇文章 )</h2>
<div class="panel-group" role="tablist">
<div class="panel panel-specs">
    @foreach (\App\Models\Note::months($key->years) as $keys)
    <div class="panel-heading" role="tab">
        <h4 class="panel-title" id="-collapsible-list-group-">
            <a class="collapsed month" data-toggle="collapse" href="" aria-expanded="1" aria-controls="" data-original-title="" title="">{{$keys->months}}月( {{$keys->count}} 篇文章 )</a>
        </h4>
    </div>
    <div id="coll-{{$key->years}}-{{$keys->months}}" class="panel-collapse collapse in">
        <ul class="list-group list-archives">
            @foreach (\App\Models\Note::days($key->years,$keys->months) as $keyss)
            <li class="list-group-item"><a href="{{url('/archive/'.$key->years.'-'.$keys->months.'-'.$keyss->days)}}" title="" data-original-title="{{$keyss->days}}">{{$keyss->days}}日</a><span class="badge fa fa-comments">{{$keyss->count}}</span></li>
            @endforeach
            </li>
        </ul>
    </div>
    @endforeach
</div>
</div>
</div>
@endforeach
<footer class="entry-footer"></footer>
</article>
</section>
@endsection
