<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rental Management System - Decompile Lab</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <meta name="msapplication-tap-highlight" content="no">
    <link href="./main.css" rel="stylesheet">
</head>

<?php

    session_start(); 

    // If the user is not logged in redirect to the login page...
    if (isset($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
    }
    


include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    $error_pass = false;

    // Validate form data
    if (!empty($username) || !empty($password)) {

        // Prepare and execute the query
        $sql = $conn->prepare("SELECT * FROM users where username = '".$username."' and password = '".md5($password)."' ");
        $sql->execute();
        $result = $sql->get_result();

        // Check if a user with the given username exists
        if ($result->num_rows === 1) {
            // User exists, fetch the row
            $row = $result->fetch_assoc();

            // Verify the password
            if (md5($password) === $row['password']) {

                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['name'] = $row['name'];
                    $type = array("", "Admin", "Staff", "Alumnus/Alumna");
                    $_SESSION['type'] = $type[$row['type']];
                    $_SESSION['userID'] = $row['id'];
     
                // Successful login
                echo "Login successful!";
				header('Location: index.php'); 
				exit();
            } else {
                // Failed login
                $errorMessage = "Invalid username or password.";
            }
        } else {
            // Failed login
            $errorMessage = "Invalid username or password.";
        }

        // Close the database connection
        $sql->close();
        $conn->close();
    }
}

?>


<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="app-logo-inverse mx-auto mb-3"></div>
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Welcome back,</div>
                                            <span>Please sign in to your account below.</span>
                                        </h4>
                                    </div>



                                    <form class="" action="" method="POST" id="idloginForm">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="username" id="idUsername" placeholder="Email here..."
                                                        type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password" id="idPassword"
                                                        placeholder="Password here..." type="password"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative form-check">
                                            <input name="check" id="idCheck" type="checkbox"
                                                class="form-check-input">
                                            <label for="Check" class="form-check-label">Keep me logged in</label>
                                        </div>

                                        <span class="text-danger"><?php 
                                        if(empty($username) || empty($password)){
                                            echo "Please enter both username and password.";
                                        }else{
                                            echo isset($errorMessage) ? $errorMessage : ''; 
                                        } ?></span>
                                    </form>



                                   
                                    
                                </div>
                                <div class="modal-footer clearfix">
                                    <div class="float-left">
                                        <a href="javascript:void(0);" class="btn-lg btn btn-link ">Recover Password</a>
                                    </div>
                                    <div class="float-right">
                                        <button class="btn btn-primary btn-lg" id="idloginButton">Login to Dashboard</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © Decompile Lab</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="./assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
    
    
    <script type="text/javascript">

        const submitButton = document.getElementById('idloginButton');
        const form = document.getElementById('idloginForm');

        submitButton.addEventListener('click', function() {
            form.submit();
        });

    </script>




</body>

</html>