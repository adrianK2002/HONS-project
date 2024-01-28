<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
?>

<body>
    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    <!-- //Navbar -->

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .resume-container {
            max-width: 1000px; /* Increased container width */
            margin: 20px auto;
        }

        .resume-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .resume-table th, .resume-table td {
            border: 2px solid #ddd; /* Increased border thickness */
            padding: 16px; /* Increased padding */
            text-align: left;
            font-size: 16px; /* Increased font size */
        }

        .resume-table th {
            background-color: #f2f2f2;
        }

        .section-header {
            font-weight: bold;
            font-size: 20px; /* Increased font size for section headers */
            background-color: #3498db;
            color: black;
        }

        .picture {
            width: 100px; /* Adjust the width as needed */
            height: auto;
        }
    </style>
<body>
<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recruitment_website";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ratings = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted rating and createdBy
    $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
    $createdBy = isset($_POST['createdBy']) ? $conn->real_escape_string($_POST['createdBy']) : '';

    // Validate the rating
    if ($rating >= 1 && $rating <= 5) {
        // Save the rating and createdBy to the database
        $sql = "INSERT INTO ratings (rating, createdBy) VALUES ($rating, '$createdBy')";
        $conn->query($sql);
    }
}

// Retrieve ratings from the database
$sql = "SELECT rating FROM ratings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch ratings from the result set
    while ($row = $result->fetch_assoc()) {
        $ratings[] = (int)$row['rating'];
    }
}

// Calculate the average rating
$averageRating = empty($ratings) ? 0 : array_sum($ratings) / count($ratings);

// Close the database connection
$conn->close();
?>


<form method="post">
    <div>
        <label for="rating-1">1</label>
        <input type="radio" name="rating" id="rating-1" value="1">
        <label for="rating-2">2</label>
        <input type="radio" name="rating" id="rating-2" value="2">
        <label for="rating-3">3</label>
        <input type="radio" name="rating" id="rating-3" value="3">
        <label for="rating-4">4</label>
        <input type="radio" name="rating" id="rating-4" value="4">
        <label for="rating-5">5</label>
        <input type="radio" name="rating" id="rating-5" value="5">
        <input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>">
    </div>
    <input type="submit" value="Submit">
</form>

<div class="average-rating">
    Average Rating: <?php echo number_format($averageRating, 1); ?> out of 5
</div>

</body>
</html>