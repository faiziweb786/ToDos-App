


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $__env->yieldContent('title', 'Dashboard'); ?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo e(asset('admin/plugins/fontawesome-free/css/all.css')); ?>">
<!-- Ionicons -->


<?php if($favicon = \App\Models\Favicon::first()): ?>
<link rel="icon" type="image/x-icon" href="<?php echo e(asset('storage/favicon/' . $favicon->favicon)); ?>">
<?php endif; ?>
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="<?php echo e(asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css')); ?>">
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo e(asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
<!-- JQVMap -->
<link rel="stylesheet" href="<?php echo e(asset('admin/plugins/jqvmap/jquery.vmap.js')); ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo e(asset('admin/css/adminlte.min.css')); ?>">
<!-- overlayScrollbars -->

<link rel="stylesheet" href="<?php echo e(asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
<!-- Daterange picker -->

<link rel="stylesheet" href="<?php echo e(asset('admin/plugins/daterangepicker/daterangepicker.css')); ?>">
<!-- summernote -->

<link rel="stylesheet" href="<?php echo e(asset('admin/plugins/summernote/summernote-bs4.css')); ?>">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


<link rel="stylesheet" href="<?php echo e(asset('admin/css/pagination.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin/css/style.css')); ?>"><?php /**PATH D:\project\login_registration\resources\views/admin/partial/header.blade.php ENDPATH**/ ?>