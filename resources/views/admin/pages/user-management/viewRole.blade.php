@extends('admin.layouts.app')
@section('title', 'Roles')
@section('h1', 'View Roles')
@section('li' , 'Roles')
@section('content')


<div class="container-fluid">
  <div class="row">
      <!-- left column -->
      <div class="col-md-10 m-auto">
          <!-- jquery validation -->
          <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">View Role</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="" action="">
                @csrf
                  <div class="card-body">
                      <div class="form-group">
                          <label for="roleName">Role Name</label>
                          <input type="text" name="name" class="form-control" value="{{ $role->name }}" id="roleName"
                              placeholder="Role Name" readonly>
                      </div>

                      <div class="form-group pt-5">
                        <span class="alert alert-primary">Given Permissions</span>
                      </div>

                    
                    <label class="pt-4">Role Permissions</label>   
                    @foreach ($permissions as $permissions)                 
                    <div class="form-check">
                      <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permissions->name }}" {{ $role->hasPermissionTo($permissions->name) ? 'checked' : ''}} checked onclick="return false;">
                      <label class="form-check-label" for="flexCheckDefault">
                        {{ $permissions['name'] }}
                      </label>
                    </div>
                    @endforeach 

                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                      <a href="{{ route('view-role') }}" type="submit" class="btn btn-primary">Back</a>
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





@endsection