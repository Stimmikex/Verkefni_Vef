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
<<<<<<< HEAD
		$ridetype = $_GET['type'];
		if ($ridetype == 0) {
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

			/*$Profilequery = "SELECT * FROM users WHERE id = :id";
		    $imgres = $db->prepare($Profilequery);
		    $imgres->bindParam(':id', $user_id);
		    $imgres->execute();

		    $dirname = "img/user_img/";
		    while ($rowimg = $imgres->fetch(PDO::FETCH_ASSOC)) {
				echo "<img src=".$dirname. $rowimg['user_image']." class='profile_img'><br>";
		    }*/

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
				echo "<b>Message:</b><br>".$row['message'];
				echo "</div>";

			}

			$mainRes = null;

		}
		else if ($ridetype == 1) {
			$infoQuery = "SELECT asking.id AS id,
									asking.timewhen AS timewhen,
									asking.datetogo AS datetogo,
									asking.message AS message,
									asking.to_id AS to_id,
									asking.from_id AS from_id,
									users.username AS user_id
								FROM asking
								INNER JOIN users ON users.id = asking.user_id
								WHERE asking.id = $ride_id";
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

		}
=======

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

>>>>>>> origin/master
	?>
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>