<?php
	$mysqli = false;
	function connectDB(){
		global $mysqli;
		$mysqli= new mysqli("localhost", "root", "", "gpw");
		$mysqli->query("SET NAMES 'utf8'");
	}

	function getAllGuestBookComments(){
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT * FROM `guestbook`");
		closeDB();
		return resultSetToArray($result_set);
	}

	function resultSetToArray($result_set){
		$array = array();
		while(($row = $result_set->fetch_assoc()) != false)
			$array[] = $row;
		return $array;
	}

	function addGuestBookComment($name, $email, $comment){
		global $mysqli;
		connectDB();
		$success = $mysqli->query("INSERT INTO `guestbook` (`Name`, `Email`, `Comment`) VALUE ('$name', '$email', '$comment')");
		closeDB();
		return $success;
	}

	function addUser($name, $surname, $login, $email, $password){
		global $mysqli;
		connectDB();
		$success = $mysqli->query("INSERT INTO `users` (`Name`, `Surname`, `Login`, `Email`, `Password`) VALUE ('$name', '$surname', '$login', '$email', '$password')");
		closeDB();
		return $success;
	}

	function checkUser($login, $password){
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT * FROM `users` WHERE `Login`='$login' AND `Password`='$password'");
		closeDB();
		if ($result_set->fetch_assoc())
			return true;
		else 
			return false;
	}

	function addTest($name, $surname, $email, $true, $false, $array){
		global $mysqli;
		connectDB();
		$success = $mysqli->query("INSERT INTO `test` (`Name`, `Surname`, `Email`, `Mark`, `Count_mistake`, `Mistake`) VALUE ('$name', '$surname', '$email', '$true', '$false', '$array')");
		closeDB();
		return $success;
	}

	function getAllTestResult(){
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT * FROM `test`");
		closeDB();
		return resultSetToArray($result_set);
	}

	function getNameUser($User){
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT * FROM `users` WHERE `Login`='$User'");
		closeDB();
		return resultSetToArray($result_set);
	}

	function closeDB(){
		global $mysqli;
		$mysqli->close;
	}
?>