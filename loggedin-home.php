<div class="content_body_area">
	<div class="row">
		<div class="column">
		<div id="previous_projects_list">
				<H3 class="column_heading">Previous Projects</H3>
				<table class="project_table">
				<?php
					$dao = new Dao();
					$dao->get_projects($_SESSION['uid']);
					$projects = $_SESSION['projects'];
					if(sizeof($projects) == 0) echo "NO PROJECTS YET!";
					foreach($projects as $row){
						echo "<tr class=\"project_table_row\"><td>".$row['project_name']."</td></tr>";
					}
				?>
				</table>
		</div>
		</div>
		<div class="column">
			<div class="info">
			<div>
			<H2>Welcome <?php echo $_SESSION['fname']; ?>!</H2></div>
			<p>Welcome to your projects home, to the left you can open older projects or you can start a new one <a href="new_project.php">here</a>.</p>
			</div>
		</div>
		<div class="column">
		
		</div>
	</div>
</div>