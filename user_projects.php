<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
require_once(ROOT_PATH . '/includes/review_del.php');
?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f5f5f5;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .table-container {
        overflow-x: auto;
        margin-top: 20px;
    }

    .projects-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .projects-table th,
    .projects-table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    .projects-table th {
        background-color: #4CAF50;
        color: white;
    }

    /* Added styles for the delete button */
    .delete-btn {
        background-color: #e74c3c; /* Red color */
        color: #fff; /* White text */
        border: none;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-btn:hover {
        background-color: #c0392b; /* Darker red color on hover */
    }
</style>

<?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); 

?>
<?php
$exercise_id = isset($_GET['exercise_id']) ? intval($_GET['exercise_id']) : null;

if ($exercise_id !== null) {
    // Retrieve project details from the database for the current user
    $userId = $_SESSION['id'];
    $query = "SELECT id, filename, file_content, file_type, created_at, createdBy FROM projects WHERE createdBy = ?";
    
    $stmt = $link->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $projects = $result->fetch_all(MYSQLI_ASSOC);
    
    $stmt->close();
}
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
                            <button>Download</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <p>No projects available for the current user.</p>
<?php endif; ?>

</div>
