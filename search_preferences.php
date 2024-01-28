<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');

// Add check for last submission time
$createdBy = $_SESSION['id']; // Assuming createdBy is equivalent to user_id

if ($createdBy) {
    $dbConnection = new PDO("mysql:host=localhost;dbname=recruitment_website", 'root', '');
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmtCheckSubmission = $dbConnection->prepare('SELECT MAX(created_at) FROM user_preferences WHERE createdBy = ?');
    $stmtCheckSubmission->execute([$createdBy]);
    $lastSubmissionTime = $stmtCheckSubmission->fetchColumn();

    // Check if the last submission was within the last 48 hours
    $seconds = 10; // Set the initial value of $seconds
    if ($lastSubmissionTime) {
        $timeDifference = time() - strtotime($lastSubmissionTime);
        $hoursDifference = floor($timeDifference / 3600);
        if ($hoursDifference < 48) {
            echo '<div id="message" style="text-align: center; font-size: 24px; margin-top: 20px;">
                    You can only submit preferences once. If you would like to change them, delete the existing preferences and start again.
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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

        h2 {
            color: #333;
        }

        .filter-section {
            margin-bottom: 20px;
            text-align: left; /* Left-align content within the filter-section */
        }

        label {
            font-weight: bold;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        #saveButtonContainer {
            text-align: center; /* Center-align content within the container */
        }

        #saveButton {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        #message {
            font-size: 24px;
            margin-top: 20px;
            text-align: center; /* Center-align content within the message */
        }

        #countdown-container {
            font-size: 24px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <div id="message">
        <p>Select appropriate values that reflect your knowledge/experience</p>
    </div>
    <div class="container">
        <h2>User Profile</h2>

        <!-- Form for logged-in users to select preferences -->
        <form action="includes/user_preferences.php" method="post" class="profile-form" onsubmit="return validateForm()">
            <div class="filter-section">
                <label>Select Programming Languages:</label><br>
                <input type="checkbox" name="languages[]" value=" Javascript"> JavaScript<br>
                <input type="checkbox" name="languages[]" value=" Python "> Python<br>
                <input type="checkbox" name="languages[]" value=" Java"> Java<br>
                <input type="checkbox" name="languages[]" value=" C#"> C#<br>
                <input type="checkbox" name="languages[]" value=" PHP"> PHP<br>
                <input type="checkbox" name="languages[]" value=" Ruby"> Ruby<br>
                <input type="checkbox" name="languages[]" value=" Rwift"> Swift<br>
                <input type="checkbox" name="languages[]" value=" Go"> Go<br>
                <input type="checkbox" name="languages[]" value=" TypeScript"> TypeScript<br>
                <input type="checkbox" name="languages[]" value=" HTML/CSS"> HTML/CSS<br>
            </div>

            <div class="filter-section">
                <label>Select Software Tools:</label><br>
                <input type="checkbox" name="tools[]" value=" Git"> Git<br>
                <input type="checkbox" name="tools[]" value=" Docker"> Docker<br>
                <input type="checkbox" name="tools[]" value=" Visual Studio Code"> Visual Studio Code<br>
                <input type="checkbox" name="tools[]" value=" Intellij IDEA"> IntelliJ IDEA<br>
                <input type="checkbox" name="tools[]" value=" Eclipse"> Eclipse<br>
            </div>

            <div class="filter-section">
                <label>Select Experience Level:</label><br>
                <label><input type="radio" name="experience" value="1-2"> 1-2 years</label>
                <label><input type="radio" name="experience" value="3-5"> 3-5 years</label>
                <label><input type="radio" name="experience" value="6-10"> 6-10 years</label>
                <label><input type="radio" name="experience" value="11-15"> 11-15 years</label>
                <label><input type="radio" name="experience" value="15+"> 15+ years</label>
            </div>
            <input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>">
            <br>

            <input type="submit" id="saveButton" value="Save Preferences">
        </form>
    </div>

    <script>
        function validateForm() {
            // Get all selected programming languages checkboxes
            var checkboxes = document.querySelectorAll('input[name="languages[]"]:checked');

            // Check if at least one checkbox is checked
            if (checkboxes.length === 0) {
                alert('Please select at least one programming language.');
                return false; // Prevent form submission
            }

            // Get the selected experience level radio buttons
            var experienceRadios = document.querySelectorAll('input[name="experience"]:checked');

            // Check if at least one experience level is selected
            if (experienceRadios.length === 0) {
                alert('Please select an experience level.');
                return false; // Prevent form submission
            }

            // If validation passes, allow form submission
            return true;
        }
    </script>
</body>

</html>
