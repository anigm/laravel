<?php $__env->startSection('pageheader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>创建分类</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">创建分类</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-default">
        <div class="panel-body content-form">
            <div class="col-lg-12">
                <?php echo Form::open( array('url' => route('admin.category.store'), 'method' => 'post') ); ?>

                <div class="form-group">
                    <label>标题</label>
                    <span class="require">(*)</span>
                    <input name="name" class="form-control title" placeholder="请输入标题">
                </div>
                <div class="form-group">
                    <label>别名</label>
                    <input name="slug" class="form-control title" placeholder="别名">
                </div>
                <div class="form-group">
                    <label>选择父类</label>
                    <select class="form-control" name="pid" id="pid">
                        <option value="0">无父级</option>
                        <?php if(count($categories)>0): ?>
                            <?php foreach($categories as $category): ?>
                                <option value="<?php echo e($category->id); ?>">
                                <?php for($i=1;$i<=$category->count;$i++): ?>├─ <?php endfor; ?>
                                <?php echo e($category->name); ?>

                                </option>
                            <?php endforeach; ?>

                        <?php endif; ?>
                    </select>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="提交">
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>