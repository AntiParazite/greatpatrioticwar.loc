<i><p><a href="index.php">Главная</a> > <a href="Search.php">Поиск</a> > <a href="Search_weapons.php">Поиск по оружию</a></p></i>
<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>	
<form name="test" method="post" action="">	
	<table border=0px>
		<tr>
			<td>
				<p class = center_1><b>Название оружия:</b></p>
				<input type="text" name=Name size="40">	
			</td>
		</tr>
		<tr>
			<td>
				<p class = center_1><b>Тип оружия</b></p>
				<label><input type="radio" value="Винтовки" name="Type"/>Винтовки</label><br />
    			<label><input type="radio" value="Пистолеты" name="Type"/>Пистолеты</label><br />
				<label><input type="radio" value="Пистолеты-пулемёты" name="Type"/>Пистолеты-пулемёты</label><br />
    			<label><input type="radio" value="Пулемёты" name="Type"/>Пулемёты</label><br />    
			</td>
		</tr>
		<tr>
			<td>
				<p class = center_1><b>Год разработки:</b></p>
				<input type="text" name="Year" size="40">	
			</td>
		</tr>
		<tr>
			<td>
				<p class = center_1><b>Калибр:</b></p>
				<input type="text" name="Caliber" size="40">	
			</td>
		</tr>
	</table>
	<input type="submit" name="Search" value="Найти">
    <input type="reset" value="Сбросить"/> 
	<input type="submit" name="Show_all" value="Показать все">   
</form>

<?php
	if(!empty($_POST["Search"])){		
		if(!empty($_POST["Name"])||!empty($_POST["Type"]) || !empty($_POST["Year"]) || !empty($_POST["Caliber"])){		
			$connection = mysql_connect('localhost','root','');
			if(!$connection)
				die("Невозможно подключиться:<br />".mysql_error());
			mysql_select_db('gpw');
			mysql_query('set names "utf8"');

			$NAME = $_POST["Name"];
			if ($NAME==""){
				$NAME1 = "";
			}
			else {
				$NAME1 = " and  weapons.Name='{$NAME}'";
			}

			$TYPE = $_POST["Type"];
			if ($TYPE=="")
				$TYPE1 = "";
			else {
				$TYPE1 = " and weapons.Type='{$TYPE}'";
			}	

			$YEAR = $_POST["Year"];
			if ($YEAR==""){
				$YEAR1 = "";
			}
			else {
				$YEAR1 = " and  weapons.Year='{$YEAR}'";
			}

			$CALIBER = $_POST["Caliber"];
			if ($CALIBER==""){
				$CALIBER1 = "";
			}
			else {
				$CALIBER1 = " and weapons.Caliber='{$CALIBER}'";
			}		

			$SEARCH = mysql_query("SELECT weapons.ID, 
									weapons.Name,
									weapons.Type,
									weapons.Link,
									weapons.Year,
									weapons.Caliber
								FROM weapons
								where weapons.ID=weapons.ID
								".$NAME1."
								".$TYPE1." 
								".$YEAR1."
								".$CALIBER1." ")
								or die(mysql_error());
			if(mysql_affected_rows() > 0) { 
				echo "<table border class=search>";
				echo "<tr>";
				echo 	"<th>Название</th>";
				echo 	"<th>Тип</th>";
				echo 	"<th>Год</th>";
				echo 	"<th>Калибр, мм</th>";
				echo "</tr>";
				while($RESULT = mysql_fetch_assoc($SEARCH)) {
					echo "<tr border>";
					echo 	"<td>".$RESULT['Link']."</td>";
					echo 	"<td>".$RESULT['Type']."</td>";
					echo 	"<td>".$RESULT['Year']."</td>";
					echo 	"<td>".$RESULT['Caliber']."</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			else{
				echo"<h3><b><i>По вашему запросу ниего не найдено</i></b></h3>";
			}

		}
		else{
			echo "<h3><b><i>Вы не заполнили хотя бы одно поле</i></b></h3>";
		}	
	}
	elseif(!empty($_POST["Show_all"])){
		$connection = mysql_connect('localhost','root','');
		if(!$connection)
			die("Невозможно подключиться:<br />".mysql_error());
		mysql_select_db('gpw');
		mysql_query('set names "utf8"');

		$SEARCH = mysql_query("SELECT weapons.ID, 
									weapons.Name,
									weapons.Type,
									weapons.Link,
									weapons.Year,
									weapons.Caliber
								FROM weapons
								where weapons.ID=weapons.ID ")
								or die(mysql_error());
		echo "<table border class=search>";
		echo "<tr>";
		echo 	"<th>Название</th>";
		echo 	"<th>Тип</th>";
		echo 	"<th>Год</th>";
		echo 	"<th>Калибр, мм</th>";
		echo "</tr>";
		while($RESULT = mysql_fetch_assoc($SEARCH)) {
			echo "<tr border>";
			echo 	"<td>".$RESULT['Link']."</td>";
			echo 	"<td>".$RESULT['Type']."</td>";
			echo 	"<td>".$RESULT['Year']."</td>";
			echo 	"<td>".$RESULT['Caliber']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

?>
<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>	