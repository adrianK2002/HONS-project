<?php include_once 'check_user.php' ?>
<?php
	
	
	
	$results = mysqli_query($link, "SELECT * FROM portfolio_name WHERE createdBy={$_SESSION['id']}");
	$newresults = mysqli_query($link, "SELECT * FROM portfolio_name WHERE createdBy={$_SESSION['id']} AND created_at >= NOW() - INTERVAL 5 MINUTE");
	//$exercises = mysqli_query($link, "SELECT * FROM exercises");
	if (isset($_GET['exercise_id'])) {
	$portfolio_info = mysqli_query($link, "SELECT * FROM portfolio_info WHERE createdBy={$_SESSION['id']} AND portfolio_id={$_GET['exercise_id']}");
	}
	
?>