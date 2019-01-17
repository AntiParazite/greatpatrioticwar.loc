<?php
	session_start();
	unset($_SESSION["Login"]);
	unset($_SESSION["Password"]);
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	exit;
?>