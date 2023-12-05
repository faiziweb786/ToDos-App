@extends('admin.layouts.app')
@section('title', 'Contact Page')
@section('h1', 'Contact Page')
@section('li', 'Contact Page')
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
                        <h3 class="card-title">Contact Page</h3>
                    </div>

                    <form action="{{ route('store-contact') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" value="{{ old('address') }}" class="form-control @error('address')
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
                                <input type="text" name="pnumber" value="{{ old('pnumber') }}"  class="form-control @error('pnumber')
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
                                <input type="text" name="opt_number" value="{{ old('opt_number') }}"  class="form-control @error('opt_number')
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
                                <input type="email" name="email" value="{{ old('email') }}"  class="form-control @error('email')
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
                                <input type="email" name="opt_email" value="{{ old('opt_email') }}"  class="form-control @error('opt_email')
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
                                <input type="email" name="comp_email" value="{{ old('comp_email') }}"  class="form-control @error('comp_email')
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
                                <input type="text" name="start_day" value="{{ old('start_day') }}"  class="form-control @error('start_day')
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
                                <input type="text" name="end_day" value="{{ old('end_day') }}"  class="form-control @error('end_day')
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
                                <input type="text" name="off_day" value="{{ old('off_day') }}"  class="form-control @error('off_day')
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
                                <input type="time" name="start_time" value="{{ old('start_time') }}"  class="form-control @error('start_time')
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
                                <input type="time" name="end_time" value="{{ old('end_time') }}"  class="form-control @error('end_time')
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


        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card table-responsive">
                    <div class="card-header">
                        <h3 class="card-title">Contact Page</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>email</th>
                                    <th>Starting Day</th>
                                    <th>Ending Day</th>
                                    <th>Time Start</th>
                                    <th>End Start</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ Str::words($contact->address , 4) }}</td>
                                    <td>{{ $contact->pnumber }}</td>
                                    <td>{{ Str::limit($contact->email, 8) }}</td>
                                    <td>{{ Str::limit($contact->start_day, 3) }}</td>
                                    <td>{{ Str::limit($contact->end_day, 9) }}</td>
                                    <td>{{ $contact->start_time }}</td>
                                    <td>{{ $contact->end_time }}</td>
                                    <td>
                                        <a href="{{ route('edit-contact', $contact->id ) }}" type="submit"
                                            class="btn btn-primary border border-warning"
                                            >Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>email</th>
                                    <th>Starting Day</th>
                                    <th>Ending Day</th>
                                    <th>Time Start</th>
                                    <th>End Start</th>
                                    <th>Action</th>
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
