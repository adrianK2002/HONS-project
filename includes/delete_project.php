<?php
require_once('config.php');

// Check if the projectId is set
if (isset($_POST['projectId'])) {
    // Retrieve projectId from the POST request
    $projectId = $_POST['projectId'];

    // Prepare DELETE query
    $deleteQuery = "DELETE FROM projects WHERE id = ?";
    $deleteStmt = $link->prepare($deleteQuery);
    $deleteStmt->bind_param("i", $projectId);

    // Execute the DELETE query
    if ($deleteStmt->execute()) {
        // The project has been successfully deleted
        echo "Project deleted successfully";
    } else {
        // Error occurred while deleting the project
        echo "Error deleting project: " . $deleteStmt->error;
    }

    // Close the prepared statement
    $deleteStmt->close();
} else {
    // projectId is not set in the POST request
    echo "projectId is not set";
}

// Close the database connection
$link->close();
?>
