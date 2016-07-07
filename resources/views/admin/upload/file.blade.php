@extends('layouts.admin-app-upload')
@section('content')
    <style type="text/css">
        .close_button
        {
            margin-bottom: 25px;
        }
        .yascmf_layer
        {
            width: 560px;
            margin: 0 20px;
        }
        .validation_tips_area
        {
            line-height: 36px;
            background-color: #f6f6f6;
            color: #666;
            border-radius: 12px;
        }
        /*覆写部分样式,以便适合弹窗*/
        .yascmf_layer .validation_tips_area
        {
            width: 500px;
        }
        .yascmf_layer ul li label.description,
        {
            line-height: 20px !important;
        }
        .yascmf_layer ul li .form_item
        {
            line-height: 20px !important;
            margin: 5px 0;
        }
        .yascmf_layer p.tips_text
        {
            color: #083;
            font-size: 12px;
            line-height: 20px;
            margin: 5px 0;
        }
        .avgrund-close
        {
            display: block;
            color: #555;
            font-size: 14px;
            text-decoration: none;
            text-transform: uppercase;
            position: absolute;
            top: 6px;
            right: 10px;
        }
    </style>
    <div class="panel panel-default">
        <div class="panel-body content-form">
            <div class="col-lg-12">
                <div class="validation_tips_area" style="display: none;">
                    <div class="tips_text"><p class="be_happy"><i class="fa fa-smile-o"></i> 上传文件成功！</p><p class="info_text small_text">本提示栏2秒之后自动关闭！</p></div>
                </div>
                <form method="post" action="{{route('admin.mail.postuploadfile')}}" accept-charset="utf-8" enctype="multipart/form-data" id="uploadPictureFile">
                    <div class="upload_picture_form">
                        <div class="form-group"><label>上传文件</label><input accept=".rar,.exe,.pdf,.chm" name="picture" type="file"></div>
                        <button type="submit" class="btn btn-primary" id="uploadPicSubmit">上传</button>
                    </div>
                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
                </form>
            </div>
        </div>
    </div>
    <div id="layerPreviewPic" class="fn-hide"></div>
    <script src="{{ asset('plugin/layer/layer.min.js') }}"></script>
    <script src="{{ asset('plugin/form/jquery.form.js') }}"></script>
    @include('admin.vendor.endChosen')
    <script type="text/javascript">
        //获取当前窗体索引
        var index = parent.layer.getFrameIndex(window.name);
        $('.avgrund-close').on('click', function ()
        {
            //执行关闭
            parent.layer.close(index);
        });
        @include('admin.vendor.endBuildHtml')
        // ajax form拦截提交事件
        $('#uploadPicSubmit').click(function ()
        {
            var options = {
                dataType: 'json',
                timeout: 3000,
                success: function (data)
                {
                    var html = build_html(data.status, data.info, data.operation);
                    $('.validation_tips_area').html(html).css('display', 'block');
                    setTimeout(function () {
                        $('.validation_tips_area').fadeOut('slow');
                    }, 2000);
                    //成功
                    if (data.status === 1)
                    {
                        var from = 'file';
                        {{--var from = '{{ Input::get('from','file') }}';--}}
                        //回调图片地址到父窗口
                        parent.$('#' + from).val(data.info);
                        parent.layer.close(index);
                        //setTimeout("parent.location.reload()",1000);
                    }
                    else
                    {
                        //setTimeout("location.reload()",1000);
                    }
                },
                error: function ()
                {
                    var html = build_html(0, '失败：服务器端异常', '操作');
                    $('.validation_tips_area').html(html).css('display', 'block');
                    setTimeout(function () {$('.validation_tips_area').fadeOut('slow');}, 2000);
                    //setTimeout("location.reload()",1000);
                }
            };
            $('#uploadPictureForm').ajaxForm(options);
        });
    </script>
@endsection