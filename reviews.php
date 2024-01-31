<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
require_once(ROOT_PATH . '/includes/rate_profile.php');
?>


<style>

    </style>
<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    <?php
    // Query to select all reviews
    $query = "SELECT review FROM ratings";
    $result = $link->query($query);

    // Fetch reviews
    $reviews = $result->fetch_all(MYSQLI_ASSOC);


    // Display the reviews
    echo "<h2>Reviews</h2>";

    if (!empty($reviews)) {
        foreach ($reviews as $review) {
            $reviewText = $review['review'];
            echo "<p>Review: $reviewText</p>";
            echo "<hr>"; // Optional: Add a horizontal line to separate each review
        }
    } else {
        echo "<p>No reviews available.</p>";
    }
    ?>
</body>