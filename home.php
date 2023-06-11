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
                                <span class="d-inline-block">Dashboard</span>
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
    <div class="col-md-6 col-xl-4 clickable-div" onclick="window.location.href='index.php?page=houses'">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Houses</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php echo $conn->query("SELECT * FROM houses")->num_rows ?>
                        </span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 clickable-div" onclick="window.location.href='index.php?page=tenants'">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Tenants</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php echo $conn->query("SELECT * FROM tenants where status = 1 ")->num_rows ?>
                        </span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4 clickable-div" onclick="window.location.href='index.php?page=payments'">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Payment</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>BDT 
                            <?php
                            $payment = $conn->query("SELECT sum(amount) as paid FROM payments");
                            echo $payment->num_rows > 0 ? number_format($payment->fetch_array()['paid'], 2) : 0;
                            ?>
                        </span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4 clickable-div" onclick="window.location.href='index.php?page=tenants'">
        <div class="card mb-3 widget-content">
            <div class="widget-content-outer">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Due</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-success">$</div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>


