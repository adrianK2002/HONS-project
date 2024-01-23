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
							<label style="color: red;">Profile Picutre(not required)</label>
                       		 <input type="file" name="profile_picture" class="btn btn-flat btn-danger">
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
							<input class="form-control input-lg" type="text" id="qualification" name="qualification" placeholder="Passing Year">
						</div>	
						<br>
						<div>
							<input class="form-control input-lg" type="text" id="qualification_school_name" name="qualification_school_name" placeholder="University/College/School name">
						</div>	
						<br>
						<div class="form-group">
						<label>Certificates</label>
							<input class="form-control input-lg" type="text" id="qualification" name="qualification" placeholder="if there is no certificates just type in 'none'*">
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