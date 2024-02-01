<?php
require_once('config.php');

// Add this section to your code
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    for ($i = 1; $i <= $numProjects; $i++) {
        // Check if a file is selected for Project $i
        if (isset($_FILES['project' . $i]) && $_FILES['project' . $i]['error'] === UPLOAD_ERR_OK) {
            // Get file details
            $createdBy = $_SESSION['id']; // Assuming you have a user ID stored in the session
            $fileName = $_FILES['project' . $i]['name'];
            $fileTmpName = $_FILES['project' . $i]['tmp_name'];
            $fileSize = $_FILES['project' . $i]['size'];
            $fileType = $_FILES['project' . $i]['type'];

            // Read the file content
            $fileContent = fopen($fileTmpName, 'rb');

            // Save to the database
            $query = "INSERT INTO projects (createdBy, filename, file_content, file_type) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, 'isbs', $createdBy, $fileName, $fileContent, $fileType);

            if (mysqli_stmt_execute($stmt)) {
                // Close the prepared statement
                mysqli_stmt_close($stmt);

                // Redirect to myportfolio.php
                header("Location: myportfolio.php");
                exit();
            } else {
                echo "Error uploading project: " . mysqli_error($link);
            }
        }
    }
}
?>