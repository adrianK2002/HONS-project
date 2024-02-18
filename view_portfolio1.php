<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');

?>

<body>
    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    <!-- //Navbar -->

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .resume-container {
            max-width: 1000px; /* Increased container width */
            margin: 20px auto;
        }

        .resume-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .resume-table th, .resume-table td {
            border: 2px solid #ddd; /* Increased border thickness */
            padding: 16px; /* Increased padding */
            text-align: left;
            font-size: 16px; /* Increased font size */
        }

        .resume-table th {
            background-color: #f2f2f2;
        }

        .section-header {
            font-weight: bold;
            font-size: 20px; /* Increased font size for section headers */
            background-color: #3498db;
            color: black;
        }

        .picture {
            width: 100px; /* Adjust the width as needed */
            height: auto;
        }
    </style>

<div class="resume-container">
    <table class="resume-table">
        <thead>
            <tr>
                <th class="section-header" colspan="2">Personal Details</th>
                <th class="section-header" colspan="1">Picture</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $portfolio_info1->fetch_assoc()) { ?>
                    <tr>
                        <th>Full Name</th>
                        <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                        
                        <td rowspan="6" colspan="0"> <?php
    // Fetch profile picture details from the database
    $query = "SELECT filename, file_content, file_type FROM profile_pictures WHERE createdBy = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, 'i', $row['createdBy']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $filename, $fileContent, $fileType);

    // Check if a profile picture is found
    if (mysqli_stmt_fetch($stmt)) {
        // Display the profile picture
        echo '<img class="picture" src="data:' . $fileType . ';base64,' . base64_encode($fileContent) . '" alt="Profile Picture">';
    } else {
        // If no profile picture is found, you can display a default image or show an alternative message
        // For example, you can use a default image:
        // echo '<img class="picture" src="path/to/default/image.jpg" alt="Default Profile Picture">';
        // Or show a placeholder image with an alternative message:
        echo '<img class="picture" src="path/to/placeholder/image.jpg" alt="Profile Picture Not Found">';
    }

    // Close the database statement
    mysqli_stmt_close($stmt);
    ?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td><?php echo $row['dob']; ?></td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td><?php echo $row['contactno']; ?></td>
                    </tr>
                    <tr>
                        <th>E-mail Address</th>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><?php echo $row['city']; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $row['address']; ?></td>
                    </tr>
                    <!-- Add more rows for additional personal details -->
                    <?php } ?>
        </tbody>
    </table>
    <br>
    <table class="resume-table">
        <thead>
            <tr>
                <th class="section-header" colspan="4">About Me</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Reset the internal pointer to the beginning of the result set
            $portfolio_info1->data_seek(0);

            while ($row = $portfolio_info1->fetch_assoc()) { ?>
                <tr>
                    <td colspan="4"><?php echo $row['aboutme']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <br>
    <table class="resume-table">
        <thead>
            <tr>
                <th class="section-header" colspan="4">Qualifications and Certificates</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Reset the internal pointer to the beginning of the result set
            $portfolio_info1->data_seek(0);
                
            while ($row = $portfolio_info1->fetch_assoc()) { ?>
            <tr>
                        <th>Highest Qualification</th>
                        <td colspan="1"><?php echo $row['qualification']; ?></td>
            </tr>
            <tr>
                        <th>Passing Year</th>
                        <td colspan="1"><?php echo $row['passingyear']; ?></td>
            </tr>
            <tr>
                        <th>University/College/School</th>
                        <td colspan="1"><?php echo $row['qualification_school_name']; ?></td>
            </tr>
            <tr>
                        <th>Certificates</th>
                        <td colspan="1"><?php echo $row['certificates']; ?></td>
            </tr>
            <tr>
                        <th>Extra Qualifications</th>
                        <td colspan="1"><?php echo $row['extra_qualification']; ?></td>
            </tr>

 
            <?php } ?>
        </tbody>
    </table>
    <br>
    <table class="resume-table">
        <thead>
            <tr>
                <th class="section-header" colspan="4">Education</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th class="section-header" colspan="4">Highschool/Middleschool</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Reset the internal pointer to the beginning of the result set
            $portfolio_info1->data_seek(0);
                
            while ($row = $portfolio_info1->fetch_assoc()) { ?>
            <tr>
                        <th>School Name</th>
                        <td colspan="1"><?php echo $row['highschool_name']; ?></td>
            </tr>
            <tr>
                        <th>Starting Date</th>
                        <td colspan="1"><?php echo $row['hs_starting_date']; ?></td>
            </tr>
            <tr>
                        <th>Finishing Date</th>
                        <td colspan="1"><?php echo $row['hs_fin_date']; ?></td>
            </tr>
            <tr>
                        <th>Courses and Grades</th>
                        <td colspan="1"><?php echo $row['hs_qualification']; ?></td>
            </tr>
            <thead>
            <tr>
                <th class="section-header" colspan="4">Higher Education(University/College)</th>
            </tr>
            <tr>
                        <th>School Name</th>
                        <td colspan="1"><?php echo $row['uni_name']; ?></td>
            </tr>
            <tr>
                        <th>Starting Date</th>
                        <td colspan="1"><?php echo $row['uni_starting_date']; ?></td>
            </tr>
            <tr>
                        <th>Finishing Date</th>
                        <td colspan="1"><?php echo $row['uni_fin_date']; ?></td>
            </tr>
            <tr>
                        <th>Courses and Grades</th>
                        <td colspan="1"><?php echo $row['uni_qualification']; ?></td>
            </tr>
        </thead>
 
            <?php } ?>
        </tbody>
    </table>
    <br>
    <table class="resume-table">
        <thead>
            <tr>
                <th class="section-header" colspan="4">Employment</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
            // Reset the internal pointer to the beginning of the result set
            $portfolio_info1->data_seek(0);
                
            while ($row = $portfolio_info1->fetch_assoc()) { ?>
            <th class="section-header" colspan="4">Current Employer</th>
            <tr>
                        <th>Job Title</th>
                        <td colspan="1"><?php echo $row['current_job_title']; ?></td>
            </tr>
            <tr>
                        <th>Employer Name</th>
                        <td colspan="1"><?php echo $row['current_employer_name']; ?></td>
            </tr>
            <tr>
                        <th>Starting Date</th>
                        <td colspan="1"><?php echo $row['emp_starting_date']; ?></td>
            </tr>
            <tr>
                        <th>Responsibilities</th>
                        <td colspan="1"><?php echo $row['respo']; ?></td>
            </tr>

            <th class="section-header" colspan="4">Past Employers</th>
            <tr>
                        <th>Relevant past employers/organisations with duration and job title</th>
                        <td colspan="1"><?php echo $row['extra_emp']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <table class="resume-table">
        <?php 
            // Reset the internal pointer to the beginning of the result set
            $portfolio_info1->data_seek(0);
                
            while ($row = $portfolio_info1->fetch_assoc()) { ?>
        <thead>
            <tr>
                <th class="section-header" colspan="4">Skills</th>
            </tr>
        </thead>
        <tbody>
          <td colspan="1"><?php echo $row['skills']; ?></td>
        </tbody>
    </table>
    <?php } ?>
    <table class="resume-table">
    <?php 
            // Reset the internal pointer to the beginning of the result set
            $portfolio_info1->data_seek(0);
                
            while ($row = $portfolio_info1->fetch_assoc()) { ?>
        <thead>
            <tr>
                <th class="section-header" colspan="4">Projects</th>
            </tr>
        </thead>
        <tbody>
          <td colspan="1"><?php echo $row['project']; ?></td>
          <td colspan="1"><?php echo $row['project_files']; ?></td>
        </tbody>
    </table>
    <?php } ?>
    <table class="resume-table">
    <?php 
            // Reset the internal pointer to the beginning of the result set
            $portfolio_info1->data_seek(0);
                
            while ($row = $portfolio_info1->fetch_assoc()) { ?>
        <thead>
            <tr>
                <th class="section-header" colspan="4">Hobbies</th>
            </tr>
        </thead>
        <tbody>
           <td colspan="1"><?php echo $row['hobbies']; ?></td>
        </tbody>
    </table>
    <?php } ?>
    <table class="resume-table">
    <?php 
            // Reset the internal pointer to the beginning of the result set
            $portfolio_info1->data_seek(0);
                
            while ($row = $portfolio_info1->fetch_assoc()) { ?>
        <thead>
            <tr>
                <th class="section-header" colspan="4">References</th>
            </tr>
        </thead>
        <tbody>
               <td colspan="1"><?php echo $row['ref']; ?></td>
        </tbody>
    </table>
    <?php } ?>
</div>
<div style="text-align: center;">
    <button onclick="goBack()" class="back-btn" style="text-align:center;padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">Previous Page</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</body>
