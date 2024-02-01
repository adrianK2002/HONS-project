<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once( ROOT_PATH . '/includes/check_user.php') ?>

 <body>
	<!-- navbar -->
	<?php include( ROOT_PATH . '/includes/navbar_logged_in.php') ?>
	<!-- //navbar -->
	<?php



// Function to display messages
function displayMessages($link, $portfolio_id) {
    $sql = "SELECT id, message, createdBy FROM messenger WHERE portfolio_id = $portfolio_id";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div>';
            echo '<p>' . $row['message'] . '</p>';
            echo '<p>By: ' . $row['createdBy'] . '</p>';
            echo '<a href="reply.php?id=' . $row['id'] . '">Reply</a> | ';
            echo '<a href="delete.php?id=' . $row['id'] . '">Delete</a> | ';
            echo '<a href="report.php?id=' . $row['id'] . '">Report</a>';
            echo '</div>';
        }
    } else {
        echo 'No messages found.';
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle actions based on form submission (e.g., reply, delete, report)
    // Implement the logic for handling these actions
}

// Close the database connection
$link->close();
?>


</body>
  </body>