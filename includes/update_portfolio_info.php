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
$git = mysqli_real_escape_string($link, $_POST['git']);
$hobbies = mysqli_real_escape_string($link, $_POST['hobbies']);
$ref = mysqli_real_escape_string($link, $_POST['ref']);
$createdBy = mysqli_real_escape_string($link, $_POST['createdBy']);
$portfolio_id = mysqli_real_escape_string($link, $_POST['portfolio_id']);

// Check if a record with the given portfolio_id exists
$result = mysqli_query($link, "SELECT * FROM portfolio_info WHERE portfolio_id = '$portfolio_id'");

if (mysqli_num_rows($result) > 0) {
    // Record exists, perform an update

    // Build the update query dynamically
    $updateFields = array();

    // Helper function to add a field to the update query
    function addFieldToUpdate($fieldName, $fieldValue) {
        global $updateFields;
        if (!empty($fieldValue)) {
            $updateFields[] = "$fieldName = '$fieldValue'";
        }
    }

    // Add each field to the update query
    addFieldToUpdate('firstname', $firstname);
    addFieldToUpdate('lastname', $lastname);
    addFieldToUpdate('email', $email);
    addFieldToUpdate('aboutme', $aboutme);
    addFieldToUpdate('dob', $dob);
    addFieldToUpdate('passingyear', $passingyear);
    addFieldToUpdate('qualification', $qualification);
    addFieldToUpdate('contactno', $contactno);
    addFieldToUpdate('address', $address);
    addFieldToUpdate('city', $city);
    addFieldToUpdate('skills', $skills);
    addFieldToUpdate('qualification_school_name', $qualification_school_name);
    addFieldToUpdate('certificates', $certificates);
    addFieldToUpdate('extra_qualification', $extra_qualification);
    addFieldToUpdate('highschool_name', $highschool_name);
    addFieldToUpdate('hs_starting_date', $hs_starting_date);
    addFieldToUpdate('hs_fin_date', $hs_fin_date);
    addFieldToUpdate('hs_qualification', $hs_qualification);
    addFieldToUpdate('uni_name', $uni_name);
    addFieldToUpdate('uni_starting_date', $uni_starting_date);
    addFieldToUpdate('uni_fin_date', $uni_fin_date);
    addFieldToUpdate('uni_qualification', $uni_qualification);
    addFieldToUpdate('current_job_title', $current_job_title);
    addFieldToUpdate('current_employer_name', $current_employer_name);
    addFieldToUpdate('emp_starting_date', $emp_starting_date);
    addFieldToUpdate('respo', $respo);
    addFieldToUpdate('extra_emp', $extra_emp);
    addFieldToUpdate('project', $project);
    addFieldToUpdate('git', $git);
    addFieldToUpdate('hobbies', $hobbies);
    addFieldToUpdate('ref', $ref);

    // Construct the update query
    $updateQuery = implode(', ', $updateFields);

    $sql = "UPDATE portfolio_info SET $updateQuery WHERE portfolio_id = '$portfolio_id'";

    mysqli_query($link, $sql);

    header("Location: ../viewmyportfolios.php?datainput=success");
} else {
    // Record does not exist, handle error or redirect as needed
    echo "Record not found!";
    // or redirect to an error page
    // header("Location: ../error.php");
}
?>
