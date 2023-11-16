@extends('admin.layouts.app')
@section('title', 'Users')
@section('h1', 'Users')
@section('li', 'Users')
@section('content')


    <div class="row">
        <div class="col-11 d-flex align-items-center justify-content-end p-3">
            <!-- Button trigger modal -->
            <a href="{{ route('adduser') }}" type="submit" class="btn btn-success border border-warning">
                New User
            </a>
        </div>
    </div>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        </div> 
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
        </div> 
    @endif

    <div class="row">
        <div class="col-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Register Users</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th style="width: 160px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="d-flex align-items-center justify-content-between">
                                        @role('admin')
                                        <a href="{{ route('editusers', $user->id) }}" type="submit"
                                            class="btn btn-primary border border-warning">Edit</a>
                                            <a href="{{ route('deleteuser', $user->id) }}" type="submit"
                                                class="btn btn-danger border border-warning">Delete</a>
                                         @endrole


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
@endsection

<!-- jQuery -->
@section('script')
    <!-- page script -->
    <script>
       // $(function() {
           // $("#example1").DataTable({
             //   "responsive": true,
             //   "autoWidth": false,
           // });
           // $('#example2').DataTable({
               // "paging": true,
               // "lengthChange": false,
               // "searching": false,
               // "ordering": true,
               // "info": true,
                //"autoWidth": false,
                //"responsive": true,
          //  });
        //});

    </script>
@endsection
