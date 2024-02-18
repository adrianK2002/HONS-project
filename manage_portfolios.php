<?php require_once('config.php'); ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php'); ?>

<?php require_once(ROOT_PATH . '/includes/retrieve_data.php'); ?>
<?php require_once(ROOT_PATH . '/includes/del+edit.php'); 
// Handle delete action
if (isset($_GET['del'])) {
    $portfolioId = $_GET['del'];

    // Assuming $link is the database connection
    $deleteQuery = mysqli_query($link, "DELETE FROM portfolio_name WHERE id = $portfolioId");

    if (!$deleteQuery) {
        // Handle the case where the deletion failed
        echo "Error: " . mysqli_error($link);
    }
}
?>

<?php //print_r($_SESSION); ?>

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
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background-color: #4267B2;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .styled-table th, .styled-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .styled-table th {
            background-color: #4267B2;
            color: white;
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
            Portfolio Management
        </div>

        <table class="styled-table">
            <thead>
                <tr>
                    <th>Portfolio Name</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $results2->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['createdBy']; ?></td>
                        <td>
                            <a href="manage_portfolios.php?del=<?php echo $row['id']; ?>" class="delete-btn">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div style="text-align: center;">
    <button onclick="goBack()" class="back-btn" style="text-align:center;padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">Previous Page</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>
</html>
