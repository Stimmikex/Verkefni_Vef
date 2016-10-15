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

		if ($logged == 'out') {
			header("Location: index.php");
		}
	?>
	<h1 class="page_title">Add a ride!</h1>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="UTF-8">
				<label for="from">From:*</label>
	    		<select name="from" class="browser-default">
	    		<?php
	    			$query = "SELECT id, place FROM location ORDER BY place ASC";
	    			$res = $db->prepare($query);
	    			$res->execute();

	    			while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
	    				echo '<option value="'.$row['id'].'">'.$row['place'].'</option>';
	    			}
	    		?>
	    		</select>
				<label for="to">To:*</label>
				<select name="to" class="browser-default">
				<?php
	    			$res->execute();

	    			while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
	    				echo '<option value="'.$row['id'].'">'.$row['place'].'</option>';
	    			}

	    			$res = null;
				?>
				</select>
				<label for="time">Time:*</label>
				<input type="text" name="timeride" required>
				<label for="date">Date:*</label>
				<input type="text" id="datepicker" name="dateride" required>
		        <div class="row">
		        	<div class="input-field">
		         	<textarea id="icon_prefix2" name="message" class="materialize-textarea"></textarea>
		        	<label for="icon_prefix2">Message: </label>
		       		</div>
		     	</div>
				<input type="submit" name="submit" value="Add" id="register-button" class="btn waves-effect waves-light">
				<?php
					if (isset($_POST['submit'])) {
						$from = $_POST['from'];
						$to = $_POST['to'];
						$message = $_POST['message'];
						$timeride = $_POST['timeride'];
						$dateride = $_POST['dateride'];

						$insert_ride = "INSERT INTO rides (to_id, from_id, message, timewhen, datetogo, user_id) VALUES (:to_id, :from_id, :message, :timeride, :dateride, :user_id)";
						$rideRes = $db->prepare($insert_ride);
						$rideRes->bindParam(':to_id', $to);
						$rideRes->bindParam(':from_id', $from);
						$rideRes->bindParam(':message', $message);
						$rideRes->bindParam(':timeride', $timeride);
						$rideRes->bindParam(':dateride', $dateride);
						$rideRes->bindParam(':user_id', $_SESSION['user_id']);
						$rideRes->execute();
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