<?php
require_once('config.php');

// Check if the project ID is provided
if (isset($_POST['projectId'])) {
    $projectId = (int)$_POST['projectId'];

    // Prepare a query to delete the project by its ID
    $deleteQuery = "DELETE FROM projects WHERE id = ? AND createdBy = ?";
    $deleteStmt = $link->prepare($deleteQuery);
    $deleteStmt->bind_param("ii", $projectId, $_SESSION['id']);

    if ($deleteStmt->execute()) {
        // Success, send a response back to the main page
        echo "success";
    } else {
        // Error handling, send an error response back to the main page
        echo "Error deleting the project.";
    }

    $deleteStmt->close();
} else {
    // Project ID not provided, send an error response back to the main page
    echo "Project ID not provided.";
}
?>
