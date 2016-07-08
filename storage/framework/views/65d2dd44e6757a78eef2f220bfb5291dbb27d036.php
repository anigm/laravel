<?php $__env->startSection('pageheader'); ?>
    <link media="all" href="<?php echo e(asset('app.css')); ?>" rel="stylesheet" type="text/css"/>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>栏目列表</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">栏目列表</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <p>请选择一个类别从菜单到右边。.</p>
<?php $__env->stopSection(true); ?>
<?php echo $__env->make('admin.column.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>