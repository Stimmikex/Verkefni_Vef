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
	     <?php
	    	$res->execute();

			while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
				echo '<option value="'.$row['id'].'">'.$row['place'].'</option>';
			}

			$res = null;
		?>
	</select>
		<input type="submit" name="submit" class="btn waves-effect waves-light" id="search-button">
	</div>
	</form>
	<div class="pre">
	<?php 
			
	?>		
	</div>
	<!--<img src="<?php echo $randomImage; ?>" class="rand_image">-->
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>