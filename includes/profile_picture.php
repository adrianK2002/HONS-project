<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file is selected
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        // Get file details
        $createdBy = mysqli_real_escape_string($link, $_POST['createdBy']);
        $fileName = $_FILES['profile_picture']['name'];
        $fileTmpName = $_FILES['profile_picture']['tmp_name'];
        $fileSize = $_FILES['profile_picture']['size'];
        $fileType = $_FILES['profile_picture']['type'];

        // Read the file content
        $fileContent = file_get_contents($fileTmpName);

        // Save to the database
        $query = "INSERT INTO profile_pictures (createdBy, filename, file_content, file_type) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, 'isss', $createdBy, $fileName, $fileContent, $fileType);

        if (mysqli_stmt_execute($stmt)) {
            // Close the prepared statement
            mysqli_stmt_close($stmt);

            // Redirect to myportfolio.php
            header("Location: ../myportfolio.php");
            exit();
        } else {
            echo "Error uploading profile picture: " . mysqli_error($link);
        }
    } else {
        echo "Please select a valid profile picture.";
    }
} else {
    echo "Invalid request method.";
}
?>