<?php
	$results = getNameUser($_SESSION["Login"]);
    $name = $results[0]["Name"];
    $surname = $results[0]["Surname"];
    $email = $results[0]["Email"];
    if($name == "Alex" && $surname == "Kutsenko")
    	echo "<p class=center_1><b>Админиcтратор</b>, мы рады снова вас видеть на вашем сайте.</p> 
    		<p class=p><a href=Admin.php>Просмотреть активность на сайте</a></p> 
    		<p class=p><a href=logout.php>Выход</a></p>";
	else
    	echo "<p class=center_1><b> $name $surname</b>, добро <br>пожаловать на сайт о <br><b>Великой Отечественной Войне</b>.</p> <p class=p class = center_1><a href=Test.php>Пройти тест</a>   <a href=Guestbook.php>Оставить отзыв</a></p> <p class=p><a href=logout.php>Выход</a></p>";
?>