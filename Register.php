<!DOCTYPE html>
<html>
<head>
	<?php 
		include("inc/head.php");
		require_once 'inc/register_inc.php';
	 ?>
</head>
	<body>
	<?php 	
		include("inc/header.php");
	?>
		<h1 class="page_title"><?php echo $page_name2; ?></h1>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="UTF-8">
			<label for="name">Full name:*</label>
			<input type="text" name="name" required>
			<label for="username">Username:*</label>
			<input type="text" name="username" required>
			<label for="email">Email:*</label>
			<input type="text" name="email" required>
			<label for="password">Password:*</label>
			<input type="password" name="password" required>
			<label for="confirmpwd">Confirm password:*</label>
			<input type="password" name="confirmpwd" id="register-password" required>
			<input type="button" class="btn waves-effect waves-light" value="Register" id="register-button" onclick="return regformhash(this.form,
																				this.form.name,
																				this.form.username,
																				this.form.email,
																				this.form.password,
																				this.form.confirmpwd);">
			<a href="login.php">Sign in if you already have an account.</a>
		</form>
		<?php 
			include("inc/footer.php");
		?>
	</body>
</html>