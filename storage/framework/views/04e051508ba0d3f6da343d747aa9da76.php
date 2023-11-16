
<?php $__env->startSection('title' , 'Items'); ?>
<?php $__env->startSection('h1' , 'Items'); ?>
<?php $__env->startSection('li' , 'Items'); ?>
<?php $__env->startSection('content'); ?>



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
    <div class="col-12 d-flex align-items-center justify-content-end p-3">
        <!-- Button trigger modal -->
        <a href="<?php echo e(route('admin-additem')); ?>" type="submit" class="btn btn-success border border-warning">
            New Item
        </a>
    </div>
</div>



<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Items</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>CNIC</th>
                            <th>Mobile Number</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Country</th>
                            <th>Religion</th>
                            <th>Address</th>
                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                            <th>Action</th>
                            <?php endif; ?>
                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager')): ?>
                            <th>Action</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                           
                            <tr>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->user->name); ?></td>
                                <td><?php echo e($item->email); ?></td>
                                <td><?php echo e($item->cnic); ?></td>
                                <td><?php echo e($item->pnumber); ?></td>
                                <td>
                                    <?php if($item->gender == 'M'): ?>
                                    Male
                                    <?php elseif($item->gender == 'F'): ?>
                                    Female
                                    <?php else: ?>
                                    Other                                        
                                    <?php endif; ?>
                                    </td>
                                <td><?php echo e($item->dob); ?></td>
                                <td><?php echo e($item->country); ?></td>
                                <td><?php echo e($item->religion); ?></td>
                                <td><?php echo e($item->address); ?></td>
                                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                                <td class="d-flex align-items-center justify-content-center">
                                    <a href="<?php echo e(route('admin-edititem' , $item->id )); ?>" class="btn btn-primary mr-1">Edit</a>
                                    <a href="<?php echo e(route('delete-item' , $item->id)); ?>" class="btn btn-danger">Delete</a>
                                </td>
                                <?php endif; ?>
                                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'manager')): ?>
                                <td class="d-flex align-items-center justify-content-center">
                                    <a href="<?php echo e(route('admin-edititem' , $item->id )); ?>" class="btn btn-primary mr-1">Edit</a>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>CNIC</th>
                            <th>Mobile Number</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Country</th>
                            <th>Religion</th>
                            <th>Address</th>
                            <th>Action</th>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views\admin\pages\products\user-items.blade.php ENDPATH**/ ?>