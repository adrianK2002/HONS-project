<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = mysqli_real_escape_string($link, $_POST['message']);
    $created_at = mysqli_real_escape_string($link, $_POST['created_at']);
    $createdBy = mysqli_real_escape_string($link, $_SESSION['id']);
    $portfolio_id = mysqli_real_escape_string($link, $_POST['portfolio_id']);

    // Insert the message into the database
    $insertQuery = "INSERT INTO messenger (message, created_at, createdBy, portfolio_id) 
                    VALUES ('$message', '$created_at', '$createdBy', '$portfolio_id')";

if (mysqli_query($link, $insertQuery)) {
    echo "Message sent successfully!";
    header("Location: messenger.php");
    exit(); // Make sure to exit after sending the header to prevent further execution
} else {
    echo "Error sending message: " . mysqli_error($link);
}
}

// Fetch available contacts
$userId = $_SESSION['id'];
$contactsQuery = "SELECT portfolio_id, firstname, lastname, createdBy FROM portfolio_info WHERE id != $userId";
$contactsResult = mysqli_query($link, $contactsQuery);

if (!$contactsResult) {
    die("Error in SQL query: " . mysqli_error($link));
}
?>


<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .resume-container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .section-header {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .rating-form {
        display: flex;
        flex-direction: column;
    }

    .review-container {
        margin-bottom: 20px;
    }

    textarea {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
    }

    .submit-btn {
        background-color: #4caf50;
        color: #fff;
        border: none;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 10px;
        cursor: pointer;
        border-radius: 4px;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }
</style>
<body>
    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    <!-- //Navbar -->

    <div class="message-container">
        <h2 class="section-header">Send a Message</h2>

        <form method="post" class="rating-form">
            <div class="review-container">
                <textarea name="message" id="message" rows="4" cols="150" placeholder="Type your message here"></textarea>
            </div>
            <div class="review-container">
                <label for="portfolio_id">Choose Recipient:</label>
                <select name="portfolio_id" id="portfolio_id">
                    <?php while ($contact = mysqli_fetch_assoc($contactsResult)) : ?>
                        <option value="<?= $contact['portfolio_id']; ?>">
                            <?= $contact['createdBy'] . ': ' . $contact['firstname'] . ' ' . $contact['lastname']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <input type="hidden" name="created_at" id="created_at" value="<?= date('Y-m-d H:i:s'); ?>">
            <input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>">
            <input type="submit" value="Send Message!" class="submit-btn">
        </form>
        <br>
    </div>
    <div style="text-align: center;">
    <button onclick="goBack()" class="back-btn" style="text-align:center;padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">Previous Page</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>

</html>