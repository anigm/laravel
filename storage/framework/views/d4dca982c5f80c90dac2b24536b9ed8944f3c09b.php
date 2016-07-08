<?php $__env->startSection('pageheader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>首页</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">首页</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="contentpanel">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo e($article_count); ?><sup style="font-size: 20px">篇</sup></h3>
                        <p>文章</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                    <a href="<?php echo e(url('admin/article')); ?>" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo e($category_count); ?><sup style="font-size: 20px">个</sup></h3>
                        <p>分类</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                    <a href="<?php echo e(url('admin/category')); ?>" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo e($tag_count); ?><sup style="font-size: 20px">个</sup></h3>
                        <p>标签</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-tag"></i>
                    </div>
                    <a href="<?php echo e(url('admin/tags')); ?>" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo e($user_count); ?><sup style="font-size: 20px">个</sup></h3>
                        <p>用户</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3><?php echo e($one_count); ?><sup style="font-size: 20px">个</sup></h3>
                        <p>单页</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3><?php echo e($blog_count); ?><sup style="font-size: 20px">个</sup></h3>
                        <p>博客内容</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-navy">
                    <div class="inner">
                        <h3><?php echo e($link_count); ?><sup style="font-size: 20px">个</sup></h3>
                        <p>友情链接</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo e($note_count); ?><sup style="font-size: 20px">个</sup></h3>
                        <p>笔记统计</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="#" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="box box-info" id="emaillable">
            <div class="box-header">
                <i class="fa fa-envelope"></i>
                <h3 class="box-title">通知系统管理员</h3>
                <div class="pull-right box-tools">
                    <button class="close" id="close" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <?php echo Form::open( array('url' => route('admin.mail.seed'), 'method' => 'post')); ?>

            <div class="box-body">
                    <div class="form-group"><?php echo Form::text('emailto', null, array('class'=>'form-control', 'id' => 'emailto', 'placeholder'=>'邮箱')); ?></div>
                    <div class="form-group"><?php echo Form::text('title', null, array('class'=>'form-control', 'id' => 'title', 'placeholder'=>'标题')); ?></div>
                    <div><?php echo Form::textarea('description', null, array('class'=>'form-control','style'=>'width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', 'id' => 'content','name' => 'description', 'placeholder'=>'内容')); ?></div>
            </div>
            <div class="box-footer clearfix">
                <?php echo Form::submit('提交', array('class' => 'pull-right btn btn-default')); ?>

            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
    <script>
        $(function(){
            $(".close").click(function(){
                $(".box.box-info").css('display','none');
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>