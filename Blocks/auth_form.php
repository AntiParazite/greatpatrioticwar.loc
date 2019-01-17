<?php
	if($_SESSION["error_auth"]){
		unset($_SESSION["error_auth"]);
		$alert = "Вы ввели неверный логин и/или пароль!!!";
		include "alert.php";
	}
?>
<form name="authorization" action="authorization.php" method="POST">
	<table>
		<tr>
			<td>Логин</td>
			<td><input type="text" name="Login" size="8"  placeholder="Логин"></td>
		</tr>
		<tr>
			<td>Пароль</td>
			<td><input type="password" name="Password" size="8"  placeholder=Пароль></td>
		</tr>
	</table>
	<input type="submit" name="buttom_auth" value="Войти">
</form>