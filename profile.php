<?php include 'db_connection.php'; ?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-user icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <div id="page_title">Profile </div>
                </div>
                <div class="page-title-actions">

                </div>
            </div>
        </div>

<!-- title bar end  -->


<div class="row">
<div class="col-sm-12 col-lg-12 col-xl-4">
    <div class="mb-3 profile-responsive card">
        <div class="dropdown-menu-header">
            <div class="dropdown-menu-header-inner bg-dark">
                <div class="menu-header-image opacity-1"
                    style="background-image: url('assets/images/dropdown-header/abstract3.jpg');"></div>
                <div class="menu-header-content btn-pane-right">
                    <div class="avatar-icon-wrapper mr-3 avatar-icon-xl btn-hover-shine">
                        <div class="avatar-icon rounded">
                            <img src="assets/images/avatars/1.jpg" alt="Avatar 5">
                        </div>
                    </div>
                    <div>
                        <h5 class="menu-header-title"><?php echo $_SESSION['name']; ?></h5>
                        <h6 class="menu-header-subtitle"><?php echo $_SESSION['type']; ?></h6>
                    </div>
                    
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="widget-content pt-4 pb-4 pr-1 pl-1">
                    <div class="text-center">
                        <h5 class="mb-0">
                            <span class="pr-1">
                                <b class="text-danger">12</b> new leads,
                            </span>
                            <span><b class="text-success">$56.24</b> in sales</span>
                        </h5>
                    </div>
                </div>
            </li>
            <li class="p-0 list-group-item">
                <div class="grid-menu grid-menu-2col">
                    <div class="no-gutters row">
                        <div class="col-sm-6">
                            <div class="p-1">
                                <button
                                    class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                    <i class="lnr-lighter text-dark opacity-7 btn-icon-wrapper mb-2"></i> Automation
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-1">
                                <button
                                    class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                    <i class="lnr-construction text-danger opacity-7 btn-icon-wrapper mb-2"></i> Reports
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-1">
                                <button
                                    class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                    <i class="lnr-bus text-success opacity-7 btn-icon-wrapper mb-2"></i> Activity
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-1">
                                <button
                                    class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-focus">
                                    <i class="lnr-gift text-focus opacity-7 btn-icon-wrapper mb-2"> </i>Settings
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="col-sm-12 col-lg-12 col-xl-8">
    <div class="main-card mb-3 card">
        <div class="card-head">
        <div class="card-body">
            <h5 class="card-title text-center">User Details</h5>
            <form class="">
                <div class="position-relative form-group">
                    <label for="FullName" class="">Full Name</label>
                    <input name="address" id="FullName" placeholder="jhon" type="text" value="<?php echo $_SESSION['name']; ?>"
                        class="form-control">
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="exampleEmail11" class="" >Email</label>
                            <input name="email" id="exampleEmail11" placeholder="with a placeholder" type="email" required
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="examplePassword11" class="">Password</label>
                            <input name="password" id="examplePassword11" placeholder="password"
                                type="password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label for="exampleAddress" class="">Address</label>
                    <input name="address" id="exampleAddress" placeholder="1234 Main St" type="text"
                        class="form-control">
                </div>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="exampleCity" class="">City</label>
                            <input name="city" id="exampleCity" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="exampleState" class="">State</label>
                            <input name="state" id="exampleState" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="exampleZip" class="">Zip</label>
                            <input name="zip" id="exampleZip" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-check">
                    <input name="check" id="exampleCheck" type="checkbox" class="form-check-input" required>
                    <label for="exampleCheck" class="form-check-label">Check me out</label>
                </div>
                <button class="mt-2 btn btn-primary btn-show-swal" data-type="success">Save</button>
            </form>
        </div>
        </div>
    </div>

</div>
</div>

<script>


    
    t(".btn-show-swal-basic").click((function () {
        n()({
            text: "The Internet?",
            title: "That thing is still around?",
            type: "question"
        })
    };
    t(".btn-show-swal").each((function () {
        t(this).click((function () {
            var e = t(this).attr("data-type");
            n()({
                title: "Type: " + e,
                text: "Do you want to continue",
                type: e,
                confirmButtonText: "Cool"
            })
        }
        ))
    }
    ))
</script>