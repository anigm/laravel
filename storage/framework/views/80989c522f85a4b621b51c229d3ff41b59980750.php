<?php $__env->startSection('pageheader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>创建栏目</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">创建栏目</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-body">
    <?php echo Form::model($data, [ 'route' => 'admin.column.store' ]); ?>

        <?php echo $__env->make('admin.column.partials.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="form-group">
            <?php echo Form::submit('添加', [ 'class' => 'btn btn-primary' ]); ?>

        </div>
    <?php echo Form::close(); ?>

    </div>
    </div>
<?php $__env->stopSection(true); ?>
<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>