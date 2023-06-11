<?php  include 'db_connection.php'; ?>

<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>
                            <div class="page-title-head center-elem">
                                <span class="d-inline-block pr-2">
                                    <i class="lnr-user opacity-6"></i>
                                </span>
                                <span class="d-inline-block">User Manage</span>
                            </div>
                            <div class="page-title-subheading opacity-10">
                                <nav class="" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a>
                                                <i aria-hidden="true" class="fa fa-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a>Dashboard</a>
                                        </li>
                                        <li class="active breadcrumb-item" aria-current="page">
                                            User Manage
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                       
                    </div>
                </div>
            </div>

<!-- title bar end  -->

<div class="row">

    <!-- admin add section -->
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-header ">Add New User</div>
                <div class="card-body">
                    <form id="userAddForm" class="col-md-12 mx-auto" method="post" action="" novalidate="novalidate">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <div>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Jhon">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">Last Name</label>
                            <div>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Due">
                            </div>
                        </div>

                        <div class="position-relative form-group">
                            <label for="type" class="">Role Select</label>
                            <select name="type" id="type" class="form-control">
                                

                                <option value="1" selected >Admin</option>
                                <option>Manager</option>
                                <option value="2">Staff</option>
                            </select>
                        </div>

                        <div class="position-relative form-group">
                            <label for="exampleFile" class="">Set Profile Picture</label>
                            <input name="file" id="exampleFile" type="file" class="form-control-file" accept="image/png, image/gif, image/jpeg" >
                            <small class="form-text text-muted">Upload image/png, image/gif, image/jpeg file...
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        
                        <div class="form-group">
                            <button id="saveData" type="submit" class="btn btn-primary" name="saveData" data-id="" value="">Add New User</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>



    <div class="col-md-8">
        <div class="main-card mb-3 card">

            <div class="card-header">

                <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                            name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="">
                            <option value="10">10</option>
                            <option value="25">25</option>
                        </select> entries</label></div>
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <div class="search-wrapper">
                            <div class="input-holder">
                                <input type="text" class="search-input" placeholder="Type to search">
                                <button class="search-icon"><span></span></button>
                            </div>
                            <button class="close"></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                         <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        $i = 1;
                        $type = array("", "Admin", "Staff", "Alumnus/Alumna");
                        $users = $conn->query("SELECT * FROM users order by id asc");
                        while ($row = $users->fetch_assoc()):
                            ?>
                            <tr>
                                <td class="text-center text-muted">#
                                    <?php echo $i++ ?>
                                </td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading"><?php echo $row['name'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center"><?php echo $row['username'] ?></td>
                                <td class="text-center"><?php echo $type[$row['type']]; ?></td>
                                <td class="text-center">
                                    <div role="group" class="btn-group-sm btn-group">
                                        <button class="btn-shadow btn btn-primary edit-user" data-id = '<?php echo $row['id'] ?>'> Edit </button>
                                        <button class="btn-shadow btn btn-danger  delete-user" data-id = '<?php echo $row['id'] ?>'>Delete</button>
                                    </div>
                                </td>
                            </tr>


                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>




            <div class="d-block text-center card-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10
                            of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="example_previous"><a
                                        href="#" aria-controls="example" data-dt-idx="0" tabindex="0"
                                        class="page-link">Previous</a>
                                </li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="example"
                                        data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example"
                                        data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example"
                                        data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item next" id="example_next"><a href="#"
                                        aria-controls="example" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


<script>
        const deleteButton = document.querySelectorAll('.delete-user');
        const editButton = document.querySelectorAll('.edit-user');

        editButton.forEach(button => {
            button.addEventListener('click', function () {
                            Swal.fire({
                            icon: 'info',
                            title: 'Oops...',
                            text: 'Still not implemented',
                            })

                            
                })
        } );

    deleteButton.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');

            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send delete request using AJAX
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'ajax.php?action=delete_user', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.onreadystatechange = function () {

                        if (xhr.readyState === 4 && xhr.status === 200) {

                            if (xhr.responseText == 1) {
                                // Display success message
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'The data has been deleted.',
                                    icon: 'success',
                                   
                                });
                                // Optionally, you can remove the deleted item from the DOM
                                setTimeout(() => {
                                    location.reload();
                                }, 800);
                            }
                            else {
                                // Display error message
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'An error occurred while deleting the data.',
                                    icon: 'error'
                                });
                            }
                        }
                    };
                    // Send the delete request
                    xhr.send('id=' + id);
                }
            });
        });
    });



        document.getElementById('saveData').addEventListener('click', function () {

            var name = document.getElementById('name').value;
            var username = document.getElementById('username').value;
            var type = document.getElementById('type').value;
            var password = document.getElementById('password').value;
            //var pic = document.getElementById('pic').value;
            
            
            var id = this.getAttribute('data-id');

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            //Prepare the data to be sent
            var formData = new FormData();
            formData.append('id', id);
            formData.append('name', name);
            formData.append('username', username);
            formData.append('type', type);
            formData.append('password', password);
           // formData.append('pic', pic);

            // Configure the request
            xhr.open('POST', 'ajax.php?action=save_user', true);

            // Define the callback function
            xhr.onload = function () {
                
                if (xhr.readyState === 4 && xhr.status === 200) {

                    console.log(xhr.responseText);
                    
                        if (xhr.responseText ==1) {
                            // Display success message
                            Swal.fire({
                                title: 'Data Added!',
                                text: 'Successfully added.',
                                icon: 'success',
                                
                            });

                                                
                        }else if (xhr.responseText ==2) {
                            Swal.fire({
                                title: 'Failed to add',
                                text: 'User already exists!',
                                icon: 'error'
                            });
                        }else{
                            Swal.fire({
                                title: 'failed to add',
                                text: 'Error saving data!',
                                icon: 'error'
                            });
                        }
                        
                        
                                    location.reload();
                                
                        
                } else {
                    console.log(xhr.responseText);
                }
            };
            // Send the request
            xhr.send(formData);

        });


        
   
</script>