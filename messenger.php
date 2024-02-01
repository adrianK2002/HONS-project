<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once( ROOT_PATH . '/includes/check_user.php') ?>
<?php require_once( ROOT_PATH . '/config.php') ?>

 <body>
	<!-- navbar -->
	<?php include( ROOT_PATH . '/includes/navbar_logged_in.php') ?>
	<!-- //navbar -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger Messages</title>
</head>
<body>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recruitment_website";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch messages sent within the last 48 hours
$sqlRecent = "SELECT * FROM messenger WHERE created_at >= NOW() - INTERVAL 2 DAY ";
$resultRecent = $conn->query($sqlRecent);

if ($resultRecent->num_rows > 0) {
    echo "<h2>Messages received within the last 48 hours:</h2>";

    while ($row = $resultRecent->fetch_assoc()) {
        displayMessage($row);
    }
} else {
    echo "<p>No recent messages.</p>";
}

// Fetch messages older than 48 hours
$sqlOlder = "SELECT * FROM messenger WHERE created_at < NOW() - INTERVAL 2 DAY";
$resultOlder = $conn->query($sqlOlder);

if ($resultOlder->num_rows > 0) {
    echo "<h2>Messages older than 48 hours:</h2>";

    while ($row = $resultOlder->fetch_assoc()) {
        displayMessage($row);
    }
} else {
    echo "<p>No older messages.</p>";
}

$conn->close();

function displayMessage($row) {
    echo "<div>";
    echo "<strong>Sender:</strong> " . $row["createdBy"] . "<br>";
    echo "<strong>Message:</strong> " . $row["message"] . "<br>";
    echo "<strong>Timestamp:</strong> " . $row["created_at"] . "<br>";
    echo "</div><br>";
}
?>

</body>
</html>
