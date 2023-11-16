
<?php $__env->startSection('title', 'Create Carousal'); ?>
<?php $__env->startSection('h1', 'Create Carousal'); ?>
<?php $__env->startSection('li', 'Create Carousal'); ?>
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
                        <h3 class="card-title">Slider Images</h3>
                    </div>

                    <form enctype="multipart/form-data" action="<?php echo e(route('carousal-store')); ?>" method="POST"
                        class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" id="description">
                            </div>

                            <div class="form-group">
                                <label for="image">Select Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-10 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Slider Image</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class="text-center">Images</th>
                                    <th style="width: 160px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $carousals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carousal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($carousal->id); ?></td>
                                        <td><?php echo e($carousal->title); ?></td>
                                        <td><?php echo e($carousal->description); ?></td>
                                        <td><img class="d-block mx-auto rounded-circle"
                                                src="<?php echo e(asset('storage/carousal/' . $carousal->image)); ?>" width="150px"
                                                height="100px" alt=""></td>

                                        <td>
                                            <a href="<?php echo e(route('carousal-edit', $carousal->id)); ?>" type="submit"
                                                class="btn btn-primary border border-warning">Edit</a>
                                            <a href="<?php echo e(route('carousal-delete', $carousal->id)); ?>" type="submit"
                                                class="btn btn-danger border border-warning">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class="text-center">Image</th>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views\admin\pages\carousal\create-carousal.blade.php ENDPATH**/ ?>