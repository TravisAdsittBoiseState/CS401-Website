<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<?php session_start();?>
	</head>
	<body>
	<?php include_once "banner.php" ?>
	<?php include_once"nav-loggedin.php"; ?>
	<div class="content_body_area">
		<div id="errors">
					<?php if(isset($_SESSION['errors'])){foreach($_SESSION['errors'] as $e){
								if($e == "Duplicate Project") echo 'Duplicate project name, please choose a different name.';
							}
					unset($_SESSION['errors']);}?>
		</div>
		<div class="login_form">
			<form action="handler.php" method="POST">
				<div id="login_label"><label>-Create Project-</label></div>
				<div><label for="proj_name">Project Name</label><input type="text" name="proj_name"></div>
				<div><label for="data">Upload Data File</label><input type="file" name="data"></div>
				<div class="button_holder"><input type="submit" name="createProject" value="Create Project"></div>
			</form>
		</div>
	</div>
	</body>
	<?php include_once "footer.php"?>
</html>