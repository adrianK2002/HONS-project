<?php
require_once(__DIR__ . '/../config.php');
require_once(ROOT_PATH . '/includes/check_user.php');

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

$hobbies = mysqli_real_escape_string($link, $_POST['hobbies']);
$ref = mysqli_real_escape_string($link, $_POST['ref']);
$createdBy = mysqli_real_escape_string($link, $_POST['createdBy']);
$portfolio_id = mysqli_real_escape_string($link, $_POST['portfolio_id']);

// Check if a record with the given portfolio_id exists
$result = mysqli_query($link, "SELECT * FROM portfolio_info WHERE portfolio_id = '$portfolio_id'");

if (mysqli_num_rows($result) > 0) {
    // Record exists, perform an update
    $sql = "UPDATE portfolio_info SET
        firstname = '$firstname',
        lastname = '$lastname',
        email = '$email',
        aboutme = '$aboutme',
        dob = '$dob',
        passingyear = '$passingyear',
        qualification = '$qualification',
        contactno = '$contactno',
        address = '$address',
        city = '$city',
        skills = '$skills',
        qualification_school_name = '$qualification_school_name',
        certificates = '$certificates',
        extra_qualification = '$extra_qualification',
        highschool_name = '$highschool_name',
        hs_starting_date = '$hs_starting_date',
        hs_fin_date = '$hs_fin_date',
        hs_qualification = '$hs_qualification',
        uni_name = '$uni_name',
        uni_starting_date = '$uni_starting_date',
        uni_fin_date = '$uni_fin_date',
        uni_qualification = '$uni_qualification',
        current_job_title = '$current_job_title',
        current_employer_name = '$current_employer_name',
        emp_starting_date = '$emp_starting_date',
        respo = '$respo',
        extra_emp = '$extra_emp',
        project = '$project',
        hobbies = '$hobbies',
        ref = '$ref'
        WHERE portfolio_id = '$portfolio_id'";

    mysqli_query($link, $sql);

    header("Location: ../viewmyportfolios.php?datainput=success");
} else {
    // Record does not exist, handle error or redirect as needed
    echo "Record not found!";
    // or redirect to an error page
    // header("Location: ../error.php");
}
?>