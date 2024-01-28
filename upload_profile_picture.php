<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once( ROOT_PATH . '/includes/check_user.php') ?>
<?php require_once( ROOT_PATH . '/includes/retrieve_data.php') ?>
<?php require_once( ROOT_PATH . '/includes/del_port.php') ?>
<?php
// Add check for last submission time
$createdBy = $_SESSION['id']; // Assuming createdBy is equivalent to user_id

if ($createdBy) {
    $dbConnection = new PDO("mysql:host=localhost;dbname=recruitment_website", 'root', '');
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmtCheckSubmission = $dbConnection->prepare('SELECT MAX(created_at) FROM profile_pictures WHERE createdBy = ?');
    $stmtCheckSubmission->execute([$createdBy]);
    $lastSubmissionTime = $stmtCheckSubmission->fetchColumn();

    // Check if the last submission was within the last 48 hours
    $seconds = 10; // Set the initial value of $seconds
    if ($lastSubmissionTime) {
        $timeDifference = time() - strtotime($lastSubmissionTime);
        $hoursDifference = floor($timeDifference / 3600);
        if ($hoursDifference < 9999999) {
            echo '<div id="message" style="text-align: center; font-size: 24px; margin-top: 20px;">
                    You can only submit profile picture once. If you would like to change them, delete the existing profile picture and start again.
                  </div>';
            
            // Display the countdown timer in the middle of the page
            echo '<div id="countdown-container" style="text-align: center; font-size: 24px; margin-top: 20px;">
                    <div id="countdown">Redirecting in ' . $seconds . ' seconds...</div>
                  </div>';
            
            echo '<script>
                var seconds = 10;
                function updateCountdown() {
                    document.getElementById("countdown").innerHTML = "Redirecting in " + seconds + " seconds...";
                    if (seconds === 0) {
                        window.location.href = "myportfolio.php";
                    } else {
                        seconds--;
                        setTimeout(updateCountdown, 1000);
                    }
                }
                setTimeout(updateCountdown, 1000);
            </script>';
        
            exit();
        }
    }

    $dbConnection = null;
}
?>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-form {
            text-align: center;
        }

        h2 {
            color: #h;
        }

        .file-label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .file-input {
            padding: 10px;
            margin-bottom: 20px;
        }

        .upload-btn {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .upload-btn:hover {
            background-color: green;
        }
    </style>
<body>
    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //Navbar -->

    <div class="container">
        <form class="profile-form" action="includes/profile_picture.php" method="POST" enctype="multipart/form-data">
            <h2>Upload Profile Picture</h2>
            <label for="profile_picture" class="file-label">Choose Profile Picture:</label>
            <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="file-input">
            <input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>">
            <br>
            <input type="submit" value="Upload" class="upload-btn">
        </form>
    </div>
</body>
