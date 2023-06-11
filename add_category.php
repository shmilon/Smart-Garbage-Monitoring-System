<?php

include 'db_connection.php';

// Assuming you have established the database connection

if (isset($_POST['data'])) {
    $data = $_POST['data'];
    
    if(!empty($data)){


        // Check if the data already exists
        $checkQuery = "SELECT * FROM categories WHERE name = '$data'";
        $checkResult = $conn->query($checkQuery);
            
        if ($checkResult->num_rows > 0) {
            // Data already exists
            echo "Data already exists.";
        } else {
            // Data does not exist, perform the insertion query
            $insertQuery = "INSERT INTO categories (name) VALUES ('$data')";
            
            if ($conn->query($insertQuery) === TRUE) {
                // Insertion successful
                echo "Data added successfully.";
            } else {
                // Insertion failed
                echo "Error adding data: " . $conn->error;
            }
        }
    }else{
        // Invalid request
        echo "Input data";
    }

} else {
    // Invalid request
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
