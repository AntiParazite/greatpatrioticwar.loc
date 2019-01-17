<?php
	if(!empty($_POST["Registr"])){
		$name = htmlspecialchars($_POST["name"]);
		$surname = htmlspecialchars($_POST["surname"]);
		$login = htmlspecialchars($_POST["login"]);
		$email = htmlspecialchars($_POST["email"]);	
		$password_1 = htmlspecialchars($_POST["password_1"]);
		$password_2 = htmlspecialchars($_POST["password_2"]);
		if(strlen($email) < 3) 
			$success = false;
		elseif(strlen($password_1) < 3)
			$success = false;
		elseif($password_1 != $password_2)
			$success = false;
		else
			$success = addUser($name, $surname, $login, $email, md5($password_1));
		if(!$success)
			$alert = "Ошибка при регистрации!!!";
		else
			$alert = "Вы успешно зарегистрировались!!!";
		include "alert.php";
	}
?>
<i><p><a href="index.php">Главная</a> > <a href="Registration.php">Регистрация</a></p></i>
<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>	
<h1>Регистрация</h1>
<form name="Registration" action="" method="post">
	<table>
		<tr>
			<td>Имя:</td>
			<td><input type="text" size="20" name="name"></td>
		</tr>
		<tr>
			<td>Фамилия:</td>
			<td><input type="text" size="20" name="surname"></td>
		</tr>
		<tr>
			<td>Придумайте логин:</td>
			<td><input type="text" size="20" name="login"></td>
		</tr>
		<tr>
			<td>Ваш E-mail:</td>
			<td><input type="text" size="20" name="email"></td>
		</tr>
		<tr>
			<td>Придумайте пароль:</td>
			<td><input type="password" size="20" maxlength="32" name="password_1"></td>
		</tr>
		<tr>
			<td>Повторите, чтобы не ошибиться:</td>
			<td><input type="password" size="20" maxlength="32" name="password_2"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Зарегистрироваться" name="Registr"></td>
		</tr>
	</table>
</form>
<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>	