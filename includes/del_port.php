<?php 
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($link, "DELETE FROM exercises WHERE id=$id");
	$_SESSION['message'] = "deleted!"; 
	header('location: viewmyportfolios.php');
}
?>