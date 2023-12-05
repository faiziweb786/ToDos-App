<!DOCTYPE html>
<html>

<head>
<?php echo $__env->make('admin.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('stylee'); ?>
<?php echo $__env->yieldPushContent('styles'); ?>
</head>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php echo $__env->make('admin.partial.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <?php echo $__env->make('admin.partial.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"><?php echo $__env->yieldContent('h1' , 'Dashboard'); ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('admin-index')); ?>">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo $__env->yieldContent('li' , 'Dashboard'); ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            
            <!-- /.content-header -->


            <!-- Main content -->
            <section class="content">
               <?php echo $__env->yieldContent('content'); ?>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->



            
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
        <?php echo $__env->make('admin.partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH D:\project\login_registration\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>