<?php include('db_connection.php'); ?>


<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <div class="page-title-head center-elem">
                            <span class="d-inline-block pr-2">
                                <i class="lnr-apartment opacity-6"></i>
                            </span>
                            <span class="d-inline-block">House</span>
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
                                        <a>Dashboards</a>
                                    </li>
                                    <li class="active breadcrumb-item" aria-current="page">
                                        Houses
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- title bar end  -->

        <div class="row">

            <!-- house add form -->


            <div class="col-md-4">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title text-center">House Form</h5>
                        <div class="form-group" id="msg"></div>
                        <form id="manage-house" class="col-md-12 mx-auto" method="post" action=""
                            novalidate="novalidate">
                            <input type="hidden" name="action" value="delete">
                            <div class="form-group">
                                <label for="houseNo">House No</label>
                                <div>
                                    <input type="text" class="form-control" id="houseNo" name="houseNo"
                                        placeholder="House number" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="des" class="control-label">Description</label>
                                <textarea name="description" id="des" cols="" rows="2" class="form-control"
                                    required="">         </textarea>
                            </div>

                            <div class="position-relative form-group">
                                <label for="CategorySelect" class="">Category</label>
                                <select name="select" id="CategorySelect" class="form-control">

                                    <?php
                                    $categories = $conn->query("SELECT * FROM categories order by name asc");
                                    if ($categories->num_rows > 0):
                                        while ($row = $categories->fetch_assoc()):
                                            ?>

                                            <option value="<?php echo $row['id'] ?>">
                                                <?php echo $row['name'] ?>
                                            </option>
                                        <?php endwhile; ?>
                                    <?php else: ?>
                                        <option selected="" value="" disabled="">Please check the category list.</option>
                                    <?php endif; ?>
                                </select>

                            </div>



                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="20,000" required >
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="save" value="" id="saveData">Save</button>
                                <button class="btn btn-sm btn-default col-sm-3" type="reset" id="cancel"> Cancel</button>
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
                                    <th>House</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 
								$i = 1;
                                $rowid=1;
								$house = $conn->query("SELECT h.*,c.name as cname FROM houses h inner join categories c on c.id = h.category_id order by id asc");
								while($row=$house->fetch_assoc()):
								?>

                                    <tr data-rowid="<?php echo $i ?>" >
                                        <td class="text-center text-muted">#
                                        <?php echo $i ?>
                                        </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">
                                                            House #: <b><?php echo $row['house_no'] ?></b>
                                                        </div>
                                                        House Type: <?php echo $row['cname'] ?><br>
                                                        Description: <?php echo $row['description'] ?><br>
                                                        <b>Price: <?php echo number_format($row['price'],2) ?></b>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>


                                        <td class="text-center">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <button class="btn-shadow btn btn-primary edit-house"
                                                    data-id="<?php echo $row['id'] ?>"
                                                    data-house_no="<?php echo $row['house_no'] ?>"
                                                    data-description="<?php echo $row['description'] ?>"
                                                    data-category_id="<?php echo $row['id'] ?>"
                                                    data-price="<?php echo number_format($row['price'],2) ?>"> Edit </button>
                                                <button class="btn-shadow btn btn-danger  delete-house"
                                                    data-id="<?php echo $row['id'] ; $i++ ?>">Delete</button>
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

            const deleteButton = document.querySelectorAll('.delete-house');
            

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
                            xhr.open('POST', 'ajax.php?action=delete_house', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function () {

                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    const response = JSON.parse(xhr.responseText);
                                    if (response ==1) {
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

   

            document.getElementById('saveData').addEventListener('click', function () {
                
                var houseNo = document.getElementById('houseNo').value;
                var des = document.getElementById('des').value;
                var CategorySelect = document.getElementById('CategorySelect').value;
                var price = document.getElementById('price').value;

                if(houseNo && price ) {

                    // Create a new XMLHttpRequest object
                    var xhr = new XMLHttpRequest();

                    // Prepare the data to be sent
                    var formData = new FormData();
                    formData.append('houseNo', houseNo);
                    formData.append('des', des);
                    formData.append('CategorySelect', CategorySelect);
                    formData.append('price', price);

                    // Configure the request
                    xhr.open('POST', 'ajax.php?action=save_house', true);

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
                
                }else{
                    Swal.fire({
                        title: 'Invalid input',
                        text: 'Error saving data!',
                        icon: 'error',
                        timer: 3000,
                        showConfirmButton: false
                    });

                }
            });

        </script>