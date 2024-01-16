<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="your_stylesheet.css">
    <style>


        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    
    <br>
    <form action="includes/post_portfolio_name.php" method="POST">
        <fieldset>
            <div>
                <label>Please enter the name of your portfolio:</label>
                <br>
                <input type="text" name="name" id="name" placeholder="Enter portfolio name" required>
                <input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>">
            </div>
            
            <div class="button">
                <input type="submit" class="button" value="Publish">
            </div>
        </fieldset>
    </form>
</body>
</html>
