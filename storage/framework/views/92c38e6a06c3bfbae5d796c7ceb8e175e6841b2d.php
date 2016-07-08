<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Anigm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta name="author" content="wsgzao">
    <meta name="description" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Anigm">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Anigm">
    <meta name="twitter:description" content="">
    <link rel="alternative" href="/atom.xml" title="Anigm" type="application/atom+xml">
    <link rel="icon" href="<?php echo e(asset('skin/favicon.ico')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('skin/jacman.jpg')); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('skin/jacman.jpg')); ?>">
    <link href="<?php echo e(asset('skin/style.css')); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<header>
    <?php echo $__env->make('skin.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</header>
<div id="container">
    <?php echo $__env->yieldContent('content'); ?>
    <div class="openaside"><a class="navbutton" href="#" title="显示侧边栏"></a></div>
    <?php echo $__env->make('skin.layouts.right', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<footer>
    <?php echo $__env->make('skin.layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</footer>
<script src="<?php echo e(asset('admin-assets/plugins/jQuery/jQuery-2.1.4.min.js')); ?>" type="text/javascript"></script>
<div id="totop"><a title="返回顶部"><img src="<?php echo e(asset('skin/scrollup.png')); ?>"/></a></div>
<script src="<?php echo e(asset('skin/totop.js')); ?>" type="text/javascript"></script>
</body>
</html>
