<?php
	require_once "start.php";
	$login = htmlspecialchars($_POST["Login"]);
	$password = htmlspecialchars($_POST["Password"]);
	$password = md5($password);
	if (checkUser($login, $password)){
		$_SESSION["Login"] = $login;
		$_SESSION["Password"] = $password;
	}
	else
		$_SESSION["error_auth"] = 1;
	header("Location: ".$_SERVER["HTTP_REFERER"]);
	exit;
?>