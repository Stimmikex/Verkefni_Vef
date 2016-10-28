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
		$imagesDir = 'img/';
		$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
		$randomImage = $images[array_rand($images)];

		$background = array('backimg_01.jpg','backimg_02.jpg','backimg_03.jpg');
		$img = rand(0, count($background)-1);
		$selectbackground = $background[$img];
	?>
	<style type="text/css">
		body{
		background: url(img/backgroundimg/<?php echo $selectbackground; ?>) no-repeat center center fixed;
		}
	</style>
	<h1 class="page_title white-text">Ride Me/Icedriver</h1>
	<div><h1 class="white-text" align="center">Drivers</h1></div>
	<div class="pre">
		<?php 
			$mainQuery = "SELECT rides.id AS id,
									rides.timewhen AS timewhen,
									rides.datetogo AS datetogo,
									rides.to_id AS to_id,
									rides.from_id AS from_id,
									users.username AS user_id
								FROM rides
								INNER JOIN users ON users.id = rides.user_id
								WHERE CURDATE() < datetogo";
			$toQuery = "SELECT place FROM location WHERE id=:place_id LIMIT 1";
			$fromQuery = "SELECT place FROM location WHERE id=:place_id LIMIT 1";

			$mainRes = $db->prepare($mainQuery);
			$mainRes->execute();

			while ($row = $mainRes->fetch(PDO::FETCH_ASSOC)) {
				$fromRes = $db->prepare($fromQuery);
				$fromRes->bindParam(':place_id', $row['from_id']);

				$toRes = $db->prepare($toQuery);
				$toRes->bindParam(':place_id', $row['to_id']);

				echo "<div class='datapool'>";

				$fromRes->execute();

				while ($row2 = $fromRes->fetch(PDO::FETCH_ASSOC)) {
					echo "From: ".$row2['place']."<br>";
				}

				$toRes->execute();

				while ($row2 = $toRes->fetch(PDO::FETCH_ASSOC)) {
					echo "To: ".$row2['place']."<br>";
				}

				echo "Date: ".$row['datetogo']."<br>";
				echo "Time: ".$row['timewhen']."<br>";
				echo "User: ".$row['user_id']."<br>";
<<<<<<< HEAD
				echo "<a href='ride.php?rid=".$row['id']."&type=0'>Full Info</a>";
=======
				echo "<a href='ride.php?rid=".$row['id']."'>Full Info</a>";
>>>>>>> origin/master
				echo "</div>";

			}

			$mainRes = null;
		?>
	</div>
	<div><h1 class="white-text" align="center">Passengers</h1></div>
	<div class="pre">
			<?php 
			$passQuery = "SELECT asking.id AS id,
									asking.timewhen AS timewhen,
									asking.datetogo AS datetogo,
									asking.to_id AS to_id,
									asking.from_id AS from_id,
									users.username AS user_id
								FROM asking
								INNER JOIN users ON users.id = asking.user_id
								WHERE CURDATE() < datetogo";
			$toQuery = "SELECT place FROM location WHERE id=:place_id LIMIT 1";
			$fromQuery = "SELECT place FROM location WHERE id=:place_id LIMIT 1";

			$passRes = $db->prepare($passQuery);
			$passRes->execute();

			while ($row = $passRes->fetch(PDO::FETCH_ASSOC)) {
				$fromRes = $db->prepare($fromQuery);
				$fromRes->bindParam(':place_id', $row['from_id']);

				$toRes = $db->prepare($toQuery);
				$toRes->bindParam(':place_id', $row['to_id']);

				echo "<div class='datapool'>";

				$fromRes->execute();

				while ($row2 = $fromRes->fetch(PDO::FETCH_ASSOC)) {
					echo "From: ".$row2['place']."<br>";
				}

				$toRes->execute();

				while ($row2 = $toRes->fetch(PDO::FETCH_ASSOC)) {
					echo "To: ".$row2['place']."<br>";
				}

				echo "Date: ".$row['datetogo']."<br>";
				echo "Time: ".$row['timewhen']."<br>";
				echo "User: ".$row['user_id']."<br>";
<<<<<<< HEAD
				/*if ($user_id = $row['user_id']) {
					echo "<a href='upride.php?rid=".$row['id']."&type=1'>Full Info/update</a>";	
				}
				else {
					echo "<a href='ride.php?rid=".$row['id']."&type=1'>Full Info</a>";	
				}*/
				echo "<a href='ride.php?rid=".$row['id']."&type=1'>Full Info</a>";
=======
>>>>>>> origin/master
				echo "</div>";

			}

			$mainRes = null;
		?>
	</div>
	<!--<img src="<?php echo $randomImage; ?>" class="rand_image">-->
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>