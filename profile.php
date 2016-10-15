<!DOCTYPE html>
<html>
<head>
	<?php
		include("inc/head.php");
<<<<<<< HEAD

		$user_id = $_SESSION['user_id'];

	 ?>
=======
	 ?>
	 <link rel="stylesheet" type="text/css" href="css/pikaday.css">
>>>>>>> origin/master
</head>
<body>
	<?php
		include("inc/header.php");

		if ($logged == 'out') {
			header("Location: index.php");
		}
<<<<<<< HEAD

		$Profilequery = "SELECT * FROM users WHERE id = :id";
	    $res = $db->prepare($Profilequery);
	    $res->bindParam(':id', $user_id);
	    $res->execute();

		while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

			echo "<div>";
			echo "Name: ".$row['name']."<br>";
			echo "Username: ".$row['username']."<br>";
			echo "Email: ".$row['email']."<br>";
			echo "</div>";

		}

=======
>>>>>>> origin/master
		?>
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>