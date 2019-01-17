<i><p><a href="index.php">Главная</a> > <a href="Search.php">Поиск</a> > <a href="Search_planes.php">Поиск по авиации</a></p></i>
<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>	
<form name="test" method="post" action="">	
	<table>
		<tr>
			<td>
				<p class = center_1><b>Тип самолёта:</b></p>
				<input type="text" name="Type" size="40">	
			</td>
		</tr>
		<tr>	
			<td>
				<p class = center_1><b>Класификация самолёта:</b></p>
				<label><input type="radio" value="Истребительная авиация СССР" name="Category"/>Истребительная авиация СССР</label><br>
    			<label><input type="radio" value="Бомбардировочная авиация СССР" name="Category"/>Бомбардировочная авиация СССР</label><br>
				<label><input type="radio" value="Штурмовая авиация СССР" name="Category"/>Штурмовая авиация СССР</label> 
			</td>
			</td>
		</tr>
	</table>
	<input type="submit" name="Search" value="Найти">
    <input type="reset" value="Сбросить"/> 
	<input type="submit" name="Show_all" value="Показать все">    
</form>

<?php
	if(!empty($_POST["Search"])){
		if(!empty($_POST["Type"]) || !empty($_POST["Category"])){		
			$connection = mysql_connect('localhost','root','');
			if(!$connection)
				die("Невозможно подключиться:<br />".mysql_error());
			mysql_select_db('gpw');
			mysql_query('set names "utf8"');

			$NAME = $_POST["Type"];
			if ($NAME==""){
				$NAME1 = "";
			}
			else {
				$NAME1 = " and  planes.Type='{$NAME}'";
			}

			$CATEGORY = $_POST["Category"];
			if ($CATEGORY==""){
				$CATEGORY1 = "";
			}
			else {
				$CATEGORY1 = " and planes.Category='{$CATEGORY}'";
			}		

			$SEARCH = mysql_query("SELECT planes.ID, 
									planes.Type,
									planes.Image,
									planes.Link,
									planes.Category
								FROM planes
								where planes.ID=planes.ID
								".$NAME1."
								".$CATEGORY1." ")
								or die(mysql_error());
            if(mysql_affected_rows() > 0) { 
			echo "<table border class=search>";
				echo "<tr>";
				echo 	"<th>Тип самолёта</th>";
				echo 	"<th>Изображение</th>";
				echo 	"<th>Класификация</th>";
				echo "</tr>";
				while($RESULT = mysql_fetch_assoc($SEARCH)) {
					echo "<tr border>";
					echo 	"<td>".$RESULT['Link']."</td>";
					echo 	"<td>".$RESULT['Image']."</td>";
					echo 	"<td>".$RESULT['Category']."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			else{
					echo"<h3><b><i>По вашему запросу ниего не найдено</i></b></h3>";
				}
		}
		else{
			echo"<h3><b><i>Вы не заполнили хотя бы одно поле</i></b></h3>";
		}	
	}

	elseif(!empty($_POST["Show_all"])){
		$connection = mysql_connect('localhost','root','');
		if(!$connection)
			die("Невозможно подключиться:<br />".mysql_error());
		mysql_select_db('gpw');
		mysql_query('set names "utf8"');

		$SEARCH = mysql_query("SELECT planes.ID, 
								planes.Type,
								planes.Image,
								planes.Link,
								planes.Category
							FROM planes
							where planes.ID=planes.ID")
							or die(mysql_error());
		echo "<table border class=search>";
		echo "<tr>";
		echo 	"<th>Тип самолёта</th>";
		echo 	"<th>Изображение</th>";
		echo 	"<th>Класификация</th>";
		echo "</tr>";
		while($RESULT = mysql_fetch_assoc($SEARCH)) {
			echo "<tr border>";
			echo 	"<td>".$RESULT['Link']."</td>";
			echo 	"<td>".$RESULT['Image']."</td>";
			echo 	"<td>".$RESULT['Category']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>	