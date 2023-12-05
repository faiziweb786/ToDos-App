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

                            {{--  <div class="form-group">
                                <label for="image">Select Image</label>
                                <input type="file" name="favicon" class="form-control" id="image">
                            </div>  --}}

                            <div class="custom-file">
                                <input type="file" name="favicon" class="custom-file-input @error('favicon')
                                    is-invalid
                                @enderror" id="favicon">
                                <label class="custom-file-label col-md-10" for="favicon">
                                    <div class="upload-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 640 512">
                                            <path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z" style="    fill: aquamarine;"/>
                                        </svg>
                                        <div>Upload FavIcon</div>
                                    </div>
                                </label>
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
            <div class="col-md-10 m-auto">
                <div class="card table-responsive">
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
