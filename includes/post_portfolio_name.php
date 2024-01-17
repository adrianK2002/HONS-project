<?php 
	include_once '/includes/check_user.php'; 
	include_once '../config.php';
	
	$name = mysqli_real_escape_string($link, $_POST['name']);
	$created_at = mysqli_real_escape_string($link, $_POST['created_at']);
	$id = mysqli_real_escape_string($link, $_POST['id']);
	$createdBy=$_POST['createdBy'];
	
	$sql = "INSERT INTO portfolio_name (name, created_at, id, createdBy)
			VALUES ('$name', '$created_at', '$id', '$createdBy')";
	
	mysqli_query($link, $sql);
	
	header("Location: ../createportfolio_success.php?datainput=success");
	exit();
?>