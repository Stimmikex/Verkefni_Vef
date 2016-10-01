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
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>