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
                    <form enctype="multipart/form-data" action="{{ route('update-slide' , $slide->id ) }}" method="POST"
                        class="form-horizontal">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label>Slider Name</label>
                                <select
                                    class="form-control select2 @error('uname')
                                is-invalid
                            @enderror"
                                    name="slider_id" style="width: 100%;">
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
                                <input type="text" name="title" class="form-control" value="{{ $slide->title }}" id="title">
                            </div>

                            <div class="form-group">
                                <label for="text">Text</label>
                                <input type="text" name="text" value="{{ $slide->text }}" class="form-control" id="text">
                            </div>

                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" value="{{ $slide->link }}" class="form-control" id="link">
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
    </div>






@endsection
