@extends('admin.layouts.app')
@section('title', 'Permissions')
@section('h1', 'User Permissions')
@section('li' , 'Permissions')
@section('content')


<div class="row">
  <div class="col-10 d-flex align-items-center justify-content-end p-3">
      <!-- Button trigger modal -->
      <a href="" type="submit" class="btn btn-primary">
          Add Permission
      </a>
  </div>
</div>


<div class="row">
    <div class="col-md-8 m-auto">
        <div class="card table-responsive">
            <div class="card-header">
              <h3 class="card-title">User Permissions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th style="width: 150px">Guard Name</th>
                    <th class="text-center" style="width: 100px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>admin.index</td>
                    <td>web</td>
                    <td>
                      <a href="" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>edit.index</td>
                    <td>web</td>
                    <td>
                      <a href="" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>delete.index</td>
                    <td>web</td>
                    <td>
                      <a href="" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
    </div>
</div>





@endsection