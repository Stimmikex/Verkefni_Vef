<?php
	/* Error message variable */
	$errorMessage = '';

	/* If all the required fields are filled in */
	if (isset($_POST['name'], $_POST['username'], $_POST['email'], $_POST['p'])) {
		/* Sanitize and validate the data */
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING); //INPUT_POST is used to check get hte input then the function uses FILTER_SANITIZE_STRING to sanitize the input and then returns it as $name.
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$email = filter_var($email, FILTER_VALIDATE_EMAIL); //Check if the Email is valid

		/* If the email is not valid */
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			/* Add to the error message string */
			$errorMessage .= '<p class="error-msg">The email you entered does not appear to be valid.</p>';
		}

		/* Filter the password */
		$password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);

		/* If the password is not 128 characters */
		if (strlen($password) != 128) {
			/* The password is not hashed */
			$errorMessage .= '<p class="error-msg">The password could not be hashed.</p>';
		}

		/* Check if the email is in use */
		$emailQuery = "SELECT id FROM users WHERE email=:email LIMIT 1";
		$emailRes = $db->prepare($emailQuery);
		$emailRes->bindParam(':email', $email);
		$emailRes->execute();

		if ($emailRes->rowCount() > 0) {
			/* This email is already in use */
			$errorMessage .= '<p class="error-msg">The email you entered is already in use.</p>';
		}

		$emailRes = null;

		/* If there are no errors */
		if (empty($errorMessage)) {

			/* Add the user to the database */
			$addUserQuery = "INSERT INTO users (name, username, email, password)
										VALUES (:name, :username, :email, :password)";
			$addUserRes = $db->prepare($addUserQuery);
			$addUserRes->bindParam(':name', $name);
			$addUserRes->bindParam(':username', $username);
			$addUserRes->bindParam(':email', $email);
			$addUserRes->bindParam(':password', $password);

			if (!$addUserRes->execute()) {
				$errorMessage .= '<p class="error-msg>Could not add you to the database.</p>"';
			}

			header("Location: login.php");

			$addUserRes = null;
		}
	}
?>