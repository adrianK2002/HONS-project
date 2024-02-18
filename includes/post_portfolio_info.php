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
	
	$qualification_school_name = mysqli_real_escape_string($link, $_POST['qualification_school_name']);
	$certificates = mysqli_real_escape_string($link, $_POST['certificates']);
	$extra_qualification = mysqli_real_escape_string($link, $_POST['extra_qualification']);
	$highschool_name = mysqli_real_escape_string($link, $_POST['highschool_name']);
	$hs_starting_date = mysqli_real_escape_string($link, $_POST['hs_starting_date']);
	$hs_fin_date = mysqli_real_escape_string($link, $_POST['hs_fin_date']);
	$hs_qualification = mysqli_real_escape_string($link, $_POST['hs_qualification']);
	$uni_name = mysqli_real_escape_string($link, $_POST['uni_name']);
	$uni_starting_date = mysqli_real_escape_string($link, $_POST['uni_starting_date']);
	$uni_fin_date = mysqli_real_escape_string($link, $_POST['uni_fin_date']);
	$uni_qualification = mysqli_real_escape_string($link, $_POST['uni_qualification']);
	$current_job_title = mysqli_real_escape_string($link, $_POST['current_job_title']);
	$current_employer_name = mysqli_real_escape_string($link, $_POST['current_employer_name']);
	$emp_starting_date = mysqli_real_escape_string($link, $_POST['emp_starting_date']);
	$respo = mysqli_real_escape_string($link, $_POST['respo']);
	$extra_emp = mysqli_real_escape_string($link, $_POST['extra_emp']);
	$project = mysqli_real_escape_string($link, $_POST['project']);
	$git = mysqli_real_escape_string($link, $_POST['git']);
	$hobbies = mysqli_real_escape_string($link, $_POST['hobbies']);
	$ref = mysqli_real_escape_string($link, $_POST['ref']);
	$createdBy = mysqli_real_escape_string($link, $_POST['createdBy']);
	$portfolio_id = mysqli_real_escape_string($link, $_POST['portfolio_id']);
	$sql = "INSERT INTO portfolio_info (firstname, lastname, email, aboutme, dob, passingyear, qualification, contactno, address, city, skills, createdBy, portfolio_id,
	qualification_school_name,certificates,extra_qualification,highschool_name,hs_starting_date,hs_fin_date,hs_qualification,uni_name,uni_starting_date,uni_fin_date,uni_qualification,
	current_job_title,current_employer_name,emp_starting_date,respo,extra_emp,project,hobbies,ref,git)
			VALUES ('$firstname', '$lastname', '$email', '$aboutme', '$dob', '$passingyear', '$qualification', '$contactno', '$address', '$city', '$skills',  '$createdBy','$portfolio_id',
			'$qualification_school_name','$certificates','$extra_qualification','$highschool_name','$hs_starting_date','$hs_fin_date','$hs_qualification','$uni_name','$uni_starting_date',
			'$uni_fin_date','$uni_qualification','$current_job_title','$current_employer_name','$emp_starting_date','$respo','$extra_emp','$project', '$hobbies','$git',
			'$ref')";
	
	mysqli_query($link, $sql);
	
	header("Location: ../viewmyportfolios.php?datainput=success");
?>