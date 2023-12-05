<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>





    <div class="row d-flex align-items-center justify-content-between mx-auto mb-5 rounded py-4"
        style="background-color: aquamarine">
        <div class="col-md-6">
            <h2 class="website_h display-4">welcome to our ToDo app</h2>
            <p class="website_p mx-1">Welcome To Our Application! We're Thrilled To Have You On Board As Part Of Our Growing
                Community. Whether
                You're Here To Simplify Your Daily Tasks. Thank You For Choosing Our Application. We Can't Wait To Embark On
                This Exciting Journey With You. Let's Get Started!</p>
            <span class="alert text-white mx-auto d-none d-md-table">To known our system please visit ITems</span>
        </div>
        <div class="col-md-6">
            <img src="<?php echo e(asset('/storage/' . Auth::user()->profile_image)); ?>" alt="<?php echo e(auth()->user()->name); ?>"
                class="img-fluid rounded-circle m-auto d-flex">
        </div>
    </div>

    


    

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('carousel', ['identifier' => $identifier]);

$__html = app('livewire')->mount($__name, $__params, 'fNnNJcv', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views/user/home.blade.php ENDPATH**/ ?>