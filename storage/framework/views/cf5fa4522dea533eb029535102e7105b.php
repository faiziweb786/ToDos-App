<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
              <a class="navbar-brand text-white" href="<?php echo e(route('welcome')); ?>">
              <?php if($logo = \App\Models\Logo::first()): ?>
                  <img class="img-fluid rounded-circle border-danger" src="<?php echo e(asset('storage/logo/' . $logo->image)); ?>" width="100px" height="100px" alt="Photo">
              <?php endif; ?>
              </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars" style="color: #f9fafa;"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('about-us')); ?>"><?php echo e(__('About')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('viewdata')); ?>"><?php echo e(__('Items')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('services')); ?>#services"><?php echo e(__('services')); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('contact-us')); ?>"><?php echo e(__('Contact')); ?></a>
          </li>
             
        </ul>
         <ul class="navbar-nav me-auto mb-lg-0">
             <!-- Authentication Links -->
              <?php if(auth()->guard()->guest()): ?>
                  <?php if(Route::has('login')): ?>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                      </li>
                  <?php endif; ?>
  
                  <?php if(Route::has('register')): ?>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                      </li>
                  <?php endif; ?>
                  <?php else: ?>
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        <?php echo e(Auth::user()->name); ?>

                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </li>
              <?php endif; ?>
         </ul>
      </div>
    </div>
  </nav>
  <?php /**PATH D:\project\login_registration\resources\views/user/partial/header.blade.php ENDPATH**/ ?>