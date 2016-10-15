<!DOCTYPE html>
<html>
<head>
	<?php
		include("inc/head.php");

		$user_id = $_SESSION['user_id'];

	 ?>
	 ?>
	 <link rel="stylesheet" type="text/css" href="css/pikaday.css">
</head>
<body>
	<?php
		include("inc/header.php");

		if ($logged == 'out') {
			header("Location: index.php");
		}

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

		?>
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>