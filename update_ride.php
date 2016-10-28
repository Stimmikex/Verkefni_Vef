<!DOCTYPE html>
<html>
<head>
	<?php
		include("inc/head.php");
	 ?>
	 <link rel="stylesheet" type="text/css" href="css/pikaday.css">
</head>
<body>
	<?php
		include("inc/header.php");

		$ride_id = $_GET['rid'];
		$ridetype = $_GET['type'];

		if ($logged == 'out') {
			header("Location: index.php");
		}
	?>
	<h1 class="page_title">Update a ride!</h1>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="UTF-8">
					<?php

					if (isset($_POST['submit'])) {
						$from = $_POST['from'];
						$to = $_POST['to'];
						$message = $_POST['message'];
						$timeride = $_POST['timeride'];
						$dateride = $_POST['dateride'];

						$insert_ride = "UPDATE rides SET to_id=:to_id, from_id=:from_id, message=:message, timewhen=:timeride, datetogo=:dateride, user_id=:user_id WHERE id=:ride_id";
						$rideRes = $db->prepare($insert_ride);
						$rideRes->bindParam(':to_id', $to);
						$rideRes->bindParam(':from_id', $from);
						$rideRes->bindParam(':message', $message);
						$rideRes->bindParam(':timeride', $timeride);
						$rideRes->bindParam(':dateride', $dateride);
						$rideRes->bindParam(':user_id', $_SESSION['user_id']);
						$rideRes->bindParam(':ride_id', $ride_id);
						$rideRes->execute();
					}

					/* UPDATE rides SET to_id=:to_id, from_id=:from_id, message=:message, timewhen=:timewhen, dateride=:dateride, user_id:user_id WHERE id=:ride_id */

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
						$toQuery = "SELECT id, place FROM location WHERE id=:place_id ORDER BY place ASC LIMIT 1";
						$fromQuery = "SELECT id, place FROM location WHERE id=:place_id ORDER BY place ASC LIMIT 1";

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

							// echo "<div class='ride-info'>";

							$fromRes->execute();

							$query = "SELECT id, place FROM location ORDER BY place ASC";
			    			$res = $db->prepare($query);
			    			$res->execute();

		    				echo "<label for='from'>From:*</label>";
		    				echo "<select name='from' class='browser-default'>";

							while ($row2 = $res->fetch(PDO::FETCH_ASSOC)) {

			    				if ($row2['id'] === $row['from_id']) {
			    					echo '<option value="'.$row2['id'].'" selected>'.$row2['place'].'</option>';
			    				} else {
				    				echo '<option value="'.$row2['id'].'">'.$row2['place'].'</option>';
			    				}
							}

			    			echo "</select>";

			    			$res->execute();

			    			echo "<label for='to'>To:*</label>";
		    				echo "<select name='to' class='browser-default'>";

							while ($row2 = $res->fetch(PDO::FETCH_ASSOC)) {

			    				if ($row2['id'] === $row['to_id']) {
			    					echo '<option value="'.$row2['id'].'" selected>'.$row2['place'].'</option>';
			    				} else {
				    				echo '<option value="'.$row2['id'].'">'.$row2['place'].'</option>';
			    				}
							}

			    			echo "</select>";

							$toRes->execute();

						$mainRes = null;

				?>
				<label for="time">Time:*</label>
				<input type='text' name='timeride' value="<?php echo $row['timewhen']; ?>" required>
				<label for="date">Date:*</label>
				<input type="text" id="datepicker" name="dateride" value="<?php echo $row['datetogo']; ?>" required>
				<div class="row">
		        	<div class="input-field">
		         	<textarea id="ck_editor" name="message"><?php echo $row['message']; ?></textarea>
		        	<!-- <label for="icon_prefix2">Message: </label> -->
		       		</div>
		     	</div>
				<input type="submit" name="submit" value="Add" id="register-button" class="btn waves-effect waves-light">
				<?php
					$res = null;
					}
				}

					if ($ridetype == 1) {
						$passQuery = "SELECT asking.id AS id,
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

						$infoRes = $db->prepare($passQuery);
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

							// echo "<div class='ride-info'>";

							$fromRes->execute();

							$query = "SELECT id, place FROM location ORDER BY place ASC";
			    			$res = $db->prepare($query);
			    			$res->execute();

		    				echo "<label for='from'>From:*</label>";
		    				echo "<select name='from' class='browser-default'>";

							while ($row2 = $res->fetch(PDO::FETCH_ASSOC)) {

			    				if ($row2['id'] === $row['from_id']) {
			    					echo '<option value="'.$row2['id'].'" selected>'.$row2['place'].'</option>';
			    				} else {
				    				echo '<option value="'.$row2['id'].'">'.$row2['place'].'</option>';
			    				}
							}

			    			echo "</select>";

			    			$res->execute();

			    			echo "<label for='to'>To:*</label>";
		    				echo "<select name='to' class='browser-default'>";

							while ($row2 = $res->fetch(PDO::FETCH_ASSOC)) {

			    				if ($row2['id'] === $row['to_id']) {
			    					echo '<option value="'.$row2['id'].'" selected>'.$row2['place'].'</option>';
			    				} else {
				    				echo '<option value="'.$row2['id'].'">'.$row2['place'].'</option>';
			    				}
							}

			    			echo "</select>";

							$toRes->execute();

						$mainRes = null;

				?>
				<label for="time">Time:*</label>
				<input type='text' name='timeride' value="<?php echo $row['timewhen']; ?>" required>
				<label for="date">Date:*</label>
				<input type="text" id="datepicker" name="dateride" value="<?php echo $row['datetogo']; ?>" required>
				<div class="row">
		        	<div class="input-field">
		         	<textarea id="ck_editor" name="message"><?php echo $row['message']; ?></textarea>
		        	<!-- <label for="icon_prefix2">Message: </label> -->
		       		</div>
		     	</div>
				<input type="submit" name="submit" value="Add" id="register-button" class="btn waves-effect waves-light">
				<?php
					$res = null;
					}
				} 
				?>
		</form>
	<?php 
		include("inc/footer.php");
	?>
	<script src="js/moment.js"></script>
	<script src="js/pikaday.js"></script>
	<script>
	    var picker = new Pikaday({
	    	field: document.getElementById('datepicker'),
	    	format: 'Y-MM-D'
        });
	</script>
</body>
</html>