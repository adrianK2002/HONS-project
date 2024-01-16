<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once( ROOT_PATH . '/includes/check_user.php') ?>
<?php //print_r($_SESSION); ?>
 <body>
	<!-- navbar -->
	<?php include( ROOT_PATH . '/includes/navbar_logged_in.php') ?>
	<!-- //navbar -->
	
	<a href="viewmyportfolios.php" style="display: block; padding: 20px; font-size: 18px; text-align: center; text-decoration: none; margin: 10px; cursor: pointer; background-color: #3498db; color: #fff; border: none; border-radius: 5px;" onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'">View my Portfolios</a>
	<a href="createportfolio.php" style="display: block; padding: 20px; font-size: 18px; text-align: center; text-decoration: none; margin: 10px; cursor: pointer; background-color: #3498db; color: #fff; border: none; border-radius: 5px;" onmouseover="this.style.backgroundColor='#2980b9'" onmouseout="this.style.backgroundColor='#3498db'">Create Portfolio</a>	

</body>
  </body>