<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>
                    栏目
                    <small>
                        <a href="" title="Create new root category">
                            <a href="<?php echo e(route('admin.column.create')); ?>" title="创建栏目">
                            添加<span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </small>
                </h2>
                <?php echo $__env->make('admin.column.partials.tree', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="col-md-6">
                <h2><?php echo $__env->yieldContent('title'); ?></h2>
                <?php echo $__env->yieldContent('body'); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(true); ?>
<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>