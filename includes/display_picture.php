<?php
require_once('../config.php');

// Assuming you have a user ID to identify the user whose picture you want to display
$userId = $_SESSION['id'];

// Fetch profile picture details from the database
$query = "SELECT filename, file_content, file_type FROM profile_pictures WHERE createdBy = ?";
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, 'i', $userId);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $filename, $fileContent, $fileType);

// Check if a profile picture is found
if (mysqli_stmt_fetch($stmt)) {
    // Set the appropriate Content-Type header based on the file type
    header("Content-Type: $fileType");
    
    // Output the file content (the profile picture)
    echo $fileContent;
} else {
    // If no profile picture is found, you can display a default image or show an alternative message
    // For example, you can use a default image:
    // header("Content-Type: image/jpeg");
    // readfile("path/to/default/image.jpg");
    // Or show a placeholder image with an alternative message:
    echo '<img src="path/to/placeholder/image.jpg" alt="Profile Picture Not Found">';
}

// Close the database statement
mysqli_stmt_close($stmt);
?>