<?php include_once 'check_user.php' ?>
<?php
	
	
	
	$results = mysqli_query($link, "SELECT * FROM portfolio_name WHERE createdBy={$_SESSION['id']}");
	$results1 = mysqli_query($link, "SELECT * FROM portfolio_name WHERE createdBy={$_SESSION['id']} AND selected_portfolio=1");
	$portfolio_search_test = mysqli_query($link, "SELECT * FROM portfolio_name");
	$newresults = mysqli_query($link, "SELECT * FROM portfolio_name WHERE createdBy={$_SESSION['id']} AND created_at >= NOW() - INTERVAL 5 MINUTE");
	$preferences = mysqli_query($link, "SELECT * FROM user_preferences WHERE createdBy={$_SESSION['id']}");
	$pictures = mysqli_query($link, "SELECT * FROM profile_pictures WHERE createdBy={$_SESSION['id']}");
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

	$getSelectedPortfolioID = mysqli_query($link, "SELECT id FROM portfolio_name WHERE createdBy={$_SESSION['id']} AND selected_portfolio=1");

$row2 = $getSelectedPortfolioID->fetch_assoc();
if (mysqli_num_rows($getSelectedPortfolioID) > 0) {
               

 $getSelectedPortfolio = mysqli_query($link, "SELECT * FROM portfolio_info WHERE createdBy={$_SESSION['id']} AND portfolio_id={$row2['id']}");

}