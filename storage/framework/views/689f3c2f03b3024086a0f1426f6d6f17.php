
<?php $__env->startSection('title', 'Services'); ?>
<?php $__env->startSection('content'); ?>

<div class="services" id="services">
    <div class="site_container">
        <h2>our services</h2>
        <div class="row">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="icon">
                        <img src="<?php echo e(asset('storage/service/' . $service->image)); ?>" width="100px"
                            height="100px" class="img-fluid rounded-circle pb-3" alt="">
                    </div>
                    <div class="payment_method_col">
                        <h5><?php echo e($service->title); ?></h5>
                        <p><?php echo e($service->description); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views/user/services.blade.php ENDPATH**/ ?>