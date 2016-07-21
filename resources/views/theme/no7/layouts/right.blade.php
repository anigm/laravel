<aside id="side-bar" class="col-md-4">
<div id="sidebar">
<aside id="specs_widget_tags-6" class="widget widget_specs_widget_tags panel panel-specs visible-lg visible-md clearfix">
    <div class="panel-heading"><h2><i class="fa fa-tags"></i> 标签云</h2></div>
    <div class="tag_clouds">
    @foreach (\App\Models\Tag::getall() as $key)
    <a href='{{url('/tag/'.$key->id)}}' class='tag-link-332' title='{{$key->name}}' style='font-size: 14px;'>{{$key->name}}</a>
    @endforeach
    </div>
</aside>
<aside id="specs_widget_recent_comments-13" class="widget widget_specs_widget_recent_comments panel panel-specs visible-lg visible-md clearfix">
    <div class="panel-heading"><h2><i class="fa fa-comments-o"></i> 最新发布</h2></div>
    <ul class="list-group">
        @foreach (\App\Models\Note::last10() as $key)
        <a class='list-group-item clearfix comment_list' href='{{url('/list/'.$key->id)}}' title=''>{{$key->title}}</a>
        </a>
        @endforeach
    </ul>
</aside>
</div>
</aside>