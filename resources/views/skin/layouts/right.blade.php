<div id="asidepart">
    <div class="closeaside"><a class="closebutton" href="#" title="隐藏侧边栏"></a></div>
    <aside class="clearfix">
        {{--<div class="github-card">--}}
            {{--<p class="asidetitle">Github 名片</p>--}}
            {{--<div class="github-card" data-github="wsgzao" data-width="220" data-height="119" data-theme="medium">--}}
                {{--<script type="text/javascript" src="//cdn.jsdelivr.net/github-cards/latest/widget.js"></script>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="categorieslist">
            <p class="asidetitle">分类</p>
            <ul>
                @foreach ($column as $column)
                    <li>
                        <a href="{{url('/column/'.$column->getKey())}}" class="title">{{ $column->title }}</a>
                        @include('skin.layouts.column', [ 'column' => $column->children ])
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="linkslist">
            <p class="asidetitle">友情链接</p>
            <ul>
                <li>
                    <a href="http://wuchong.me" target="_blank" title="Jark&#39;s Blog">Jark&#39;s Blog</a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/in/aowang" target="_blank" title="LinkedIn">LinkedIn</a>
                </li>
            </ul>
        </div>
        <div class="rsspart">
            <a href="/atom.xml" target="_blank" title="rss">RSS 订阅</a>
        </div>
    </aside>
</div>