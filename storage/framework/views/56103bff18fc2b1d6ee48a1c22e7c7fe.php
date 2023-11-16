
<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('h1', 'Users'); ?>
<?php $__env->startSection('li', 'Users'); ?>
<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-11 d-flex align-items-center justify-content-end p-3">
            <!-- Button trigger modal -->
            <a href="<?php echo e(route('adduser')); ?>" type="submit" class="btn btn-success border border-warning">
                New User
            </a>
        </div>
    </div>


    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

        </div> 
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

        </div> 
    <?php endif; ?>

    <div class="row">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Register Users</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th style="width: 160px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->id); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td class="d-flex align-items-center justify-content-between">
                                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                                        <a href="<?php echo e(route('editusers', $user->id)); ?>" type="submit"
                                            class="btn btn-primary border border-warning">Edit</a>
                                            <a href="<?php echo e(route('deleteuser', $user->id)); ?>" type="submit"
                                                class="btn btn-danger border border-warning">Delete</a>
                                         <?php endif; ?>


                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
<?php $__env->stopSection(); ?>

<!-- jQuery -->
<?php $__env->startSection('script'); ?>
    <!-- page script -->
    <script>
       // $(function() {
           // $("#example1").DataTable({
             //   "responsive": true,
             //   "autoWidth": false,
           // });
           // $('#example2').DataTable({
               // "paging": true,
               // "lengthChange": false,
               // "searching": false,
               // "ordering": true,
               // "info": true,
                //"autoWidth": false,
                //"responsive": true,
          //  });
        //});

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views\admin\pages\user-management\users.blade.php ENDPATH**/ ?>