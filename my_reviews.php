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

    .reviews-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .reviews-table th,
    .reviews-table td {
        border: 1px solid #ddd;
        padding: 12px; /* Increased padding for better readability */
        text-align: left;
    }

    /* Add background color to table header */
    .reviews-table th {
        background-color: #4CAF50;
        color: white;
    }

    .review {
        font-size: 16px;
        color: #333;
    }

    .rating {
        font-size: 14px;
        color: #666;
        /* Adjust the width of the rating field */
        width: 50px;
    }

    .action-btn {
        background-color: #ff3333;
        color: #fff;
        padding: 6px 12px; /* Adjust padding for smaller size */
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .action-btn:hover {
        background-color: #cc0000;
    }
</style>

<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_review'])) {
        $reviewIdToDelete = sanitizeInput($_POST['delete_review']);

        $deleteQuery = "DELETE FROM ratings WHERE id = ? AND createdBy = ?";
        $deleteStmt = $link->prepare($deleteQuery);
        $deleteStmt->bind_param("ii", $reviewIdToDelete, $_SESSION['id']);
        $deleteStmt->execute();
        $deleteStmt->close();
    }

    $query = "SELECT id, review, rating FROM ratings WHERE createdBy = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param("i", $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $reviews = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    echo "<div class='container'>";
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

            if (!empty($reviewText)) {
                echo "<tr>";
                echo "<td class='review'>$reviewText</td>";
                echo "<td class='rating'>$rating</td>";
                echo "<td><form method='post' onsubmit='return confirm(\"Are you sure you want to delete this review?\")'>
                          <input type='hidden' name='delete_review' value='$reviewId'>
                          <button class='action-btn' type='submit'>Delete</button>
                      </form></td>";
                echo "</tr>";
            }
        }

        echo "</tbody></table>";
        echo "</div>";
    } else {
        echo "<p>No reviews available.</p>";
    }

    echo "</div>";
    ?>
</body>
