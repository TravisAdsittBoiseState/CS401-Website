<html>
	<head>
	<?php session_start();
		if(!isset($_SESSION['loggedin'])){
			header("Location:index.php");
			exit;
		}

	?>
	<?php $this_page="Script"; ?>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php include_once "banner.php" ?>
		<?php include_once "nav-loggedin.php" ?>
		<div class="row">
		<div class="column">
			<textarea>Data Here</textarea>
		</div>
		<div class="column">
			<textarea>Python Here</textarea><br>
			<div class="column"><input class="center" type="submit" value="Run"></div>
		</div>
		<div class="column">
			<textarea>Results Here</textarea>
		</div>
		</div>
		<div class="row">
			<div class="column"></div>
			
			<div class="column"></div>
		</div>
	</body>
	<?php include_once "footer.php"?>
</html>