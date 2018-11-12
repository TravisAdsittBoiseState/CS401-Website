
<html>
	<head>
		<?php session_start(); 
			if(!isset($_SESSION['loggedin'])){
				header("Location:index.php");
				exit;
			}
		
		?>
		<?php $this_page="Graph"; ?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<?php
			
			$script = "projects/AGU.py";
			$conffile = "projects/project_one/prefetch.config";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$title = $_POST["title"];
				$reading = fopen('projects/project_one/prefetch.config','r');
				$writing = fopen('projects/project_one/prefetch.tmp','w');
				
				while(!feof($reading)){
					$line =fgets($reading);
					if(stristr($line,'TITLE')){
						$line = "TITLE=$title=\n";
					}
					fputs($writing,$line);
				}
				fclose($writing); fclose($reading);
				
				rename('projects/project_one/prefetch.tmp','projects/project_one/prefetch.config');
			}
		?>
	</head>
	<body>
	
		<?php include_once "banner.php" ?>
		<?php include_once "nav-loggedin.php" ?>
		<div class="content_body_area">
		<div class="row">
		<div class="column">
			<form action="graph.php" method="post">
					<div id="graph_conf_list">
				<?php
					$conf_file = './graph.config';
					$handle = fopen($conf_file,'r');
					while(($line = fgets($handle)) !== false){
					
						$name = explode("=",$line)[0];
						$value = explode("=",$line)[1];
						
						echo "<label for=\"".$name."\">" . $name . "</label>" . "<input type=\"text\" name=\"" . $name . "\" value=\"" . $value . "\">";
					
					}
					?>
					</div>
				<div class="button_holder"><input type="submit" value="Generate"></div>
			</form>
		</div>
		<div class="column">
		<?php
			exec("python $script $conffile" ,$output);
			echo "<img class=\"graphimg\" src=\"projects/project_one/graph.png\">";
		?>
		</div>
		<div class="column">
		</div>
		</div>

	</div>
	</body>
	<?php include_once "footer.php"?>
</html>

