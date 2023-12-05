<?php $__env->startSection('title', 'Contact Us'); ?>
<?php $__env->startSection('content'); ?>


<?php if(session('success')): ?>
    <div class="alert alert-success w-50 text-white">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger w-50 text-white">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

    <div class="contact">
        <div class="site_container">
            <h2>contact us</h2>
            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="payment_method_col">
                        <h3>Address</h3>
                        <p>
                            <?php echo e($contact->address); ?>

                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa-solid fa-mobile-button"></i>
                    </div>
                    <div class="payment_method_col">
                        <h3>phone</h3>
                        <p><?php echo e($contact->pnumber); ?></p>
                        <p><?php echo e($contact->opt_number); ?></p>
                        <p><?php echo e($contact->comp_email); ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div class="payment_method_col">
                        <h3>working</h3>
                        <p><?php echo e($contact->start_day); ?> - <?php echo e($contact->end_day); ?> <?php echo e($contact->start_time); ?> - <?php echo e($contact->end_time); ?> </p>
                        <p>Off Days</p>
                        <p><?php echo e($contact->off_day); ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="payment_method_col">
                        <h3>email Address</h3>
                        <p><?php echo e($contact->email); ?></p>
                        <p><?php echo e($contact->opt_email); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="contact_form">
        <div class="row pt-5 mt-5">
            <div class="col-md-6">
                <h3>Contact us</h3>
                <p>If You Are Interested In Talking To Us About A Project, Pleas Send Us A Message</p>
                <div class="icon">
                    <a href="">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-pinterest-p"></i>
                    </a>
                    <a href="">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <form action="<?php echo e(route('message-store')); ?>" method="POST" class="form-horizontal">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control w-75 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                is-invalid
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>" id="name"
                                placeholder="Your Name*">
                        </div>
                        <span class="text-danger">
                            <?php $__errorArgs = ['name'];
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
                            <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control w-75" id="email"
                                placeholder="Your Email*">
                        </div>
                        <span class="text-danger">
                            <?php $__errorArgs = ['email'];
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
                            <input type="text" name="subject" value="<?php echo e(old('subject')); ?>" class="form-control" id="subject" placeholder="Subject">
                        </div>
                        <span class="text-danger">
                            <?php $__errorArgs = ['subject'];
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
                            <textarea name="message" value="<?php echo e(old('message')); ?>" class="form-control" id="message" placeholder="Message*" rows="5"></textarea>
                        </div>
                        <span class="text-danger">
                            <?php $__errorArgs = ['message'];
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
                    <button type="submit" class="btn">send message</button>
                </form>
            </div>
        </div>
    </div>






<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views/user/contact-us.blade.php ENDPATH**/ ?>