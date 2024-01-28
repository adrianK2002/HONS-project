<?php 
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($link, "DELETE FROM user_preferences WHERE id=$id");
	$_SESSION['message'] = "deleted!"; 
	header('location: myportfolio.php');
}
?>