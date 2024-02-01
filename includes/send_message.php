<?php
include_once 'check_user.php';

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recruitment_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted rating and createdBy
    $message = isset($_POST['message']) ? $conn->real_escape_string($_POST['message']) : '';
    $createdBy = isset($_POST['createdBy']) ? $conn->real_escape_string($_POST['createdBy']) : '';
    $portfolio_id = isset($_POST['portfolio_id']) ? (int)$_POST['portfolio_id'] : 0;
    $created_at = mysqli_real_escape_string($link, $_POST['created_at']);

    // Validate the input if needed

    // Save the rating and createdBy to the database for the specific portfolio_id
    $sql = "INSERT INTO messenger (message, createdBy, portfolio_id,created_at) VALUES ('$message', '$createdBy', $portfolio_id, '$created_at')";
    if ($conn->query($sql) === TRUE) {
        // Display a new window with the success message
        echo '<script>window.open("", "_blank").document.write("<h1>Message sent!</h1>");</script>';

        // Redirect to dev_search_loggedin.php with a success message
        header("Location: dev_search_loggedin.php?message=sent");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
