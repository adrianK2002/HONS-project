<?php require_once('config.php'); ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php'); ?>
<?php require_once(ROOT_PATH . '/includes/check_admin_user.php'); ?>
<?php require_once(ROOT_PATH . '/includes/retrieve_data.php'); ?>

<?php //print_r($_SESSION); ?>
<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
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
        .section-container {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .section-button {
            display: block;
            width: 95%;
            padding: 10px;
            font-size: 16px;
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

        .section-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>

    <div class="container">
        <div class="header">
            Admin Dashboard
        </div>

        <div class="section-container">
            <a href="manage_users.php" class="section-button">Manage Users</a>
        </div>

        <div class="section-container">
            <a href="manage_portfolios.php" class="section-button">Manage Portfolios</a>
        </div>

        <div class="section-container">
            <a href="manage_reviews.php" class="section-button">Manage Reviews</a>
        </div>

        <div class="section-container">
            <a href="manage_projects.php" class="section-button">Manage Projects</a>
        </div>

        <div class="section-container">
            <a href="manage_preferences.php" class="section-button">Manage Preferences</a>
        </div>
    </div>
</body>

</html>
