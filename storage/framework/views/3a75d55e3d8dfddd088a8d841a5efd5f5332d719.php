<?php $__env->startSection('pageheader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>分类列表</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">分类列表</li>
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
                    <th>名称</th>
                    <th>别名</th>
                    <th>操作</th>
                </tr>
                <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo e($category->id); ?></td>
                        <td>
                            <?php for($i=1;$i<=$category->count;$i++): ?>├─ <?php endfor; ?>
                            <?php echo e($category->name); ?>

                        </td>
                        <td><?php echo e($category->slug); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/category/'.$category->id.'/edit')); ?>" class="btn btn-info btn-primary btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span> 编辑</a>
                            <a href="<?php echo e(url('admin/category/destroy/'.$category->id)); ?>" class="btn btn-info btn-danger btn-sm iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> 删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>