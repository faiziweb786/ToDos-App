<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(route('admin-index')); ?>" class="nav-link">Home</a>
      </li>
      
    </ul>

    
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Logout -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?php echo e(route('profile' , auth()->user()->id)); ?>" class="dropdown-item"><?php echo e(__('Profile')); ?></a>

            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <?php echo e(__('Logout')); ?>

            </a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                class="d-none">
                <?php echo csrf_field(); ?>
            </form>
      </li>

    </ul>
  </nav><?php /**PATH D:\project\login_registration\resources\views/admin/partial/navbar.blade.php ENDPATH**/ ?>