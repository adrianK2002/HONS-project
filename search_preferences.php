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
        if ($hoursDifference < 9999999) {
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
        <h2>User Preferences</h2>

        <!-- Form for logged-in users to select preferences -->
        <form action="includes/user_preferences.php" method="post" class="profile-form" onsubmit="return validateForm()">
            <div class="filter-section">
                <label>Select Main Programming Language:</label><br>
                <input type="radio" name="languages[]" value=" None"> None<br>
                <input type="radio" name="languages[]" value=" Javascript"> JavaScript<br>
                <input type="radio" name="languages[]" value=" Python "> Python<br>
                <input type="radio" name="languages[]" value=" Java"> Java<br>
                <input type="radio" name="languages[]" value=" C#"> C#<br>
                <input type="radio" name="languages[]" value=" PHP"> PHP<br>
                <input type="radio" name="languages[]" value=" Ruby"> Ruby<br>
                <input type="radio" name="languages[]" value=" Rwift"> Swift<br>
                <input type="radio" name="languages[]" value=" Go"> Go<br>
                <input type="radio" name="languages[]" value=" TypeScript"> TypeScript<br>
                <input type="radio" name="languages[]" value=" HTML/CSS"> HTML/CSS<br>
                <input type="radio" name="languages[]" value=" C++"> C++<br>
                <input type="radio" name="languages[]" value=" Kotlin"> Kotlin<br>
                <input type="radio" name="languages[]" value=" Rust"> Rust<br>
                <input type="radio" name="languages[]" value=" Scala"> Scala<br>
                <input type="radio" name="languages[]" value=" Shell"> Shell/Scripting<br>
            </div>
            <div class="filter-section">
                <label>Select Other Programming Language:</label><br>
                <input type="checkbox" name="1languages[]" value=" None"> None<br>
                <input type="checkbox" name="1languages[]" value=" Javascript"> JavaScript<br>
                <input type="checkbox" name="1languages[]" value=" Python "> Python<br>
                <input type="checkbox" name="1languages[]" value=" Java"> Java<br>
                <input type="checkbox" name="1languages[]" value=" C#"> C#<br>
                <input type="checkbox" name="1languages[]" value=" PHP"> PHP<br>
                <input type="checkbox" name="1languages[]" value=" Ruby"> Ruby<br>
                <input type="checkbox" name="1languages[]" value=" Rwift"> Swift<br>
                <input type="checkbox" name="1languages[]" value=" Go"> Go<br>
                <input type="checkbox" name="1languages[]" value=" TypeScript"> TypeScript<br>
                <input type="checkbox" name="1languages[]" value=" HTML/CSS"> HTML/CSS<br>
                <input type="checkbox" name="1languages[]" value=" C++"> C++<br>
                <input type="checkbox" name="1languages[]" value=" Kotlin"> Kotlin<br>
                <input type="checkbox" name="1languages[]" value=" Rust"> Rust<br>
                <input type="checkbox" name="1languages[]" value=" Scala"> Scala<br>
                <input type="checkbox" name="1languages[]" value=" Shell"> Shell/Scripting<br>
            </div>
            <div class="filter-section">
                <label>Select Main Software Tool:</label><br>
                <input type="radio" name="tools[]" value=" None"> None<br>
                <input type="radio" name="tools[]" value=" Git"> Git<br>
                <input type="radio" name="tools[]" value=" Docker"> Docker<br>
                <input type="radio" name="tools[]" value=" Visual Studio Code"> Visual Studio Code<br>
                <input type="radio" name="tools[]" value=" Intellij IDEA"> IntelliJ IDEA<br>
                <input type="radio" name="tools[]" value=" Eclipse"> Eclipse<br>
                <input type="radio" name="tools[]" value=" Sublime Text"> Sublime Text<br>
                <input type="radio" name="tools[]" value=" NetBeans"> NetBeans<br>
                <input type="radio" name="tools[]" value=" Atom"> Atom<br>
                <input type="radio" name="tools[]" value=" PyCharm"> PyCharm<br>
                <input type="radio" name="tools[]" value=" Xcode"> Xcode (for iOS development)<br>
            </div>
            <div class="filter-section">
                <label>Select Other Software Tool:</label><br>
                <input type="checkbox" name="1tools[]" value=" None"> None<br>
                <input type="checkbox" name="1tools[]" value=" Git"> Git<br>
                <input type="checkbox" name="1tools[]" value=" Docker"> Docker<br>
                <input type="checkbox" name="1tools[]" value=" Visual Studio Code"> Visual Studio Code<br>
                <input type="checkbox" name="1tools[]" value=" Intellij IDEA"> IntelliJ IDEA<br>
                <input type="checkbox" name="1tools[]" value=" Eclipse"> Eclipse<br>
                <input type="checkbox" name="1tools[]" value=" Sublime Text"> Sublime Text<br>
                <input type="checkbox" name="1tools[]" value=" NetBeans"> NetBeans<br>
                <input type="checkbox" name="1tools[]" value=" Atom"> Atom<br>
                <input type="checkbox" name="1tools[]" value=" PyCharm"> PyCharm<br>
                <input type="checkbox" name="1tools[]" value=" Xcode"> Xcode (for iOS development)<br>
            </div>
            <div class="filter-section">
                <label>Select Main Framework:</label><br>
                <input type="radio" name="framework[]" value=" None"> None<br>
                <input type="radio" name="framework[]" value=" Django"> Django<br>
                <input type="radio" name="framework[]" value=" Flask"> Flask<br>
                <input type="radio" name="framework[]" value=" TurboGears"> TurboGears<br>
                <input type="radio" name="framework[]" value=" PyTorch"> PyTorch<br>
                <input type="radio" name="framework[]" value=" Ruby on Rails"> Ruby on Rails<br>
                <input type="radio" name="framework[]" value=" Garden"> Garden<br>
                <input type="radio" name="framework[]" value=" Spring"> Spring<br>
                <input type="radio" name="framework[]" value=" Play"> Play<br>
                <input type="radio" name="framework[]" value=" Spark"> Spark<br>
                <input type="radio" name="framework[]" value=" Wicket"> Wicket<br>
                <input type="radio" name="framework[]" value=" Javalin"> Javalin<br>
                <input type="radio" name="framework[]" value=" Laravel"> Laravel<br>
                <input type="radio" name="framework[]" value=" CakePHP"> CakePHP<br>
                <input type="radio" name="framework[]" value=" ReactJS"> ReactJS<br>
                <input type="radio" name="framework[]" value=" AngularJS"> AngularJS<br>
                <input type="radio" name="framework[]" value=" Aeron "> Aeron<br>
                <input type="radio" name="framework[]" value=" Apache MXNet"> Apache MXNet<br>
                <input type="radio" name="framework[]" value=" Framework7"> Framework7<br>
            </div>
            <div class="filter-section">
                <label>Select Other Frameworks:</label><br>
                <input type="checkbox" name="1frameworks[]" value=" None"> None<br>
                <input type="checkbox" name="1frameworks[]" value=" Django"> Django<br>
                <input type="checkbox" name="1frameworks[]" value=" Flask"> Flask<br>
                <input type="checkbox" name="1frameworks[]" value=" TurboGears"> TurboGears<br>
                <input type="checkbox" name="1frameworks[]" value=" PyTorch"> PyTorch<br>
                <input type="checkbox" name="1frameworks[]" value=" Ruby on Rails"> Ruby on Rails<br>
                <input type="checkbox" name="1frameworks[]" value=" Garden"> Garden<br>
                <input type="checkbox" name="1frameworks[]" value=" Spring"> Spring<br>
                <input type="checkbox" name="1frameworks[]" value=" Play"> Play<br>
                <input type="checkbox" name="1frameworks[]" value=" Spark"> Spark<br>
                <input type="checkbox" name="1frameworks[]" value=" Wicket"> Wicket<br>
                <input type="checkbox" name="1frameworks[]" value=" Javalin"> Javalin<br>
                <input type="checkbox" name="1frameworks[]" value=" Laravel"> Laravel<br>
                <input type="checkbox" name="1frameworks[]" value=" CakePHP"> CakePHP<br>
                <input type="checkbox" name="1frameworks[]" value=" ReactJS"> ReactJS<br>
                <input type="checkbox" name="1frameworks[]" value=" AngularJS"> AngularJS<br>
                <input type="checkbox" name="1frameworks[]" value=" Aeron "> Aeron<br>
                <input type="checkbox" name="1frameworks[]" value=" Apache MXNet"> Apache MXNet<br>
                <input type="checkbox" name="1frameworks[]" value=" Framework7"> Framework7<br>
            </div>
            <div class="filter-section">
                <label>Select Experience Level:</label><br>
                <label><input type="radio" name="experience" value="None"> None</label>
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
            var checkboxes = document.querySelectorAll('input[name="1languages[]"]:checked');
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
        <div style="text-align: center;">
    <button onclick="goBack()" class="back-btn" style="text-align:center;padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">Previous Page</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</div>
</body>

</html>
