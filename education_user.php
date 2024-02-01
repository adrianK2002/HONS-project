
<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
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

        .resume-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .resume-table th, .resume-table td {
            border: 2px solid #ddd;
            padding: 16px;
            text-align: left;
            font-size: 16px;
        }

        .resume-table th {
            background-color: #f2f2f2;
        }

        .section-header {
            font-weight: bold;
            font-size: 20px;
            background-color: #3498db;
            color: black;
        }

        .picture {
            width: 100px;
            height: auto;
        }

        /* Additional styles for the new layout */
        .top-section {
            display: flex;
        }

        .personal-details, .picture-section, .skills-section {
            flex: 1;
            padding: 0 20px;
        }

        .bottom-section {
            margin-top: 20px;
        }
        .profile-container {
    margin: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    
}

.styled-table th,
.styled-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.styled-table th {
    background-color: #f2f2f2;
}

.styled-table td {
    background-color: #fff;
}

.styled-table th:first-child,
.styled-table td:first-child {
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
}

.styled-table th:last-child,
.styled-table td:last-child {
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
}
.software-skills-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 2px solid #3498db; /* Add border color of your choice */
            border-radius: 8px;
        }

        .software-skills-table th,
        .software-skills-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .software-skills-table th {
            background-color: #f2f2f2;
        }

        .software-skills-table td {
            background-color: #fff;
        }

        .software-skills-table th:first-child,
        .software-skills-table td:first-child {
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .software-skills-table th:last-child,
        .software-skills-table td:last-child {
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        .button-link {
    display: inline-block;
    padding: 10px;
    background-color: #3498db; /* Button background color */
    color: #fff; /* Button text color */
    text-decoration: none;
    border-radius: 5px; /* Rounded corners */
}

.button-link:hover {
    background-color: #2980b9; /* Button background color on hover */
}
    </style>
  <?php if (isset($getSelectedPortfolio) && mysqli_num_rows($getSelectedPortfolio) > 0) { ?>
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
            $portfolio_info->data_seek(0);
                
            while ($row = $portfolio_info->fetch_assoc()) { ?>
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



      



  


   
</div>
 <?php } else {
    echo "Please select a portfolio to show.";
 }  ?>


</body>
