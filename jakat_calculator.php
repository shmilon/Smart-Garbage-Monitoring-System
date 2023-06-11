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
                                <span class="d-inline-block">Jakat Calculator</span>
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
                                            Jakat Calculator
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

<div class="row  animated fadeIn" id="tenantAddSection" >

<!-- section -->
<div class="col-md-12 ">
    <div class="main-card mb-12 card ">
        <div class="card-header">Jakat Calculator</div>
        <div class="card-body">

        <form id="tenantAddForm" data-id="" class="col-md-12 mx-auto" method="post" action="" novalidate="novalidate">
                
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nisab">Nisab (updated 09 April 2020 BDT)</label>
                            <div>
                                <input type="number" class="form-control" value="4300" id="nisab" name="nisab">
                            </div>
                        </div>

                    </div> 
                    
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="goldvalue">Value of Gold (৳)</label>
                                    <div>
                                        <input type="number" class="form-control" id="goldvalue" name="goldvalue">
                                    </div>
                                </div> 
                            
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="silvervalue">Value of Silver (৳)</label>
                            <div>
                                <input type="number" class="form-control" id="silvervalue" name="silvervalue">
                            </div>
                         </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="money">Cash in hand and in bank accounts</label>
                            <div>
                                <input type="number" class="form-control" id="money" name="money">
                            </div>
                        </div>

                    </div> 
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="hajjdiposit">Deposited for ( e.g. Hajj )</label>
                            <div>
                                <input type="number" class="form-control" id="hajjdiposit" name="hajjdiposit">
                            </div>
                        </div>
                            
                    </div>
                    <div class="col-md-4">
                        <label for="investment" class="control-label">Business or Personal Investments</label>
                        <input type="number" id ="investment" class="form-control" name="investment"
                            value="" required>
                        </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="loan">Borrowed money, goods bought on credit</label>
                            <div>
                                <input type="number" class="form-control" id="loan" name="loan">
                            </div>
                        </div>

                    </div> 
                    
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="bill">Wages due to employees</label>
                            <div>
                                <input type="number" class="form-control" id="bill" name="bill">
                            </div>
                        </div>
                            
                    </div>
                    <div class="col-md-4">
                        <label for="othersBill" class="control-label">Taxes, rent, utility bills due immediately</label>
                        <input type="number" id ="othersBill" class="form-control" name="othersBill"
                            value="" required>
                        </div>
                </div>

                <div class="form-group">
                            <button id="calculate" data-id="" class="btn btn-primary" name="calculate">Calculate</button>
                         </div>
            </form>
        </div>
    </div>
</div>
</div>