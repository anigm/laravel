@extends('theme.willerce.app')
@section('content')
    <div class="uk-width-small-1-1 uk-width-medium-3-4 uk-width-large-7-10">
        <div id="index" class="bs uk-text-break">
            <h4>最新文章</h4>
            <div id="list">
                @foreach ($datas as $data)
                <article class="article">
                    <h1><a href="{{url('/list/'.$data->id)}}">{{$data->title}}</a></h1>
                    <p>
                    <a href="{{url('/list/'.$data->id)}}"><img src="{{ asset('theme/qzhai/img/list.jpeg') }}"/></a>
                    {{$data->summary}}[&hellip;]
                    <time><br>{{$data->updated_at}}</time>
                    </p>
                </article>
                @endforeach
            </div>
        </div>
        <ul class="uk-pagination">
            {!! $datas->render() !!}
        </ul>
    </div>
@endsection