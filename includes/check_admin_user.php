<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<?php
// Initialize the session
session_start();

// Assuming you have established a database connection ($link) before this point
$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($userId !== null) {
    $user_query = mysqli_query($link, "SELECT * FROM users WHERE id = $userId LIMIT 1");
    $user = mysqli_fetch_assoc($user_query);

    if ($user && $user['is_admin'] == 1) {
        // User is an admin, proceed with the admin actions
    } else {
        // User is not an admin, show a message and start the countdown
        echo '<p>User is not an admin user! Redirecting in <span id="countdown">10</span> seconds...</p>';
        echo '<button onclick="redirectToDashboard()">Go to Dashboard</button>';
        echo '<script>
                var countdown = 10;
                var countdownElement = document.getElementById("countdown");

                function updateCountdown() {
                    countdown--;
                    countdownElement.innerText = countdown;

                    if (countdown <= 0) {
                        window.location.href = "dashboard.php";
                    } else {
                        setTimeout(updateCountdown, 1000); // Update every 1 second
                    }
                }

                function redirectToDashboard() {
                    window.location.href = "dashboard.php";
                }

                setTimeout(updateCountdown, 1000); // Start the countdown
              </script>';
        exit();
    }
} else {
    // Handle the case when the user is not logged in
    // You can redirect them to the login page or handle it in another way
    header("Location: login.php");
}

// Check if the session has expired
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 360)) {
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage

    // Display a pop-up message using JavaScript
    echo "<script type='text/javascript'>alert('Session has expired! Please log in again.');</script>";

    header("location: login.php");
    exit;
}

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>
 </div>