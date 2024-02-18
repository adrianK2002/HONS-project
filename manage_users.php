<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Assuming $link is the database connection
    $stmt = mysqli_prepare($link, "DELETE FROM users WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    $deleteQuery = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($deleteQuery) {
        // Successful deletion
        echo "User deleted successfully.";
    } else {
        // Handle the case where the deletion failed
        echo "Error: " . mysqli_error($link);
    }
} else {
    // Invalid request
}

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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4267B2;
            color: white;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .action-buttons button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        .action-buttons button.delete-btn {
            background-color: #f44336;
            color: #fff;
            transition: background-color 0.3s;
        }

        .action-buttons button.delete-btn:hover {
            background-color: #d32f2f;
        }

        .action-buttons button.admin-btn {
            background-color: #4CAF50;
            color: #fff;
            transition: background-color 0.3s;
        }

        .action-buttons button.admin-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Actions</th>
                    <th>Roles</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($link, "SELECT * FROM users");

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['username']}</td>";
                        echo "<td>
                                <button class='delete-btn' onclick='deleteUser({$row['id']})'>Delete</button>
                              </td>";
                        echo "<td>
                                <form action='update_admin.php' method='post'>
                                    <input type='hidden' name='user_id' value='{$row['id']}'>
                                    <label>
                                        <input type='radio' name='admin_action_{$row['id']}' value='make_admin' " . ($row['is_admin'] == 1 ? 'checked' : '') . ">Admin
                                    </label>
                                    <label>
                                        <input type='radio' name='admin_action_{$row['id']}' value='make_normal_user' " . ($row['is_admin'] == 0 ? 'checked' : '') . ">Normal User
                                    </label>
                                    <button type='submit' class='admin-btn'>Submit</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Error: " . mysqli_error($link);
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function deleteUser(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        location.reload();
                    }
                };
                xhr.open("GET", "delete_user.php?user_id=" + userId, true);
                xhr.send();
            }
        }
    </script>
            <div style="text-align: center;">
    <button onclick="goBack()" class="back-btn" style="text-align:center;padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">Previous Page</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>

</html>
