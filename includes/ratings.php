<?php
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

$ratings = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted rating and createdBy
    $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
    $createdBy = isset($_POST['createdBy']) ? $conn->real_escape_string($_POST['createdBy']) : '';

    // Validate the rating
    if ($rating >= 1 && $rating <= 5) {
        // Save the rating and createdBy to the database
        $sql = "INSERT INTO ratings (rating, createdBy) VALUES ($rating, '$createdBy')";
        $conn->query($sql);
    }
}

// Retrieve ratings from the database
$sql = "SELECT rating FROM ratings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch ratings from the result set
    while ($row = $result->fetch_assoc()) {
        $ratings[] = (int)$row['rating'];
    }
}

// Calculate the average rating
$averageRating = empty($ratings) ? 0 : array_sum($ratings) / count($ratings);

// Close the database connection
$conn->close();
?>