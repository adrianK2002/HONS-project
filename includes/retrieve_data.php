<?php include_once 'check_user.php' ?>
<?php
	
	
	
	$results = mysqli_query($link, "SELECT * FROM portfolio_name WHERE createdBy={$_SESSION['id']}");
	$results1 = mysqli_query($link, "SELECT * FROM portfolio_name WHERE selected_portfolio=1 AND createdBy={$_SESSION['id']}");
	$results2 = mysqli_query($link, "SELECT * FROM portfolio_name");
	//$users = mysqli_query($link, "SELECT * FROM portfolio_name WHERE selected_portfolio=1");
	$portfolio_search_test = mysqli_query($link, "SELECT * FROM portfolio_name");
	$newresults = mysqli_query($link, "SELECT * FROM portfolio_name WHERE createdBy={$_SESSION['id']} AND created_at >= NOW() - INTERVAL 5 MINUTE");
	$preferences = mysqli_query($link, "SELECT * FROM user_preferences WHERE createdBy={$_SESSION['id']}");
	$pictures = mysqli_query($link, "SELECT * FROM profile_pictures WHERE createdBy={$_SESSION['id']}");
	if (isset($_GET['exercise_id'])) {
	$portfolio_info = mysqli_query($link, "SELECT * FROM portfolio_info WHERE createdBy={$_SESSION['id']} AND portfolio_id={$_GET['exercise_id']}");
	}
	if (isset($_GET['exercise_id'])) {
		$portfolio_info1 = mysqli_query($link, "SELECT * FROM portfolio_info WHERE createdBy AND portfolio_id={$_GET['exercise_id']}");
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
$query1 = "SELECT portfolio_info.firstname, portfolio_info.lastname
          FROM portfolio_info
          JOIN portfolio_name ON portfolio_info.id = portfolio_name.id
          WHERE portfolio_name.selected_portfolio = 1";

$users = mysqli_query($link, $query1);

if ($users) {
    while ($row = mysqli_fetch_assoc($users)) {
        // Process each row
        // $row['firstname'], $row['lastname'] to access column values
    }
    mysqli_free_result($users);
} else {
    echo "Error: " . mysqli_error($link);
}
 $portfolio_id = isset($_GET['exercise_id']) ? (int)$_GET['exercise_id'] : 0;
$getSelectedPortfolio1 = mysqli_query($link, "SELECT * FROM portfolio_info WHERE portfolio_id = $portfolio_id");
