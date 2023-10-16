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
                            <x-input type="text" name="name" id="name" placeholder="Full Name"></x-input>
                            <x-input type="text" name="email" id="email" placeholder="Enter Email"></x-input>
                        </div>

                        <div class="row pt-4">
                            <x-input type="number" name="cnic" id="cnic" placeholder="National ID"></x-input>
                            <x-input type="number" name="pnumber" id="pnumber" placeholder="Phone Number"></x-input>
                        </div>

                        <div class="row pt-4">
                            <x-input type="date" name="dob" id="dob" placeholder="Date of Birth"></x-input>
                            <x-select name="gender" id="gender">
                                <x-option value="">Select Gender</x-option>
                                <x-option value="M">Male</x-option>
                                <x-option value="F">Female</x-option>
                                <x-option value="O">Other</x-option>
                            </x-select>
                        </div>

                        <div class="row pt-4">
                            <x-select name="country" id="country">
                                <x-option value="">Select Country</x-option>
                                <x-option value="Pakistan">Pakistan</x-option>
                                <x-option value="India">India</x-option>
                                <x-option value="Afghanistan">Afghanistan</x-option>
                                <x-option value="Sri-lanka">Sri-lanka</x-option>
                                <x-option value="Bangladesh">Bangladesh</x-option>
                                <x-option value="Iran">Iran</x-option>
                            </x-select>
                            <x-input type="text" name="religion" id="religion" placeholder="Religion"></x-input>
                        </div>


                        <div class="row pt-4">
                            <x-input type="text" name="address" id="address" placeholder="Address"></x-input>
                        </div>

                        <x-button type="submit" id="">Add Item</x-button>

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

                        <x-input type="hidden" name="id" id="id" placeholder=""></x-input>

                        <div class="row">
                            <x-input type="text" name="name" id="edit_name" placeholder="Full Name"></x-input>
                            <x-input type="text" name="email" id="edit_email" placeholder="Enter Email"></x-input>
                        </div>

                        <div class="row pt-4">
                            <x-input type="number" name="cnic" id="edit_cnic" placeholder="National ID"></x-input>
                            <x-input type="number" name="pnumber" id="edit_pnumber" placeholder="Phone Number"></x-input>
                        </div>

                        <div class="row pt-4">
                            <x-input type="date" name="dob" id="edit_dob" placeholder="Date of Birth"></x-input>
                            <x-select name="gender" id="edit_gender" value="">
                                <x-option value="">Select Gender</x-option>
                                <x-option value="M">Male</x-option>
                                <x-option value="F">Female</x-option>
                                <x-option value="O">Other</x-option>
                            </x-select>
                        </div>

                        <div class="row pt-4">
                            <x-select name="country" id="edit_country" value="">
                                <x-option value="">Select Country</x-option>
                                <x-option value="Pakistan">Pakistan</x-option>
                                <x-option value="India">India</x-option>
                                <x-option value="Afghanistan">Afghanistan</x-option>
                                <x-option value="Sri-lanka">Sri-lanka</x-option>
                                <x-option value="Bangladesh">Bangladesh</x-option>
                                <x-option value="Iran">Iran</x-option>
                            </x-select>
                            <x-input type="text" name="religion" id="edit_religion" placeholder="Religion"></x-input>
                        </div>


                        <div class="row pt-4">
                            <x-input type="text" name="address" id="edit_address" placeholder="Address"></x-input>
                        </div>


                        <x-button type="submit" id="update_btn">Update Item</x-button>

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
        <button type="button" class="btn btn-success btn-xl border border-warning" onclick="showPopup()">Add Items</button>
    </div>
    <table class="table" id="table_record">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="pl-3">Name</th>
                <th scope="col">Email</th>
                <th scope="col">CNIC</th>
                <th scope="col">P Number</th>
                <th scope="col">Gender</th>
                <th scope="col">DOB</th>
                <th scope="col">Country</th>
                <th scope="col">Religion</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody id="items">
            @if (isset($items))
                @foreach ($items as $dt)
                    <tr id="{{ $dt->id }}">
                        <td class="pl-3 name">{{ $dt->name }}</td>
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
                        <td class="religion">{{ $dt->religion }}</td>
                        <td class="address">{{ $dt->address }}</td>
                        <td class="d-flex align-items-center">
                            <button class="edit_btn btn btn-success border border-warning mr-1" onclick="editPopup()"
                                data-edit-id="{{ $dt->id }}">Edit</button>
                            <button class="btn delete_btn btn-danger border border-warning" data-id="{{ $dt->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>




@endsection
