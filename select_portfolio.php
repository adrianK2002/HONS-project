<?php
require_once('config.php');

// Assuming you have a MySQL connection established using $link

// Sanitize input parameters to prevent SQL injection
$createdBy = mysqli_real_escape_string($link, $_GET["createdBy"]);
$exercise_id = mysqli_real_escape_string($link, $_GET["exercise_id"]);

// Update records in the portfolio_name table
$sqlUpdateZero = "UPDATE portfolio_name SET selected_portfolio = 0 WHERE createdBy = '$createdBy'";
$resultUpdateZero = mysqli_query($link, $sqlUpdateZero);

$sqlUpdateOne = "UPDATE portfolio_name SET selected_portfolio = 1 WHERE createdBy = '$createdBy' AND id = '$exercise_id'";
$resultUpdateOne = mysqli_query($link, $sqlUpdateOne);

// Check if the updates were successful
if ($resultUpdateZero && $resultUpdateOne) {
    header("Location: viewmyportfolios.php");
    exit();
} else {
    echo "Error updating records: " . mysqli_error($link);
}

// Close the database connection
mysqli_close($link);

?>
