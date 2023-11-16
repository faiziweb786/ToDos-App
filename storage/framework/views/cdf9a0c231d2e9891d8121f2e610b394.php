
<?php $__env->startSection('title', 'Create Slides'); ?>
<?php $__env->startSection('h1', 'Create Slides'); ?>
<?php $__env->startSection('li', 'Create Slides'); ?>
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
                        <h3 class="card-title">Slides</h3>
                    </div>
                    <form enctype="multipart/form-data" action="<?php echo e(route('store-slide')); ?>" method="POST"
                        class="form-horizontal">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">

                            <div class="form-group">
                                <label>Slider Name</label>
                                <select class="form-control select2 <?php $__errorArgs = ['uname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="slider_id" style="width: 100%;">
                            <option value="">Select slider</option>
                            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($slider->id); ?>"><?php echo e($slider->title); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <span class="text-danger">
                                <?php $__errorArgs = ['slider_id'];
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
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>

                            <div class="form-group">
                                <label for="text">Text</label>
                                <input type="text" name="text" class="form-control" id="text">
                            </div>

                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" class="form-control" id="link">
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
            <div class="col-11 m-auto">
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
                                    <th>Slider Name</th>
                                    <th>Title</th>
                                    <th>Text</th>
                                    <th>Link</th>
                                    <th class="text-center">Images</th>
                                    <th style="width: 160px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($slide->id); ?></td>
                                        <td><?php echo e($slider->title); ?></td>
                                        <td><?php echo e($slide->title); ?></td>
                                        <td><?php echo e($slide->text); ?></td>
                                        <td><?php echo e($slide->link); ?></td>
                                        <td><img class="d-block mx-auto rounded-circle" src="<?php echo e(asset('storage/slide/' . $slide->image )); ?>" width="150px" height="100px" alt=""></td>
                                        
                                        <td>
                                            <a href="<?php echo e(route('edit-slide' , $slide->id )); ?>" type="submit"
                                                class="btn btn-primary border border-warning">Edit</a>
                                                <a href="<?php echo e(route('delete-slide' , $slide->id)); ?>" type="submit"
                                                    class="btn btn-danger border border-warning">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Slider Name</th>
                                    <th>Title</th>
                                    <th>Text</th>
                                    <th>Link</th>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views/admin/pages/carousal/slides.blade.php ENDPATH**/ ?>