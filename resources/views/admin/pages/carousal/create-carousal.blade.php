@extends('admin.layouts.app')
@section('title', 'Create Carousal')
@section('h1', 'Create Carousal')
@section('li', 'Create Carousal')
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
                        <h3 class="card-title">Slider Images</h3>
                    </div>

                    <form enctype="multipart/form-data" action="{{ route('carousal-store') }}" method="POST"
                        class="form-horizontal">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" id="description">
                            </div>

                            <div class="form-group">
                                <label for="image">Select Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-10 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Slider Image</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class="text-center">Images</th>
                                    <th style="width: 160px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carousals as $carousal)
                                    <tr>
                                        <td>{{ $carousal->id }}</td>
                                        <td>{{ $carousal->title }}</td>
                                        <td>{{ $carousal->description }}</td>
                                        <td><img class="d-block mx-auto rounded-circle"
                                                src="{{ asset('storage/carousal/' . $carousal->image) }}" width="150px"
                                                height="100px" alt=""></td>

                                        <td>
                                            <a href="{{ route('carousal-edit', $carousal->id) }}" type="submit"
                                                class="btn btn-primary border border-warning">Edit</a>
                                            <a href="{{ route('carousal-delete', $carousal->id) }}" type="submit"
                                                class="btn btn-danger border border-warning">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class="text-center">Image</th>
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
