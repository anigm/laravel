<?php $__env->startSection('pageheader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>博客列表</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">博客列表</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-body">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>栏目</th>
                    <th>标题</th>
                    <th>图片</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
                <?php foreach($blogs as $blog): ?>
                    <tr>
                        <td><?php echo e($blog->id); ?></td>
                        <td><?php echo e($blog->column->title); ?></td>
                        <td><a href="<?php echo e(url('/list/'.$blog->id)); ?>" target="_blank"><?php echo e($blog->title); ?></a></td>
                        <td><a href="#"><img src="<?php echo e($blog->image); ?>" width="20" height="20"></a></td>
                        <td><?php echo e($blog->datetime); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/blog/'.$blog->id.'/edit')); ?>" class="btn btn-info btn-primary btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span> 编辑</a>
                            <a href="<?php echo e(url('admin/blog/destroy/'.$blog->id)); ?>" class="btn btn-info btn-danger btn-sm iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> 回收站</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                <?php echo $blogs->render(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>