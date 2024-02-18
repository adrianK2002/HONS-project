<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
require_once(ROOT_PATH . '/includes/rate_profile.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link to GitHub</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
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
            text-align: center;
        }

        .reviews-table th {
            background-color: #4CAF50;
            color: white;
        }

        .section-header {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    <div class="container">
        <h2 class="section-header">Link to GitHub</h2>
        <table class="reviews-table">
            <tbody>
                <?php 
                    // Reset the internal pointer to the beginning of the result set
                    $getSelectedPortfolio1->data_seek(0);
                        
                    while ($row = $getSelectedPortfolio1->fetch_assoc()) { ?>
                        <tr>
                            <td><a href="<?php echo $row['git']; ?>" target="_blank" class="btn">Link to user's GitHub</a></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
