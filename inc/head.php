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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title></title>
<link rel="stylesheet" href="css/materialize.css">
<link rel="stylesheet" href="css/style.css">