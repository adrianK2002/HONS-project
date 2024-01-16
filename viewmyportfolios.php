<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once( ROOT_PATH . '/includes/check_user.php') ?>
<?php require_once( ROOT_PATH . '/includes/retrieve_data.php') ?>
<?php require_once( ROOT_PATH . '/includes/del+edit.php') ?>


<head>
	<link rel="stylesheet" href="static/table.css">
	<style>
input[type=text], select {
	font-family: "Comic Sans MS", cursive, sans-serif;
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 2px solid #000000;
  border-radius: 4px;
  box-sizing: border-box;
  width: 300px;
  height: 30px;
  position:relative;
  
}

input[type=submit] {
	font-family: "Comic Sans MS", cursive, sans-serif;
  width: 100%;
  background-color: #0066CC;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: 2px solid #000000;
  border-radius: 4px;
  cursor: pointer;
    width: 200px;
	position:relative;
}

input[type=submit]:hover {
	font-family: "Comic Sans MS", cursive, sans-serif;
  background-color: #0066CC;
  position:relative;
  
}


</style>
</head>



<?php //print_r($_SESSION); ?>
 <body>
	<!-- navbar -->
	<?php include( ROOT_PATH . '/includes/navbar_logged_in.php') ?>
	<!-- //navbar -->
	
	

	<table class="paleBlueRows" style="width=50%;margin:30px auto;">
		<thead style="border: none; height:30px; padding: 2px;">
			<tr>
				<th>Portfolio Name</th>
				
				<th colspan="3">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = $results->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td>
				<a href="view_portfolio.php?exercise_id=<?php echo $row['id']?>" >View</a>
			</td>
			<td>
				<a href="edit_portfolio.php?exercise_id=<?php echo $row['id']?>" >Edit</a>
			</td>
			
			<td>
				<a href="viewmyportfolios.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
		

  </body>
  
