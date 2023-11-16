
<?php $__env->startSection('title', 'Favicon'); ?>
<?php $__env->startSection('h1', 'Favicon'); ?>
<?php $__env->startSection('li', 'Favicon'); ?>
<?php $__env->startSection('content'); ?>


    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-md-8 m-auto">

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

                <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">FavIcon</h3>
                    </div>

                    <form enctype="multipart/form-data" action="<?php echo e(route('add-favicon')); ?>" method="POST"
                        class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="image">Select Image</label>
                                <input type="file" name="favicon" class="form-control" id="image">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-10 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">FavIcon</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">FavIcon</th>
                                    <th style="width: 160px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $favicons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $favicon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($favicon->id); ?></td>
                                        <td>
                                            <img class="d-flex m-auto rounded-circle"
                                                src="<?php echo e(asset('storage/favicon/' . $favicon->favicon)); ?>" width="70px"
                                                height="70px" alt="">
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('edit-favicon', $favicon->id)); ?>" type="submit"
                                                class="btn btn-primary border border-warning">Edit</a>
                                            <a href="<?php echo e(route('delete-favicon', $favicon->id)); ?>" type="submit"
                                                class="btn btn-danger border border-warning">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">FavIcon</th>
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






    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views\admin\pages\favicon\icon.blade.php ENDPATH**/ ?>