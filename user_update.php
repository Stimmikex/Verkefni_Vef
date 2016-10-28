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

		if ($logged == 'out') {
			header("Location: index.php");
		}


		if (isset($_POST['submit'])) {
				if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
					/* Add to the error message string */
					echo '<p class="error-msg">The email you entered does not appear to be valid.</p>';
				} else {
					$insert_request = "UPDATE users SET name=:name, email=:email WHERE id = :user_id";
					$rideRes = $db->prepare($insert_request);
					$rideRes->bindParam(':name', $_POST['name']);
					$rideRes->bindParam(':email', $_POST['email']);
					$rideRes->bindParam(':user_id', $_SESSION['user_id']);
					$rideRes->execute();
				}
			}
		?>
		<?php
			require_once 'classes/update_user_class.php';
			$user_class = new update_user($db);
			$userInfo = $user_class->selectQuery();
		?>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="UTF-8">
			<label for="from">Name:</label>
			<input type="text" name="name" value="<?php echo $userInfo['name']; ?>">
			<label for="from">Email:</label>
			<input type="text" name="email" value="<?php echo $userInfo['email']; ?>">
			<input type="submit" name="submit" value="Add" id="register-button" class="btn waves-effect waves-light">
		</form>
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>