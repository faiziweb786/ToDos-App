@extends('admin.layouts.app')
@section('title', 'Favicon')
@section('h1', 'Favicon')
@section('li', 'Favicon')
@section('content')


    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-md-8 m-auto">

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

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">FavIcon</h3>
                    </div>

                    <form enctype="multipart/form-data" action="{{ route('add-favicon') }}" method="POST"
                        class="form-horizontal">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="image">Select Image</label>
                                <input type="file" name="favicon" class="form-control" id="image">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-10 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">FavIcon</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">FavIcon</th>
                                    <th style="width: 160px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($favicons as $favicon)
                                    <tr>
                                        <td>{{ $favicon->id }}</td>
                                        <td>
                                            <img class="d-flex m-auto rounded-circle"
                                                src="{{ asset('storage/favicon/' . $favicon->favicon) }}" width="70px"
                                                height="70px" alt="">
                                        </td>
                                        <td>
                                            <a href="{{ route('edit-favicon', $favicon->id) }}" type="submit"
                                                class="btn btn-primary border border-warning">Edit</a>
                                            <a href="{{ route('delete-favicon', $favicon->id) }}" type="submit"
                                                class="btn btn-danger border border-warning">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">FavIcon</th>
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






    @endsection
