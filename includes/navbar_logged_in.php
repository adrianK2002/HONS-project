<?php require_once(ROOT_PATH . '/includes/retrieve_data.php'); ?>
<div class="navbar">
	<div class="logo_div">
		<a href="dashboard.php"><h1>DevTalentHub</h1></a>
	</div>
	<ul>
	  <li><a class="active" href="dashboard.php">Home</a></li>
	  <li><a class="active" href="logout.php">Logout</a></li>
	  <li><a href="viewmyprofile.php">View my Proflie</a>
	  <li><a href="myportfolio.php">My Profile Settings</a></li>
	  <!-- <li><a href="livechat.php">Live chat with other Developers!</a></li> -->
	  
	  <!-- <li><a href="privacy_policy_loggedin.php">Privacy Policy</a></li> -->
	</ul>

 <span style="color: white; margin-left: 30px; font-size: 25px; font-family: 'Averia Serif Libre' , cursive">Welcome back </span>
 <span style="margin-left: 5px; font-size: 25px; font-family: 'Averia Serif Libre' , cursive; font-weight: bold;"><?php echo $_SESSION['username']?> </span>
 <span style="color: white; font-size: 25px; font-family: 'Averia Serif Libre' , cursive">!</span>

</div>