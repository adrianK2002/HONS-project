<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
require_once(ROOT_PATH . '/includes/del+edit.php');

?>

<head>
	<link rel="stylesheet" href="static/table.css">
    <style>
        input[type=text],
        select {
            width: 300px;
            height: 30px;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 2px solid #000000;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: "Comic Sans MS", cursive, sans-serif;
        }

        input[type=submit] {
            width: 200px;
            height: 40px;
            background-color: #0066CC;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: 2px solid #000000;
            border-radius: 4px;
            cursor: pointer;
            font-family: "Comic Sans MS", cursive, sans-serif;
            transition: background-color 0.3s;
        }

        input[type=submit]:hover {
            background-color: #004080;
        }

        table {
            margin: 30px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: white;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #0066CC;
            color: white;
        }

        /* Style for the action buttons in the table */
        a.view-btn, a.update-btn, a.del-btn, a.insert-btn {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        a.view-btn {
            background-color: #4CAF50;
        }

        a.update-btn {
            background-color: #FFC107;
        }

        a.del-btn {
            background-color: #F44336;
        }

        a.insert-btn {
            background-color: #2196F3;
        }

        a.view-btn:hover, a.update-btn:hover, a.del-btn:hover, a.insert-btn:hover {
            background-color: #333;
        }
    </style>
</head>



<?php //print_r($_SESSION); ?>
<body>
    <!-- Your existing body content -->
    <!-- navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //navbar -->

    <table>
        <thead>
            <tr>
                <th>Portfolio Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $newresults->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <a href="edit_portfolio.php?exercise_id=<?php echo $row['id'] ?>" class="insert-btn">Insert Data</a>
                    </td>
                    <td>
                        <a href="viewmyportfolios.php?del=<?php echo $row['id']; ?>" class="del-btn">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>