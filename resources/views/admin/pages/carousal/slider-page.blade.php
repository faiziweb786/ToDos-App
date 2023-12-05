@extends('admin.layouts.app')
@section('title', 'Slider Page')
@section('h1', 'Slider Page')
@section('li', 'Slider Page')
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
                        <h3 class="card-title">Slider Page</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('page-store') }}" method="POST"
                        class="form-horizontal">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="page_title">Page Name</label>
                                <input type="text" name="page_title" class="form-control @error('page_title')
                                is-invalid                                    
                                @enderror" placeholder="Page Name" id="page_title">
                            </div>
                            <span class="text-danger">
                                @error('page_title')
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
            <div class="col-md-11 m-auto">
                <div class="card table-responsive">
                    <div class="card-header">
                        <h3 class="card-title">Slider Page</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Page Name</th>
                                    <th style="width: 160px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>{{ $page->id }}</td>
                                        <td>{{ $page->page_title }}</td>
                                        <td>
                                            <a href="{{ route('page-edit' , $page->id) }}" type="submit"
                                                class="btn btn-primary border border-warning">Edit</a>
                                                <a href="{{ route('page-delete' , $page->id) }}" type="submit"
                                                    class="btn btn-danger border border-warning">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Page Name</th>
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
