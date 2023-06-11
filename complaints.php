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
                            <span class="d-inline-block">Complains</span>
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
                                    Complains
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
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-header">Complains List</div>
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Name</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Subject</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php   
                                            $i= 0;
                                            $data = $conn->query("SELECT * FROM complaint");
                                            $s = array("Pending", "Inprocess", "Hold", "Completed");
                                            while($row=$data->fetch_assoc()):
                                        ?>


                                            <tr>
                                                <td class="text-center text-muted">#<?php $i++; ?></td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><?php echo $row['name'] ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><?php echo $row['role'] ?></td>
                                                <td class="text-center">
                                                    <div class="badge badge-warning"><?php  echo $row['subject'] ?></div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="badge badge-warning"><?php echo $s[$row['status'] ]?></div>
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" id="" class="btn btn-primary btn-sm">Details</button>
                                                </td>
                                            </tr>
                                        

                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>