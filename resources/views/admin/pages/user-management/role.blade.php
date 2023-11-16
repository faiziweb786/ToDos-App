@extends('admin.layouts.app')
@section('title', 'Roles')
@section('h1', 'Manage Roles')
@section('li', 'Roles')
@section('content')


    <div class="row">
        <div class="col-10 d-flex align-items-center justify-content-end p-3">
            <!-- Button trigger modal -->
            @role('admin')
            <a href="{{ route('create-role') }}" type="button" class="btn btn-primary">
                Add Role
            </a>
            @endrole
        </div>
    </div>


    <div class="row">
        <div class="col-8 m-auto">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('delete'))
                <div class="alert alert-danger">
                    {{ session('delete') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-evenly">
                    <h3 class="card-title">User Roles</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th class="text-center" style="width: 250px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="d-flex align-items-center justify-content-between">
                                        <a href="{{ route('view-permission' , $role->id) }}" class="btn btn-info">View</a>
                                        @role('admin')
                                        <a href="{{ route('edit-role', $role->id) }}" class="btn btn-primary m-1">Edit</a>
                                        <a href="{{ route('delete-role', $role->id) }}" class="btn btn-danger">Delete</a>
                                        @endrole
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>





@endsection
