<?php include_once 'check_user.php' ?>
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
    $portfolio_id = isset($_POST['portfolio_id']) ? (int)$_POST['portfolio_id'] : 0;
    $review = mysqli_real_escape_string($conn, $_POST['review']); // Use $conn instead of $link

    // Validate the rating
    if ($rating >= 1 && $rating <= 5) {
        // Save the rating and createdBy to the database for the specific portfolio_id
        $sql = "INSERT INTO ratings (rating, createdBy, portfolio_id, review) VALUES ($rating, '$createdBy', $portfolio_id, '$review')";
        $conn->query($sql);
    }

    // Redirect to dev_search_loggedin.php after submitting the form
    header("Location: dev_search_loggedin.php");
    exit(); // Ensure that no further code is executed after the redirection
}
        // Retrieve ratings for the specific portfolio_id from the database
        $portfolio_id = isset($_GET['exercise_id']) ? (int)$_GET['exercise_id'] : 0;
        $sql = "SELECT rating FROM ratings WHERE portfolio_id = $portfolio_id";
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