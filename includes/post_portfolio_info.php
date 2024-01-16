<?php include_once '/includes/check_user.php' ?>
<?php
	include_once '../config.php';
	
	$firstname = mysqli_real_escape_string($link, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($link, $_POST['lastname']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$aboutme = mysqli_real_escape_string($link, $_POST['aboutme']);
	$dob = mysqli_real_escape_string($link, $_POST['dob']);
	$passingyear = mysqli_real_escape_string($link, $_POST['passingyear']);
	$qualification = mysqli_real_escape_string($link, $_POST['qualification']);
	$contactno = mysqli_real_escape_string($link, $_POST['contactno']);
	$address = mysqli_real_escape_string($link, $_POST['address']);
	$city = mysqli_real_escape_string($link, $_POST['city']);
	$skills = mysqli_real_escape_string($link, $_POST['skills']);
	$profile_picture = mysqli_real_escape_string($link, $_POST['cv']);
	$createdBy = mysqli_real_escape_string($link, $_POST['createdBy']);
	$portfolio_id = mysqli_real_escape_string($link, $_POST['portfolio_id']);
	$sql = "INSERT INTO portfolio_info (firstname, lastname, email, aboutme, dob, passingyear, qualification, contactno, address, city, skills, profile_picture, createdBy, portfolio_id)
			VALUES ('$firstname', '$lastname', '$email', '$aboutme', '$dob', '$passingyear', '$qualification', '$contactno', '$address', '$city', '$skills', '$profile_picture', '$createdBy','$portfolio_id')";
	
	mysqli_query($link, $sql);
	
	header("Location: ../viewmyportfolios.php?datainput=success");
?>