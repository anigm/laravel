@foreach ($comment as $key)
<li class="comment even thread-even depth-1" id="comment-{{$key}}">
<div class="comment-wrap" id="comment-{{$key}}">
    <div class="comment-avatar pull-left" data-url=""></div>
    <div class="comment-body">
        <h4><cite class="fn">{{$key->author}}</cite> <span class="comment-date"> <p>{{$key->created_at}}</p> </span></h4>
        <p>{{$key->content}}</p>
        <div class="reply clearfix">
            <a rel='nofollow' class='comment-reply-link' onclick="seedto('{{$key->id}}','{{$key->author}}')">
                <div class="label label-danger pull-right">回复给 {{$key->author}}</div>
            </a>
        </div>
    </div>
</div>
<ul class="children">
    @foreach ($key['comment'] as $keys)
        <li class="comment byuser comment-author-specs bypostauthor even depth-2" id="comment-{{$keys}}">
            <div class="comment-wrap" id="comment-{{$keys}}">
                <div class="comment-avatar pull-left" data-url=""></div>
                <div class="comment-body">
                    <h4>
                        <cite class="fn">
                            <a target="_blank" rel="external nofollow" class="url">{{$keys->author}}</a>
                            <i class=" fa fa-user-secret text-danger"></i>
                        </cite>
                        <span class="comment-date"> {{$keys->created_at}} </span>
                    </h4>
                    <p>
                        <span class="comment-to plr">@</span>
                        <span class="reply-comment-author"> <a> {{$key->author}} </a> </span>
                        {{$keys->content}}
                    </p>
                    <div class="reply clearfix">
                        <a rel="nofollow" class="comment-reply-link"  onclick="seedto('{{$keys->id}}','{{$keys->author}}')">
                            <div class="label label-danger pull-right">回复给 {{$keys->author}}</div>
                        </a>
                    </div>
                </div>
            </div>
            <ul class="children">
                @foreach ($keys['comments'] as $keyss)
                    <li class="comment byuser comment-author-specs bypostauthor even depth-2" id="comment-{{$keyss}}">
                        <div class="comment-wrap" id="comment-{{$keyss}}">
                            <div class="comment-avatar pull-left" data-url=""></div>
                            <div class="comment-body">
                                <h4>
                                    <cite class="fn">
                                        <a target="_blank" rel="external nofollow" class="url">{{$keyss->author}}</a>
                                        <i class=" fa fa-user-secret text-danger"></i>
                                    </cite>
                                    <span class="comment-date"> {{$keyss->created_at}} </span>
                                </h4>
                                <p>
                                    <span class="comment-to plr">@</span>
                                    <span class="reply-comment-author"> <a> {{$keys->author}} </a> </span>
                                    {{$keyss->content}}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
</li>
@endforeach