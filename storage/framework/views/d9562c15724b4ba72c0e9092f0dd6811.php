<div class="container">
    <!--[if BLOCK]><![endif]--><?php if($sliders): ?>
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!--[if BLOCK]><![endif]--><?php if($slider->status == 1): ?>
                <div id="myCarousel<?php echo e($slider->id); ?>" class="carousel slide mx-auto" data-ride="carousel"
                    data-interval="4000">
                    <!--[if BLOCK]><![endif]--><?php if($slider->dots == 1): ?>
                        <ol class="carousel-indicators">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $slider->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li data-target="#myCarousel<?php echo e($slider->id); ?>" data-slide-to="<?php echo e($loop->index); ?>"
                                    class="<?php if($loop->first): ?> active <?php endif; ?>"></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                        </ol>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    <div class="carousel-inner">
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $slider->slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="carousel-item <?php if($loop->first): ?> active <?php endif; ?>">
                                <div class="row pt-4 mt-4">
                                    <div class="col-md-6 testure text-center text-light">
                                        <div class="text">
                                            <h2><?php echo e($slide->title); ?></h2>
                                             <p><?php echo e($slide->text); ?></p>
                                            <a href="<?php echo e($slide->link); ?>" class="btn">Button</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 w-100">
                                        <img class="img-fluid d-block mx-auto rounded"
                                            src="<?php echo e(asset('storage/slide/' . $slide->image)); ?>" alt="...">
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <!--[if BLOCK]><![endif]--><?php if($slider->arrow == 1): ?>
                        <a class="carousel-control-prev" href="#myCarousel<?php echo e($slider->id); ?>" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel<?php echo e($slider->id); ?>" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH D:\project\login_registration\resources\views/livewire/carousel.blade.php ENDPATH**/ ?>