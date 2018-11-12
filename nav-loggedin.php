<div id="nav">
			<ul>
				<li><a <?php if($this_page=="Home") echo "id=\"current_page\"";?> href="index.php">Home</a></li>
				<li><a <?php if($this_page=="Graph") echo "id=\"current_page\"";?> href="graph.php">Grapher</a></li>
				<li><a <?php if($this_page=="NewProj") echo "id=\"current_page\"";?> href="new_project.php">New Project</a></li>
				<li id="login"><a href="handler.php?logout=true">Logout</a></li>
			</ul>
</div>