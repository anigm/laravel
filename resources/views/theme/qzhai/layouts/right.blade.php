<div id="sidebar" class="uk-width-small-1-1 uk-width-medium-1-4 uk-width-large-3-10">
    <ul class="ul">
        <li><h4>提示</h4>
            <div class="textwidget">小工具栏后台是可以设置关闭的</div>
        </li>
        <li><h4>最新发表</h4>
            <ul>
                @foreach (\App\Models\Note::last5() as $key)
                    <li><a href="{{url('/list/'.$key->id)}}">{{$key->title}}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
    <ul id="ulsid" class="ul">
        <li><h4>标签</h4>
            <div class="post-tags">
                @foreach (\App\Models\Tag::getall() as $key)
                    <a href='{{url('/tag/'.$key->id)}}' class='' title='{{$key->name}}' style='font-size: 14px;'>{{$key->name}}</a>
                @endforeach
            </div>
        </li>
        <li class="adimg">
            <a href="" target="_blank"><img src="{{ asset('theme/qzhai/img/show.jpg') }}"></a>
        </li>
    </ul>
</div>