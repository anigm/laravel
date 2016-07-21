<div id="respond" class="comment-respond">
    <h3 id="reply-title" class="comment-reply-title">发表评论
        <small><a rel="nofollow" id="cancel-comment-reply-link" href="" style="display:none;"
                  data-original-title="">取消</a></small>
    </h3>
    {!! Form::open( array('url' => 'comment/'.$id, 'method' => 'post') ) !!}
    <div class="form-group" id="comment-author-info">
        <div id="div-auth"></div>
        <div class="comment-form-author form-group has-feedback">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input class="form-control" placeholder="昵称" id="author" name="author" type="text"
                       size="30" required="required">
                <span class="form-control-feedback required">*</span>
            </div>
        </div>
        <div class="comment-form-email form-group has-feedback">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                <input class="form-control" placeholder="邮箱" id="email" name="email" type="text"
                       size="30" required="required">
                <span class="form-control-feedback required">*</span>
            </div>
        </div>
    </div>
    <div class="form-group comment-form-comment">
                        <textarea class="form-control" id="content" placeholder="请使用真实邮箱，任何无意义的邮箱留言都将被直接删除！"
                                  name="content" rows="5" aria-required="true" required="required"></textarea>
    </div>
    <input type='hidden' name='list_id' value='{{$id}}' id='list_id'/>
    <input type="submit" name="submit" class="btn btn-danger" value="提交">
    {!!Form::close()!!}
</div>
<script>
    i = 1;
    function seedto(id, name) {
        var pid = $("#pid").val();
        if (pid) {
            if (pid != id) {
                $("#div-pid").remove();
                i = 1;
            }
        }
        if (i == 2) {
            return false;
        }
        else {
            var comment = "<div id='div-pid'><input value='" + id + "' id='pid' name='pid' type='text'>回复给 " + name + "<a onclick='direct()'>直接评论</div><div>";
            $("#div-auth").append(comment);
            i++;
        }
    }
    function direct() {
        $("#div-pid").remove();
        i = 1;
    }
</script>