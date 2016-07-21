@extends('theme.no7.app')
@section('content')
<section id="main" class="col-md-8">
<article class="well clearfix page" id="post">
    <header class="entry-header"><h1 class="entry-title"> 留言板 </h1></header>
    <div class="page-content">
        <p><img class="size-full wp-image-883 aligncenter" src="{{ asset('theme/no7/images/With-love-for-life.jpg') }}" alt="With-love-for-life" width="1030" height="324"></p>
        <p>本小站记录了我在学习中遇到的一些困难，及用到的解决方法，很多方法来源于网络，在文章最后都指出了来源。如果有版权等方面的问题，请于我联系~~~更多精彩！</p>
    </div>
    <footer class="entry-footer"> <!--评论模块-->
    <div id="comments" class="comments-area">
    <h2 class="comments-title"> 本文共 737 个回复 </h2>
    <div id="commentshow">
        <ul class="commentlist list-unstyled">
            <li class="comment even thread-even depth-1 parent" id="comment-3815">
                <div class="comment-wrap done" id="comment-3815">
                    <div class="comment-avatar pull-left" data-url="" style="display: block; "></div>
                    <div class="comment-body">
                        <h4><cite class="fn">灰常记忆 </cite><span class="comment-date"> 2016/06/02 18:40 </span></h4>
                        <p> 主题也不更新了？ </p>
                        <div class="reply clearfix">
                            <a rel="nofollow" class="comment-reply-link" href="" onclick="return addComment.moveForm()" aria-label="回复给灰常记忆" title="">
                                <div class="label label-danger pull-right">回复</div>
                            </a>
                        </div>
                    </div>
                </div>
                <ul class="children">
                    <li class="comment byuser comment-author-specs bypostauthor odd alt depth-2" id="comment-3817">
                        <div class="comment-wrap done" id="comment-3817">
                            <div class="comment-avatar pull-left" data-url="" style="display: block;"></div>
                            <div class="comment-body">
                                <h4>
                                <cite class="fn">
                                    <a target="_blank" href="http://9iphp.com" rel="external nofollow" class="url" data-original-title="" title="">Specs</a>
                                    <i class=" fa fa-user-secret text-danger"></i>
                                </cite>
                                <span class="comment-date"> 2016/06/04 08:57 </span>
                            </h4>
                            <p><span class="comment-to plr">@</span>
                                <span class="reply-comment-author">
                                    <a href="#comment-3817" title="" data-original-title="主题也不更新了？"> 灰常记忆 </a>
                                </span>
                                没啥更的啊~ </p>
                            <div class="reply clearfix">
                                <a rel="nofollow" class="comment-reply-link" href="" aria-label="回复给Specs" data-original-title="" title="">
                                    <div class="label label-danger pull-right">回复</div>
                                </a>
                            </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <p class="commentnav text-center" data-post-id="78">
        </p>
    </div>
    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title">发表评论
            <small>
                <a rel="nofollow" id="cancel-comment-reply-link" href="/guestbook#respond" style="display:none;" data-original-title="">取消</a>
            </small>
        </h3>
        <form action="http://9iphp.com/wp-comments-post.php" method="post" id="commentform" class="comment-form">
            <div class="form-group" id="comment-author-info">
                <div class="comment-form-author form-group has-feedback">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input class="form-control" placeholder="昵称" id="author" name="author" type="text" size="30" required="required">
                        <span class="form-control-feedback required">*</span>
                    </div>
                </div>
                <div class="comment-form-email form-group has-feedback">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                        <input class="form-control" placeholder="邮箱" id="email" name="email" type="text" size="30" required="required">
                        <span class="form-control-feedback required">*</span>
                    </div>
                </div>
            </div>
            <div class="form-group comment-form-comment">
                <textarea class="form-control" id="comment" placeholder="请使用真实邮箱，任何无意义的邮箱留言都将被直接删除！" name="comment" rows="5" aria-required="true" required="required"
                   onkeydown="if(event.ctrlKey){if(event.keyCode==13){document.getElementById('submit').click();return false}};">
                </textarea>
                <div id="loading" class="mt-5" style="display: none;"><i class="fa fa-spinner fa-spin"></i> 正在提交, 请稍候...</div>
                <div id="error" class="text-danger mt-5" style="display: none;">#</div>
            </div>
            <div class="form-group">
                <input name="submit" type="submit" id="submit" class="btn btn-danger" tabindex="5" value="SUBMIT（Ctrl + Enter）">
                <a href="javascript:;" class="showEmoji" tabindex="0" role="button" data-original-title="" title="">
                <i class="fa fa-smile-o"></i>
                </a>
            </div>
            <input type="hidden" name="comment_post_ID" value="78" id="comment_post_ID">
            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
        </form>
    </div>
    </div>
    </footer>
</article>
</section>
@endsection
