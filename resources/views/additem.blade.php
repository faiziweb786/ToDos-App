@extends('layouts.app')
@section('title', 'Add Item')
@section('content')


    <h2>Add items into list</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">

                    <form id="addForm" action="{{ route('storedata') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Full Name"
                                    value="{{ old('name') }}" required>
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                    value="{{ old('email') }}" required>
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col">
                                <input type="text" name="cnic"
                                    class="form-control @error('cnic') is-invalid @enderror" placeholder="National ID"
                                    value="{{ old('cnic') }}" required>
                                <span class="text-danger">
                                    @error('cnic')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                <input type="text" name="pnumber"
                                    class="form-control @error('pnumber') is-invalid @enderror" placeholder="Phone Number"
                                    value="{{ old('pnumber') }}" required>
                                <span class="text-danger">
                                    @error('pnumber')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col">
                                <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
                                    placeholder="DOB" value="{{ old('dob') }}" required>
                                <span class="text-danger">
                                    @error('dob')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                <select class="form-control @error('gender') is-invalid  @enderror" name="gender"
                                    value="{{ old('gender') }}" required>
                                    <option value="">Select Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="O">Other</option>
                                </select>
                                <span class="text-danger">
                                    @error('gender')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col">
                                <select class="form-control @error('country') is-invalid  @enderror" name="country"
                                    value="{{ old('country') }}" required>
                                    <option>Select Country</option>
                                    <option>Pakistan</option>
                                    <option>India</option>
                                    <option>Afghanistan</option>
                                    <option>Sri-lanka</option>
                                    <option>Bangladesh</option>
                                </select>
                                <span class="text-danger">
                                    @error('country')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                <input type="text" name="region"
                                    class="form-control @error('region') is-invalid @enderror" placeholder="Region"
                                    value="{{ old('region') }}" required>
                                <span class="text-danger">
                                    @error('region')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col">
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid @enderror" placeholder="Address"
                                    value="{{ old('address') }}" required>
                                <span class="text-danger">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <button class="btn btn-success d-flex mx-auto col-6 my-4 justify-content-center" id="submit_btn"
                            type="submit">Add
                            Item</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@endsection