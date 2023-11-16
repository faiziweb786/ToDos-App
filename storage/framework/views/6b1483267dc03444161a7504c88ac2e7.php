
<?php $__env->startSection('title', 'Roles'); ?>
<?php $__env->startSection('h1', 'Manage Roles'); ?>
<?php $__env->startSection('li', 'Roles'); ?>
<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-10 d-flex align-items-center justify-content-end p-3">
            <!-- Button trigger modal -->
            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
            <a href="<?php echo e(route('create-role')); ?>" type="button" class="btn btn-primary">
                Add Role
            </a>
            <?php endif; ?>
        </div>
    </div>


    <div class="row">
        <div class="col-8 m-auto">

            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('delete')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('delete')); ?>

                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-evenly">
                    <h3 class="card-title">User Roles</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th class="text-center" style="width: 250px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($role->id); ?></td>
                                    <td><?php echo e($role->name); ?></td>
                                    <td class="d-flex align-items-center justify-content-between">
                                        <a href="<?php echo e(route('view-permission' , $role->id)); ?>" class="btn btn-info">View</a>
                                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                                        <a href="<?php echo e(route('edit-role', $role->id)); ?>" class="btn btn-primary m-1">Edit</a>
                                        <a href="<?php echo e(route('delete-role', $role->id)); ?>" class="btn btn-danger">Delete</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views\admin\pages\user-management\role.blade.php ENDPATH**/ ?>