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
        margin-top: 20px;
    }

    .reviews-table th,
    .reviews-table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

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
    }
</style>

<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>



    <?php
    $exercise_id = $_GET['exercise_id'];

    if (isset($exercise_id) && is_numeric($exercise_id)) {
        $query = "SELECT review, rating FROM ratings WHERE portfolio_id = ?";
        $stmt = $link->prepare($query);
        $stmt->bind_param("i", $exercise_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $reviews = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    } else {
        echo "Invalid exercise_id";
    }

    echo "<div class='container'>";
    echo "<h2>Reviews</h2>";

    if (!empty($reviews)) {
        echo "<div class='table-container'>";
        echo "<table class='reviews-table'>";
        echo "<thead><tr><th>Review</th><th>Rating</th></tr></thead>";
        echo "<tbody>";

        foreach ($reviews as $review) {
            $reviewText = $review['review'];
            $rating = $review['rating'];

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

    echo "</div>";
    ?>

<div style="text-align: center;">
    <button onclick="goBack()" class="back-btn" style="text-align:center;padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">Previous Page</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>