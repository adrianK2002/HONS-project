<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
require_once(ROOT_PATH . '/includes/del_port.php');

$numProjects = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form includes the 'portfolio_id' field
    $portfolio_id = isset($_POST['portfolio_id']) ? (int)$_POST['portfolio_id'] : 0;

    for ($i = 1; $i <= $numProjects; $i++) {
        // Check if file is uploaded for the current project
        if (isset($_FILES["project{$i}"]) && !empty($_FILES["project{$i}"]["name"])) {
            // Define file upload path
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["project{$i}"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if the file already exists
            if (file_exists($targetFile)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size (you can adjust the file size limit)
            if ($_FILES["project{$i}"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow only specific file formats (you can adjust the allowed formats)
            $allowedFormats = ["pdf", "doc", "docx"];
            if (!in_array($imageFileType, $allowedFormats)) {
                echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                // If everything is ok, upload the file and insert project details into the database
                if (move_uploaded_file($_FILES["project{$i}"]["tmp_name"], $targetFile)) {
                    $projectInfo = $_POST["project{$i}-info"];
                    $created_at = date('Y-m-d H:i:s');

                    // Insert project details into the database with the retrieved portfolio_id
                    $insertQuery = "INSERT INTO projects (filename, file_content, file_type, created_at, createdBy, portfolio_id) VALUES (?, ?, ?, ?, ?, ?)";
                    $insertStmt = $link->prepare($insertQuery);
                    $insertStmt->bind_param("ssssii", basename($_FILES["project{$i}"]["name"]), $projectInfo, $imageFileType, $created_at, $_SESSION['id'], $portfolio_id);

                    if ($insertStmt->execute()) {
                        echo "The file " . htmlspecialchars(basename($_FILES["project{$i}"]["name"])) . " has been uploaded and the project details added to the database.";
                    } else {
                        echo "Error uploading file and adding project details to the database.";
                    }

                    $insertStmt->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}
?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .profile-form {
        text-align: center;
    }

    h2 {
        color: #333;
    }

    .file-tile {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .file-input {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .upload-btn {
        padding: 10px 20px;
        background-color: #4caf50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .upload-btn:hover {
        background-color: #45a049;
    }

    .remove-btn {
        background-color: #f44336;
    }

    .remove-btn:hover {
        background-color: #d32f2f;
    }

    .table-container {
        margin-top: 30px;
    }

    .projects-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .projects-table th, .projects-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .projects-table th {
        background-color: #4caf50;
        color: #fff;
    }

    .projects-table tbody tr:hover {
        background-color: #f5f5f5;
    }

    p {
        color: #777;
    }
    .delete-btn {
        padding: 10px 20px;
        background-color: #f44336;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }   .download-btn {
        padding: 10px 20px;
        background-color: blueviolet;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .delete-btn:hover {
        background-color: #d32f2f;
    }
</style>


<body>
    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //Navbar -->

    <?php
    // Loop to create containers for each project
    for ($i = 1; $i <= $numProjects; $i++) {
    ?>
        <div class="container">
            <div class="profile-form">
                <h2>Upload Projects</h2>

                <form method="post" enctype="multipart/form-data">
                    <div class="file-tile">
                        <!-- File Input for Project <?php echo $i; ?> -->
                        <div class="file-input">
                            <label for="project<?php echo $i; ?>">Project <?php echo $i; ?>:</label>
                            <input type="file" id="project<?php echo $i; ?>" name="project<?php echo $i; ?>" class="upload-btn">
                            <input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>">
                            <input type="hidden" name="portfolio_id" value="<?= $portfolio_id; ?>">
                            
                        </div>

                        <!-- Add box for Project <?php echo $i; ?> information -->
                        <div class="file-input">
                            <label for="project<?php echo $i; ?>-info">Project <?php echo $i; ?> Information:</label>
                            <textarea id="project<?php echo $i; ?>-info" name="project<?php echo $i; ?>-info"></textarea>

                        </div>
                        <input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>">
                            <input type="hidden" name="portfolio_id" value="<?= $portfolio_id; ?>">
                        <!-- Remove button for Project <?php echo $i; ?> -->
                        
                        
                        <!-- Submit button for Project <?php echo $i; ?> -->
                        <button type="submit" class="upload-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>

    <script>
        // Function to remove the project container
        function removeProject(projectNumber) {
            var projectContainer = document.querySelector('.container:nth-child(' + projectNumber + ')');
            if (projectContainer) {
                projectContainer.remove();
            }
        }
    </script>
         <?php
// Retrieve project details from the database for the current user
$userId = $_SESSION['id'];  // Assign the value to a variable
$query = "SELECT id, filename, file_content, file_type, created_at, createdBy FROM projects WHERE createdBy = ?";
$stmt = $link->prepare($query);
$stmt->bind_param("i", $userId);  // Use the variable here
$stmt->execute();
$result = $stmt->get_result();
$projects = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<?php if (!empty($projects)) : ?>
    <div class="table-container">
        <table class="projects-table">
            <thead>
                <tr>
                    <th>Project Name</th>
                    <th>Information</th>
                    <th>File Type</th>
                    <th>Created At</th>
                    <th>Created By</th>
                    <th>Action</th> <!-- New column for Delete button -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project) : ?>
                    <tr>
                        <td><?php echo $project['filename']; ?></td>
                        <td><?php echo $project['file_content']; ?></td>
                        <td><?php echo $project['file_type']; ?></td>
                        <td><?php echo $project['created_at']; ?></td>
                        <td><?php echo $project['createdBy']; ?></td>
                        <td>
                            <button class="delete-btn" onclick="deleteProject(<?php echo $project['id']; ?>)">Delete</button>
                            <button class="download-btn" onclick="(<?php echo $project['id']; ?>)">Download</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <p>No projects available for the current user.</p>
<?php endif; ?>
<script>
    function deleteProject(projectId) {
        var confirmDelete = confirm("Are you sure you want to delete this project?");
        if (confirmDelete) {
            // Send an AJAX request to delete the project
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_project.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Reload the page after successful deletion
                    location.reload();
                }
            };
            xhr.send("projectId=" + projectId);
        }
    }
    xhr.open("POST", "delete_project.php", true);

</script>

</body>
</body>


