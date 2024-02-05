<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');

// Fetch all preferences from the user_preferences table
$query = "SELECT * FROM user_preferences";
$result = mysqli_query($link, $query);

// Check if there are preferences
if ($result && mysqli_num_rows($result) > 0) {
    $preferences = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $preferences = [];
}
?>

<head>
    <!-- Your existing styles -->

    <!-- Additional styles for preference display -->
    <style>
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

        .table-container {
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow-x: auto;
        }

        .preferences-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .preferences-table th,
        .preferences-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .preferences-table th {
            background-color: #4267B2;
            color: #fff;
        }

        .preferences-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .delete-btn {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            background-color: #f44336;
            color: #fff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>

<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>

    <div class="container">
        <div class="header">
            User Preferences
        </div>

        <?php
        // Check if there are preferences to display
        if (!empty($preferences)) {
            ?>
            <div class="table-container">
                <table class="preferences-table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Language</th>
                            <th>Tool</th>
                            <th>Experience</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($preferences as $preference) { ?>
                            <tr>
                                <td><?= $preference['createdBy']; ?></td>
                                <td><?= $preference['language']; ?></td>
                                <td><?= $preference['tool']; ?></td>
                                <td><?= $preference['experience']; ?></td>
                                <td><?= $preference['created_at']; ?></td>
                                <td>
                                    <div class="delete-btn" onclick="deletePreference(<?= $preference['id']; ?>)">
                                        Delete
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo "<p>No preferences available.</p>";
        }
        ?>
    </div>

    <script>
        // Function to delete a preference
        function deletePreference(preferenceId) {
            var confirmDelete = confirm("Are you sure you want to delete this preference?");
            if (confirmDelete) {
                // Implement the logic to delete the preference using AJAX or a form submission
                // You can use JavaScript to remove the preference from the DOM without a page reload
                // For example, you might use AJAX to send a request to the server to delete the preference
                // and then remove the corresponding HTML element from the DOM
            }
        }
    </script>
</body>

</html>
