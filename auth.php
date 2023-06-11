<?php
session_start();
// Change this to your connection info.
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate form data
    if (empty($username) || empty($password)) {
        // Handle empty fields case
        echo "Please enter both username and password.";
    } else {


        // Prepare and execute the query
        $sql = $conn->prepare("SELECT * FROM users where username = '".$username."' and password = '".md5($password)."' ");
      //  $sql->bind_param("s", $username);
        $sql->execute();
        $result = $sql->get_result();

        // Check if a user with the given username exists
        if ($result->num_rows === 1) {
            // User exists, fetch the row
            $row = $result->fetch_assoc();

            // Verify the password
            if (md5($password) === $row['password']) {
                // Successful login
                echo "Login successful!";
				header('Location: index.php'); 
				exit();
            } else {
                // Failed login
                echo "Invalid username or password.";
            }
        } else {
            // User does not exist
            header('Location: login.php'); 
            echo "Invalid username or password.";
        }

        // Close the database connection
        $sql->close();
        $conn->close();
    }
} else {
    // Handle cases where the form is not submitted via POST method
    echo "Invalid request.";
}

?>
