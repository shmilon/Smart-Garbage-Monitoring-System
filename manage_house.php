<?php 
include 'db_connection.php';
 
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        
        if(!empty($id)){

                echo $id;
            
                $deleteQuery = "DELETE FROM categories WHERE id = '$id'";
                
                if ($conn->query($deleteQuery) === TRUE) {
                    echo "Data deleted successfully.";
                    
                } else {
                    // Insertion failed
                    echo "Error adding data: " . $conn->error;
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
