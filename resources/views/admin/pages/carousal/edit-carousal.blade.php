@extends('admin.layouts.app')
@section('title', 'Edit Carousal')
@section('h1', 'Edit Carousal')
@section('li', 'Edit Carousal')
@section('content')


    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-md-8 m-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Slider Images</h3>
                    </div>

                    <form enctype="multipart/form-data" action="{{ route('carousal-update' , $carousal->id ) }}" method="POST"
                        class="form-horizontal">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="{{ $carousal->title }}" class="form-control" id="title">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" value="{{ $carousal->description }}" name="description" class="form-control" id="description">
                            </div>

                            <div class="form-group">
                                <label for="image">Select Image</label>
                                <input type="file" name="image" class="form-control" id="image">
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
