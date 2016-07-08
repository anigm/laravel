<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/png">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <title>后台管理</title>
    <link href="<?php echo e(asset('admin-assets/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo e(asset('admin-assets/plugins/jQuery/jQuery-2.1.4.min.js')); ?>" type="text/javascript"></script>
</head>
<body>
<section>
        <?php echo $__env->yieldContent('content'); ?>
</section>
<?php $__env->startSection('javascript'); ?>
    <script src="<?php echo e(asset('js/jquery-migrate-1.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/toggles.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.cookies.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <?php echo Toastr::render(); ?>

<?php echo $__env->yieldSection(); ?>
</body>
</html>
