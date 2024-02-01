<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');

require_once(ROOT_PATH . '/includes/send_message.php');
$exercise_id = mysqli_real_escape_string($link, $_GET['exercise_id']);

$query = "SELECT * FROM portfolio_info WHERE portfolio_id = $exercise_id";
$result = mysqli_query($link, $query);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($link));
}

// Assuming you only expect one row for the user
$userInfo = mysqli_fetch_assoc($result);
?>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .resume-container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .section-header {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .rating-form {
        display: flex;
        flex-direction: column;
    }

    .review-container {
        margin-bottom: 20px;
    }

    textarea {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    .submit-btn {
        background-color: #4caf50;
        color: #fff;
        border: none;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 4px;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }
</style>

<body>
       <!-- Navbar -->
       <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    <!-- //Navbar -->

    <div class="resume-container">

    <h2 class="section-header">Send message to <?= $userInfo['firstname'] . ' ' . $userInfo['lastname']; ?></h2>

        <form method="post" class="rating-form">
           

            <div class="review-container">

                <textarea name="message" id="message" rows="4" cols="150"></textarea>
            </div>

            <input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>">
            <input type="hidden" name="portfolio_id" value="<?= $portfolio_id; ?>">
            <input type="submit" value="Send Message!" class="submit-btn">
        </form>

    
    </div>



</body>
