<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');  // Make sure this is the correct path
require_once(ROOT_PATH . '/includes/del+edit.php');

?>



    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .profile-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            color: #333;
        }

        section {
            margin-bottom: 20px;
        }

        table.styled-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table.styled-table th, table.styled-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table.styled-table th {
            background-color: #f2f2f2;
        }

        .radio-cell {
            text-align: center;
            margin-top: 10px;
        }

        .radio-cell input {
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>

<head>
    <!-- Your existing head styles -->
</head>

<body>
    <!-- navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //navbar -->

    <div class="container">
        <h2>User Profile</h2>

        <!-- Form for logged-in users to select preferences -->
        <form action="includes/user_preferences.php" method="post" class="profile-form" onsubmit="return validateForm()">
            <div class="filter-section">
            <div class="filter-section">
                <label>Select Programming Languages:</label><br>
                <input type="checkbox" name="languages[]" value="javascript"> JavaScript<br>
                <input type="checkbox" name="languages[]" value="python"> Python<br>
                <input type="checkbox" name="languages[]" value="java"> Java<br>
                <input type="checkbox" name="languages[]" value="csharp"> C#<br>
                <input type="checkbox" name="languages[]" value="php"> PHP<br>
                <input type="checkbox" name="languages[]" value="ruby"> Ruby<br>
                <input type="checkbox" name="languages[]" value="swift"> Swift<br>
                <input type="checkbox" name="languages[]" value="go"> Go<br>
                <input type="checkbox" name="languages[]" value="typescript"> TypeScript<br>
                <input type="checkbox" name="languages[]" value="htmlcss"> HTML/CSS<br>
                <!-- Add more checkboxes as needed -->
            </div>

            <div class="filter-section">
                <label>Select Software Tools:</label><br>
                <input type="checkbox" name="tools[]" value="git"> Git<br>
                <input type="checkbox" name="tools[]" value="docker"> Docker<br>
                <input type="checkbox" name="tools[]" value="vscode"> Visual Studio Code<br>
                <input type="checkbox" name="tools[]" value="intellij"> IntelliJ IDEA<br>
                <input type="checkbox" name="tools[]" value="eclipse"> Eclipse<br>
                <!-- Add more checkboxes as needed -->
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

            <input type="submit" id="saveButton" value="Save Preferences" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
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
