@extends('admin.layouts.app')
@section('title', 'Forms')
@section('h1' , 'Add Forms')
@section('li' , 'Forms')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-10 m-auto">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Item</h3>
                    </div>
                    <!-- /.card-header -->


                    <!-- form start -->
                    <form action="{{ route('admin-storeitem') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name"
                                    placeholder="Enter Name" required>
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </div>

                            <div class="form-group">
                                <label>User Name</label>
                                <select class="form-control select2 @error('uname')
                                is-invalid
                            @enderror" name="user_id" style="width: 100%;">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                              <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                            <option value="test">Testing</option>
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('user_id')
                                    {{ $message }}
                                @enderror
                            </span>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') 
                                         is-invalid
                                 @enderror" id="email" 
                                    placeholder="Email" required>
                                    <span class="text-danger">
                                        @error('email')
                                        {{ $message }}
                                        @enderror
                                    </span>
                            </div>
                            <div class="form-group">
                                <label for="cnic">CNIC</label>
                                <input type="number" name="cnic" class="form-control @error('cnic')
                                    is-invalid
                                @enderror" id="cnic" value="{{ old('cnic') }}"
                                    placeholder="CNIC" required>
                            </div>
                            <span class="text-danger">
                                @error('cnic')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label for="pnumber">Mobile Number</label>
                                <input type="number" name="pnumber" class="form-control @error('pnumber')
                                    is-invalid
                                @enderror" id="cnic" value="{{ old('pnumber') }}"
                                    placeholder="Mobile Number" required>
                            </div>
                            <span class="text-danger">
                                @error('pnumber')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control select2 @error('gender')
                                is-invalid
                            @enderror" name="gender" style="width: 100%;">
                                  <option selected="selected" value="M">Male</option>
                                  <option value="F">Female</option>
                                  <option value="O">Other</option>
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('gender')
                                    {{ $message }}
                                @enderror
                            </span>


                            <div class="form-group">
                                <label for="dob">DOB</label>
                                <input type="date" name="dob" class="form-control @error('dob')
                                    is-invalid
                                @enderror" id="dob" value="{{ old('dob') }}"
                                    placeholder="DOB" required>
                            </div>
                            <span class="text-danger">
                                @error('pnumber')
                                    {{ $message }}
                                @enderror
                            </span>

                            <div class="form-group">
                                <label>Country</label>
                                <select class="form-control select2 @error('country')
                                is-invalid
                            @enderror" name="country" style="width: 100%;">
                                  <option selected="selected">Pakistan</option>
                                  <option>India</option>
                                  <option>Afghanistan</option>
                                  <option>Bangladesh</option>
                                  <option>Iran</option>
                                  <option>Sri-lanka</option>
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('country')
                                    {{ $message }}
                                @enderror
                            </span>


                            <div class="form-group">
                                <label>Religion</label>
                                <select class="form-control select2 @error('religion')
                                is-invalid
                            @enderror" name="religion" style="width: 100%;">
                                  <option selected="selected">Muslim</option>
                                  <option>Non-Muslim</option>
                                </select>
                            </div>
                            <span class="text-danger">
                                @error('religion')
                                    {{ $message }}
                                @enderror
                            </span>


                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control @error('dob')
                                    is-invalid
                                @enderror" id="address" value="{{ old('address') }}"
                                    placeholder="Address" required>
                            </div>
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>



                        </div>
                     
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary form-control border border-warning">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

@endsection

@section('script')


@endsection
