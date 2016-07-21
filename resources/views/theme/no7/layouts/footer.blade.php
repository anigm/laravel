<div class="main-footer">
    <div class="container"><h3>友情链接</h3>
        <ul class="list-unstyled list-inline">
            @foreach (\App\Models\Link::links() as $key)
                <li>@if($key->image<>'') <img src="{{$key->image}}"> @endif<a href="{{$key->url}}"> {{$key->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<footer id="body-footer">
    <div class="container clearfix">
        <p>Copyright © 2014 Specs&#039; Blog-就爱PHP</p>
        <p><a href="" target="_blank">冀ICP备14020811号</a></p>
    </div>
    <ul id="jump" class="visible-lg">
        <li>
            <a id="weixin" title="微信公众号" href="javascript:void(0)">
                <i class="fa fa-wechat"></i>
                <div id="EWM"><img src="http://9iphp.com/wp-content/themes/9IPHP/images/weixin_code.jpg" alt="二维码"/></div>
            </a>
        </li>
        <li><a id="share" title="意见反馈" href="/guestbook" target="_blank"><i class="fa fa-share-square-o"></i></a></li>
        <li><a id="share" title="友情链接" href="/links" target="_blank"><i class="fa fa-link"></i></a></li>
        <li><a id="top" href="#top" title="返回顶部" style="display:none;"><i class="fa fa-arrow-circle-up"></i></a></li>
    </ul>
</footer>