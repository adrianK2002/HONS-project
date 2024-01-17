<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
require_once(ROOT_PATH . '/includes/del+edit.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['selected_portfolio'])) {
        $selectedPortfolioId = $_POST['selected_portfolio'];
        // Fetch details of the selected portfolio based on $selectedPortfolioId
        // You need to implement a function or query to retrieve the specific portfolio details
        // For example:
        // $selectedPortfolioDetails = getPortfolioDetails($selectedPortfolioId);
    } else {
        // No portfolio selected
        // Handle this case accordingly
    }
}
?>

<head>
    <!-- Your existing head styles -->
</head>

<body>
    <!-- navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //navbar -->


</body>
