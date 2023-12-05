@extends('admin.layouts.app')
@section('title', 'Edit Contact Page')
@section('h1', 'Edit Contact Page')
@section('li', 'Edit Contact Page')
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
                        <h3 class="card-title">Edit Contact Page</h3>
                    </div>

                    <form action="{{ route('update-contact' , $contact->id ) }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" value="{{ $contact->address }}" class="form-control @error('address')
                                is-invalid                                    
                                @enderror" id="address">
                            </div>
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label for="pnumber">Phone Number</label>
                                <input type="text" name="pnumber" value="{{ $contact->pnumber }}"  class="form-control @error('pnumber')
                                is-invalid                                    
                                @enderror" id="pnumber">
                            </div>
                            <span class="text-danger">
                                @error('pnumber')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label for="opt_number">Optional Number</label>
                                <input type="text" name="opt_number" value="{{ $contact->opt_number }}"  class="form-control @error('opt_number')
                                is-invalid                                    
                                @enderror" id="opt_number">
                            </div>
                            <span class="text-danger">
                                @error('opt_number')
                                    {{ $message }}
                                @enderror
                            </span>


                            <div class="form-group pt-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $contact->email }}"  class="form-control @error('email')
                                is-invalid                                    
                                @enderror" id="email">
                            </div>
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label for="opt_email">Optional Email</label>
                                <input type="email" name="opt_email" value="{{ $contact->opt_email }}"  class="form-control @error('opt_email')
                                is-invalid                                    
                                @enderror" id="opt_email">
                            </div>
                            <span class="text-danger">
                                @error('opt_email')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label for="comp_email">Company Email</label>
                                <input type="email" name="comp_email" value="{{ $contact->comp_email }}"  class="form-control @error('comp_email')
                                is-invalid                                    
                                @enderror" id="comp_email">
                            </div>
                            <span class="text-danger">
                                @error('comp_email')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label for="start_day">Starting Day</label>
                                <input type="text" name="start_day" value="{{ $contact->start_day }}"  class="form-control @error('start_day')
                                is-invalid                                    
                                @enderror" id="start_day">
                            </div>
                            <span class="text-danger">
                                @error('start_day')
                                    {{ $message }}
                                @enderror
                            </span>


                            <div class="form-group">
                                <label for="end_day">Ending Day</label>
                                <input type="text" name="end_day" value="{{ $contact->end_day }}"  class="form-control @error('end_day')
                                is-invalid                                    
                                @enderror" id="end_day">
                            </div>
                            <span class="text-danger">
                                @error('end_day')
                                    {{ $message }}
                                @enderror
                            </span>


                            <div class="form-group">
                                <label for="off_day">Off Days</label>
                                <input type="text" name="off_day" value="{{ $contact->off_day }}"  class="form-control @error('off_day')
                                is-invalid                                    
                                @enderror" id="off_day">
                            </div>
                            <span class="text-danger">
                                @error('off_day')
                                    {{ $message }}
                                @enderror
                            </span>


                            <div class="form-group">
                                <label for="start_time">Time Start</label>
                                <input type="time" name="start_time" value="{{ $contact->start_time }}"  class="form-control @error('start_time')
                                is-invalid                                    
                                @enderror" id="start_time">
                            </div>
                            <span class="text-danger">
                                @error('start_time')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label for="end_time">Time End</label>
                                <input type="time" name="end_time" value="{{ $contact->end_time }}"  class="form-control @error('end_time')
                                is-invalid                                    
                                @enderror" id="end_time">
                            </div>
                            <span class="text-danger">
                                @error('end_time')
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





    @endsection
