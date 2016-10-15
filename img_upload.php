<?php
use classes\upload_class;

// set the maximum upload size in bytes
$max = 600 * 1024; // 600 KB
if (isset($_POST['upload'])) {
    // define the path to the upload folder
    $destination = $_SERVER['DOCUMENT_ROOT'] . "/2t/2509972569/VEF2A3U/Verkefni_Vef/img/user_img/"; 
    require_once 'classes/upload_class.php';
    try {
        $loader = new Upload($destination);
        $loader->setMaxSize($max);
        $loader->allowAllTypes();
        $loader->upload();
        $result = $loader->getMessages();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
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

		/*if ($logged == 'out') {
			header("Location: index.php");
		}*/
		if (isset($result)) {
		    echo '<ul>';
		    foreach ($result as $message) {
		        echo "<li>$message</li>";
		    }
		    echo '</ul>';
		}
	?>
	<?php
		$dirname = $_SERVER['DOCUMENT_ROOT'] . "/2t/2509972569/VEF2A3U/Verkefni_Vef/img/user_img/";
		$images = glob($dirname."*.png");
		//$images = glob("{$dirname}*.png, {$dirname}*.jpeg, {$dirname}*..gif")
		foreach($images as $image) {
		echo '<img src="'.$image.'" class="image" width="42" height="42"><br>';
		}
	?>
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
	<?php 
		include("inc/footer.php");
	?>
</body>
</html>
