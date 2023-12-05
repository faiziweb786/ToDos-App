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

                    <form enctype="multipart/form-data" action="<?php echo e(route('update-slider' , $slider->id)); ?>" method="POST" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo e($slider->title); ?>" id="title">
                            </div>
                        

                            <div class="form-group">
                                <label for="identifier">Identifier</label>
                                <input type="text" name="identifier" value="<?php echo e($slider->identifier); ?>"  class="form-control" id="identifier">
                            </div>

                            <div class="form-group">
                                <label>Arrows</label>
                                <select class="form-control select2 <?php $__errorArgs = ['arrow'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="arrow" style="width: 100%;">
                            <option value="">Select Arrow</option>
                              <option value="1" <?php echo e(($slider->arrow == '1') ? 'Selected' : ''); ?>>show</option>
                              <option value="0" <?php echo e(($slider->arrow == '0') ? 'Selected' : ''); ?>>hide</option>
                                </select>
                            </div>
                            <span class="text-danger">
                                <?php $__errorArgs = ['arrow'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <?php echo e($message); ?>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </span>

                            <div class="form-group">
                                <label>Dots</label>
                                <select class="form-control select2 <?php $__errorArgs = ['dots'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dots" style="width: 100%;">
                            <option value="">Select Dots</option>
                              <option value="1" <?php echo e(($slider->dots == '1') ? 'Selected' : ''); ?>>show</option>
                              <option value="0" <?php echo e(($slider->dots == '0') ? 'Selected' : ''); ?>>hide</option>
                                </select>
                            </div>
                            <span class="text-danger">
                                <?php $__errorArgs = ['dots'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <?php echo e($message); ?>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </span>

                            <div class="form-group">
                                <label>Visiblity Status</label>
                                <select class="form-control select2 <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="status" style="width: 100%;">
                            <option value="">Select status</option>
                              <option value="1" <?php echo e(($slider->status == '1') ? 'Selected' : ''); ?>>Active</option>
                              <option value="0" <?php echo e(($slider->status == '0') ? 'Selected' : ''); ?>>In_Active</option>
                                </select>
                            </div>
                            <span class="text-danger">
                                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <?php echo e($message); ?>

                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </span>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views/admin/pages/carousal/edit-slider.blade.php ENDPATH**/ ?>