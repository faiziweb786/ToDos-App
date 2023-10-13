<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">


    <title>@yield('title', 'Laravel')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse d-flex align-items-center justify-content-between"
                    id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto text-white">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('viewdata') }}">{{ __('ITems') }}</a>
                                </li>
                            </ul>
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <div class="welcome">
            <div class="site_container">
                @yield('content')
            </div>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
            integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
        </script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <script>
            var success = document.getElementById('success');
            if (success) {
                setTimeout(function() {
                    success.style.display = 'none';
                }, 4000);
            }

            var deleted = document.getElementById('deleted');
            if (deleted) {
                setTimeout(function() {
                    deleted.style.display = 'none';
                }, 4000);
            }
        </script>

        <script type="text/javascript">
            @if(!empty($items))
            var items = @json($items);
            @else
            var items = []; // Set a default value if $items is empty.
            @endif

            var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
                keyboard: false
            });

            function showPopup() {
                myModal.show();
            }

            function hidePopup(popup) {
                popup.hide();
            }

            function appendItem(item) {
                let genderLabel;
    
                if (item.gender === 'M') {
                    genderLabel = 'Male';
                } else if (item.gender === 'F') {
                    genderLabel = 'Female';
                } else {
                    genderLabel = 'Other';
                }
                $('#items').append(`<tr id="${item.id}"> 
                    <td class="name">${item.name}</td> 
                    <td class="email">${item.email}</td> 
                    <td class="cnic">${item.cnic}</td> 
                    <td class="pnumber">${item.pnumber}</td> 
                    <td class="gender">${genderLabel}</td> 
                    <td class="dob">${item.dob}</td> 
                    <td class="country">${item.country}</td> 
                    <td class="religion">${item.religion}</td>
                    <td class="address">${item.address}</td>
                    <td class="d-flex align-items-center">
                        <button value="${item.id}" onclick="editPopup()" class="edit_btn btn btn-success mr-1" data-edit-id="${item.id}">edit</button>
                        <button value="${item.id}" class="delete_btn btn btn-danger" data-id="${item.id}" >Delete</button>    
                    </td> 
                     </tr>`);
            }
            $(document).ready(function() {
                $('#addForm').submit(function(e) {
                    e.preventDefault();

                    var form = $("#addForm")[0];
                    var postData = new FormData(form);
                    var modal = $('#myModal');

                    $.ajax({
                        type: "POST",
                        url: "{{ route('storedata') }}",
                        data: postData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            hidePopup(myModal);
                            appendItem(data.item);
                            items.push(data.item);
                            $('#successMessage').text(data.success).show();
                            setTimeout(function() {
                                $('#successMessage').fadeOut('slow');
                            }, 3000);

                        },
                        error: function(e) {
                            $('#error').html('Something want wrong please try Again ').show();
                        }

                    });
                });
            });


            //update Model function start from here

            var editModal = new bootstrap.Modal(document.getElementById('editModal'), {
                keyboard: false
            });

            function editPopup() {
                editModal.show();
            }

           

            $(document).on('click', '.edit_btn', function(e) {
                e.preventDefault();
                var stud_id = $(this).data('edit-id');


                // Use the `find` method to locate the object with the matching ID
                const item = items.find(item => item.id === stud_id);
              
                if (item) {
                    $('#id').val(stud_id);
                    $('#name').val(item.name);
                    $('#email').val(item.email);
                    $('#cnic').val(item.cnic);
                    $('#pnumber').val(item.pnumber);
                    $('#gender').val(item.gender);
                    $('#dob').val(item.dob);
                    $('#country').val(item.country);
                    $('#religion').val(item.religion);
                    $('#address').val(item.address);
                } else {
                    console.log("Object with ID", stud_id, "not found");
                }
            });

            $('#update_btn').click(function(e) {
                e.preventDefault();
                var url = "{{ route('updatedata', ':id') }}".replace(':id', $('#id').val());
                var updatedData = {
                    // Ensure that `stud_id` is defined here
                    id: $('#id').val(),
                    name: $('#name').val(),
                    email: $('#email').val(),
                    cnic: $('#cnic').val(),
                    pnumber: $('#pnumber').val(),
                    gender: $('#gender').val(),
                    dob: $('#dob').val(),
                    country: $('#country').val(),
                    region: $('#religion').val(),
                    address: $('#address').val(),
                };

                // Send the updated data to the server using an AJAX request
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST', // Use the appropriate HTTP method (e.g., POST or PUT)
                    url: url, // Update the URL to the server route for updating data
                    data: updatedData,
                    success: function(response) {
                        hidePopup(editModal);
                        $('#successMessage').text(response.success).show();
                        var $row = $('#table_record tr[id="' + response.item.id + '"]');

                if ($row.length) {
                    // Update the row's cells with the new data
                    $row.find('.name').text(updatedData.name);
                    $row.find('.email').text(updatedData.email);
                    $row.find('.cnic').text(updatedData.cnic);
                    $row.find('.pnumber').text(updatedData.pnumber);
                    $row.find('.gender').text(updatedData.gender);
                    $row.find('.dob').text(updatedData.dob);
                    $row.find('.country').text(updatedData.country);
                    $row.find('.religion').text(updatedData.religion);
                    $row.find('.address').text(updatedData.address);
                }
                        setTimeout(function() {
                            $('#successMessage').fadeOut('slow');
                        }, 5000);
                    },
                    error: function(error) {
                        console.error('An error occurred: ' + error); // Handle errors
                    }
                });

                // Find the row with the matching data-id
                

            });








            //For Delete Data use these functions

            $(document).on('click','.delete_btn', function() {
                var id = $(this).data('id');
                var url = "{{ route('deleteitem', ':id') }}".replace(':id', id);

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(response) {
                        $('#' + id).remove();
                        $('#successMessage').html("");
                        $('#successMessage').addClass('alert alert-danger');
                        $('#successMessage').text(response.success).show();
                        setTimeout(function() {
                            $('#successMessage').fadeOut('slow');
                        }, 3000);
                        $('#errorMessage').hide();
                    },
                    error: function(error) {
                        $('errorMessage').html("");
                        $('errorMessage').addClass('alert aler-danger');
                        $('#errorMessage').text(response.error).show();
                        setTimeout(function() {
                            $('#errorMessage').fadeOut('slow');
                        }, 4000);
                        $('#successMessage').hide();
                    }
                });

            });

            
        </script>













</body>

</html>
