<?php $__env->startSection('pageheader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>文章列表</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">文章列表</li>
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
                    <th>标题</th>
                    <th>作者</th>
                    <th>更新时间</th>
                    <th>操作</th>
                </tr>
                <?php foreach($articles as $article): ?>
                    <tr>
                        <td><?php echo e($article->id); ?></td>
                        <td><a href="<?php echo e(url('/article/'.$article->id)); ?>" target="_blank"><?php echo e($article->title); ?></a></td>
                        <td><a href="#"><?php echo e($article->user['name']); ?></a></td>
                        <td><?php echo e($article->updated_at); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/article/'.$article->id.'/edit')); ?>" class="btn btn-info btn-primary btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span> 编辑</a>
                            <a href="<?php echo e(url('admin/article/destroy/'.$article->id)); ?>" class="btn btn-info btn-danger btn-sm iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> 回收站</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-right">
                <?php echo $articles->render(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>