<<<<<<< HEAD
<?php
use classes\upload_class;

// set the maximum upload size in bytes

?>
=======
>>>>>>> origin/master
<!DOCTYPE html>
<html>
<head>
	<?php
		include("inc/head.php");

<<<<<<< HEAD
	 ?>
=======
		$user_id = $_SESSION['user_id'];

	 ?>
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
		$user_id = $_SESSION['user_id'];
		$max = 600 * 1024; // 600 KB
		if (isset($_POST['upload'])) {
		    // define the path to the upload folder
		    $destination = $_SERVER['DOCUMENT_ROOT'] . "/2t/2509972569/VEF2A3U/Verkefni_Vef/img/user_img/"; 
		    require_once 'classes/upload_class.php';
		    try {
		        $loader = new Upload($destination, $user_id, $db);
		        $loader->setMaxSize($max);
		        $loader->allowAllTypes();
		        $loader->upload();
		        $result = $loader->getMessages();
		    } catch (Exception $e) {
		        echo $e->getMessage();
		    }
		}				

		$Profilequery = "SELECT * FROM users WHERE id = :id";
	    $imgres = $db->prepare($Profilequery);
	    $imgres->bindParam(':id', $user_id);
	    $imgres->execute();

	    $destination = $_SERVER['DOCUMENT_ROOT'] . "/2t/2509972569/VEF2A3U/Verkefni_Vef/img/user_img/";
	    $dirname = "img/user_img/";
		//$dirname = __DIR__. "/img/user_img/";
		//$images = glob($dirname."*.png");
		//$image = glob($dirname."*.{jpg,jpeg,pjpeg,png,gif}", GLOB_BRACE);

		while ($row = $imgres->fetch(PDO::FETCH_ASSOC)) {

			echo "<div>";
			echo "<img src=".$dirname. $row['image']." class='profile_img'><br>";
=======

		$Profilequery = "SELECT * FROM users WHERE id = :id";
	    $res = $db->prepare($Profilequery);
	    $res->bindParam(':id', $user_id);
	    $res->execute();

		while ($row = $res->fetch(PDO::FETCH_ASSOC)) {

			echo "<div>";
>>>>>>> origin/master
			echo "Name: ".$row['name']."<br>";
			echo "Username: ".$row['username']."<br>";
			echo "Email: ".$row['email']."<br>";
			echo "</div>";

		}
<<<<<<< HEAD
		?>
		<h1>Drivers</h1>
		<?php 
			$mainQuery = "SELECT rides.id AS id,
									rides.timewhen AS timewhen,
									rides.datetogo AS datetogo,
									rides.to_id AS to_id,
									rides.from_id AS from_id,
									users.username AS user_id
								FROM rides
								INNER JOIN users ON users.id = rides.user_id
								WHERE users.id = $user_id";
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
				/*if ($user_id = $row['user_id']) {
					echo "<a href='ride.php?rid=".$row['id']."&type=0'>Full Info/update</a>";	
				}
				else {
					echo "<a href='ride.php?rid=".$row['id']."&type=0'>Full Info</a>";	
				}*/
				echo "<a href='update_ride.php?rid=".$row['id']."&type=0'>Full Info/Update</a>";
				echo "</div>";

			}

			$mainRes = null;
		?>
		<h1>Passenger</h1>
		<?php 
			$passQuery = "SELECT asking.id AS id,
									asking.timewhen AS timewhen,
									asking.datetogo AS datetogo,
									asking.to_id AS to_id,
									asking.from_id AS from_id,
									users.username AS user_id
								FROM asking
								INNER JOIN users ON users.id = asking.user_id
								WHERE users.id = $user_id";
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
				if ($user_id = $row['user_id']) {
					echo "<a href='update_ride.php?rid=".$row['id']."&type=1'>Full Info/update</a>";	
				}
				else {
					echo "<a href='update_ride.php?rid=".$row['id']."&type=1'>Full Info</a>";	
				}
				echo "</div>";

			}

			$mainRes = null;
		?>
		<div class="divider"></div>
		<div class="section">
			<a href="user_update.php">Update User info</a>
		</div>
		<form action="" method="post" enctype="multipart/form-data" id="uploadImage">
	    <p>
	        <label for="image">Upload image:</label>
	        <input type="hidden" name="MAX_FILE_SIZE" value="<?= $max; ?>">
	        <input type="file" name="image" id="image">
	    </p>
    	<p>
        	<input type="submit" name="upload" id="upload" value="Upload">
    	</p>
	</form>
=======

		?>
>>>>>>> origin/master
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>