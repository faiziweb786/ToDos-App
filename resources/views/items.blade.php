@extends('layouts.app')
@section('title', 'ToDo Items')
@section('content')



    <!-- Trigger the modal with a button -->


    {{--  Adding Form Data Modal  --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="false">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content bg-dark">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Add items into list</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <form id="addForm">
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
                                <input type="number" name="cnic"
                                    class="form-control @error('cnic') is-invalid @enderror" placeholder="National ID"
                                    value="{{ old('cnic') }}" required>
                                <span class="text-danger">
                                    @error('cnic')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                <input type="number" name="pnumber"
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
                        <button class="btn btn-success d-flex mx-auto col-6 my-4 justify-content-center" type="submit">Add
                            Item</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    {{--  End Adding Form Data Model  --}}



    {{--  For response message   --}}
    <div id="successMessage" class="alert alert-success" style="display:none;"></div>
    <div id="errorMessage" class="alert alert-danger" style="display:none;"></div>





    {{--  Edit Form Model Start Here  --}}

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
        aria-hidden="false">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content bg-dark">
                <div class="modal-header border-0">
                    <h4 class="modal-title">Edit & Update items</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <form id="editForm">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Full Name"
                                    {{--  value="{{ $data['name'] }}">  --}}
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                <input type="text" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                    value="">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col">
                                <input type="number" name="cnic" id="cnic"
                                    class="form-control @error('cnic') is-invalid @enderror" placeholder="National ID"
                                    value="">
                                <span class="text-danger">
                                    @error('cnic')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                <input type="number" name="pnumber" id="pnumber"
                                    class="form-control @error('pnumber') is-invalid @enderror"
                                    placeholder="Phone Number" value="">
                                <span class="text-danger">
                                    @error('pnumber')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col">
                                <input type="date" name="dob" id="dob"
                                    class="form-control @error('dob') is-invalid @enderror" placeholder="DOB"
                                    value="">
                                <span class="text-danger">
                                    @error('dob')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                <select class="form-control @error('gender') is-invalid  @enderror" name="gender" id="gender"
                                    value="">
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
                                <select class="form-control @error('country') is-invalid  @enderror" name="country" id="country"
                                    value="">
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
                                <input type="text" name="region" id="region"
                                    class="form-control @error('region') is-invalid @enderror" placeholder="Region"
                                    value="">
                                <span class="text-danger">
                                    @error('region')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row pt-4">
                            <div class="col">
                                <input type="text" name="address" id="address"
                                    class="form-control @error('address') is-invalid @enderror" placeholder="Address"
                                    value="">
                                <span class="text-danger">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                        </div>

                        <button class="btn btn-success d-flex mx-auto col-6 my-4 justify-content-center" type="submit" id="update_btn">Update Item</button>
                    </form>
                </div>
            </div>

        </div>
    </div>



    {{--  End Edit Form Model  --}}


    {{--  <div>
@if (session('success'))
<div class="alert alert-success" id="success"> {{ session('success') }}  </div>  
@endif
</div>  --}}

    @if (request('success'))
        <div class="alert alert-success" id="success">
            {{ urldecode(request('success')) }}
        </div>
    @endif


    <div>
        @if (session('Delete'))
            <div class="alert alert-danger" id="deleted"> {{ session('Delete') }} </div>
        @endif
    </div>


    <div class="head">
        <h2>List of ToDo Items</h2>
        {{--  <a class="table_btn" href="{{ route('additem') }}">Add Items</a>  --}}
        <button type="button" class="btn btn-success btn-xl" onclick="showPopup()">Add Items</button>
    </div>
    <table class="table" id="table_record">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="pl-3">Name</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">CNIC</th>
                <th scope="col">P Number</th>
                <th scope="col">Gender</th>
                <th scope="col">DOB</th>
                <th scope="col">Country</th>
                <th scope="col">Region</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        
        <tbody id="items">
            @if (isset($items))
            @foreach ($items as $dt)
                <tr id="{{ $dt->id }}">
                    <td class="pl-3 name" >{{ $dt->name }}</td>
                    <td class="user_id">{{ $dt->user->name }}</td>
                    <td class="email">{{ $dt->email }}</td>
                    <td class="cnic">{{ $dt->cnic }}</td>
                    <td class="pnumber">{{ $dt->pnumber }}</td>
                    <td class="gender">
                        @if ($dt->gender == 'M')
                            Male
                        @elseif($dt->gender == 'F')
                            Female
                        @else
                            Other
                        @endif
                    </td>
                    <td class="dob">{{ $dt->dob }}</td>
                    <td class="country">{{ $dt->country }}</td>
                    <td class="region">{{ $dt->region }}</td>
                    <td class="address">{{ $dt->address }}</td>
                    <td class="d-flex align-items-center">
                        <button class="edit_btn btn btn-success mr-1" onclick="editPopup()"  data-edit-id="{{ $dt->id }}">Edit</button>
                        <button class="btn delete_btn btn-danger" data-id="{{ $dt->id }}">Delete</button>
                    </td>
                </tr>
                @endforeach
                @endif
            
        </tbody>
    </table>




@endsection
