<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<?php include_once "banner.php" ?>
	<?php session_start();?>
	<?php include_once"nav-loggedout.php"; ?>
	<div class="content_body_area">
		<div id="errors">
					<?php if(isset($_SESSION['errors'])){foreach($_SESSION['errors'] as $e){
								if($e == "Invalid Email") echo 'Email must be @u.boisestate.edu';
					}}?>
		</div>
		<div class="login_form">
			<form action="handler.php" method="POST">
				<div id="login_label"><label>-Sign-Up-</label></div>
				<div><label for="user" >Email</label><input 
					<?php 
						if(isset($_SESSION['errors'])){if(in_array("Invalid Email",$_SESSION['errors'])){ echo "id=\"error\"";}}?> type="text" name="email"></div>
				<div><label for="user">First Name</label><input type="text" name="first"></div>
				<div><label for="user">Last Name</label><input type="text" name="last"></div>
				<div><label for="user">Username</label><input type="text" name="user"></div>
				<div><label for="pass">Password</label><input type="password" name="pass"></div>
				<div class="button_holder"><input type="submit" name="createUser" value="Create User"></div>
			</form>
		</div>
	</div>
	</body>
	<?php include_once "footer.php"; unset($_SESSION['errors']);?>
</html>