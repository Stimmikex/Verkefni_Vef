<?php
	include("functions.php");
	include("db_connect.php");
	
	sec_session_start();

	if (login_check($db)) {
		$logged = 'in';
	} else {
		$logged = 'out';
	}
?>
<title></title>
<link rel="stylesheet" href="css/materialize.min.css">
<link rel="stylesheet" href="css/style.css">
<meta charset="utf-8">