<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
require_once(ROOT_PATH . '/includes/rate_profile.php');
?>

<body>
    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    <!-- //Navbar -->

    <div class="resume-container">
        <h2 class="section-header">Rate This Portfolio</h2>

        <form method="post" class="rating-form">
            <div class="rating-options">
                <label for="rating-1">1</label>
                <input type="radio" name="rating" id="rating-1" value="1">
                <label for="rating-2">2</label>
                <input type="radio" name="rating" id="rating-2" value="2">
                <label for="rating-3">3</label>
                <input type="radio" name="rating" id="rating-3" value="3">
                <label for="rating-4">4</label>
                <input type="radio" name="rating" id="rating-4" value="4">
                <label for="rating-5">5</label>
                <input type="radio" name="rating" id="rating-5" value="5">
            </div>

            <div class="review-container">
                <label for="review">Leave a Review (not required):</label>
                <textarea name="review" id="review" rows="4" cols="50"></textarea>
            </div>

            <input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>">
            <input type="hidden" name="portfolio_id" value="<?= $portfolio_id; ?>">
            <input type="submit" value="Submit" class="submit-btn">
        </form>

        <div class="average-rating">
            Average Rating: <?php echo number_format($averageRating, 1); ?> out of 5
        </div>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .resume-container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .section-header {
            font-weight: bold;
            font-size: 24px;
            background-color: green;
            color: #fff;
            padding: 10px;
            margin-top: 0;
            border-radius: 8px 8px 0 0;
        }

        .rating-form {
            margin-top: 20px;
        }

        .rating-options {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .rating-options label {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-right: 5px;
            cursor: pointer;
        }

        .review-container {
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .submit-btn {
            background-color: green;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .average-rating {
            font-size: 18px;
            margin-top: 20px;
        }
    </style>
</body>
</html>
