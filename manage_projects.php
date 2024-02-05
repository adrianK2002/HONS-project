<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/navbar_logged_in.php');
?>

<head>
    <style>
        /* Common styles for both sections */
        .container {
            max-width: 800px;
            margin: 20px auto;
        }

        .header {
            background-color: #4267B2;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
            border-radius: 8px 8px 0 0;
        }

        .delete-btn {
            padding: 8px 16px;
            background-color: #f44336;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }

        /* Project section specific styles */
        .project-container {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .project-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .project-description {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .project-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .project-table th,
        .project-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        // Check if the delete button is clicked
        if (isset($_GET['delete_id'])) {
            $deleteId = mysqli_real_escape_string($link, $_GET['delete_id']);

            // Perform the delete operation
            $deleteQuery = mysqli_query($link, "DELETE FROM projects WHERE id = $deleteId");

            if ($deleteQuery) {
                // Redirect to the current page after deletion
                header("Location: {$_SERVER['PHP_SELF']}");
                exit();
            } else {
                // Handle deletion failure
                echo "Error: " . mysqli_error($link);
            }
        }

        // Retrieve projects from the database
        $query = "SELECT * FROM projects";
        $results = mysqli_query($link, $query);

        // Check if there are projects
        if ($results && mysqli_num_rows($results) > 0) {
            echo "<table class='project-table'>";
            echo "<thead><tr><th>Title</th><th>Created By</th><th>Action</th></tr></thead>";
            echo "<tbody>";

            while ($project = mysqli_fetch_assoc($results)) {
                // Display each project in a table row
                echo "<tr>";
                echo "<td>{$project['filename']}</td>";
                echo "<td>{$project['createdBy']}</td>";
                echo "<td><a href='?delete_id={$project['id']}' class='delete-btn'>Delete</a></td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No projects available.</p>";
        }
        ?>
    </div>
</body>
</html>
