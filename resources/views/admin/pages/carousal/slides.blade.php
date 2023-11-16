@extends('admin.layouts.app')
@section('title', 'Create Slides')
@section('h1', 'Create Slides')
@section('li', 'Create Slides')
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

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Slides</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('store-slide') }}" method="POST"
                        class="form-horizontal">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label>Slider Name</label>
                                <select class="form-control select2 @error('uname')
                                is-invalid
                            @enderror" name="slider_id" style="width: 100%;">
                            <option value="">Select slider</option>
                            @foreach ($sliders as $slider)
                              <option value="{{ $slider->id }}">{{ $slider->title }}</option>
                              @endforeach
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('slider_id')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>

                            <div class="form-group">
                                <label for="text">Text</label>
                                <input type="text" name="text" class="form-control" id="text">
                            </div>

                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" class="form-control" id="link">
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
            <div class="col-11 m-auto">
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
                                    <th>Slider Name</th>
                                    <th>Title</th>
                                    <th>Text</th>
                                    <th>Link</th>
                                    <th class="text-center">Images</th>
                                    <th style="width: 160px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $slide)
                                    <tr>
                                        <td>{{ $slide->id }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slide->title }}</td>
                                        <td>{{ $slide->text }}</td>
                                        <td>{{ $slide->link }}</td>
                                        <td><img class="d-block mx-auto rounded-circle" src="{{ asset('storage/slide/' . $slide->image ) }}" width="150px" height="100px" alt=""></td>
                                        
                                        <td>
                                            <a href="{{ route('edit-slide' , $slide->id ) }}" type="submit"
                                                class="btn btn-primary border border-warning">Edit</a>
                                                <a href="{{ route('delete-slide' , $slide->id) }}" type="submit"
                                                    class="btn btn-danger border border-warning">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Slider Name</th>
                                    <th>Title</th>
                                    <th>Text</th>
                                    <th>Link</th>
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
