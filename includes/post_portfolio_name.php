<?php 
	include_once '/includes/check_user.php'; 
	include_once '../config.php';
	
	$name = mysqli_real_escape_string($link, $_POST['name']);
	$id = mysqli_real_escape_string($link, $_POST['id']);
	$createdBy=$_POST['createdBy'];
	
	$sql = "INSERT INTO portfolio_name (name, id, createdBy)
			VALUES ('$name', '$id', '$createdBy')";
	
	mysqli_query($link, $sql);
	
	header("Location: ../viewmyportfolios.php?datainput=success");
	exit();
?>