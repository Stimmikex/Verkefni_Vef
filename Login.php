<!DOCTYPE html>
<html>
<head>
	<?php
		include("inc/head.php");
	 ?>
</head>
<body>
	<?php 
		include("inc/header.php");
		$imagesDir = 'img/dogs/';
		$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
		$randomImage = $images[array_rand($images)];

		if (isset($_POST['email'], $_POST['p'])) {
			$email = filter_input(INPUT_POST, trim('email'), FILTER_SANITIZE_EMAIL);
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);
			$password = filter_input(INPUT_POST, trim('p'), FILTER_SANITIZE_STRING);

			/* Get the login message */
			$loginMessage = login($email, $password, $db);

			/* If the login was successful */
			if ($loginMessage == "Success") {
				/* Redirect the user to the index */
				header('Location: index.php');
			} else if ($loginMessage == "Fail") {
				/* Let the user know that there was an error */
				echo '<h2 align="center">An unknown error occurred.</h2>';
			} else if ($loginMessage == "Invalid Password") {
				/* Let the user know the password is invalid */
				echo '<h2 align="center">The password you entered does not match our records.</h2>';
			}

		}
	?>
	<h1 class="page_title"><?php echo $page_name2; ?></h1>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="UTF-8">
		<label for="icon_email">Email:*</label>
		<input type="text" name="email" required>
		<label for="password">Password:*</label>
		<input type="password" name="password" id="login-password" required>
		<input type="button" class="btn waves-effect waves-light" value="Login" id="login-button" onclick="formhash(this.form, this.form.password);">
		<!--<button class="btn waves-effect waves-light" value="Login" id="login-button" onclick="formhash(this.form, this.form.password);">Submit</button>-->
		<a href="register.php" align="center">If you don't have an account you can register here.</a>
	</form>
	<p></p>
	<img src="<?php echo $randomImage; ?>" class="rand_image">
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>