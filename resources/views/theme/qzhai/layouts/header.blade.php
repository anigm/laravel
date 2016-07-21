<div id="head" data-uk-sticky="{boundary: true,top:80}">
    <div id="op_head">
        <div class="uk-panel" id="op_hed">
            <div class="tx">
                <a href="#my-head" data-uk-modal><img src="{{ asset('theme/qzhai/img/tx2.jpg') }}"/></a>
            </div>
            <h1 class="uk-panel-title"><a href="">衫小小寨</a></h1><span>这是一个演示站点</span>
            <div class="my uk-grid-collapse uk-grid uk-grid-width-1-3">
                <div><span>5</span>
                    <span><i class="uk-icon-file-text"></i></span>
                    <a href="" title="文章" data-uk-tooltip="{pos:'bottom'}"></a>
                </div>
                <div><span>2</span>
                    <span><i class="uk-icon-folder"></i></span>
                    <a href="" title="分类" data-uk-tooltip="{pos:'bottom'}"></a>
                </div>
                <div>
                    <span>3</span>
                    <span><i class="uk-icon-tags"></i></span>
                    <a href="" title="标签" data-uk-tooltip="{pos:'bottom'}"></a>
                </div>
            </div>
            <a href="#s_s" class="s_s uk-navbar-toggle uk-hidden-large" data-uk-offcanvas></a>
            <ul id="nav-top" class="nav uk-nav uk-hidden-small">
                <li id="menu-item-5" class=" uk-active"><a href="http://qzhai.net/000/">首页</a></li>
                <li id="menu-item-54" class="uk-parent" data-uk-dropdown="{pos:'right-top'}"><a href="#">页面</a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            @foreach(\App\Models\Category::getLeveledCategories(0) as $category)
                                <li id="menu-item-55" class=""><a href="{{url('/category/'.$category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li id="menu-item-48" class=""><a href="http://qzhai.net/2016-03-546.html">下载本主题</a></li>
                <li id="menu-item-49" class="uk-parent" data-uk-dropdown="{pos:'right-top'}"><a
                            href="#">关于作者</a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li id="menu-item-20" class=""><a href="http://qzhai.net">衫小寨</a></li>
                            <li id="menu-item-50" class=""><a href="http://qzhai.net/center/">官方社区</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <form class="s uk-form uk-hidden-small" id="searchform" method="get" action="http://qzhai.net/000">
                <input class="uk-width-1-1 " type="text" value="" name="s" id="s" placeholder="搜索"/></form>
            <a href="javascript:;" id="op_m" lock="open" class="uk-icon-music"></a></div>
        <div class="op" style="width:80%">
            <iframe src="http://music.163.com/outchain/player?type=1&amp;id=3154175&amp;auto=0&amp;height=430" width="280" height="380" frameborder="no" marginwidth="0" marginheight="0"></iframe>
        </div>
    </div>
    <div class="ft uk-hidden-small">
        <p><a href="#my-link" data-uk-modal>友情链接</a> - <a href="http://qzhai.net"
                                                                                      target="_black"
                                                                                      title="主题制作:衫小寨"
                                                                                      data-uk-tooltip="{pos:'bottom'}">
                Theme by Qzhai</a></p></div>
    <div id="my-head" class="uk-modal">
        <div class="uk-modal-dialog-blank uk-height-viewport">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-grid uk-flex-middle" data-uk-grid-margin="">
                <div class="uk-width-medium-1-2 uk-height-viewport uk-cover-background uk-row-first"
                     style="background-image: url(' http://qzhai.net/000/wp-content/uploads/2016/04/geren.jpeg ');"></div>
                <div class="uk-width-medium-1-2 p">
                    我就是我<br/>
                    <br/>
                    啦啦啦啦
                </div>
            </div>
        </div>
    </div>
</div>