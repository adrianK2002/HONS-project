<?php include_once 'check_user.php' ?>
<?php require_once('config.php') ?>
<?php
	
	$sql = "SELECT * FROM exercises";
	$result = $link->query($sql);
	
	if (!$result) {
		die("Invalid query: " . $link->error);
	}
?>