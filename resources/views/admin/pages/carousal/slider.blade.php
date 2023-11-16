@extends('admin.layouts.app')
@section('title', 'Create Slider')
@section('h1', 'Create Slider')
@section('li', 'Create Slider')
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
                        <h3 class="card-title">Slider</h3>
                    </div>

                    <form enctype="multipart/form-data" action="{{ route('slider-store') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="card-body">


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title">
                            </div>


                            <div class="form-group">
                                <label for="identifier">Identifier</label>
                                <input type="text" name="identifier" class="form-control" id="identifier">
                            </div>

                            <div class="form-group">
                                <label>Arrows</label>
                                <select class="form-control select2 @error('arrow')
                                is-invalid
                            @enderror" name="arrow" style="width: 100%;">
                            <option value="">Select Arrow</option>
                              <option value="1">show</option>
                              <option value="0">hide</option>
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('arrow')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label>Dots</label>
                                <select class="form-control select2 @error('dots')
                                is-invalid
                            @enderror" name="dots" style="width: 100%;">
                            <option value="">Select Dots</option>
                              <option value="1">show</option>
                              <option value="0">hide</option>
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('dots')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label>Visiblity Status</label>
                                <select class="form-control select2 @error('status')
                                is-invalid
                            @enderror" name="status" style="width: 100%;">
                            <option value="">Select status</option>
                              <option value="1">Active</option>
                              <option value="0">In_Active</option>
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('status')
                                    {{ $message }}
                                @enderror
                            </span>

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
                        <h3 class="card-title">Slider Image</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Identifier</th>
                                    <th>Arrows</th>
                                    <th>Dots</th>
                                    <th>Visiblity Status</th>
                                    <th style="width: 160px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->identifier }}</td>
                                        <td>
                                            @if($slider->arrow == "1")
                                            Show Arrow    
                                            @else
                                                Hide Arrow
                                            @endif
                                            </td>
                                        <td>
                                            @if($slider->dots == "1")
                                            Show Dots    
                                            @else
                                                Hide Dots
                                            @endif
                                        </td>
                                        <td>
                                            @if($slider->status == "1")
                                            Active   
                                            @else
                                            In-Active
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('slider-edit' , $slider->id ) }}" type="submit"
                                                class="btn btn-primary border border-warning">Edit</a>
                                                <a href="{{ route('delete-slider' , $slider->id) }}" type="submit"
                                                    class="btn btn-danger border border-warning">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Identifier</th>
                                    <th>Arrows</th>
                                    <th>Dots</th>
                                    <th>Visiblity Status</th>
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
