
<?php $__env->startSection('pageheader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>写博客</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">写博客</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-body content-form">
            <div class="col-lg-12">
                <script src="<?php echo e(asset('plugin/ckeditor/ckeditor.js')); ?>"></script>
                <link media="all" href="<?php echo e(asset('plugin/jasny-bootstrap/css/jasny-bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
                <script src="<?php echo e(asset('plugin/jasny-bootstrap/js/jasny-bootstrap.min.js')); ?>"></script>
                <link media="all" href="<?php echo e(asset('plugin/bootstrap_datepicker/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet" type="text/css"/>
                <?php /*<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">*/ ?>
                <link media="all" href="<?php echo e(asset('plugin/jQuery-tagEditor/jquery.tag-editor.css')); ?>" rel="stylesheet" type="text/css"/>
                <?php echo Form::open( array('url' => route('admin.blog.store'), 'method' => 'post', 'files'=>true)); ?>

                <div class="control-group <?php echo $errors->has('parent_id') ? 'has-error' : ''; ?>">
                    <label class="control-label" for="title">栏目选择</label>
                    <div class="controls">
                        <?php /*<?php echo Form::label('parent_id', 'Parent:'); ?>*/ ?>
                        <?php echo Form::select('parent_id', $columns, null, [ 'class' => 'form-control' ]); ?>

                        <?php /*<?php echo $errors->first('parent_id'); ?>*/ ?>
                    </div>
                </div>
                <br>
                <div class="control-group <?php echo $errors->has('title') ? 'has-error' : ''; ?>">
                    <label class="control-label" for="title">标题</label>
                    <div class="controls"> <?php echo Form::text('title', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'Title')); ?>

                        <?php if($errors->first('title')): ?> <span class="help-block"><?php echo $errors->first('title'); ?></span> <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="control-group <?php echo $errors->has('datetime') ? 'has-error' : ''; ?>">
                    <label class="control-label" for="title">发布时间</label>
                    <div class="controls"> <?php echo Form::text('datetime', '', array('id' => 'datetime')); ?>

                        <?php if($errors->first('datetime')): ?><span class="help-block"><?php echo $errors->first('datetime'); ?></span> <?php endif; ?>
                    </div>
                </div>
                <br>
                <div class="control-group <?php echo $errors->has('tag') ? 'has-error' : ''; ?>">
                    <label class="control-label" for="title">标签</label>
                    <div class="controls"> <?php echo Form::textarea('tag', '', array('id' => 'tag')); ?>

                    </div>
                </div>
                <br>
                <script src="<?php echo e(asset('plugin/layer/layer.min.js')); ?>"></script>
                <div class="form-group">
                    <label>缩略图
                        <a href="javascript:void(0);" class="uploadPic" data-id="thumb"><i class="fa fa-fw fa-picture-o" title="上传"></i></a>
                        <a href="javascript:void(0);" class="previewPic" data-id="thumb"><i class="fa fa-fw fa-eye" title="预览小图"></i></a>
                    </label>
                    <input type="text" class="form-control" id="thumb" name="thumb" placeholder="缩略图地址：如<?php echo e(url('')); ?>/logo.png" readonly="readonly">
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                        <?php echo $__env->make('admin.vendor.endSinglePic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    });
                </script>
                <br>
                <div class="control-group <?php echo $errors->has('description') ? 'has-error' : ''; ?>">
                    <label class="control-label" for="description">内容</label>
                    <div class="controls"> <?php echo Form::textarea('description', null, array('class'=>'form-control', 'id' => 'description','name' => 'description', 'placeholder'=>'Description')); ?></div>
                    <?php echo $__env->make('admin.vendor.endCKEditor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <br>
                <div class="fileinput fileinput-new control-group <?php echo $errors->has('image') ? 'has-error' : ''; ?>" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                <div>
                <span class="btn btn-default btn-file">
                    <span class="fileinput-new">上传图片</span>
                    <span class="fileinput-exists">Change</span>
                    <?php echo Form::file('image', null, array('class'=>'form-control', 'id' => 'image', 'placeholder'=>'Image')); ?>

                    <?php if($errors->first('image')): ?> <span class="help-block"><?php echo $errors->first('image'); ?></span> <?php endif; ?>
                </span>
                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">移除</a>
                </div>
                </div>
                <br>
                <?php echo Form::submit('提交', array('class' => 'btn btn-success')); ?>

                <?php echo Form::close(); ?>

                <script src="<?php echo e(asset('plugin/bootstrap_datepicker/js/bootstrap-datetimepicker.min.js')); ?>"></script>
                <script src="<?php echo e(asset('plugin/bootstrap_datepicker/js/locales/bootstrap-datetimepicker.zh-CN.js')); ?>"></script>
                <script type="text/javascript">
                    $("#datetime").datetimepicker({ format: "yyyy-mm-dd hh:ii:ss",autoclose: true,todayBtn: true,minuteStep: 10,language: "zh-CN" });
                </script>
                <script src="//cdn.bootcss.com/jqueryui/1.11.4/jquery-ui.min.js"></script>
                <script src="<?php echo e(asset('plugin/jQuery-tagEditor/jquery.tag-editor.js')); ?>"></script>
                <script>
                    (function($){var proto=$.ui.autocomplete.prototype,initSource=proto._initSource;function filter(array,term){var matcher=new RegExp($.ui.autocomplete.escapeRegex(term),"i");return $.grep(array,function(value){return matcher.test($("<div>").html(value.label||value.value||value).text());});}$.extend(proto,{_initSource:function(){if(this.options.html&&$.isArray(this.options.source)){this.source=function(request,response){response(filter(this.options.source,request.term));};}else{initSource.call(this);}},_renderItem:function(ul,item){return $("<li></li>").data("item.autocomplete",item).append($("<a></a>")[this.options.html?"html":"text"](item.label)).appendTo(ul);}});})(jQuery);
                    var cache = {};
                    function googleSuggest(request, response) {}
                    $(function ()
                    {
                        $('#tag').tagEditor({ placeholder: '输入 标签 ...',autocomplete: {source: googleSuggest, minLength: 3, delay: 250, html: true, position: {collision: 'flip'}} });
                    });
                </script>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>