<?php include_once 'check_user.php' ?>
<?php
	
	
	
	$results = mysqli_query($link, "SELECT * FROM portfolio_name WHERE createdBy={$_SESSION['id']}");
	$newresults = mysqli_query($link, "SELECT * FROM portfolio_name WHERE createdBy={$_SESSION['id']} AND created_at >= NOW() - INTERVAL 5 MINUTE");
	
	if (isset($_GET['exercise_id'])) {
	$portfolio_info = mysqli_query($link, "SELECT * FROM portfolio_info WHERE createdBy={$_SESSION['id']} AND portfolio_id={$_GET['exercise_id']}");
	}

	if (isset($_POST['submit'])) {
		if (isset($_POST['selected_portfolios']) && !empty($_POST['selected_portfolios'])) {
			$selectedId = $_POST['selected_portfolios'][0]; // Assuming only one radio button can be selected
			$_SESSION['selected_portfolio_id'] = $selectedId;
			echo "Selected Portfolio ID: $selectedId";
		} else {
			echo "No portfolio selected";
		}
	}
	
