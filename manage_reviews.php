<?php require_once('config.php'); ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php'); ?>

<?php require_once(ROOT_PATH . '/includes/retrieve_data.php'); ?>

<?php
// Handle delete action
if (isset($_GET['del'])) {
    $ratingId = $_GET['del'];

    // Assuming $link is the database connection
    $deleteQuery = mysqli_query($link, "DELETE FROM ratings WHERE id = $ratingId");

    if (!$deleteQuery) {
        // Handle the case where the deletion failed
        echo "Error: " . mysqli_error($link);
    }
}

// Retrieve reviews from the database excluding empty review fields
$query = "SELECT * FROM ratings";
$results = mysqli_query($link, $query);
?>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

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

        .review-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .review-table th,
        .review-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
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
    </style>
</head>

<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>

    <div class="container">
        <div class="header">
            Reviews Management
        </div>

        <table class="review-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($results)) {
                    if (!empty($row['review'])) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['review']; ?></td>
                            <td><?php echo $row['rating']; ?></td>
                            <td>
                                <a href="manage_reviews.php?del=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
                            </td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
