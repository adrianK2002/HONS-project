
<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
require_once(ROOT_PATH . '/includes/rate_profile.php');
/*ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(NONE);*/
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
            max-width: 1000px;
            margin: 20px auto;
        }

        .resume-table, .styled-table, .software-skills-table, .project-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .resume-table th, .resume-table td,
        .styled-table th, .styled-table td,
        .software-skills-table th, .software-skills-table td,
        .project-table th, .project-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .resume-table th,
        .styled-table th,
        .software-skills-table th,
        .project-table th {
            background-color: #f2f2f2;
        }

        .resume-table th,
        .resume-table td,
        .section-header,
        .project-header {
            font-size: 16px;
        }

        .section-header,
        .project-header {
            font-weight: bold;
            background-color: #3498db;
            color: black;
            padding: 16px;
        }

        .picture {
            width: 100px;
            height: auto;
        }

        /* Additional styles for the new layout */
        .top-section {
            display: flex;
        }

        .personal-details, .picture-section, .skills-section,
        .profile-container {
            flex: 1;
            padding: 0 20px;
            margin: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .button-link {
            display: inline-block;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .button-link:hover {
            background-color: #2980b9;
        }
        .project-container {
            flex: 1;
            padding: 0 20px;
            margin: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .rating-container {
            font-size: 2em; /* Adjust the font size as needed */
            font-weight: bold;
            color: black; /* Set the text color to red */
            text-align: center;
          
            padding: 10px;
            border-radius: 10px;
            background-color: #fff; /* Set your desired background color */
        }
        .custom1 {

            color: red; /* Set the text color to red */
            text-align: center;

        }
    </style>
    <br>
            <div style="text-align: center;">
    <button onclick="goBack()" class="back-btn" style="text-align:center;padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">Previous Page</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
    <div class="rating-container">
        Developer's rating(out of 5) <div class="custom1"><?php echo number_format($averageRating, 1); ?></div> 
    </div>
     
  <?php if (isset($getSelectedPortfolio1) && mysqli_num_rows($getSelectedPortfolio1) > 0) { ?>
        <div class="resume-container">
            <!-- Personal Details and Picture Section -->
            <div class="top-section">
                <div class="personal-details">
                   
                    <table class="resume-table">
        <thead>
            <tr>
                <th class="section-header" colspan="4">Personal Details</th>
 
            </tr>
        </thead>
        
        <tbody>

            <?php while ($row = $getSelectedPortfolio1->fetch_assoc()) { 
          

                ?>
                    <tr>
                    <td rowspan="6" colspan="0">
    <?php
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
    ?>
</td>
                    <th>Name</th>
                        <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                        
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
            $getSelectedPortfolio1->data_seek(0);

            while ($row = $getSelectedPortfolio1->fetch_assoc()) { ?>
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
            $getSelectedPortfolio1->data_seek(0);
                
            while ($row = $getSelectedPortfolio1->fetch_assoc()) { ?>
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
    

      



  


   
</div>
 <?php } else {
    echo "Please select a portfolio to show.";
 }  ?>

<div class="profile-container">
    <h3>Software Developer Skills</h3>
    <table class="styled-table">
        <?php
        $previousUserId = null;

        while ($row = $preferences->fetch_assoc()) {
            // Check if the user ID has changed
            if ($previousUserId !== $row['createdBy']) {
                // If it has changed, display a new set of preferences
                ?>

                <tr>
                    <th>Programming Languages</th>
                    <td><?php echo $row['language']; ?></td>
                </tr>
                <tr>
                    <th>Software Tools</th>
                    <td><?php echo $row['tool']; ?></td>
                </tr>
                <tr>
                    <th>Experience Level</th>
                    <td><?php echo $row['experience']; ?></td>
                </tr>
                <?php
            } else {
                // If the user ID is the same, only display the new set of preferences
                ?>
                <tr>
                    <th>Programming Languages</th>
                    <td><?php echo $row['language']; ?></td>
                </tr>
                <tr>
                    <th>Software Tools</th>
                    <td><?php echo $row['tool']; ?></td>
                </tr>
                <tr>
                    <th>Experience Level</th>
                    <td><?php echo $row['experience']; ?></td>
                </tr>
                <?php
            }

            // Update the previous user ID
            $previousUserId = $row['createdBy'];
        }
        ?>
    </table>
    <table class="resume-table">
    <?php 
        // Reset the internal pointer to the beginning of the result set
        $getSelectedPortfolio1->data_seek(0);
            
        while ($row = $getSelectedPortfolio1->fetch_assoc()) { ?>
    <thead>
        <tr>
            <th class="section-header" colspan="4">Other Skills</th>
        </tr>
    </thead>
    <tbody style="margin-bottom: 20px;"> <!-- Add margin to create space -->
        <tr>
            <td colspan="4"><?php echo $row['skills']; ?></td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th class="section-header" colspan="4">Current Profession</th>
        </tr>
    </thead>
    <tbody style="margin-bottom: 20px;"> <!-- Add margin to create space -->
        <tr>
            <td colspan="4"><?php echo $row['current_job_title']; ?></td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th class="section-header" colspan="4">Link to github</th>
        </tr>
    </thead>
        
    <tbody>
    <td colspan="4"><a href="<?php echo $row['git']; ?>" target="_blank"><button class="button-link">User's GitHub</button></a></td>

    </tbody>
    <thead>
        <tr>
            <th class="section-header" colspan="4">Links to projects</th>
        </tr>
    </thead>
    <tbody style="margin-bottom: 20px;"> <!-- Add margin to create space -->
        <tr>
            <td colspan="4"><?php echo $row['project']; ?></td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th class="section-header" colspan="4">Hobbies</th>
        </tr>
    </thead>
    <tbody style="margin-bottom: 20px;"> <!-- Add margin to create space -->
        <tr>
            <td colspan="4"><?php echo $row['hobbies']; ?></td>
        </tr>
    </tbody>
    <BR>
    <thead>
    <tr>
        <th class="section-header" colspan="4">Education</th>
    </tr>

</thead>
<thead>
<tbody style="margin-bottom: 20px;"> <!-- Add margin to create space -->
            <?php 
            // Reset the internal pointer to the beginning of the result set
            $getSelectedPortfolio1->data_seek(0);
                
            while ($row = $getSelectedPortfolio1->fetch_assoc()) { ?>
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
            <?php } ?>
        </tbody>
            </thead>
<thead>
    <tr>
        <th class="section-header" colspan="4">Higher Education</th>
    </tr>
</thead>
<tbody style="margin-bottom: 20px;"> <!-- Add margin to create space -->
            <?php 
            // Reset the internal pointer to the beginning of the result set
            $getSelectedPortfolio1->data_seek(0);
                
            while ($row = $getSelectedPortfolio1->fetch_assoc()) { ?>
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
            <?php } ?>
        </tbody>
        <thead>
    <tr>
        <th class="section-header" colspan="4">Work Experience</th>
    </tr>
</thead>
<tbody style="margin-bottom: 20px;"> <!-- Add margin to create space -->
            <?php 
            // Reset the internal pointer to the beginning of the result set
            $getSelectedPortfolio1->data_seek(0);
                
            while ($row = $getSelectedPortfolio1->fetch_assoc()) { ?>
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
            <tr>
                        <th>Relevant past employers/organisations with duration and job title</th>
                        <td colspan="1"><?php echo $row['extra_emp']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    <?php } ?>
    
</body>

