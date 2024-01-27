<?php include_once '/includes/check_user.php' ?>
<?php
	include_once '../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Form submitted!<br>";

    // Fetch selected options from the form
    $selectedLanguages = isset($_POST['languages']) ? $_POST['languages'] : [];
    $selectedTools = isset($_POST['tools']) ? $_POST['tools'] : [];
    $selectedExperience = isset($_POST['experience']) ? $_POST['experience'] : '';
    
    // Fetch createdBy from the form
    $createdBy = isset($_POST['createdBy']) ? $_POST['createdBy'] : '';

    // Get the user ID from the session
    echo "User ID: " . $_SESSION['user_id'] . "<br>";

    // Database connection details
    $host = 'localhost';
    $dbname = 'recruitment_website';
    $username = 'root';
    $password = '';

    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected to the database successfully!<br>";

        // Prepare the SQL statement
        $stmt = $pdo->prepare('INSERT INTO user_preferences (user_id, language, tool, experience, createdBy) VALUES (?, ?, ?, ?, ?)');

        // Insert each selected language into the database
        foreach ($selectedLanguages as $language) {
            $stmt->execute([$_SESSION['user_id'], $language, null, null, $createdBy]);
        }

        // Insert each selected tool into the database
        foreach ($selectedTools as $tool) {
            $stmt->execute([$_SESSION['user_id'], null, $tool, null, $createdBy]);
        }

        // Insert the selected experience into the database
        $stmt->execute([$_SESSION['user_id'], null, null, $selectedExperience, $createdBy]);

        // Close the database connection
        $pdo = null;

        // Redirect to another page or perform additional actions after saving preferences
        header('Location: ../myportfolio.php?datainput=success');
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage() . "<br>";
        // Handle the error (log it, show a user-friendly message, etc.)
    }
}

?>