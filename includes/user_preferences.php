<?php
include_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Database connection details
    $host = 'localhost';
    $dbname = 'recruitment_website';
    $username = 'root';
    $password = '';

    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check if the user has already submitted data
        $createdBy = $_SESSION['user_id']; // Assuming createdBy is equivalent to user_id
        if ($createdBy) {
            $stmtCheckSubmission = $pdo->prepare('SELECT MAX(created_at) FROM user_preferences WHERE createdBy = ?');
            $stmtCheckSubmission->execute([$createdBy]);
            $lastSubmissionTime = $stmtCheckSubmission->fetchColumn();

            // Check if the last submission was within the last 48 hours
            if ($lastSubmissionTime) {
                $timeDifference = time() - strtotime($lastSubmissionTime);
                $hoursDifference = floor($timeDifference / 3600);
                
                if ($hoursDifference < 48) {
                    echo "You can only submit preferences once in 48 hours.";
                    exit();
                }
            }
        }

 // Fetch selected options from the form
$selectedLanguages = isset($_POST['languages']) ? $_POST['languages'] : [];
$selected1Languages = isset($_POST['1languages']) ? $_POST['1languages'] : [];
$selectedTools = isset($_POST['tools']) ? $_POST['tools'] : [];
$selected1Tools = isset($_POST['1tools']) ? $_POST['1tools'] : [];
$selectedExperience = isset($_POST['experience']) ? $_POST['experience'] : '';
$selectedFramework = isset($_POST['framework']) ? $_POST['framework'] : '';
$selected1Frameworks = isset($_POST['1frameworks']) ? $_POST['1frameworks'] : ''; // Adjusted variable name
// Fetch createdBy from the form
$createdBy = isset($_POST['createdBy']) ? $_POST['createdBy'] : '';

// Prepare the SQL statement
$stmt = $pdo->prepare('INSERT INTO user_preferences (user_id, language, `1languages`, tool, `1tools`, experience, `framework`, `1frameworks`, created_at, createdBy) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)');

// Insert the combination into the database
$stmt->execute([$userId, implode(',', $selectedLanguages), implode(',', $selected1Languages), implode(',', $selectedTools), implode(',', $selected1Tools), $selectedExperience, $selectedFramework, $selected1Frameworks, $createdBy]);



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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deletePreferenceId'])) {
   $deletePreferenceId = $_POST['deletePreferenceId'];

   // Prepare the SQL statement to delete the preference
   $stmtDeletePreference = $pdo->prepare('DELETE FROM user_preferences WHERE id = ? AND createdBy = ?');
   $stmtDeletePreference->execute([$deletePreferenceId, $userId]);

   // You may want to add error handling for the deletion process
}
}
?>

