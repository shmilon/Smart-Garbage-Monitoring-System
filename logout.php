<?php
    session_start(); // Start the session

    // Destroy the session
    session_destroy();

    // Redirect to the desired page after logout
    header("Location: login.php"); // Replace 'index.php' with the appropriate page
    exit();
?>
