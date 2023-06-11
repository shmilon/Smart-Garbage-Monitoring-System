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
                            <span class="d-inline-block">Room Types</span>
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
                                        Room Types
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

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Room</h5>
                        <form class="" id="form_category_add">
                            <div class="position-relative form-group">
                                <label for="ID_addCategory" class="">Enter Room Name</label>
                                <input name="CategoryName" id="addCategoryName" value ="" placeholder="Super Delux" type="text"
                                    class="form-control">
                            </div>
                            <button class="mt-2 btn btn-primary" id="category_add_btn" type="button">Add</button>
                            <button class="mt-2 btn btn-primary d-none" id="category_update_btn"
                                type="button">Update</button>
                            <button class="mt-2 btn btn-primary" id="category_cancel_btn" type="button">Cancel</button>
                            
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <div class="main-card mb-3 card">
                    <div class="card-header">Category List</div>
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
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $id=1;
                                $category = $conn->query("SELECT * FROM categories order by id asc");
                                while ($row = $category->fetch_assoc()):
                                    ?>


                                    <tr data-rowid="<?php echo $id++ ?>">
                                        <td class="text-center text-muted">#
                                            <?php echo $i++ ?>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <?php echo $row['name']; ?>
                                            </div>
                                        </td>

                                        <td class="text-center">
                                            <button id="editButton" onclick="editData('<?php echo $row['id']; ?>','<?php echo $row['name']; ?>')" class="btn btn-sm btn-primary edit_category"
                                                type="button" data-id="<?php echo $row['id']; ?>"
                                                data-name="<?php echo $row['name']; ?>">Edit</button>

                                            <button onclick="deleteData('<?php echo $row['id']; ?>')" id="deleteButton"
                                                class="btn btn-sm btn-danger delete_category " type="button"
                                                data-id="<?php echo $row['id']; ?>">Delete</button>
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
                                                class="page-link">Previous</a></li>
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



        <script type="text/javascript">

            function editData(id,name) {
     
                document.getElementById("category_add_btn").style.display = "none";
                document.getElementById("category_update_btn").classList.remove("d-none");
                document.getElementById("addCategoryName").id = "updateCategoryName";
                document.getElementById("updateCategoryName").value = name;
                $('#updateCategoryName').attr('data-id' , id);
                
            }

            document.getElementById('category_update_btn').addEventListener('click', function () {
                var data = document.getElementById('updateCategoryName').value;
                var id = document.getElementById('updateCategoryName').data("id")

                alert(id+data);

                // Create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // Prepare the data to be sent
                var formData = new FormData();
                formData.append('data', data);

                // Configure the request
                xhr.open('POST', 'add_category.php', true);

                // Define the callback function
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // Request successful
                        console.log(xhr.responseText);
                        location.reload();

                    } else {
                        // Request failed
                        console.error(xhr.responseText);

                    }
                };

                // Send the request
                xhr.send(formData);
            });




            function deleteData(id) {

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
                        // AJAX request to the PHP page
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.open("GET", "ajax.php?action=delete_category&id=" + id, true);
                        xmlhttp.send();

                        xmlhttp.onreadystatechange = function () {

                            if (this.readyState == 4 && this.status == 200) {
                                const response = JSON.parse(xmlhttp.responseText);

                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'The data has been deleted.',
                                    icon: 'success'
                                });
                                // Optionally, you can remove the deleted item from the DOM
                                // const deletedElement = document.querySelector(`[data-rowid="${id}"]`);
                                //deletedElement.remove();
                            } else {
                                Swal.fire({
                                    title: 'Unable to delete!',
                                    text: 'The data can\'t deleted.',
                                    icon: 'error'
                                });
                                setTimeout(() => {
                                    location.reload();
                                }, 500);

                            }
                        };
                    }
                });
            }


            // function deleteData(id) {
            //     if (confirm("Are you sure you want to delete this data?")) {
            //         // AJAX request to the PHP page
            //         var xmlhttp = new XMLHttpRequest();
            //         xmlhttp.onreadystatechange = function() {
            //             if (this.readyState == 4 && this.status == 200) {
            //                 const response = JSON.parse(xmlhttp.responseText);

            //                 if (response.success ) {
            //                     Swal.fire({
            //                         title: 'Are you sure?',
            //                         text: 'You won\'t be able to revert this!',
            //                         icon: 'warning',
            //                         showCancelButton: true,
            //                         confirmButtonColor: '#d33',
            //                         cancelButtonColor: '#3085d6',
            //                         confirmButtonText: 'Yes, delete it!'
            //                     }).then((result) => {
            //                         if (result.isConfirmed) {
            //                             // Send delete request using AJAX
            //                             deleteData(id);

            //                         }
            //                     });

            //                     // Optionally, you can remove the deleted item from the DOM
            //                     //const deletedElement = document.querySelector(`[data-id="${id}"]`);
            //                     //deletedElement.remove();

            //                 }else{
            //                      // Display error message
            //                      Swal.fire({
            //                         title: 'Deleted!',
            //                         text: 'The data has been deleted.',
            //                         icon: 'success'
            //                     });

            //                     location.reload();
            //                 }


            //                 // alert("Data deleted successfully!");
            //                 //location.reload();
            //             }
            //         };
            //         xmlhttp.open("GET", "ajax.php?action=delete_category&id=" + id, true);
            //         xmlhttp.send();
            //     }
            // }


            document.getElementById('category_add_btn').addEventListener('click', function () {
                var data = document.getElementById('addCategoryName').value;

                // Create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // Prepare the data to be sent
                var formData = new FormData();
                formData.append('data', data);

                // Configure the request
                xhr.open('POST', 'add_category.php', true);

                // Define the callback function
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // Request successful
                        console.log(xhr.responseText);

                        Swal.fire({
                                    title: 'Done!',
                                    text: 'The data has been Added.',
                                    icon: 'success'
                                });
                        location.reload();

                    } else {
                        // Request failed
                        console.error(xhr.responseText);
                    }
                };

                // Send the request
                xhr.send(formData);
            });



        </script>