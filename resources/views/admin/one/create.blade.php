@extends('layouts.admin-app')
@section('pageheader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>新建单页</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">新建单页</li>
            </ol>
        </div>
    </div>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-body content-form">
            <div class="col-lg-12">
                <script src="{{ asset('plugin/ckeditor/ckeditor.js') }}"></script>
                <link media="all" href="{{ asset('plugin/jasny-bootstrap/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
                <script src="{{ asset('plugin/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
                <link media="all" href="{{ asset('plugin/bootstrap_datepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>
                <link media="all" href="{{ asset('plugin/jQuery-tagEditor/jquery.tag-editor.css') }}" rel="stylesheet" type="text/css"/>
                {!! Form::open( array('url' => route('admin.one.store'), 'method' => 'post', 'files'=>true)) !!}
                <div class="control-group {!! $errors->has('title') ? 'has-error' : '' !!}">
                    <label class="control-label" for="title">标题</label>
                    <div class="controls"> {!! Form::text('title', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title')) !!}
                        @if ($errors->first('title')) <span class="help-block">{!! $errors->first('title') !!}</span> @endif
                    </div>
                </div>
                <br>
                <div class="control-group {!! $errors->has('datetime') ? 'has-error' : '' !!}">
                    <label class="control-label" for="title">发布时间</label>
                    <div class="controls"> {!! Form::text('datetime', '', array('id' => 'datetime')) !!}
                        @if ($errors->first('datetime'))<span class="help-block">{!! $errors->first('datetime') !!}</span> @endif
                    </div>
                </div>
                <br>
                <div class="control-group {!! $errors->has('tag') ? 'has-error' : '' !!}">
                    <label class="control-label" for="title">标签</label>
                    <div class="controls"> {!! Form::textarea('tag', '', array('id' => 'tag')) !!}
                    </div>
                </div>
                <br>
                <script src="{{ asset('plugin/layer/layer.min.js') }}"></script>
                <div class="form-group">
                    <label>缩略图
                        <a href="javascript:void(0);" class="uploadPic" data-id="thumb"><i class="fa fa-fw fa-picture-o" title="上传"></i></a>
                        <a href="javascript:void(0);" class="previewPic" data-id="thumb"><i class="fa fa-fw fa-eye" title="预览小图"></i></a>
                    </label>
                    <input type="text" class="form-control" id="thumb" name="thumb" placeholder="缩略图地址：如{{ url('') }}/logo.png" readonly="readonly">
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        @include('admin.vendor.endSinglePic')
                    });
                </script>
                <br>
                <div class="control-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                    <label class="control-label" for="description">内容</label>
                    <div class="controls"> {!! Form::textarea('description', null, array('class'=>'form-control', 'id' => 'description','name' => 'description', 'placeholder'=>'Description')) !!}</div>
                    @include('admin.vendor.endCKEditor')
                </div>
                <br>
                {!! Form::submit('提交', array('class' => 'btn btn-success')) !!}
                {!! Form::close() !!}
                <script src="{{ asset('plugin/bootstrap_datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
                <script src="{{ asset('plugin/bootstrap_datepicker/js/locales/bootstrap-datetimepicker.zh-CN.js') }}"></script>
                <script type="text/javascript">
                    $("#datetime").datetimepicker({
                        format: "yyyy-mm-dd hh:ii:ss",
                        autoclose: true,
                        todayBtn: true,
                        minuteStep: 10,
                        language: "zh-CN",
                    });
                </script>
                <script src="//cdn.bootcss.com/jqueryui/1.11.4/jquery-ui.min.js"></script>
                <script src="{{ asset('plugin/jQuery-tagEditor/jquery.tag-editor.js') }}"></script>
                <script>
                    (function($){var proto=$.ui.autocomplete.prototype,initSource=proto._initSource;function filter(array,term){var matcher=new RegExp($.ui.autocomplete.escapeRegex(term),"i");return $.grep(array,function(value){return matcher.test($("<div>").html(value.label||value.value||value).text());});}$.extend(proto,{_initSource:function(){if(this.options.html&&$.isArray(this.options.source)){this.source=function(request,response){response(filter(this.options.source,request.term));};}else{initSource.call(this);}},_renderItem:function(ul,item){return $("<li></li>").data("item.autocomplete",item).append($("<a></a>")[this.options.html?"html":"text"](item.label)).appendTo(ul);}});})(jQuery);
                    var cache = {};
                    function googleSuggest(request, response) {}
                    $(function ()
                    {
                        $('#tag').tagEditor({
                            placeholder: '输入 标签 ...',
                            autocomplete: {source: googleSuggest, minLength: 3, delay: 250, html: true, position: {collision: 'flip'}}
                        });
                    });
                </script>
            </div>
        </div>
    </div>
@endsection




