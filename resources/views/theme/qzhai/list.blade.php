@extends('theme.qzhai.app')
@section('content')
    <link type="text/css" rel="stylesheet" href="{{ asset('plugin/syntaxhighlighter/styles/shCore.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('plugin/syntaxhighlighter/styles/shThemeDefault.css') }}" />
    <script type="text/javascript" src="{{ asset('plugin/syntaxhighlighter/scripts/shCore.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/syntaxhighlighter/scripts/shAutoloader.js') }}"></script>
    <link type="text/javascript" src="{{ asset('plugin/syntaxhighlighter/styles/shCoreDefault.css') }}"/>
    <script type="text/javascript">
        function path()
        {
            var args = arguments,
                    result = [];
            for (var i = 0; i < args.length; i++)
                result.push(args[i].replace('$', '{{ asset('plugin/syntaxhighlighter/scripts/') }}/'));
            return result
        }
        $(function () {
            SyntaxHighlighter.autoloader.apply(null, path(
                    'applescript            $shBrushAppleScript.js',
                    'actionscript3 as3      $shBrushAS3.js',
                    'bash shell             $shBrushBash.js',
                    'coldfusion cf          $shBrushColdFusion.js',
                    'cpp c                  $shBrushCpp.js',
                    'c# c-sharp csharp      $shBrushCSharp.js',
                    'css                    $shBrushCss.js',
                    'delphi pascal          $shBrushDelphi.js',
                    'diff patch pas         $shBrushDiff.js',
                    'erl erlang             $shBrushErlang.js',
                    'groovy                 $shBrushGroovy.js',
                    'java                   $shBrushJava.js',
                    'jfx javafx             $shBrushJavaFX.js',
                    'js jscript javascript  $shBrushJScript.js',
                    'perl pl                $shBrushPerl.js',
                    'php                    $shBrushPhp.js',
                    'text plain             $shBrushPlain.js',
                    'py python              $shBrushPython.js',
                    'ruby rails ror rb      $shBrushRuby.js',
                    'sass scss              $shBrushSass.js',
                    'scala                  $shBrushScala.js',
                    'sql                    $shBrushSql.js',
                    'vb vbnet               $shBrushVb.js',
                    'xml xhtml xslt html    $shBrushXml.js'
            ));
            SyntaxHighlighter.all();
        });
        SyntaxHighlighter.config.tagName="code";
    </script>
    <div class="uk-width-small-1-1 uk-width-medium-3-4 uk-width-large-7-10">
        <div id="index" class="bs uk-text-break">
            <article id="article" class="uk-article">
                <h1 class="uk-article-title">{{$note->title}}</h1>
                <ul class="singlenav uk-breadcrumb">
                    <li><i class="uk-icon-calendar"></i> {{$note->updated_at}}</li>
                    <li><i class="uk-icon-eye"></i> 0</li>
                    <li><i class="uk-icon-commenting-o"></i> <a href="http://qzhai.net/000/archives/10#comments">2</a></li>
                    <li><i class="uk-icon-heart-o"></i> 17</li>
                </ul>
                <p>{!! $note->content !!}</p>
                <div class="tags uk-clearfix">
                    <div class="tags uk-float-left">
                        <i class="uk-icon-tags"></i>
                        <a href="http://qzhai.net/000/archives/tag/%e6%b3%aa" rel="tag">泪</a>
                    </div>
                    <div class="uk-float-right"></div>
                </div>
            </article>
            <div id="qzhai_comments">
                <h4>评论</h4>
                <ul id="comments" class="uk-comment-list">
                    <li id="li-comment-8">
                        <article class="uk-comment"><img alt=''
                                                         src='http://gravatar.duoshuo.com/avatar/998fb109a0e59aa816ce08b77115a405?s=50&#038;d=retro&#038;r=g'
                                                         srcset='http://gravatar.duoshuo.com/avatar/998fb109a0e59aa816ce08b77115a405?s=100&amp;d=retro&amp;r=g 2x'
                                                         class='avatar avatar-50 photo' height='50' width='50'/>
                            <h6 class="uk-comment-title uk-clearfix"><cite>my</cite>
                                <time>2016-04-20 13:59</time>
                                    <span class="uk-comment-meta uk-float-right"><a rel='nofollow'
                                                                                    class='comment-reply-link'
                                                                                    href='http://qzhai.net/000/archives/10?replytocom=8#respond'
                                                                                    onclick='return addComment.moveForm( "comment-8", "8", "respond", "10" )'
                                                                                    aria-label='回复给my'>回复 </a></span>
                            </h6>
                            <p>赞一个</p>
                        </article>
                    </li>
                    </li><!-- #comment-## -->
                    <li id="li-comment-17">
                        <article class="uk-comment"><img alt=''
                                                         src='http://gravatar.duoshuo.com/avatar/cfc0b8398c1e866594f754595eccd3c1?s=50&#038;d=retro&#038;r=g'
                                                         srcset='http://gravatar.duoshuo.com/avatar/cfc0b8398c1e866594f754595eccd3c1?s=100&amp;d=retro&amp;r=g 2x'
                                                         class='avatar avatar-50 photo' height='50' width='50'/>
                            <h6 class="uk-comment-title uk-clearfix"><cite><a href='http://www.liluchang.com'
                                                                              rel='external nofollow'
                                                                              class='url'>落</a></cite>
                                <time>2016-05-19 10:38</time>
                                    <span class="uk-comment-meta uk-float-right"><a rel='nofollow'
                                                                                    class='comment-reply-link'
                                                                                    href='http://qzhai.net/000/archives/10?replytocom=17#respond'
                                                                                    onclick='return addComment.moveForm( "comment-17", "17", "respond", "10" )'
                                                                                    aria-label='回复给落'>回复 </a></span>
                            </h6>
                            <p>把更好的自己，留给未来的你。</p>
                        </article>
                    </li>
                    </li><!-- #comment-## -->
                </ul>
                <ul class="uk-pagination">
                    <li class="uk-pagination-previous"></li>
                    <li class="uk-pagination-next"></li>
                </ul>
                <div id="respond" class="comment_form" role="form">
                    <h2 id="reply-title" class="comments-title">发表评论
                        <small><a rel="nofollow" id="cancel-comment-reply-link" href="" style="display:none;">点击这里取消回复。</a></small>
                    </h2>
                    <form action="http://qzhai.net/000/wp-comments-post.php" method="post" class="uk-form" id="commentform">
                            <textarea id="comment"
                                      onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"
                                      placeholder="内容..." tabindex="1" name="comment"></textarea>
                        <div class="text uk-grid uk-grid-small">

                            <div class="uk-width-medium-1-4 uk-form-icon">
                                <i class="uk-icon-user"></i>
                                <input id="author" type="text" tabindex="2" value="" name="author" placeholder="昵称*"
                                       class="uk-width-1-1">
                            </div>
                            <div class=" uk-width-medium-1-4 uk-form-icon">
                                <i class="uk-icon-envelope"></i>
                                <input id="email" type="text" tabindex="3" value="" name="email" placeholder="邮箱*"
                                       class="uk-width-1-1">
                            </div>
                            <div class="uk-width-medium-1-4 uk-form-icon">
                                <i class="uk-icon-laptop"></i>
                                <input id="url" type="text" tabindex="4" value="" name="url" placeholder="网址"
                                       class="uk-width-1-1">
                            </div>
                            <div class="uk-width-medium-1-4">
                                <button name="submit" type="submit" id="submit" class="uk-button uk-width-1-1"
                                        tabindex="5"/>
                                回复</button>
                            </div>
                        </div>
                        <div class="uk-margin-small-top"></div>
                        <input type='hidden' name='comment_post_ID' value='10' id='comment_post_ID'/>
                        <input type='hidden' name='comment_parent' id='comment_parent' value='0'/>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
