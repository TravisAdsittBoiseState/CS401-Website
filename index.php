<html>
	<head>
	<?php session_start(); ?>
	<?php include_once "Dao.php" ?>
	<?php $this_page="Home"; ?>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php include_once "banner.php" ?>
		<?php 
			if(isset($_SESSION['loggedin'])){
				include_once "nav-loggedin.php";
				include_once "loggedin-home.php";
			}else {
				include_once"nav-loggedout.php";
				include_once "loggedout-home.php";
			}
		?>
		
		
		
	</body>
	<?php include_once "footer.php"?>
</html>
	