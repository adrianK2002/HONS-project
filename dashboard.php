<?php require_once('config.php') ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once(ROOT_PATH . '/includes/check_user.php') ?>

<?php
// Assuming you have established a database connection ($link) before this point
$results1 = mysqli_query($link, "SELECT * FROM portfolio_name WHERE selected_portfolio = 1");

// Retrieve the user's ID from the session
$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

if ($userId !== null) {
    $search_results = mysqli_query($link, "
        SELECT portfolio_name.*, 
               portfolio_info.firstname,
               portfolio_info.lastname
        FROM portfolio_name
        JOIN portfolio_info ON portfolio_name.createdBy = portfolio_info.createdBy
        WHERE portfolio_name.selected_portfolio = 1
        AND portfolio_name.createdBy = $userId
        GROUP BY portfolio_name.createdBy
    ");
} else {
    // Handle the case when the user is not logged in
    // You can redirect them to the login page or handle it in another way
    header("Location: login.php");
    exit();
}


?>
 <body>
	<!-- navbar -->
	<?php include( ROOT_PATH . '/includes/navbar_logged_in.php') ?>
	<!-- //navbar -->
	<?php while ($portfolio = mysqli_fetch_assoc($search_results)) : ?>
	<a href="dev_search_loggedin.php" style="display: block; padding: 20px; font-size: 18px; text-align: center; text-decoration: none; margin: 10px; cursor: pointer; background-color: #3498db; color: #fff; border: none; border-radius: 5px;" onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'">Search for Software Developers</a>
	<a href="messenger.php?exercise_id=<?php echo $portfolio['id']; ?>" style="display: block; padding: 20px; font-size: 18px; text-align: center; text-decoration: none; margin: 10px; cursor: pointer; background-color: #3498db; color: #fff; border: none; border-radius: 5px;" onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'">Messages</a>
	<a href="admin_panel.php" style="display: block; padding: 20px; font-size: 18px; text-align: center; text-decoration: none; margin: 10px; cursor: pointer; background-color: #3498db; color: #fff; border: none; border-radius: 5px;" onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'">Admin Panel</a>
	<?php endwhile; ?>
</body>
