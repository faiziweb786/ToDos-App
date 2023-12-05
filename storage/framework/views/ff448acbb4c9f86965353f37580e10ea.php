<?php $__env->startSection('title', 'About Us'); ?>
<?php $__env->startSection('content'); ?>


<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('carousel', ['identifier' => $identifier]);

$__html = app('livewire')->mount($__name, $__params, 'UCztrhf', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views/user/about-us.blade.php ENDPATH**/ ?>