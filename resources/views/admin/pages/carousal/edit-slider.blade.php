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

                    <form enctype="multipart/form-data" action="{{ route('update-slider' , $slider->id) }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="card-body">


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $slider->title }}" id="title">
                            </div>
                        

                            <div class="form-group">
                                <label for="identifier">Identifier</label>
                                <input type="text" name="identifier" value="{{ $slider->identifier }}"  class="form-control" id="identifier">
                            </div>

                            <div class="form-group">
                                <label>Arrows</label>
                                <select class="form-control select2 @error('arrow')
                                is-invalid
                            @enderror" name="arrow" style="width: 100%;">
                            <option value="">Select Arrow</option>
                              <option value="1" {{ ($slider->arrow == '1') ? 'Selected' : '' }}>show</option>
                              <option value="0" {{ ($slider->arrow == '0') ? 'Selected' : '' }}>hide</option>
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
                              <option value="1" {{ ($slider->dots == '1') ? 'Selected' : '' }}>show</option>
                              <option value="0" {{ ($slider->dots == '0') ? 'Selected' : '' }}>hide</option>
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
                              <option value="1" {{ ($slider->status == '1') ? 'Selected' : '' }}>Active</option>
                              <option value="0" {{ ($slider->status == '0') ? 'Selected' : '' }}>In_Active</option>
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
    </div>






@endsection
