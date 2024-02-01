<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once( ROOT_PATH . '/includes/check_user.php') ?>


 <body>
	<!-- navbar -->
	<?php include( ROOT_PATH . '/includes/navbar_logged_in.php') ?>
	<!-- //navbar -->
	
	<a href="dev_search_loggedin.php" style="display: block; padding: 20px; font-size: 18px; text-align: center; text-decoration: none; margin: 10px; cursor: pointer; background-color: #3498db; color: #fff; border: none; border-radius: 5px;" onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'">Search for Software Developers</a>
	<a href="messenger.php" style="display: block; padding: 20px; font-size: 18px; text-align: center; text-decoration: none; margin: 10px; cursor: pointer; background-color: #3498db; color: #fff; border: none; border-radius: 5px;" onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'">Messages</a>

</body>
