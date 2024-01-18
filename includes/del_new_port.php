<?php 
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($link, "DELETE FROM portfolio_name WHERE id=$id");
	$_SESSION['message'] = "deleted!"; 
	header('location: createnewportfolio_success.php');
}
?>