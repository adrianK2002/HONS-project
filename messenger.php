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
            .action {
        margin-top: 20px;
        text-align: center;
    }

    .submit-btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        color: #fff;
        background-color: #4267B2; /* Facebook Messenger Blue */
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #3B5998; /* Darker shade for hover effect */
    }
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
<?php
$results1 = mysqli_query($link, "SELECT * FROM portfolio_name WHERE selected_portfolio = 1");
$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($userId !== null) {
    $portfolioQuery = "SELECT portfolio_id FROM portfolio_info WHERE createdBy = $userId";
    $portfolioResult = mysqli_query($link, $portfolioQuery);

    if (!$portfolioResult) {
        die("Error in SQL query: " . mysqli_error($link));
    }

    $portfolioRow = mysqli_fetch_assoc($portfolioResult);

    if ($portfolioRow) {
        $portfolioId = $portfolioRow['portfolio_id'];

        $search_results = mysqli_query($link, "
            SELECT portfolio_name.*, 
                   portfolio_info.firstname,
                   portfolio_info.lastname,
                   users.username,
                   messenger.message,
                   messenger.created_at AS message_created_at
            FROM portfolio_name
            JOIN portfolio_info ON portfolio_name.createdBy = portfolio_info.createdBy
            JOIN users ON portfolio_info.createdBy = users.id
            LEFT JOIN messenger ON portfolio_info.createdBy = messenger.createdBy
            WHERE portfolio_name.selected_portfolio = 1
            AND portfolio_name.createdBy = $userId
            GROUP BY portfolio_name.createdBy, messenger.id
            ORDER BY messenger.created_at DESC
        ");
    } else {
        header("Location: setup_portfolio.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>

<body>

    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //navbar -->
    <div class="action">
        <a href="send_message.php" class="submit-btn">Send a Message</a>
    </div>

    <!-- Fetch and display messages in a table -->
    <?php
    function displayMessagesTable($title, $result)
    {
        echo "<h2>$title</h2>";
        echo "<div class='message-container'>";
        echo "<table>";
        echo "<tr><th>Sender</th><th>Message</th><th>Timestamp</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . (isset($row["firstname"]) ? $row["firstname"] : "") . " " . (isset($row["lastname"]) ? $row["lastname"] : "") . " (ID: " . $row["createdBy"] . ")</td>";
            echo "<td>" . $row["message"] . "</td>";
            echo "<td>" . $row["created_at"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div><br>";
    }

    $userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    if ($userId !== null) {
        $portfolioQuery = "SELECT portfolio_id FROM portfolio_info WHERE createdBy = $userId";
        $portfolioResult = mysqli_query($link, $portfolioQuery);

        if (!$portfolioResult) {
            die("Error in SQL query: " . mysqli_error($link));
        }

        $portfolioRow = mysqli_fetch_assoc($portfolioResult);

        if ($portfolioRow) {
            $portfolioId = $portfolioRow['portfolio_id'];

            $sqlRecent = "SELECT messenger.*, portfolio_info.firstname 
                          FROM messenger 
                          JOIN portfolio_info ON messenger.createdBy = portfolio_info.createdBy
                          JOIN portfolio_name ON portfolio_info.portfolio_id = portfolio_name.id
                          WHERE messenger.created_at >= NOW() - INTERVAL 2 DAY 
                            AND messenger.portfolio_id = $portfolioId
                            AND portfolio_name.selected_portfolio = 1
                          ORDER BY messenger.created_at DESC";

            $resultRecent = $link->query($sqlRecent);

            if ($resultRecent->num_rows > 0) {
                displayMessagesTable("Messages received within the last 48 hours", $resultRecent);
            } else {
                echo "<p>No recent messages </p>";
            }

            $sqlOlder = "SELECT messenger.*, portfolio_info.firstname 
                         FROM messenger 
                         JOIN portfolio_info ON messenger.createdBy = portfolio_info.createdBy
                         WHERE messenger.created_at < NOW() - INTERVAL 2 DAY 
                           AND messenger.portfolio_id = $portfolioId
                         ORDER BY messenger.created_at DESC";

            $resultOlder = $link->query($sqlOlder);

            if ($resultOlder->num_rows > 0) {
                displayMessagesTable("Messages older than 48 hours", $resultOlder);
            } else {
                echo "<p>No older messages </p>";
            }
        }
    }
    ?>

    <?php
    function displayOutgoingMessages($title1, $result1)
    {
        echo "<h2>$title1</h2>";
        echo "<div class='message-container'>";
        echo "<table>";
        echo "<tr><th>Message</th><th>Timestamp</th></tr>";

        while ($row = $result1->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["message"]) . "</td>";
            echo "<td>" . $row["created_at"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div><br>";
    }

    $userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

    if ($userId !== null) {
        $portfolioQuery1 = "SELECT portfolio_id FROM portfolio_info WHERE createdBy = ?";
        $stmt = mysqli_prepare($link, $portfolioQuery1);

        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);

        $portfolioResult1 = mysqli_stmt_get_result($stmt);

        if (!$portfolioResult1) {
            die("Error in SQL query: " . mysqli_error($link));
        }

        $portfolioRow1 = mysqli_fetch_assoc($portfolioResult1);

        if ($portfolioRow1) {
            $portfolioId1 = $portfolioRow1['portfolio_id'];

            $sqlSent1 = "SELECT * FROM messenger WHERE createdBy = {$_SESSION['id']} ORDER BY created_at DESC";
            $resultSent1 = $link->query($sqlSent1);

            if ($resultSent1->num_rows > 0) {
                displayMessagesTable("Outgoing Messages", $resultSent1);
            } else {
                echo "<p>No sent messages.</p>";
            }
        }
    }
    ?>
        <div style="text-align: center;">
    <button onclick="goBack()" class="back-btn" style="text-align:center;padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">Previous Page</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>


</html>
