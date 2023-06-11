<?php
// Assuming you have established the database connection

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Perform the deletion query using prepared statements to prevent SQL injection
    $sql = "DELETE FROM houses WHERE id = '$id'";
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        // Deletion successful
        echo "Record deleted successfully.";
    } else {
        // Deletion failed
        echo "Error deleting record: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
} else {
    // Invalid request
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
