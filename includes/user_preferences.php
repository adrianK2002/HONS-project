<?php
include_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if preferences already exist for the user
    $userId = $_SESSION['user_id'];

    // Ensure that the user_id is valid (you might want to add additional validation)
    if (!$userId) {
        echo "Invalid user ID";
        // You may redirect the user or provide a link to go back to the portfolio page
        // header('Location: ../myportfolio.php');
        // exit();
    }

    // Database connection details
    $host = 'localhost';
    $dbname = 'recruitment_website';
    $username = 'root';
    $password = '';

    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the same preferences combination already exists for the user
        $stmtCheckPreferences = $pdo->prepare('SELECT COUNT(*) FROM user_preferences WHERE user_id = ? AND language = ? AND tool = ? AND experience = ?');
        
        // Fetch selected options from the form
        $selectedLanguages = isset($_POST['languages']) ? $_POST['languages'] : [];
        $selectedTools = isset($_POST['tools']) ? $_POST['tools'] : [];
        $selectedExperience = isset($_POST['experience']) ? $_POST['experience'] : '';
        
        // Fetch createdBy from the form
        $createdBy = isset($_POST['createdBy']) ? $_POST['createdBy'] : '';

        // Iterate through each combination of selected options
        foreach ($selectedLanguages as $language) {
            foreach ($selectedTools as $tool) {
                // Check if the combination already exists
                $stmtCheckPreferences->execute([$userId, $language, $tool, $selectedExperience]);
                $count = $stmtCheckPreferences->fetchColumn();

                if ($count > 0) {
                    // The combination already exists, display a message
                    echo "The selected preferences already exist.";
                    // You may also redirect the user or provide a link to go back to the portfolio page
                    // header('Location: ../myportfolio.php');
                    // exit();
                    return; // Exit to prevent further processing
                }
            }
        }

        // If the combination does not exist, proceed with form submission

        // Prepare the SQL statement
        $stmt = $pdo->prepare('INSERT INTO user_preferences (user_id, language, tool, experience, createdBy) VALUES (?, ?, ?, ?, ?)');

        // Insert each selected language into the database
        foreach ($selectedLanguages as $language) {
            $stmt->execute([$userId, $language, null, null, $createdBy]);
        }

        // Insert each selected tool into the database
        foreach ($selectedTools as $tool) {
            $stmt->execute([$userId, null, $tool, null, $createdBy]);
        }

        // Insert the selected experience into the database
        $stmt->execute([$userId, null, null, $selectedExperience, $createdBy]);

        // Redirect to another page or perform additional actions after saving preferences
        header('Location: ../myportfolio.php?datainput=success');
        exit();
    } catch (PDOException $e) {
        // Handle the error (log it, show a user-friendly message, etc.)
        echo 'Error: ' . $e->getMessage();
    } finally {
        // Close the database connection in a finally block to ensure it's always executed
        if ($pdo) {
            $pdo = null;
        }
    }
}
?>
