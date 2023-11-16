@extends('admin.layouts.app')
@section('title', 'Edit Favicon')
@section('h1', ' Edit Favicon')
@section('li', 'Edit Favicon')
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
                        <h3 class="card-title">Edit FavIcon</h3>
                    </div>

                    <form enctype="multipart/form-data" action="{{ route('update-favicon' , $favicon->id) }}" method="POST"
                        class="form-horizontal">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="image">Select Image</label>
                                <input type="file" name="favicon" class="form-control" id="image">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






@endsection
