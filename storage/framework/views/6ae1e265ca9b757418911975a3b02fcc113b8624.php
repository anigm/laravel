<?php $__env->startSection('pageheader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>添加标签</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">添加标签</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-body content-form">
            <div class="col-lg-12">
                <?php echo Form::open( array('url' => route('admin.tags.store'), 'method' => 'post') ); ?>

                <?php
                    echo $datas->http;
                print_r($datas[0]);
                ?>
                <?php foreach($datas as $data): ?>
                <div class="form-group">
                    <label></label>
                    <span class="require">(*)</span>
                    <input name="name" class="form-control title" placeholder="请输入标签">
                </div>
                <?php endforeach; ?>
                <input type="submit" name="submit" class="btn btn-primary" value="提交">
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>