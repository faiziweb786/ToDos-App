@extends('admin.layouts.app')
@section('title', 'Roles')
@section('h1', 'Manage Roles')
@section('li' , 'Roles')
@section('content')


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
              <form method="POST" action="{{ route('store-role') }}">
                @csrf
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
                    @foreach ($permissions as $permission)                 
                    <div class="form-check">
                      <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission->name }}" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        {{ $permission['name'] }}
                      </label>
                    </div>
                    @endforeach 

                    {{--  <div class="form-check pt-2">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        View-Users
                      </label>
                    </div>  --}}

                    {{--  <div class="form-check pt-2">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Edit-Users
                      </label>
                    </div>

                    <div class="form-check pt-2">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Delete-Users
                      </label>
                    </div>

                 
                   <label class="pt-4">Items Permissions</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Create-Items
                      </label>
                    </div>

                    <div class="form-check pt-2">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        View-Items
                      </label>
                    </div>

                    <div class="form-check pt-2">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Edit-Items
                      </label>
                    </div>

                    <div class="form-check pt-2">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Delete-Items
                      </label>
                    </div>  --}}




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





@endsection