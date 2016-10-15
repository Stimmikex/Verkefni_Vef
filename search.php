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
		$imagesDir = 'img/cats/';
		$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
		$randomImage = $images[array_rand($images)];
	?>
	<h1 class="page_title"><?php echo $page_name2; ?></h1>
	<p></p>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<div class="input-field col s12">
	<p>From:</p>
	<select name="from" class="browser-default">
<<<<<<< HEAD
		<option value="-1" disabled selected>Pick</option>
=======
>>>>>>> origin/master
    <?php
		$query = "SELECT id, place FROM location ORDER BY place ASC";
		$res = $db->prepare($query);
		$res->execute();

		while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
			echo '<option value="'.$row['id'].'">'.$row['place'].'</option>';
		}
	?>
	</select>
	</div>
	<div class="input-field col s12">
	<p>To:</p>
    <select name="to" class="browser-default">
<<<<<<< HEAD
		<option value="-1" disabled selected>Pick</option>
=======
>>>>>>> origin/master
	     <?php
	    	$res->execute();

			while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
				echo '<option value="'.$row['id'].'">'.$row['place'].'</option>';
			}

			$res = null;
<<<<<<< HEAD

=======
>>>>>>> origin/master
		?>
	</select>
		<input type="submit" name="submit" class="btn waves-effect waves-light" id="search-button">
	</div>
	</form>
	<div class="pre">
<<<<<<< HEAD
		<?php
			if (isset($_POST['submit'])) {
				$mainQuery = "SELECT rides.id AS id,
											rides.timewhen AS timewhen,
											rides.datetogo AS datetogo,
											rides.to_id AS to_id,
											rides.from_id AS from_id,
											users.username AS user_id
										FROM rides
										INNER JOIN users ON users.id = rides.user_id
										WHERE CURDATE() < rides.datetogo";
				$mainRes = null;

				if ((isset($_POST['from']) && $_POST['from'] !== '-1') && (isset($_POST['to']) && $_POST['to'] !== '-1'))
				{
					$mainQuery .= " AND rides.from_id=:from_id AND rides.to_id=:to_id";
					$mainRes = $db->prepare($mainQuery);
					$mainRes->bindParam(':from_id', $_POST['from']);
					$mainRes->bindParam(':to_id', $_POST['to']);
				}
				else if (isset($_POST['from']) && $_POST['from'] !== '-1')
				{
					$mainQuery .= " AND rides.from_id=:from_id";
					$mainRes = $db->prepare($mainQuery);
					$mainRes->bindParam(':from_id', $_POST['from']);
				}
				else if (isset($_POST['to']) && $_POST['to'] !== '-1')
				{
					$mainQuery .= " AND rides.to_id=:to_id";
					$mainRes = $db->prepare($mainQuery);
					$mainRes->bindParam(':to_id', $_POST['to']);
				}
				
				$toQuery = "SELECT place FROM location WHERE id=:place_id LIMIT 1";
				$fromQuery = "SELECT place FROM location WHERE id=:place_id LIMIT 1";

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
					echo "</div>";

				}

				$mainRes = null;
			}
		?>	
=======
	<?php 
			
	?>		
>>>>>>> origin/master
	</div>
	<!--<img src="<?php echo $randomImage; ?>" class="rand_image">-->
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>