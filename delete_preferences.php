<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'delete_id' parameter is set
    if (isset($_POST['delete_id']) && !empty($_POST['delete_id'])) {
        // Sanitize the input to prevent SQL injection
        $delete_id = mysqli_real_escape_string($link, $_POST['delete_id']);

        // Perform the delete operation
        $query = "DELETE FROM user_preferences WHERE id = '$delete_id'";
        $result = mysqli_query($link, $query);

        if ($result) {
            // Preferences deleted successfully
            echo "<script>alert('Preferences deleted!'); window.location.href='myportfolio.php';</script>";
            exit(); // Make sure to exit to prevent further execution of the page
        } else {
            // Error in deletion
            echo "Error deleting record: " . mysqli_error($link);
        }
    } else {
        // Invalid or missing 'delete_id' parameter
        echo "Invalid or missing 'delete_id' parameter.";
    }
}
?>

<body>
<?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>

<!-- Your existing HTML content -->

<div class="profile-container" style="text-align: center;">
    <h3>User Preferences</h3>
    <p style="font-size: 18px; margin-top: 20px;">
        Are you sure you want to delete your preferences?
    </p>
    <table class="styled-table">
        <?php
        $previousUserId = null;

        while ($row = $preferences->fetch_assoc()) {
            // Display the user preferences without showing the 'id' column
            ?>
        
                    <!-- Form to delete the record -->
                    <form method="post" action="">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Delete Current Preferences</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <!-- Add a big message: Are you sure you want to delete your preferences? -->

</div>
</body>
