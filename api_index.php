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
	<div class="pre"><?php
		$res = file_get_contents("http://apis.is/rides/samferda-drivers/");
		//$res = substr($res, 12, strlen($res) - 14);
		$res = json_decode($res, true);
		for ($i=0; $i < 16; $i++) { 
			echo "<div class='datapool'>";
			echo "From: ".$res['results'][$i]['from']."<br>";
			echo "To: ".$res['results'][$i]['to']."<br>";
			echo "Date: ".$res['results'][$i]['date']."<br>";
			echo "Time: ".$res['results'][$i]['time']."<br>";
			echo "<a href='".$res['results'][$i]['link']."' target='_blank'>Link</a>";
			echo "</div>";
		}
		//print_r($res['results']);
	?></div>
	<div><h1 class="white-text" align="center">Passengers</h1></div>
	<div class="pre"><?php
		$res = file_get_contents("http://apis.is/rides/samferda-passengers/");
		//$res = substr($res, 12, strlen($res) - 14);
		$res = json_decode($res, true);
		for ($i=0; $i < 16; $i++) { 
			echo "<div class='datapool'>";
			echo "From: ".$res['results'][$i]['from']."<br>";
			echo "To: ".$res['results'][$i]['to']."<br>";
			echo "Date: ".$res['results'][$i]['date']."<br>";
			echo "Time: ".$res['results'][$i]['time']."<br>";
			echo "<a href='".$res['results'][$i]['link']."' target='_blank'>Link</a>";
			echo "</div>";
		}
		//print_r($res['results']);
	?></div>
	<!--<img src="<?php echo $randomImage; ?>" class="rand_image">-->
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>