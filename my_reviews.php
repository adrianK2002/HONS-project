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

    .reviews-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .reviews-table th,
    .reviews-table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    .reviews-table th {
        background-color: #4CAF50;
        color: white;
    }

    .review {
        font-size: 16px;
        color: #333;
    }

    .rating {
        font-size: 14px;
        color: #666;
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

   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['del']) && $_POST['del'] === 'delete') {
       // Check if the review ID is provided
       if (isset($_POST['id'])) {
           $reviewId = $_POST['id'];

           // Delete the review
           $deleteQuery = "DELETE FROM ratings WHERE id = ? AND createdBy = ?";
           $deleteStmt = $link->prepare($deleteQuery);
           $deleteStmt->bind_param("ii", $reviewId, $_SESSION['id']);

           if ($deleteStmt->execute()) {
               // Success, reload the page or redirect to the reviews page
               header("Location: ".$_SERVER['PHP_SELF']);
               exit();
           } else {
               // Error handling, you may add more detailed error messages
               echo "Error deleting the review.";
           }

           $deleteStmt->close();
       } else {
           // Review ID not provided
           echo "Review ID not provided.";
       }
   }
?>

<?php
$query = "SELECT id, review, rating FROM ratings WHERE createdBy = ?";
$stmt = $link->prepare($query);
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();
$reviews = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<div class='container'>
    <h2>My Reviews</h2>

    <?php if (!empty($reviews)) : ?>
        <div class='table-container'>
            <table class='reviews-table'>
                <thead>
                    <tr>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $review) : ?>
                        <?php
                        $reviewId = $review['id'];
                        $reviewText = $review['review'];
                        $rating = $review['rating'];
                        ?>
                        <?php if (!empty($reviewText)) : ?>
                            <tr>
                                <td class='review'><?php echo $reviewText; ?></td>
                                <td class='rating'><?php echo $rating; ?></td>
                                <td>
                                    <form method='post' onsubmit='return confirm("Are you sure you want to delete this review?")'>
                                        <input type='hidden' name='id' value='<?php echo $reviewId; ?>'>
                                        <input type='hidden' name='del' value='delete'>
                                        <button class='delete-btn' type='submit'>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p>No reviews available.</p>
    <?php endif; ?>
</div>
