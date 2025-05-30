<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');

// Assuming you have established a database connection ($link) before this point
$results1 = mysqli_query($link, "SELECT * FROM portfolio_name WHERE selected_portfolio = 1");

// Retrieve the user's ID from the session
$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($userId !== null) {
    $search_results = mysqli_query($link, "
        SELECT portfolio_name.*, 
               portfolio_info.firstname,
               portfolio_info.lastname
        FROM portfolio_name
        JOIN portfolio_info ON portfolio_name.createdBy = portfolio_info.createdBy
        WHERE portfolio_name.selected_portfolio = 1
        AND portfolio_name.createdBy = $userId
        GROUP BY portfolio_name.createdBy
    ");
} else {
    // Handle the case when the user is not logged in
    // You can redirect them to the login page or handle it in another way
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #4267B2;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        .button-container {
            padding: 20px;
        }

        .button-group {
            margin-bottom: 20px;
        }

        .button {
            display: block;
            width: 95%;
            padding: 10px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            margin-bottom: 10px;
            cursor: pointer;
            background-color: #3498db;
            color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #f9f9f9;
        }

        .delete-btn {
            padding: 10px 20px;
            background-color: #f44336;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>

    <div class="container">
        <div class="header">Account Settings</div>

        <div class="button-container">
            <!-- Portfolio Section -->
            <h3>Portfolios</h3>
            <div class="button-group">
                <a href="viewmyportfolios.php" class="button">View my Portfolios</a>
                <a href="createportfolio.php" class="button">Create New Portfolio</a>
            </div>
            <h3>Search Preferences</h3>
            <!-- Search Preferences Section -->
            <div class="button-group">
                <a href="search_preferences.php" class="button">Set Search Preferences</a>
                <a href="display_preferences.php" class="button">Display Current Preferences</a>
                <a href="delete_preferences.php" class="button">Delete Search Preferences</a>
            </div>
            <h3>Profile Pictures</h3>
            <!-- Pictures Section -->
            <div class="button-group">
                <a href="upload_profile_picture.php" class="button">Upload Profile Picture</a>
                <a href="delete_profile_picture.php" class="button">Delete Profile Picture</a>
            </div>
            <h3>Project and Reviews</h3>
            <!-- Miscellaneous Section -->
            <div class="button-group">
                <?php while ($portfolio = mysqli_fetch_assoc($search_results)) : ?>
                    <a href="upload_projects.php?exercise_id=<?php echo $portfolio['id']; ?>" class="button">Manage my Documentations</a>
                <?php endwhile; ?>
                <a href="guide_projects.php" class="button">Guide to Display Projects</a>
                <a href="my_reviews.php" class="button">My Reviews</a>
            </div>
            <h3>Misc</h3>
            <div class="button-group">
                <a href="reset-password.php" class="button">Change Password</a>
                <a href="livechat.php" class="button">Live Chat</a>
                <a href="privacy_policy_loggedin.php" class="button">Privacy Policy</a>
            </div>
        </div>
    </div>
    
</body>

</html>