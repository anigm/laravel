<?php $__env->startSection('pageheader'); ?>
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 后台 <span>修改笔记</span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">当前地址:</span>
            <ol class="breadcrumb">
                <li class="active">修改笔记</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box">
        <div class="box-body">
            <?php echo Form::open( array('url' => route('admin.note.update',$data->id), 'method' => 'put') ); ?>

            <div class="form-group">
                <div class="col-md-6">
                    <label>标题</label>
                    <span class="require">(*)</span>
                    <input name="title" class="form-control title" placeholder="请输入标题" value="<?php echo e($data->title); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <label>分类</label>
                    <span class="require">(*)</span>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="0">无父级</option>
                        <?php if(count($categories)>0): ?>
                            <?php foreach($categories as $category): ?>
                                <option value="<?php echo e($category->id); ?>" <?php if(isset($data->category_id) && $category->id == $data->category_id): ?> selected <?php endif; ?>>
                                    <?php for($i=1;$i<=$category->count;$i++): ?>├─ <?php endfor; ?>
                                    <?php echo e($category->name); ?>

                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label>内容</label>
                    <span class="require">(*)</span>
                    <div class="editor">
                        <script src="<?php echo e(asset('plugin/ckeditor/ckeditor.js')); ?>"></script>
                        <?php echo Form::textarea('content', $data->content, array('class'=>'form-control', 'id' => 'description', 'placeholder'=>'Description')); ?>

                        <?php echo $__env->make('admin.vendor.endCKEditor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <?php echo Form::label('tag_list', '标签：'); ?>

                    <select  id="tag_list" class="form-control" multiple="multiple" name="tag_list[]">
                        <?php foreach($tags as $tag): ?>
                            <option value="<?php echo e($tag->id); ?>" <?php if(in_array($tag->id,$article_tags)): ?> selected <?php endif; ?>><?php echo e($tag->name); ?></option>
                        <?php endforeach; ?>
                    </select>
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