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

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .resume-container {
            max-width: 1000px;
            margin: 20px auto;
        }

        .resume-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .resume-table th,
        .resume-table td {
            border: 2px solid #ddd;
            padding: 16px;
            text-align: left;
            font-size: 16px;
        }

        .resume-table th {
            background-color: #f2f2f2;
        }

        .section-header {
            font-weight: bold;
            font-size: 20px;
            background-color: #3498db;
            color: black;
        }

        .picture {
            width: 100px;
            height: auto;
        }
    </style>
    <body>


        <form method="post">
            <div>
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
            <div>
            <textarea name="review" id="review">Write a review about developer!(not required)</textarea>
            </div>
            <input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>">
            <input type="hidden" name="portfolio_id" value="<?= $portfolio_id; ?>">
            <input type="submit" value="Submit">
        </form>

        <div class="average-rating">
            Average Rating: <?php echo number_format($averageRating, 1); ?> out of 5
        </div>

    </body>
    </html>
