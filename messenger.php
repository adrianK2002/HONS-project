<?php require_once('config.php') ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once(ROOT_PATH . '/includes/check_user.php') ?>
<?php require_once(ROOT_PATH . '/config.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger Messages</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
            
        }

        header {
            background-color: #4267B2; /* Facebook Messenger Blue */
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        nav a {
            margin: 0 10px;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        .message-container {
            max-width: 600px;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4267B2;
            color: #fff;
        }

        .message {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 10px 0;
            padding: 10px;
        }

        .message strong {
            color: #4267B2;
        }

        .action {
            text-align: center;
        }

        .message button.reply-btn {
            background-color: #4267B2;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .message button.reply-btn:hover {
            background-color: #3B5998; /* Darker shade for hover effect */
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //navbar -->

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "recruitment_website";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) 
        die("Connection failed: " . $conn->connect_error);
    ?>

    <!-- Fetch and display messages in a table -->
    <?php
    function displayMessagesTable($title, $result)
    {
        echo "<h2>$title</h2>";
        echo "<div class='message-container'>";
        echo "<table>";
        echo "<tr><th>Sender</th><th>Message</th><th>Timestamp</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["createdBy"] . "</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "<td>" . $row["created_at"] . "</td>";
            
            // Add an "Action" column with a "Reply" button (except for outgoing messages)
            echo "<td class='action'>";
            if (!isset($_SESSION['id']) || $row["createdBy"] != $_SESSION['id']) {
                echo "<button class='reply-btn'>Reply</button>";
            }
            echo "</td>";

            echo "</tr>";
        }

        echo "</table>";
        echo "</div><br>";
    }

    // Fetch messages received within the last 48 hours where exercise_id = portfolio_id
    $sqlRecent = "SELECT * FROM messenger WHERE created_at >= NOW() - INTERVAL 2 DAY AND portfolio_id={$_GET['exercise_id']}";
    $resultRecent = $conn->query($sqlRecent);

    if ($resultRecent->num_rows > 0) {
        displayMessagesTable("Messages received within the last 48 hours", $resultRecent);
    } else {
        echo "<p>No recent messages </p>";
    }
    
    // Fetch messages older than 48 hours where exercise_id = portfolio_id
    $sqlOlder = "SELECT * FROM messenger WHERE created_at < NOW() - INTERVAL 2 DAY AND portfolio_id={$_GET['exercise_id']}";
    $resultOlder = $conn->query($sqlOlder);

    if ($resultOlder->num_rows > 0) {
        displayMessagesTable("Messages older than 48 hours", $resultOlder);
    } else {
        echo "<p>No older messages </p>";
    }

    // Fetch messages sent by the logged-in user
    $sqlSent = "SELECT * FROM messenger WHERE createdBy = {$_SESSION['id']}";
    $resultSent = $conn->query($sqlSent);

    if ($resultSent->num_rows > 0) {
        displayMessagesTable("Outgoing Messages", $resultSent);
    } else {
        echo "<p>No sent messages.</p>";
    }

    $conn->close();
    ?>

</body>

</html>
