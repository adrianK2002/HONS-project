<?php
// Include the configuration file and any other necessary files
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');

// Initialize an empty array to store search results
$results = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Fetch selected options from the form
    $selectedLanguages = isset($_GET['languages']) ? $_GET['languages'] : [];
    $selectedTools = isset($_GET['tools']) ? $_GET['tools'] : [];
    $selectedExperience = isset($_GET['experience']) ? $_GET['experience'] : '';

    // Perform search based on selected options (You need to implement this part)
    // Example: $results = performSearch($selectedLanguages, $selectedTools, $selectedExperience);
}

?>

<!-- Add a link to your CSS file -->
<link rel="stylesheet" type="text/css" href="styles.css">

<body>
    <!-- navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //navbar -->

    <div class="container">
        <h2>Search Page</h2>

        <!-- Single form with all filter options -->
        <form action="index.php" method="get" class="search-form">
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
            </div>

            <div class="filter-section">
                <label>Select Software Tools:</label><br>
                <input type="checkbox" name="tools[]" value="git"> Git<br>
                <input type="checkbox" name="tools[]" value="docker"> Docker<br>
                <input type="checkbox" name="tools[]" value="vscode"> Visual Studio Code<br>
                <input type="checkbox" name="tools[]" value="intellij"> IntelliJ IDEA<br>
                <input type="checkbox" name="tools[]" value="eclipse"> Eclipse<br>
            </div>

            <div class="filter-section">
                <label>Select Experience Level:</label><br>
                <label><input type="radio" name="experience" value="1-2"> 1-2 years</label>
                <label><input type="radio" name="experience" value="3-5"> 3-5 years</label>
                <label><input type="radio" name="experience" value="6-10"> 6-10 years</label>
                <label><input type="radio" name="experience" value="11-15"> 11-15 years</label>
                <label><input type="radio" name="experience" value="15+"> 15+ years</label>
            </div>

            <br>

            <input type="submit" value="Search" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">

        </form>

        <h2>Search Results</h2>

        <?php
        // Display search results
        if (!empty($results)) {
            foreach ($results as $result) {
                echo '<p>' . $result['name'] . '</p>';
                // Add more details or customize the display as needed
            }
        } else {
            echo '<p>No results found.</p>';
        }
        ?>
    </div>
</body>

</html>
