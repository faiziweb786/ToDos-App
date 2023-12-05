@extends('admin.layouts.app')
@section('title', 'Edit Services')
@section('h1', 'Edit Services')
@section('li', 'Edit Services')
@section('content')


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
                <h3 class="card-title">Edit Services</h3>
            </div>

            <form enctype="multipart/form-data" action="{{ route('update-service' , $service->id) }}" method="POST" class="form-horizontal">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control @error('title')
                        is-invalid                                    
                        @enderror" value="{{ $service->title }}" id="title">
                    </div>
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>


                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control @error('description')
                        is-invalid                                    
                        @enderror" value="{{ $service->description }}" id="description">
                    </div>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>

                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input @error('image')
                            is-invalid
                        @enderror" id="image">
                        <label class="custom-file-label col-md-11" for="image">
                            <div class="upload-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 640 512">
                                    <path d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z" style="    fill: aquamarine;"/>
                                </svg>
                                <div>Upload Image</div>
                            </div>
                        </label>
                    </div>
                    <span class="text-danger">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
