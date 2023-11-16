
<?php $__env->startSection('title', 'Edit Carousal'); ?>
<?php $__env->startSection('h1', 'Edit Carousal'); ?>
<?php $__env->startSection('li', 'Edit Carousal'); ?>
<?php $__env->startSection('content'); ?>


    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-md-8 m-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Slider Images</h3>
                    </div>

                    <form enctype="multipart/form-data" action="<?php echo e(route('carousal-update' , $carousal->id )); ?>" method="POST"
                        class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="<?php echo e($carousal->title); ?>" class="form-control" id="title">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" value="<?php echo e($carousal->description); ?>" name="description" class="form-control" id="description">
                            </div>

                            <div class="form-group">
                                <label for="image">Select Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views/admin/pages/carousal/edit-carousal.blade.php ENDPATH**/ ?>