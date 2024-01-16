<?php include_once '/includes/check_user.php' ?>
<?php
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['portfolio_id'])) {
    $portfolio_id = mysqli_real_escape_string($link, $_GET['portfolio_id']);

    $sql = "SELECT * FROM portfolio_info WHERE portfolio_id = '$portfolio_id'";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Fetch data to pre-populate the form
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $aboutme = $row['aboutme'];
        $dob = $row['dob'];
        $passingyear = $row['passingyear'];
        $qualification = $row['qualification'];
        $contactno = $row['contactno'];
        $address = $row['address'];
        $city = $row['city'];
        $skills = $row['skills'];
        $profile_picture = $row['profile_picture'];
        $createdBy = $row['createdBy'];
    } else {
        echo "Error fetching data from the database.";
    }
} else {
    echo "Invalid request.";
}
?>