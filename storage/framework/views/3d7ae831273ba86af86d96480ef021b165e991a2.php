<?php $__env->startSection('pageheader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>添加文章</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">添加文章</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-body">
            <?php echo Form::open( array('url' => route('admin.article.store'), 'method' => 'post') ); ?>

            <div class="form-group">
                <div class="col-md-6">
                    <label>标题</label>
                    <span class="require">(*)</span>
                    <input name="title" class="form-control title" placeholder="请输入标题">
                </div>
            </div>

            <div class="form-group">
                <label>内容</label>
                <span class="require">(*)</span>
                <div class="editor">
                    <?php echo $__env->make('editor::head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Form::textarea('content', '', ['class' => 'form-control','id'=>'myEditor']); ?>

                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <?php echo Form::label('tag_list', '标签：'); ?>

                    <?php echo Form::select('tag_list[]',$tags,null,['id' => 'tag_list','class' => 'form-control','multiple']); ?>

                </div>
            </div>
            <input type="hidden" name="user_id" value="<?php echo e(Auth::guard('admin')->user()->id); ?>">
            <div class="form-group">
                <div class="col-md-4">
                    <span class="btn-space">
                        <input class="btn btn-primary" type="submit" name="submit" value="提交">
                    </span>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>