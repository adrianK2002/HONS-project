<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
require_once(ROOT_PATH . '/includes/del_port.php');

$portfolio_id = mysqli_real_escape_string($link, $_GET['exercise_id']);
$query = "SELECT * FROM portfolio_info WHERE portfolio_id = '$portfolio_id'";
$result = mysqli_query($link, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}
?>
<head>
	<link rel="stylesheet" href="static/table.css">
	<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.content-header {
    margin: 50px 0;
}

.latest-job {
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 12px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.btn-success,
.btn-danger,
.edit-portfolio-btn {
    padding: 12px 20px;
    font-size: 18px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-success {
    background-color: #5cb85c;
    color: #fff;
}

.btn-danger {
    background-color: #d9534f;
    color: #fff;
}

.edit-portfolio-btn {
    background-color: #0066CC;
    color: white;
    margin-top: 0px; /* Adjust as needed */
}

.edit-portfolio-btn:hover {
    background-color: #0056a7;
}

.container {
    max-width: 800px;
    margin: 0 auto;
}

form {
    margin: 0;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group textarea {
    resize: vertical;
}
.form-control.input-lg {
        height: auto; /* Set height to auto to allow content to determine the height */
        resize: vertical; /* Allow vertical resizing */
    }
</style>
</head>


 <body>
	<!-- navbar -->
	<?php include( ROOT_PATH . '/includes/navbar_logged_in.php') ?>
	<!-- //navbar -->
	<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 1: Personal Information</h1>
	<section class="content-header">
		<div class="container">
			<form action="includes/update_portfolio_info.php" method="POST" enctype="multipart/form-data">
			<div class="col-md-6 latest-job ">
                <div class="form-group">
							<label>Full Name</label>
							<input class="form-control input-lg" type="text" id="firstname" name="firstname" placeholder="First Name *" value="<?= isset($row['firstname']) ? $row['firstname'] : ''; ?>">
						</div>	
						<div class="form-group">
						<input class="form-control input-lg" type="text" id="lastname" name="lastname" placeholder="Last Name *" value="<?= isset($row['lastname']) ? $row['lastname'] : ''; ?>">
						</div>	
						<div class="form-group">
							<label>Date Of Birth</label>
							<input class="form-control input-lg" type="date" id="dob" min="1960-01-01" max="2008-01-31" name="dob" placeholder="Date Of Birth" value="<?= isset($row['dob']) ? $row['dob'] : ''; ?>">
						</div>	
						
						<div class="form-group">
						<label>Contact Details</label>
							<input class="form-control input-lg" type="email" id="email" name="email" placeholder="Email*" value="<?= isset($row['email']) ? $row['email'] : ''; ?>" > 
						</div>	
						<div class="form-group">
							<input class="form-control input-lg" type="text" id="phone" name="contactno" minlength="10" maxlength="10" onkeypress="return validatePhone(event);" placeholder="Phone Number" value="<?= isset($row['contactno']) ? $row['contactno'] : ''; ?>">
						</div>	
						<div class="form-group">
							<label>Home Address</label>
							<textarea class="form-control input-lg" rows="4" id="address" name="address" placeholder="Address" value="<?= isset($row['address']) ? $row['address'] : ''; ?>"></textarea>
						</div>	
						<div class="form-group">
							<input class="form-control input-lg" type="text" id="city" name="city" placeholder="City" value="<?= isset($row['city']) ? $row['city'] : ''; ?>">
						</div>	
							<label style="color: red;">Profile Picture: PROFILE PICTURE IS OPTIONAL, IT CAN BE UPLOADED LATER</label>
							
						</div>
						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;" >Section 2: About Me</h1>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
							<div>
							<textarea class="form-control input-lg" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *" rows="4"><?= isset($row['aboutme']) ? $row['aboutme'] : ''; ?></textarea>
   						 </div>
						</div>	
						</div>
						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 3: Qualifications and Certificates</h1>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
						<label>Highest Qualification</label>
							<input class="form-control input-lg" type="text" id="qualification" name="qualification" placeholder="Highest Qualification" value="<?= isset($row['qualification']) ? $row['qualification'] : ''; ?>">
						</div>	
						<div>
							<input class="form-control input-lg" type="date" id="passingyear" name="passingyear" placeholder="Passing Year" value="<?= isset($row['passingyear']) ? $row['passingyear'] : ''; ?>">
						</div>	
						<br>
						<div>
							<input class="form-control input-lg" type="text" id="qualification_school_name" name="qualification_school_name" placeholder="University/College/School name" value="<?= isset($row['qualification_school_name']) ? $row['qualification_school_name'] : ''; ?>">
						</div>	
						<br>
						<div class="form-group">
						<label>Certificates</label>
							<input class="form-control input-lg" type="text" id="certificates" name="certificates" placeholder="if there is no certificates just type in 'none'*" value="<?= isset($row['certificates']) ? $row['certificates'] : ''; ?>">
						</div>	
						<div class="form-group">
						<label>Extra Qualifications</label>
							<input class="form-control input-lg" type="text" id="extra_qualification" name="extra_qualification" placeholder="List all extra qualifications, if there is no certificates just type in 'none'*" value="<?= isset($row['extra_qualification']) ? $row['extra_qualification'] : ''; ?>">
						</div>	
						</div>
						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 4: Education</h1>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
		
						<label>Highschool/Middleschool education</label>
							<input class="form-control input-lg" type="text" id="highschool_name" name="highschool_name" placeholder="School Name" value="<?= isset($row['highschool_name']) ? $row['highschool_name'] : ''; ?>">
						</div>	
						<div>
							<input class="form-control input-lg" type="date" id="hs_starting_date" name="hs_starting_date" placeholder="Starting Date" value="<?= isset($row['hs_starting_date']) ? $row['hs_starting_date'] : ''; ?>">
						</div>	
						<br>
						<div>
							<input class="form-control input-lg" type="date" id="hs_fin_date" name="hs_fin_date" placeholder="Finishing Date" value="<?= isset($row['hs_fin_date']) ? $row['hs_fin_date'] : ''; ?>">
						</div>	
						<br>
						<div class="form-group">
						<label>Courses and Grades</label>
							<input class="form-control input-lg" type="text" id="hs_qualification" name="hs_qualification" placeholder="if none, just type in 'none'*" value="<?= isset($row['hs_qualification']) ? $row['hs_qualification'] : ''; ?>">
						</div>
</div>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
						<label>Higher education(University/College)</label>
							<input class="form-control input-lg" type="text" id="uni_name" name="uni_name" placeholder="School Name" value="<?= isset($row['uni_name']) ? $row['uni_name'] : ''; ?>">
						</div>	
						<div>
							<input class="form-control input-lg" type="date" id="uni_starting_date" name="uni_starting_date" placeholder="Starting Date" value="<?= isset($row['uni_starting_date']) ? $row['uni_starting_date'] : ''; ?>">
						</div>	
						<br>
						<div>
							<input class="form-control input-lg" type="date" id="uni_fin_date" name="uni_fin_date" placeholder="Finishing Date" value="<?= isset($row['uni_fin_date']) ? $row['uni_fin_date'] : ''; ?>">
						</div>	
						<br>
						<div class="form-group">
						<label>Courses and Grades</label>
							<input class="form-control input-lg" type="text" id="uni_qualification" name="uni_qualification" placeholder="if none, just type in 'none'*" value="<?= isset($row['uni_qualification']) ? $row['uni_qualification'] : ''; ?>">
						</div>
						</div>
						
						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 5: Employment</h1>

							
							<div class="col-md-6 latest-job ">
						<div class="form-group">
						<label>Current Employer</label>
							<input class="form-control input-lg" type="text" id="current_job_title" name="current_job_title" placeholder="Job Title" value="<?= isset($row['current_job_title']) ? $row['current_job_title'] : ''; ?>">
						</div>	
						<div>
							<input class="form-control input-lg" type="text" id="current_employer_name" name="current_employer_name" placeholder="Employer Name" value="<?= isset($row['current_employer_name']) ? $row['current_employer_name'] : ''; ?>">
						</div>	
						<br>
						<div>
							<input class="form-control input-lg" type="date" id="emp_starting_date" name="emp_starting_date" placeholder="Starting Date" value="<?= isset($row['emp_starting_date']) ? $row['emp_starting_date'] : ''; ?>">
						</div>	
						<br>
						<div>
							<input class="form-control input-lg" type="text" id="respo" name="respo" placeholder="Responsibilities" value="<?= isset($row['respo']) ? $row['respo'] : ''; ?>">
						</div>	
						<br>
						<div class="form-group">
						<label>Past Employers</label>
						<div>
							<input class="form-control input-lg" type="text" id="extra_emp" name="extra_emp" placeholder="List relevant past employers/organisations with durations and job title" value="<?= isset($row['extra_emp']) ? $row['extra_emp'] : ''; ?>">
						</div>	
						</div>
						</div>	
					
							<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 6: Skills</h1>
						<div class="col-md-6 latest-job">
							<div class="form-group">
								<!-- Use <textarea> instead of <input> for multiline input -->
								<textarea class="form-control input-lg" id="skills" name="skills" placeholder="List all the skills *" rows="4"><?= isset($row['skills']) ? $row['skills'] : ''; ?></textarea>
							</div>
						</div>

						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 7: Projects</h1>
						<div class="col-md-6 latest-job">
							<div class="form-group">
								<!-- Use <textarea> instead of <input> for multiline input -->
								<textarea class="form-control input-lg" id="project" name="project" placeholder="List all the projects; either paste a link here or upload documents below *" rows="4"><?= isset($row['project']) ? $row['project'] : ''; ?></textarea>
								<label style="color: red;">Project files can be uploaded at "My portfolio". Links to projects can be pasted in section 7.</label>
								<!-- <input type="file" name="project_files" class="btn btn-flat btn-danger"> -->
							</div>
						</div>

						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 8: Hobbies</h1>
						<div class="col-md-6 latest-job">
							<div class="form-group">
								<!-- Use <textarea> instead of <input> for multiline input -->
								<textarea class="form-control input-lg" id="hobbies" name="hobbies" placeholder="Talk briefly about your hobbies *" rows="4"><?= isset($row['hobbies']) ? $row['hobbies'] : ''; ?></textarea>
							</div>
						</div>

						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 9: References</h1>
						<div class="col-md-6 latest-job">
							<div class="form-group">
								<!-- Use <textarea> instead of <input> for multiline input -->
								<textarea class="form-control input-lg" id="ref" name="ref" placeholder="List all references with contact details *" rows="4"><?= isset($row['ref']) ? $row['ref'] : ''; ?></textarea>
							</div>
						</div>


						</div>

						<input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>"> 	
							<input type="hidden" name="portfolio_id" value="<?= $_GET['exercise_id']; ?>"> 

						<div class="form-group" style="text-align: center;">
        					<button class="edit-portfolio-btn" type="submit">Update Portfolio</button>
							</div>
			</form>


			
</section>

		
    
       
</p>
</body>