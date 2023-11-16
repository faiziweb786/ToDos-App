<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>




    <div class="home_inner mb-5">
        <div class="home_col">
            <h2 class="welcome_h">welcome to our ToDo app</h2>
            <p class="welcome_p">Welcome To Our Application! We're Thrilled To Have You On Board As Part Of Our Growing Community. Whether
                You're Here To Simplify Your Daily Tasks. Thank You For Choosing Our Application. We Can't Wait To Embark On
                This Exciting Journey With You. Let's Get Started!</p>
            <span class="alert ml-5 text-white">To known our system please visit ITems</span>
        </div>
        <div class="home_col">
                    <img src="<?php echo e(asset('storage/'. auth()->user()->profile_image)); ?>" alt="<?php echo e(auth()->user()->name); ?>" width="300px"
                        height="300px" style="margin-right:50px" class="rounded-circle">
        </div>
    </div>

    <div id="myCarousal" class="carousel slide" data-ride="carousel" data-interval="2000">
        <ol class="carousel-indicators">
            <?php if($carousals): ?>
                <?php $__currentLoopData = $carousals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carousal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?>
                        <li data-target="#myCarousal" data-slide-to="0" class="active"></li>
                    <?php else: ?>
                        <li data-target="#myCarousal" data-slide-to="1"></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ol>
        <div class="carousel-inner rounded">
            <?php if($carousals): ?>
                <?php $__currentLoopData = $carousals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carousal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php if($loop->first): ?> active <?php endif; ?>">

                        <img class="d-block w-100" src="<?php echo e(asset('storage/carousal/' . $carousal->image)); ?>"
                            alt="<?php echo e($carousal->id); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousal" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousal" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    
    <?php if($sliders): ?>
    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($slider->status == 1): ?>
            <div id="myCarousal" class="carousel slide" data-ride="carousel" data-interval="4000">
                <?php if($slider->dots == 1): ?>
                    <ol class="carousel-indicators">
                            <?php $__currentLoopData = $slider->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->first): ?>
                                    <li data-target="#myCarousal" data-slide-to="0" class="active"></li>
                                <?php else: ?>
                                    <li data-target="#myCarousal" data-slide-to="1"></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                <?php endif; ?>
                <div class="carousel-inner rounded">
                    <?php $__currentLoopData = $slider->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php if($loop->first): ?> active <?php endif; ?>"
                            style="padding: 50px 0 0 110px">
                            <img class="rounded" src="<?php echo e(asset('storage/slide/' . $slide->image)); ?>" width="500px"
                                height="300px" alt="...">
                            <div class="carousel-caption d-none d-md-block" style="left: 54% !important; width: 400px">
                                <h2><?php echo e($slide->title); ?></h2>
                                <p><?php echo e($slide->text); ?></p>
                                <a href="<?php echo e($slide->link); ?>" class="btn btn-success">Button</a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if($slider->arrow == 1): ?>
                    <a class="carousel-control-prev" href="#myCarousal" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousal" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views\user\home.blade.php ENDPATH**/ ?>