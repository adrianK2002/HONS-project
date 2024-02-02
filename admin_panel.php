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

</body>

</html>
