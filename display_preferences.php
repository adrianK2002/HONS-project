<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
?>




    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .profile-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            color: #333;
        }

        section {
            margin-bottom: 20px;
        }

        table.styled-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.styled-table th, table.styled-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table.styled-table th {
            background-color: #f2f2f2;
        }

        .radio-cell {
            text-align: center;
            margin-top: 10px;
        }

        .radio-cell input {
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>

<head>
    <!-- Your existing head styles -->
</head>
<?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
<div class="profile-container">
    <h3>User Preferences</h3>
    <table class="styled-table">
        <?php
        $previousUserId = null;

        while ($row = $preferences->fetch_assoc()) {
            // Check if the user ID has changed
            if ($previousUserId !== $row['createdBy']) {
                // If it has changed, display a new set of preferences
                ?>

                <tr>
                    <th>Programming Languages</th>
                    <td><?php echo $row['language']; ?></td>
                </tr>
                <tr>
                    <th>Software Tools</th>
                    <td><?php echo $row['tool']; ?></td>
                </tr>
                <tr>
                    <th>Experience Level</th>
                    <td><?php echo $row['experience']; ?></td>
                </tr>
                <?php
            } else {
                // If the user ID is the same, only display the new set of preferences
                ?>
                <tr>
                    <th>Programming Languages</th>
                    <td><?php echo $row['language']; ?></td>
                </tr>
                <tr>
                    <th>Software Tools</th>
                    <td><?php echo $row['tool']; ?></td>
                </tr>
                <tr>
                    <th>Experience Level</th>
                    <td><?php echo $row['experience']; ?></td>
                </tr>
                <?php
            }

            // Update the previous user ID
            $previousUserId = $row['createdBy'];
        }
        ?>
    </table>

</div>
<div style="text-align: center">
<a href="myportfolio.php" class="btn">Go Back to Portfolio</a>
</div>