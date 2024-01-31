<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
require_once(ROOT_PATH . '/includes/rate_profile.php');
?>


<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.reviews-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.reviews-table th, .reviews-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.review {
    font-size: 16px;
    color: #333;
}

.rating {
    font-size: 14px;
    color: #666;
}

    </style>
<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    <?php
// Assuming you have a database connection established ($link)

// Check if the delete form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_review'])) {
    // Assuming you have a function to sanitize and validate input
    $reviewIdToDelete = sanitizeInput($_POST['delete_review']);

    // Use a prepared statement to prevent SQL injection
    $deleteQuery = "DELETE FROM ratings WHERE id = ? AND createdBy = ?";
    // Assuming 'id' is the primary key for the ratings table

    // Prepare the delete statement
    $deleteStmt = $link->prepare($deleteQuery);

    // Bind parameters for the delete statement
    $deleteStmt->bind_param("ii", $reviewIdToDelete, $_SESSION['id']);

    // Execute the delete statement
    $deleteStmt->execute();

    // Close the delete statement
    $deleteStmt->close();
}

// Use a prepared statement to prevent SQL injection
$query = "SELECT id, review, rating FROM ratings WHERE createdBy = ?";
// Assuming 'createdBy' is the column for user ID

// Prepare the statement
$stmt = $link->prepare($query);

// Bind the parameter
$stmt->bind_param("i", $_SESSION['id']);
// Assuming 'createdBy' is an integer; adjust if it's a different type

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch reviews and ratings
$reviews = $result->fetch_all(MYSQLI_ASSOC);

// Close the statement
$stmt->close();

// Display the reviews and ratings in a table
echo "<h2>My Reviews</h2>";

if (!empty($reviews)) {
    echo "<div class='table-container'>";
    echo "<table class='reviews-table'>";
    echo "<thead><tr><th>Review</th><th>Rating</th><th>Action</th></tr></thead>";
    echo "<tbody>";

    foreach ($reviews as $review) {
        $reviewId = $review['id'];
        $reviewText = $review['review'];
        $rating = $review['rating'];

        // Only display non-empty reviews
        if (!empty($reviewText)) {
            echo "<tr>";
            echo "<td class='review'>$reviewText</td>";
            echo "<td class='rating'>$rating</td>";
            echo "<td><form method='post'>
                      <input type='hidden' name='delete_review' value='$reviewId'>
                      <button class='delete-btn' type='submit'>Delete</button>
                  </form></td>";
            echo "</tr>";
        }
    }

    echo "</tbody></table>";
    echo "</div>";
} else {
    echo "<p>No reviews available.</p>";
}
?>
</div>

</body>