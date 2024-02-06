<?php require_once(ROOT_PATH . '/includes/retrieve_data.php'); ?>
<div class="navbar">
	<div class="logo_div">
		<a href="dashboard.php"><h1>DevTalentHub</h1></a>
	</div>
	<ul>
	  <li><a class="active" href="dashboard.php">Home</a></li>
	  
	  <li><a href="viewmyprofile.php">View my Proflie</a>
	  <li><a href="myportfolio.php">My Profile Settings</a></li>
	  <li><a href="admin_panel.php">Admin Panel</a></li>
	  <!-- <li><a href="livechat.php">Live chat with other Developers!</a></li> -->
	  <li><a class="active" href="logout.php">Logout</a></li>
	  <!-- <a href="admin_panel.php" style="display: block; padding: 20px; font-size: 18px; text-align: center; text-decoration: none; margin: 10px; cursor: pointer; background-color: #3498db; color: #fff; border: none; border-radius: 5px;" onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'">Admin Panel</a> -->
	  
	</ul>

 <span style="color: white; margin-left: 30px; font-size: 25px; font-family: 'Averia Serif Libre' , cursive">Welcome back </span>
 <span style="margin-left: 5px; font-size: 25px; font-family: 'Averia Serif Libre' , cursive; font-weight: bold;"><?php echo $_SESSION['username']?> </span>
 <span style="color: white; font-size: 25px; font-family: 'Averia Serif Libre' , cursive">!</span>

</div>