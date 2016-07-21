<nav id="nav" class="navbar navbar-default container-fluid" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse"><span
                        class="fa fa-bars"></span></button>
            <a class="navbar-brand visible-xs" href="http://9iphp.com/" style='padding:2px 10px'> <img
                        src="http://static.9iphp.com/wp-content/uploads/2014/08/logo_mini.png" width="150px"
                        height="50px" alt="Specs&#039; Blog-就爱PHP"> </a></div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item active">
                    <a href="/"><i class="fa fa-home"></i> 首页</a></li>
                <li id="menu-item-880"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown"><i class='fa fa-th'></i> 分类<b class="caret"></b><i class="icon-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        @foreach(\App\Models\Category::getLeveledCategories(0) as $category)
                        <li id="menu-item-74" class="menu-item menu-item-type-taxonomy menu-item-object-category">
                            <a href="{{url('/category/'.$category->id)}}"><i class='fa fa-html5'></i> {{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li id="menu-item-840" class="menu-item menu-item-type-post_type menu-item-object-page"><a
                            href="/archives"><i class='fa fa-archive'></i> 归档文章</a></li>
                <li id="menu-item-881" class="menu-item menu-item-type-post_type menu-item-object-page"><a
                            href="/tags"><i class='fa fa-tags'></i> 标签页</a></li>
                <li id="menu-item-882" class="menu-item menu-item-type-post_type menu-item-object-page"><a
                            href="/guestbook"><i class='fa fa-comments-o'></i> 留言板</a></li>
                <li id="menu-item-891" class="menu-item menu-item-type-post_type menu-item-object-page"><a
                            href="/about/45"><i class='fa fa-user'></i> 关于</a></li>
            </ul>
            <form action="http://9iphp.com/" method="get" id="searchform"
                  class="navbar-form navbar-right visible-lg" role="search">
                <div class="form-group"><input type="text" name='s' id='s' class="form-control"
                                               placeholder="这里有你想要的" x-webkit-speech>
                    <button class="btn btn-danger" type="submit"><i class="fa fa-search"></i></button>
                </div> <!--<button type="submit" class="btn btn-primary">Submit</button>--> </form>
        </div><!-- /.navbar-collapse --> </div><!-- /.container-fluid --> </nav>