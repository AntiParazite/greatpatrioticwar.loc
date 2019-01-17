<i><p><a href="index.php">Главная</a> > <a href="Guestbook.php">Гостевая книга</a></p></i>
<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>	
<?php
	if(checkUser($_SESSION["Login"],$_SESSION["Password"])){
		echo"<h2>Добавить запись</h2>";
		echo'<form name=guestbook action=" " method=post>';
			echo"<table>";
				echo"<tr>";
					echo"<td><p>Ваш отзыв</p></td>";
					echo"<td><textarea type=text name=comment cols=60 rows=10></textarea></td>";
				echo"</tr>";
				echo"<tr align=center>";
					echo"<td colspan=2>";
						echo"<input type=submit name=add_to_guestbook value=Добавить>";
					echo"</td>";
				echo"</tr>";
			echo"</table>";
		echo"</form>";
		echo"<h2>Записи в гостевой книге</h2>";
		if(!empty($_POST["add_to_guestbook"])){
			$results = getNameUser($_SESSION["Login"]);
			$name = $results[0]["Name"];
      		$surname = $results[0]["Surname"];
   			$email = $results[0]["Email"];
			$name = $name." ".$surname;
			$comment= htmlspecialchars($_POST["comment"]);
			if((strlen($name) > 2) || (strlen($Email) > 2))
				$success = addGuestBookComment($name, $email,$comment);
			else
				$success  = false;
			if(!$success){
				$alert = "Ошибка при добавлении новой записи!!!";
				include"alert.php";
			}
		}
	}
	else
		echo'<p class=center_1>Вы не можете пройти тест пока не выполнили вход в свой аккаунт. Если же вы не зарегестрированы, тогда можете пройти <a href=Registration.php>Регистрацию</a> для возможности оставления отзыва.</p>';
	$comments = getAllGuestBookComments();
	for($i = 0; $i < count($comments); $i++){
		$name = $comments[$i]["Name"];
		$email = $comments[$i]["Email"];
		$comment = $comments[$i]["Comment"];
		include "Blocks/full_guestbook_comment.php";
	}
?>
<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>	