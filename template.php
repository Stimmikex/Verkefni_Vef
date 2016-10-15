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

		if ($logged == 'out') {
			header("Location: index.php");
		}
		?>
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>