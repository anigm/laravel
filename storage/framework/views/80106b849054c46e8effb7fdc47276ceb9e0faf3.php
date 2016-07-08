
<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('admin-assets/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('admin-assets/dist/css/AdminLTE.min.css')); ?>" rel="stylesheet" type="text/css" />
    <div id="main">
    <?php foreach($blogs as $blog): ?>
        <section class="post" itemscope itemprop="blogitem">
            <a href="<?php echo e(url('/list/'.$blog->id)); ?>" title="<?php echo e($blog->title); ?>" itemprop="url">
                <h1 itemprop="name"><?php echo e($blog->title); ?></h1>
                <p itemprop="description"><?php echo e(mb_substr($blog->description,0,100)); ?></p>
                <time datetime="<?php echo e($blog->datetime); ?>" itemprop="datePublished"><?php echo e($blog->datetime); ?></time>
            </a>
        </section>
    <?php endforeach; ?>
    <nav id="page-nav" class="clearfix unexpand">
        <?php echo $blogs->render(); ?>

    </nav>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('skin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>