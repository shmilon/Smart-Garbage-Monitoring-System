<?php include 'db_connection.php'; ?>

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
                            <span class="d-inline-block">Tanent Manage</span>
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
                                    Tanent Manage
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" class="btn btn-primary" onclick="new_tenant();" id="new_tenant">Add New Tenant</button>
                    
                </div>
            </div>
        </div>

        <!-- title bar end  -->

        <div class="row  animated fadeIn d-none" id="tenantAddSection" >

            <!-- tanent add section -->
            <div class="col-md-12 ">
                <div class="main-card mb-3 card ">
                    <div class="card-header">Add New Tanent</div>
                    <div class="card-body">
                        
                        <form id="tenantAddForm" data-id="" class="col-md-12 mx-auto" method="post" action="" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <div>
                                            <input type="text" class="form-control" id="firstname" name="firstname">
                                        </div>
                                    </div>

                                </div> 
                                
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="middlename">Mid Name</label>
                                                <div>
                                                    <input type="text" class="form-control" id="middlename" name="middlename">
                                                </div>
                                            </div> 
                                        
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <div>
                                            <input type="text" class="form-control" id="lastname" name="lastname">
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <div>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div>

                                </div> 
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="contact">Contact</label>
                                        <div>
                                            <input type="text" class="form-control" id="contact" name="contact">
                                        </div>
                                    </div>
                                        
                                </div>
                                <div class="col-md-4">
                                    <label for="date" class="control-label">Registration Date</label>
                                    <input type="date" id ="date" class="form-control" name="date_in"
                                        value="<?php echo isset($date_in) ? date("Y-m-d", strtotime($date_in)) : '' ?>" required>
                                    </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nid">National ID Number </label>
                                        <div>
                                            <input type="text" class="form-control" id="nid" name="nid">
                                        </div>
                                    </div>

                                </div> 
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="econtact">Emergency Contact</label>
                                        <div>
                                            <input type="number" class="form-control" id="econtact" name="contact">
                                        </div>
                                    </div>
                                        
                                </div>
                                <div class="col-md-4">
                                    <label for="paddress" class="control-label">Permanent Address</label>
                                    <input type="text" id ="paddress" class="form-control" name="paddress"
                                        value="" required>
                                    </div>
                            </div>

                            

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="houseSelect" class="">Select Room</label>
                                        <select name="select" id="houseSelect" class="form-control">
                                    
                                            <?php $house = $conn->query("SELECT * FROM houses where id not in (SELECT house_id from tenants where status = 1) " . (isset($house_id) ? " or id = $house_id" : "") . " ");
                                            while ($row = $house->fetch_assoc()):
                                                ?>
                                                                                        <option value="<?php echo $row['id'] ?>" <?php echo isset($house_id) && $house_id == $row['id'] ? 'selected' : '' ?>><?php echo "Room No:" . $row['house_no'] ?></option>
                                            <?php endwhile; ?>
                                            
                                            <?php if ($num_rows > 0): ?>
                                                                                        <option selected="" disabled="">Please check the category list.</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                        <div class="position-relative form-group">
                                        <label for="pic" class="">Set Profile Picture</label>
                                        <input name="file" id="pic" type="file" class="form-control-file"
                                            accept="image/png, image/gif, image/jpeg">
                                        <small class="form-text text-muted">Upload image/png, image/gif, image/jpeg file...
                                        </small>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password">
                                            
                                    </div>
                                 </div>
                            </div>

                            
                                    <div class="form-group">
                                        <button id="saveData" data-id="" class="btn btn-primary" name="saveData">Add New Tanent</button>
                                     </div>


                           
                            
                            
                            
                            
                        </form>
                    </div>

                    

                   
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
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
                                    <th class="text-center">House Rented</th>
                                    <th class="text-center">Monthly Rate</th>
                                    <th class="text-center">Outstanding Balance</th>
                                    <th class="text-center">Last Payment</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                $tenant = $conn->query("SELECT t.*,concat(t.lastname,', ',t.firstname,' ',t.middlename) as name,h.house_no,h.price FROM tenants t inner join houses h on h.id = t.house_id where t.status = 1 order by h.house_no desc ");
                                while ($row = $tenant->fetch_assoc()):
                                    $months = abs(strtotime(date('Y-m-d') . " 23:59:59") - strtotime($row['date_in'] . " 23:59:59"));
                                    $months = floor(($months) / (30 * 60 * 60 * 24));
                                    $payable = $row['price'] * $months;
                                    $paid = $conn->query("SELECT SUM(amount) as paid FROM payments where tenant_id =" . $row['id']);
                                    $last_payment = $conn->query("SELECT * FROM payments where tenant_id =" . $row['id'] . " order by unix_timestamp(date_created) desc limit 1");
                                    $paid = $paid->num_rows > 0 ? $paid->fetch_array()['paid'] : 0;
                                    $last_payment = $last_payment->num_rows > 0 ? date("M d, Y", strtotime($last_payment->fetch_array()['date_created'])) : 'N/A';
                                    $outstanding = $payable - $paid;
                                    ?>
                                    <tr data-rowid="<?php echo $i ?>">
                                        <td class="text-center text-muted">#
                                            <?php echo $i++ ?>
                                        </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">
                                                        <div class="widget-content-left">
                                                            <img width="40" class="rounded-circle"
                                                                src="assets/images/avatars/<?php echo random_int(1, 6) ?>.jpg"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">
                                                            <?php echo ucwords($row['name']) ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $row['house_no'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo number_format($row['price'], 2) ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo number_format($outstanding, 2) ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $last_payment ?>
                                        </td>

                                        <td class="text-center">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="btn-shadow btn btn-primary edit-house"
                                                    data-id="<?php echo $row['id'] ?>"
                                                    data-date="<?php echo $row['date_in'] ?>"
                                                    data-house_no="<?php echo $row['house_no'] ?>" data-email="<?php echo $row['email'] ?>" data-contact="<?php echo $row['contact'] ?>" data-firstname="<?php echo $row['firstname'] ?>" data-lastname="<?php echo $row['lastname'] ?>" data-middlename="<?php echo $row['middlename'] ?>"> Edit
                                                </button>

                                                <button class="btn-shadow btn btn-danger  delete-tenant"
                                                    data-id="<?php echo $row['id'] ?>">Delete</button>
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
                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing
                                    1 to 10
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
                                                aria-controls="example" data-dt-idx="7" tabindex="0"
                                                class="page-link">Next</a>
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

    document.getElementById('saveData').addEventListener('click', function () {

    var firstname = document.getElementById('firstname').value;
    var middlename = document.getElementById('middlename').value;
    var lastname = document.getElementById('lastname').value;
    var email = document.getElementById('email').value;
    var contact = document.getElementById('contact').value;
    var date = document.getElementById('date').value;
    var houseSelect = document.getElementById('houseSelect').value;
    var id = this.getAttribute('data-id');
    console.log(id);

    // var nid = document.getElementById('nid').value;
    // var paddress = document.getElementById('paddress').value;
    // var econtact = document.getElementById('econtact').value;
    // var password = document.getElementById('password').value;



    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    //Prepare the data to be sent
    var formData = new FormData();
    formData.append('firstname', firstname);
    formData.append('middlename', middlename);
    formData.append('lastname', lastname);
    formData.append('email', email);
    formData.append('contact', contact);
    formData.append('house_id', houseSelect);
    formData.append('date_in', date);
    
    // formData.append('nid', nid);
    // formData.append('paddress', paddress);
    // formData.append('econtact', econtact);
    // formData.append('password', password);

    // Configure the request
    xhr.open('POST', 'ajax.php?action=save_tenant', true);

    // Define the callback function
    xhr.onload = function () {
        
        if (xhr.readyState === 4 && xhr.status === 200) {

            console.log(xhr.responseText);
            
                if (xhr.responseText ==1) {
                    // Display success message
                    Swal.fire({
                        title: 'Data Added!',
                        text: 'The data successfully added.',
                        icon: 'success',
                        timer: 3000,
                        showConfirmButton: false
                    });
                                                
                }else if (xhr.responseText ==2) {
                    Swal.fire({
                        title: 'Failed to add',
                        text: 'House number already exists!',
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





            const deleteButton = document.querySelectorAll('.delete-tenant');
            const editHhouse = document.querySelectorAll('.edit-house');

            editHhouse.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    

                    document.getElementById(tenantAddSection).style.display='d-block';

                    document.getElementById('firstname').value = this.getAttribute('data-firstname');
                    document.getElementById('middlename').value = this.getAttribute('data-middlename');
                    document.getElementById('lastname').value=this.getAttribute('data-lastname');
                    document.getElementById('email').value = this.getAttribute('data-email');
                    document.getElementById('contact').value = this.getAttribute('data-contact');
                    document.getElementById('date').value = this.getAttribute('data-date');
                    document.getElementById('houseSelect').value = this.getAttribute('data-house_no');
                    document.getElementById('saveData').innerText="Save data";
                    document.getElementById('saveData').value= this.getAttribute('data-id');

                });
            });

            deleteButton.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const rowid = this.getAttribute('data-rowid');

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
                            xhr.open('POST', 'ajax.php?action=delete_tenant', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function () {

                                if (xhr.readyState === 4 && xhr.status === 200) {

                                    if (xhr.responseText == 1) {
                                        // Display success message
                                        Swal.fire({
                                            title: 'Deleted!',
                                            text: 'The data has been deleted.',
                                            icon: 'success'
                                        });
                                        // Optionally, you can remove the deleted item from the DOM
                                        location.reload();
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


            function new_tenant(){
               document.getElementById("tenantAddSection").classList.remove("d-none");
               // uni_modal("New Tenant", "manage_tenant.php", "mid-large");
            }
            function cancel(){
               document.getElementById("tenantAddSection").style.display="none";
               
            }
            
        </script>