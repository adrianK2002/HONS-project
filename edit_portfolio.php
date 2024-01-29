<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once( ROOT_PATH . '/includes/check_user.php') ?>
<?php require_once( ROOT_PATH . '/includes/retrieve_data.php') ?>
<?php require_once( ROOT_PATH . '/includes/del_port.php') ?>
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

/* Add more styling as needed */

</style>
</head>


 <body>
	<!-- navbar -->
	<?php include( ROOT_PATH . '/includes/navbar_logged_in.php') ?>
	<!-- //navbar -->
	<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 1: Personal Information</h1>
	<section class="content-header">
		<div class="container">
			<form action="includes/post_portfolio_info.php" method="POST" enctype="multipart/form-data">
			<div class="col-md-6 latest-job ">
                <div class="form-group">
							<label>Full Name</label>
							<input class="form-control input-lg" type="text" id="firstname" name="firstname" placeholder="First Name *" required> 
						</div>	
						<div class="form-group">
							<input class="form-control input-lg" type="text" id="lastname" name="lastname" placeholder="Last Name *" required> 
						</div>	
						<div class="form-group">
							<label>Date Of Birth</label>
               				 <input class="form-control input-lg" type="date" id="dob" min="1960-01-01" max="2008-01-31" name="dob" placeholder="Date Of Birth">
						</div>	
						
						<div class="form-group">
						<label>Contact Details</label>
							<input class="form-control input-lg" type="email" id="email" name="email" placeholder="Email *" required> 
						</div>	
						<div class="form-group">
							<input class="form-control input-lg" type="text" id="phone" name="contactno" minlength="10" maxlength="10" onkeypress="return validatePhone(event);" placeholder="Phone Number">
						</div>	
						<div class="form-group">
							<label>Home Address</label>
							<textarea class="form-control input-lg" rows="4" id="address" name="address" placeholder="Address"></textarea>
						</div>	
						<div class="form-group">
							<input class="form-control input-lg" type="text" id="city" name="city" placeholder="City">
						</div>	
							<label for="profile_picture">Profile Picture: PROFILE PICTURE IS OPTIONAL, IT CAN BE UPLOADED LATER</label>
   					 <
						</div>
						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 2: About Me</h1>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
							<textarea class="form-control input-lg" rows="4" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *" required></textarea>
						</div>	
						</div>
						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 3: Qualifications and Certificates</h1>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
						<label>Highest Qualification</label>
							<input class="form-control input-lg" type="text" id="qualification" name="qualification" placeholder="Highest Qualification">
						</div>	
						<div>
							<input class="form-control input-lg" type="date" id="passingyear" name="passingyear" placeholder="Passing Year">
						</div>	
						<br>
						<div>
							<input class="form-control input-lg" type="text" id="qualification_school_name" name="qualification_school_name" placeholder="University/College/School name">
						</div>	
						<br>
						<div class="form-group">
						<label>Certificates</label>
							<input class="form-control input-lg" type="text" id="certificates" name="certificates" placeholder="if there is no certificates just type in 'none'*">
						</div>	
						<div class="form-group">
						<label>Extra Qualifications</label>
							<input class="form-control input-lg" type="text" id="extra_qualification" name="extra_qualification" placeholder="List all extra qualifications, if there is no certificates just type in 'none'*">
						</div>	
						</div>
						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 4: Education</h1>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
		
						<label>Highschool/Middleschool education</label>
							<input class="form-control input-lg" type="text" id="highschool_name" name="highschool_name" placeholder="School Name">
						</div>	
						<div>
							<input class="form-control input-lg" type="date" id="hs_starting_date" name="hs_starting_date" placeholder="Starting Date">
						</div>	
						<br>
						<div>
							<input class="form-control input-lg" type="date" id="hs_fin_date" name="hs_fin_date" placeholder="Finishing Date">
						</div>	
						<br>
						<div class="form-group">
						<label>Courses and Grades</label>
							<input class="form-control input-lg" type="text" id="hs_qualification" name="hs_qualification" placeholder="if none, just type in 'none'*">
						</div>
</div>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
						<label>Higher education(University/College)</label>
							<input class="form-control input-lg" type="text" id="uni_name" name="uni_name" placeholder="School Name">
						</div>	
						<div>
							<input class="form-control input-lg" type="date" id="uni_starting_date" name="uni_starting_date" placeholder="Starting Date">
						</div>	
						<br>
						<div>
							<input class="form-control input-lg" type="date" id="uni_fin_date" name="uni_fin_date" placeholder="Finishing Date">
						</div>	
						<br>
						<div class="form-group">
						<label>Courses and Grades</label>
							<input class="form-control input-lg" type="text" id="uni_qualification" name="uni_qualification" placeholder="if none, just type in 'none'*">
						</div>
						</div>
						
						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 5: Employment</h1>

							
							<div class="col-md-6 latest-job ">
						<div class="form-group">
						<label>Current Employer</label>
							<input class="form-control input-lg" type="text" id="current_job_title" name="current_job_title" placeholder="Job Title">
						</div>	
						<div>
							<input class="form-control input-lg" type="text" id="current_employer_name" name="current_employer_name" placeholder="Employer Name">
						</div>	
						<br>
						<div>
							<input class="form-control input-lg" type="date" id="emp_starting_date" name="emp_starting_date" placeholder="Starting Date">
						</div>	
						<br>
						<div>
							<input class="form-control input-lg" type="text" id="respo" name="respo" placeholder="Responsibilities">
						</div>	
						<br>
						<div class="form-group">
						<label>Past Employers</label>
						<div>
							<input class="form-control input-lg" type="text" id="extra_emp" name="extra_emp" placeholder="List relevant past employers/organisations with durations and job title">
						</div>	
						</div>
						</div>	
					
						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 6: Skills</h1>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
							<textarea class="form-control input-lg" rows="4" id="skills" name="skills" placeholder="List all the skills *" required></textarea>
						</div>	
						</div>

						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 7: Projects</h1>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
							<textarea class="form-control input-lg" rows="4" id="project" name="project" placeholder="List all the projects; either paste a link here or upload documents below *" required></textarea>
							<label style="color: red;">Project files can be uploaded at "My portfolio". Links to projects can be pasted in section 7.</label>
							<!-- <input type="file" name="project_files" class="btn btn-flat btn-danger"> -->
						</div>	
						</div>

						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 8: Hobbies</h1>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
							<textarea class="form-control input-lg" rows="4" id="hobbies" name="hobbies" placeholder="Talk briefly about yout hobbies(not required) *" ></textarea>
						</div>	
						</div>

						<h1 style="font-family: 'Arial', sans-serif; background-color: #f5f5f5;color: black;text-align: center;">Section 9: References</h1>
						<div class="col-md-6 latest-job ">
						<div class="form-group">
							<textarea class="form-control input-lg" rows="4" id="ref" name="ref" placeholder="List all references with contact details *" ></textarea>
						</div>	
						</div>

						<input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>"> 	
							<input type="hidden" name="portfolio_id" value="<?= $_GET['exercise_id']; ?>"> 

						<div class="form-group" style="text-align: center;">
        					<button class="edit-portfolio-btn" type="submit">Publish Portfolio</button>
							</div>
			</form>


			
</section>

		
    
       
</p>
</body>