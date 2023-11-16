
<?php $__env->startSection('title', 'Roles'); ?>
<?php $__env->startSection('h1', 'Manage Roles'); ?>
<?php $__env->startSection('li' , 'Roles'); ?>
<?php $__env->startSection('content'); ?>


<div class="container-fluid">
  <div class="row">
      <!-- left column -->
      <div class="col-md-10 m-auto">
          <!-- jquery validation -->
          <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">Add Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="<?php echo e(route('store-role')); ?>">
                <?php echo csrf_field(); ?>
                  <div class="card-body">
                      <div class="form-group">
                          <label for="roleName">Role Name</label>
                          <input type="text" name="name" class="form-control" id="roleName"
                              placeholder="Role Name">
                      </div>

                      <div class="form-group pt-5">
                        <span class="alert alert-primary">Add Permissions</span>
                      </div>

                    
                    <label class="pt-4">Users Permissions</label>   
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                 
                    <div class="form-check">
                      <input class="form-check-input" name="permissions[]" type="checkbox" value="<?php echo e($permission->name); ?>" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        <?php echo e($permission['name']); ?>

                      </label>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                    

                    




                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Add Role</button>
                  </div>
              </form>
          </div>
          <!-- /.card -->
      </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
  </div>
  <!-- /.row -->
</div>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->





<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\login_registration\resources\views\admin\pages\user-management\addRole.blade.php ENDPATH**/ ?>