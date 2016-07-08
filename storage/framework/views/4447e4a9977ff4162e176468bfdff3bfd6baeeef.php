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
    <?php /*<link href="<?php echo e(asset('admin-assets/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />*/ ?>
            <!-- Font Awesome Icons -->
    <?php /*<link href="<?php echo e(asset('admin-assets/dist/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />*/ ?>
            <!-- Ionicons -->
    <?php /*<link href="<?php echo e(asset('admin-assets/dist/css/ionicons.min.css')); ?>" rel="stylesheet" type="text/css" />*/ ?>
            <!-- Theme style -->
    <link href="<?php echo e(asset('admin-assets/dist/css/AdminLTE.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- Select2 -->
    <link href="<?php echo e(asset('admin-assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <?php /*<link href="<?php echo e(asset('admin-assets/dist/css/skins/skin-blue.min.css')); ?>" rel="stylesheet" type="text/css" />*/ ?>
    <?php /*<link href="<?php echo e(asset('admin-assets/bootstrap/css/common.css')); ?>" rel="stylesheet" type="text/css" />*/ ?>
            <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->
    <script src="<?php echo e(asset('admin-assets/plugins/jQuery/jQuery-2.1.4.min.js')); ?>" type="text/javascript"></script>
    <?php /*<script src="<?php echo e(asset('admin-assets/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>*/ ?>
    <?php $__env->startSection('css'); ?>
        <link href="<?php echo e(asset('css/style.default.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/jquery.datatables.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/sweetalert.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldSection(); ?>
        <!--[if lt IE 9]>
        <script src="<?php echo e(asset('js/html5shiv.js')); ?>"></script>
        <script src="<?php echo e(asset('js/respond.min.js')); ?>"></script>
        <![endif]-->
</head>
<body>
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<section>
    <div class="leftpanel">
        <div class="logopanel">
            <h1><span>[</span> <a href="/admin/home">后台管理设置</a> <span>]</span></h1>
        </div><?php echo e(Auth::getUser()); ?>

        <div class="leftpanelinner">
            <ul class="nav nav-pills nav-stacked nav-bracket">
                <?php $permissionPresenter = app('App\Presenters\PermissionPresenter'); ?>
                <?php echo $permissionPresenter->menus(); ?>

            </ul>
        </div>
    </div>
    <div class="mainpanel">
        <div class="headerbar">
            <a class="menutoggle"><i class="fa fa-bars"></i></a>
            <form class="searchform" action="index.html" method="post">
                <input type="text" class="form-control" name="keyword" placeholder="搜索   ..."/>
            </form>
            <div class="header-right">
                <ul class="headermenu">
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo e(asset('images/photos/loggeduser.png')); ?>" alt=""/>
                                <?php echo e(Auth::guard('admin')->user()->name); ?>

                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                                <li><a href="<?php echo e(url('admin/logout ')); ?>"><i class="glyphicon glyphicon-log-out"></i> 退出</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <?php echo $__env->yieldContent('pageheader'); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <div class="rightpanel">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#rp-alluser" data-toggle="tab"><i class="fa fa-users"></i></a></li>
            <li><a href="#rp-favorites" data-toggle="tab"><i class="fa fa-heart"></i></a></li>
            <li><a href="#rp-history" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
            <li><a href="#rp-settings" data-toggle="tab"><i class="fa fa-gear"></i></a></li>
        </ul>
        <div class="tab-content">
        </div>
    </div>
</section>
<?php $__env->startSection('scripts'); ?>
<?php echo $__env->yieldSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <?php /*<script src="<?php echo e(asset('js/jquery-1.10.2.min.js')); ?>"></script>*/ ?>
    <script src="<?php echo e(asset('js/jquery-migrate-1.2.1.min.js')); ?>"></script>
    <?php /*<script src="<?php echo e(asset('js/jquery-ui-1.10.3.min.js')); ?>"></script>*/ ?>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/modernizr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/toggles.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/retina.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.cookies.js')); ?>"></script>
    <script src="<?php echo e(asset('js/flot/flot.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/flot/flot.resize.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/morris.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/raphael-2.1.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/chosen.jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin-assets/plugins/select2/select2.full.min.js')); ?>"></script>
    <?php echo Toastr::render(); ?>

<?php echo $__env->yieldSection(); ?>
<script type="text/javascript">
    $(function ()
    {
        $("#tag_list").select2({
            placeholder:'选择标签',
            tags:true
        });
    });
</script>
</body>
</html>
