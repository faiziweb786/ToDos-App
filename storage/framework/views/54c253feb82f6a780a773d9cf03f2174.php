
<?php $__env->startSection('title', 'Create Slider'); ?>
<?php $__env->startSection('h1', 'Create Slider'); ?>
<?php $__env->startSection('li', 'Create Slider'); ?>
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

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Slider</h3>
                    </div>

                    <form enctype="multipart/form-data" action="<?php echo e(route('slider-store')); ?>" method="POST" class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>


                            <div class="form-group">
                                <label for="identifier">Identifier</label>
                                <input type="text" name="identifier" class="form-control" id="identifier">
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
                              <option value="1">show</option>
                              <option value="0">hide</option>
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
                              <option value="1">show</option>
                              <option value="0">hide</option>
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
                              <option value="1">Active</option>
                              <option value="0">In_Active</option>
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
                                    <th>Identifier</th>
                                    <th>Arrows</th>
                                    <th>Dots</th>
                                    <th>Visiblity Status</th>
                                    <th style="width: 160px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($slider->id); ?></td>
                                        <td><?php echo e($slider->title); ?></td>
                                        <td><?php echo e($slider->identifier); ?></td>
                                        <td>
                                            <?php if($slider->arrow == "1"): ?>
                                            Show Arrow    
                                            <?php else: ?>
                                                Hide Arrow
                                            <?php endif; ?>
                                            </td>
                                        <td>
                                            <?php if($slider->dots == "1"): ?>
                                            Show Dots    
                                            <?php else: ?>
                                                Hide Dots
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($slider->status == "1"): ?>
                                            Active   
                                            <?php else: ?>
                                            In-Active
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('slider-edit' , $slider->id )); ?>" type="submit"
                                                class="btn btn-primary border border-warning">Edit</a>
                                                <a href="<?php echo e(route('delete-slider' , $slider->id)); ?>" type="submit"
                                                    class="btn btn-danger border border-warning">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Identifier</th>
                                    <th>Arrows</th>
                                    <th>Dots</th>
                                    <th>Visiblity Status</th>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views\admin\pages\carousal\slider.blade.php ENDPATH**/ ?>