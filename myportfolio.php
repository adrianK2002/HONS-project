<?php require_once('config.php'); ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php'); ?>
<?php require_once(ROOT_PATH . '/includes/check_user.php'); ?>
<?php require_once(ROOT_PATH . '/includes/retrieve_data.php'); ?>

<?php //print_r($_SESSION); ?>

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
                <a href="upload_projects.php" class="button">My Projects (not working yet)</a>
                <a href="my_reviews.php" class="button">My Reviews</a>
                </div>
                <h3>Misc</h3>
                <div class="button-group">
                <a href="livechat.php" class="button">Live Chat</a>
                <a href="privacy_policy.php" class="button">Privacy Policy</a>
            </div>
        </div>
    </div>
</body>

</html>
