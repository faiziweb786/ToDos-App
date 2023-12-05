@extends('admin.layouts.app')
@section('title', 'Edit Page')
@section('h1', 'Edit Page')
@section('li', 'Edit Page')
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

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Slider Page</h3>
            </div>
            <form enctype="multipart/form-data" action="{{ route('update-page' , $page->id) }}" method="POST"
                class="form-horizontal">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="page_title">Page Name</label>
                        <input type="text" name="page_title" class="form-control @error('page_title')
                        is-invalid                                    
                        @enderror" placeholder="Page Name" value="{{ $page->page_title }}" id="page_title">
                    </div>
                    <span class="text-danger">
                        @error('page_title')
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