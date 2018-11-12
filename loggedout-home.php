<div class="content_body_area">
		<div id="errors"><?php if(isset($_SESSION['errors'])){foreach ($_SESSION['errors'] as $error){echo $error . '</br>';}unset($_SESSION['errors']);}?></div>
		<div class="login_form">
			<form action="handler.php" method="POST">
				<div id="login_label"><label>-Login-</label></div>
				<div><label for="user">Username</label><input type="text" name="user"></div>
				<div><label for="pass">Password</label><input type="password" name="pass"></div>
				<div class="button_holder"><input type="submit" name="login" value="Login"><input type="submit" value="Create User" formaction="sign-up.php"></div>
			</form>
		</div>
</div>
