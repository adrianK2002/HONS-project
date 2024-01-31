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
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.table-container {
    overflow-x: auto;
    margin-top: 20px;
}

.reviews-table {
    width: 100%;
    border-collapse: collapse;
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
$exercise_id = $_GET['exercise_id'];

// Check if the exercise_id is set and is a valid integer to prevent SQL injection
if (isset($exercise_id) && is_numeric($exercise_id)) {
    // Use a prepared statement to prevent SQL injection
    $query = "SELECT review, rating FROM ratings WHERE portfolio_id = ?";  // Assuming 'portfolio_id' is the correct column name

    // Prepare the statement
    $stmt = $link->prepare($query);

    // Bind the parameter
    $stmt->bind_param("i", $exercise_id);  // Assuming 'i' stands for integer, adjust if it's a different type

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch reviews and ratings
    $reviews = $result->fetch_all(MYSQLI_ASSOC);

    // Close the statement
    $stmt->close();
} else {
    // Handle invalid exercise_id (e.g., redirect, show an error message, etc.)
    echo "Invalid exercise_id";
}

    // Display the reviews and ratings in a table
    echo "<h2>Reviews</h2>";

    if (!empty($reviews)) {
        echo "<div class='table-container'>";
        echo "<table class='reviews-table'>";
        echo "<thead><tr><th>Review</th><th>Rating</th></tr></thead>";
        echo "<tbody>";

        foreach ($reviews as $review) {
            $reviewText = $review['review'];
            $rating = $review['rating'];

            // Only display non-empty reviews
            if (!empty($reviewText)) {
                echo "<tr>";
                echo "<td class='review'>$reviewText</td>";
                echo "<td class='rating'>$rating</td>";
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
