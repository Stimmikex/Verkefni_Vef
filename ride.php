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

		$ride_id = $_GET['rid'];

		$infoQuery = "SELECT rides.id AS id,
								rides.timewhen AS timewhen,
								rides.datetogo AS datetogo,
								rides.message AS message,
								rides.to_id AS to_id,
								rides.from_id AS from_id,
								users.username AS user_id
							FROM rides
							INNER JOIN users ON users.id = rides.user_id
							WHERE rides.id = $ride_id";
		$toQuery = "SELECT place FROM location WHERE id=:place_id LIMIT 1";
		$fromQuery = "SELECT place FROM location WHERE id=:place_id LIMIT 1";

		$infoRes = $db->prepare($infoQuery);
		$infoRes->execute();

		while ($row = $infoRes->fetch(PDO::FETCH_ASSOC)) {
			$fromRes = $db->prepare($fromQuery);
			$fromRes->bindParam(':place_id', $row['from_id']);

			$toRes = $db->prepare($toQuery);
			$toRes->bindParam(':place_id', $row['to_id']);

			echo "<div class='ride-info'>";

			$fromRes->execute();

			while ($row2 = $fromRes->fetch(PDO::FETCH_ASSOC)) {
				echo "<b>From:</b> ".$row2['place']."<br>";
			}

			$toRes->execute();

			while ($row2 = $toRes->fetch(PDO::FETCH_ASSOC)) {
				echo "<b>To:</b> ".$row2['place']."<br>";
			}

			echo "<b>Date:</b> ".$row['datetogo']."<br>";
			echo "<b>Time:</b> ".$row['timewhen']."<br>";
			echo "<b>User:</b> ".$row['user_id']."<br>";
			echo "<pre><b>Message:</b><br>".$row['message'].'</pre>';
			echo "</div>";

		}

		$mainRes = null;

	?>
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>