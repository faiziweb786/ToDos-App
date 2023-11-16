@extends('admin.layouts.app')
@section('title' , 'Items')
@section('h1' , 'Items')
@section('li' , 'Items')
@section('content')



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
    <div class="col-12 d-flex align-items-center justify-content-end p-3">
        <!-- Button trigger modal -->
        <a href="{{ route('admin-additem') }}" type="submit" class="btn btn-success border border-warning">
            New Item
        </a>
    </div>
</div>



<div class="row">
    <div class="col-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Items</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>CNIC</th>
                            <th>Mobile Number</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Country</th>
                            <th>Religion</th>
                            <th>Address</th>
                            @role('admin')
                            <th>Action</th>
                            @endrole
                            @role('manager')
                            <th>Action</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)                           
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->cnic }}</td>
                                <td>{{ $item->pnumber }}</td>
                                <td>
                                    @if($item->gender == 'M')
                                    Male
                                    @elseif ($item->gender == 'F')
                                    Female
                                    @else
                                    Other                                        
                                    @endif
                                    </td>
                                <td>{{ $item->dob }}</td>
                                <td>{{ $item->country }}</td>
                                <td>{{ $item->religion }}</td>
                                <td>{{ $item->address }}</td>
                                @role('admin')
                                <td class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('admin-edititem' , $item->id ) }}" class="btn btn-primary mr-1">Edit</a>
                                    <a href="{{ route('delete-item' , $item->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                                @endrole
                                @role('manager')
                                <td class="d-flex align-items-center justify-content-center">
                                    <a href="{{ route('admin-edititem' , $item->id ) }}" class="btn btn-primary mr-1">Edit</a>
                                @endrole
                            </tr>
                            @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>CNIC</th>
                            <th>Mobile Number</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>Country</th>
                            <th>Religion</th>
                            <th>Address</th>
                            <th>Action</th>
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