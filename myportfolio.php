<?php require_once('config.php'); ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php'); ?>
<?php require_once(ROOT_PATH . '/includes/check_user.php'); ?>
<?php require_once(ROOT_PATH . '/includes/retrieve_data.php'); ?>

<?php //print_r($_SESSION); ?>


<head>
    <style>
        .button {
            display: block;
            padding: 20px;
            font-size: 18px;
            text-align: center;
            text-decoration: none;
            margin: 10px;
            cursor: pointer;
            background-color: #4CAF50; /* Green color */
            color: #fff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>

<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    

	<a href="viewmyportfolios.php" class="button">View my Portfolios</a>
    <a href="createportfolio.php" class="button">Create New Portfolio</a>
    <a href="search_preferences.php" class="button">Set Search Preferences</a>
    <a href="display_preferences.php" class="button">Display Current Preferences</a>
    <a href="delete_preferences.php" class="button">Delete Search Preferences</a>
    <a href="upload_profile_picture.php" class="button">Upload Profile Picture</a>
    <a href="delete_profile_picture.php" class="button">Delete Profile Picture</a>
    <a href="upload_projects.php" class="button">My Projects(not working yet)</a>
    <a href="my_reviews.php" class="button">My Reviews</a>

</body>
</html>
