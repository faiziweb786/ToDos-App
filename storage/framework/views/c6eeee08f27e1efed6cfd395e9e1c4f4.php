<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<?php if($favicon = \App\Models\Favicon::first()): ?>
<link rel="icon" type="image/x-icon" href="<?php echo e(asset('storage/favicon/' . $favicon->favicon)); ?>">
<?php endif; ?>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <!-- font family cdn -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

        <!-- font awesome cdn -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title><?php echo $__env->yieldContent('title', 'ToDos App'); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/stylee.css')); ?>">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body class="">
    <div id="app">

        <?php echo $__env->make('user.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        <div class="website">
            <div class="site_container">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

        <?php echo $__env->make('user.partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <?php echo $__env->yieldContent('script'); ?>

        <!-- Add Bootstrap JavaScript and Popper.js -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>


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
            <?php if(!empty($items)): ?>
                var items = <?php echo json_encode($items, 15, 512) ?>;
            <?php else: ?>
                var items = []; // Set a default value if $items is empty.
            <?php endif; ?>

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
                $('#items').append(`<tr id="${item.id}" class="bg-info"> 
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
                        <button value="${item.id}" onclick="editPopup()" class="edit_btn btn btn-success border border-warning mr-1" data-edit-id="${item.id}">edit</button>
                        <button value="${item.id}" class="delete_btn btn btn-danger border border-warning" data-id="${item.id}" >Delete</button>    
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
                        url: "<?php echo e(route('storedata')); ?>",
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
                console.log(item);
                if (item) {
                    $('#id').val(stud_id);
                    $('#edit_name').val(item.name);
                    $('#edit_email').val(item.email);
                    $('#edit_cnic').val(item.cnic);
                    $('#edit_pnumber').val(item.pnumber);
                    $('#edit_gender').val(item.gender);
                    $('#edit_dob').val(item.dob);
                    $('#edit_country').val(item.country);
                    $('#edit_religion').val(item.religion);
                    $('#edit_address').val(item.address);
                } else {
                    console.log("Object with ID", stud_id, "not found");
                }
            });

            $('#update_btn').click(function(e) {
                e.preventDefault();
                var url = "<?php echo e(route('updatedata', ':id')); ?>".replace(':id', $('#id').val());
                var updatedData = {
                    // Ensure that `stud_id` is defined here
                    id: $('#id').val(),
                    name: $('#edit_name').val(),
                    email: $('#edit_email').val(),
                    cnic: $('#edit_cnic').val(),
                    pnumber: $('#edit_pnumber').val(),
                    gender: $('#edit_gender').val(),
                    dob: $('#edit_dob').val(),
                    country: $('#edit_country').val(),
                    religion: $('#edit_religion').val(),
                    address: $('#edit_address').val(),
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

            $(document).on('click', '.delete_btn', function() {
                var id = $(this).data('id');
                var url = "<?php echo e(route('deleteitem', ':id')); ?>".replace(':id', id);

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












        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>

</html>
<?php /**PATH D:\project\login_registration\resources\views/user/layouts/app.blade.php ENDPATH**/ ?>