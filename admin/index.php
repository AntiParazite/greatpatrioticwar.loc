<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/> 
<?php require_once'inc/db.php';
if(checkUser($_SESSION["Login"],$_SESSION["Password"])){
  if($_SESSION["Login"] == "AlexKutsenko"){
    echo'<h1>Административная страница</h1>';
/***** Статистика просмотров*****/
    echo'<h2>Статистика просмотров</h2>

    <p><a href=?interval=1>За сегодня</a></p>
    <p><a href=?interval=7>За последнюю неделю</a></p>

    <table border=1px>

    <tr>
        <th>Дата</td>
        <th>Уникальных посетителей</td>
        <th>Просмотров</td>
    </tr>';

    // Если в массиве GET есть элемент interval (т.е. был клик по одной из ссылок выше)
    if ($_GET['interval']){
      $interval = $_GET['interval'];
        
        // Если в качестве параметра передано не число
        if (!is_numeric ($interval))
        {
            echo '<p><b>Недопустимый параметр!</b></p>';        
        }
        
        // Указываем кодировку, в которой будет получена информация из базы 
        @mysqli_query ($db, 'set character_set_results = "utf8"');
        
        // Получаем из базы данные, отсортировав их по дате в обратном порядке в количестве interval штук
      $res = mysqli_query($db, "SELECT * FROM `visits` ORDER BY `date` DESC LIMIT $interval");    
        $count3 = 0;
        $count4 = 0;
        // Формируем вывод строк таблицы в цикле
      while ($row = mysqli_fetch_assoc($res)){
            $count3 = $count3 + $row['hosts'];
            $count4 = $count4 + $row['views'];

        echo '<tr>
               <td>' . $row['date'] . '</td>
               <td>' . $row['hosts'] . '</td>
               <td>' . $row['views'] . '</td>
           </tr>';
      }
        if($interval != 1)
            echo '<tr>
                     <td>Всего</td>
                     <td>' . $count3 . '</td>
                     <td>' . $count4 . '</td>
                 </tr>';
    }
echo'</table>';
/***** Результаты теста*****/
    echo'<h2>Тест</h2>';
    //echo"<p>Test</p>";
    $results = getAllTestResult();
    echo"<table border=1px>";
      echo"<tr>";
      echo"<th>Данные</td>";
      echo"<th>П/Н</td>";
      echo"<th>Ошибки</td>";
    echo"</tr>";
    for($i = 0; $i < count($results); $i++){
      $name = $results[$i]["Name"];
      $surname = $results[$i]["Surname"];
      $email = $results[$i]["Email"];
      $mark = $results[$i]["Mark"];
      $count_mistake = $results[$i]["Count_mistake"];          
      $mistake = $results[$i]["Mistake"];
      print<<<end
        <tr>
          <td>$name $surname<br>($email)</td>
          <td>$mark/$count_mistake</td>
          <td>$mistake</td>
        </tr>
end;
    } 
    echo'</table>';     
/*****Отзывы на сайте*****/
    echo'<h2>Отзывы на сайте</h2>';
    $comments = getAllGuestBookComments();
    for($i = 0; $i < count($comments); $i++){
      $name = $comments[$i]["Name"];
      $email = $comments[$i]["Email"];
      $comment = $comments[$i]["Comment"];
      include "Blocks/full_guestbook_comment.php";
    }
  }
}
  else
    echo'<p class=center_1>У вас нету прав для того, чтобы посмотреть администратиную страницу.</p>';
?>

<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>   