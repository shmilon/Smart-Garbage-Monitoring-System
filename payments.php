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
                            <span class="d-inline-block">Payments</span>
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
                                        Payments
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button class="btn btn-primary" onclick="" type="button">Add Entry</button>
                    
                </div>
            </div>
        </div>

        <!-- title bar end  -->


        <div class="row  animated fadeIn" id="paymentAddSection">

            <!-- payment add section -->
            <div class="col-md-12 ">
                <div class="main-card mb-3 card ">
                    <div class="card-header">New Entry</div>
                    <div class="card-body">

                        <form id="tenantAddForm" data-id="" class="col-md-12 mx-auto" method="post" action=""
                            novalidate="novalidate">

                            <div class="row">
                            
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="tenantSelect" class="">Select Tanent</label>
                                        <select name="tenantSelect" id="tenantSelect" class="form-control">
                                        <?php
                                                
                                                $tenants = $conn->query("SELECT * FROM tenants");
                                                while ($row = $tenants->fetch_assoc()):
                                            ?>
                                            
                                            <option value=""><?php echo $row['firstname']  ?></option>
                                            <?php endwhile; ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="invoice">Invoice</label>
                                        <div>
                                            <input type="text" class="form-control" id="invoice" name="invoice">
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="payment">payment</label>
                                        <input type="payment" class="form-control" id="payment" name="payment"
                                            placeholder="5,000">

                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button id="saveData" data-id="" class="btn btn-primary" name="saveData">Add New Entry</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <!-- FORM Panel -->

            <!-- Table Panel -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        List of Payments
                    </div>
                    <div class="card-body">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                        name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                    </select> entries</label></div>
                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input
                                        type="search" class="" placeholder=""
                                        aria-controls="DataTables_Table_0"></label></div>
                            <table class="table table-condensed table-bordered table-hover dataTable no-footer"
                                id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="#: activate to sort column ascending"
                                            style="width: 39.9375px;">#</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Date: activate to sort column ascending"
                                            style="width: 147.656px;">Date</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Tenant: activate to sort column descending"
                                            style="width: 168.641px;" aria-sort="ascending">Tenant</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Invoice: activate to sort column ascending"
                                            style="width: 115.781px;">Invoice</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Amount: activate to sort column ascending"
                                            style="width: 127.469px;">Amount</th>
                                        <th class="text-center sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Action: activate to sort column ascending"
                                            style="width: 170.516px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <tr role="row" class="odd">
                                        <td class="text-center">1</td>
                                        <td class="">
                                            Oct 26, 2020 </td>
                                        <td class="sorting_1">
                                            <p> <b>Smith, John C</b></p>
                                        </td>
                                        <td class="">
                                            <p> <b>123456</b></p>
                                        </td>
                                        <td class="text-right">
                                            <p> <b>2,500.00</b></p>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-primary edit_invoice" type="button"
                                                data-id="1">Edit</button>
                                            <button class="btn btn-sm btn-outline-danger delete_invoice" type="button"
                                                data-id="1">Delete</button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="text-center">2</td>
                                        <td class="">
                                            Oct 26, 2020 </td>
                                        <td class="sorting_1">
                                            <p> <b>Smith, John C</b></p>
                                        </td>
                                        <td class="">
                                            <p> <b>136654</b></p>
                                        </td>
                                        <td class="text-right">
                                            <p> <b>7,500.00</b></p>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-outline-primary edit_invoice" type="button"
                                                data-id="2">Edit</button>
                                            <button class="btn btn-sm btn-outline-danger delete_invoice" type="button"
                                                data-id="2">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                                Showing 1
                                to 2 of 2 entries</div>
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a
                                    class="paginate_button previous disabled" aria-controls="DataTables_Table_0"
                                    data-dt-idx="0" tabindex="-1" id="DataTables_Table_0_previous">Previous</a><span><a
                                        class="paginate_button current" aria-controls="DataTables_Table_0"
                                        data-dt-idx="1" tabindex="0">1</a></span><a
                                    class="paginate_button next disabled" aria-controls="DataTables_Table_0"
                                    data-dt-idx="2" tabindex="-1" id="DataTables_Table_0_next">Next</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Panel -->
        </div>

        <script>

            
            function paymentSection() {
                document.getElementById("paymentAddSection").style.direction = "d-block";
            }
        </script>