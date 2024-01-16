<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once( ROOT_PATH . '/includes/check_user.php') ?>
 <body>
	<!-- navbar -->
	<?php include( ROOT_PATH . '/includes/navbar_logged_in.php') ?>
	<!-- //navbar -->
	
   <div>
        <h1 style="color:black">Username & Password</h1>
      <div>
		<button style="margin-top: -90px;margin-left: -770px;" type="button" onClick="parent.location='reset-password.php'">Change Password</button>
	  </div>
      <div>
		<button style="margin-top: px;margin-left: -770px;" type="button" onClick="parent.location='reset-username.php'">Change Username</button>
	  </div>
   </div>
  </body>