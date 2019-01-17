<i><p><a href="index.php">Главная</a> > <a href="Search.php">Поиск</a> > <a href="Search_tanks.php">Поиск по танкам</a></p></i>
<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>	
<form name="test" method="post" action="">	
	<table border=0px>
		<tr>
			<td>
				<p class = center_1><b>Тип танка:</b></p>
				<input type="text" name="Name" size="40"><br>
			</td>
		</tr>	
		<tr>
			<td>
				<p class = center_1><b>Принят на вооружение:</b></p>
				<input type="text" name="Year" size="40">				
			</td>
			<td>
		</tr>	
		<tr>
			<td>
				<p class = center_1><b>Класификация танка:</b></p>
				<label><input type="radio" value="Малые и лёгкие танки" name="Type"/>Малые и лёгкие танки</label>
    			<label><input type="radio" value="Средние танки" name="Type"/>Средние танки</label><br />
				<label><input type="radio" value="Тяжёлые танки" name="Type"/>Тяжёлые танки</label>
    			<label><input type="radio" value="Лёгкие САУ" name="Type"/>Лёгкие САУ</label>
    			<label><input type="radio" value="Средние САУ" name="Type"/>Средние САУ</label><br />  
    			<label><input type="radio" value="Тяжёлые штурмовые самоходные оруди" name="Type"/>Тяжёлые штурмовые самоходные орудия</label><br />  
    			<label><input type="radio" value="Реактивные системы залпового огня" name="Type"/>Реактивные системы залпового огня</label><br />    
			</td>
		</tr>
	</table>
	<input type="submit" name="Search" value="Найти">
    <input type="reset" value="Сбросить"/>     
	<input type="submit" name="Show_all" value="Показать все">
</form>

<?php
	if(!empty($_POST["Search"])){
		if(!empty($_POST["Name"]) || !empty($_POST["Year"]) || !empty($_POST["Type"])){		
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
				$NAME1 = " and  tanks.Type='{$NAME}'";
			}

			$YEAR = $_POST["Year"];
			if ($YEAR=="") {
				$YEAR1 = "";
			}
			else {
				$YEAR1 = " and  tanks.Year='{$YEAR}'";
			}

			$CATEGORY = $_POST["Type"];
			if ($CATEGORY==""){
				$CATEGORY1 = "";
			}
			else {
				$CATEGORY1 = " and tanks.Category='{$CATEGORY}'";
			}		

			$SEARCH = mysql_query("SELECT tanks.ID, 
									tanks.Type,
									tanks.Image,
									tanks.Link,
									tanks.Category,
									tanks.Year,
									tanks.Cout,
									tanks.Note
								FROM tanks
								where tanks.ID=tanks.ID
								".$NAME1."
								".$YEAR1." 
								".$CATEGORY1." ")
								or die(mysql_error());
            if(mysql_affected_rows() > 0) { 
				echo "<table border class=search>";
				echo "<tr>";
				echo 	"<th width=100px>Тип танка</th>";
				echo 	"<th>Изображение</th>";
				echo 	"<th>Класификация</th>";
				echo 	"<th>Принят на вооружение</th>";
				echo 	"<th>Количество выпущенных, шт.</th>";
				echo 	"<th>Примечания</th>";
				echo "</tr>";
				while($RESULT = mysql_fetch_assoc($SEARCH)) {
					echo "<tr border>";
					echo 	"<td width=100px>".$RESULT['Link']."</td>";
					echo 	"<td>".$RESULT['Image']."</td>";
					echo 	"<td>".$RESULT['Category']."</td>";
					echo 	"<td>".$RESULT['Year']."</td>";
					echo 	"<td>".$RESULT['Cout']."</td>";
					echo 	"<td>".$RESULT['Note']."</td>";
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

		$SEARCH = mysql_query("SELECT tanks.ID, 
							tanks.Type,
							tanks.Image,
							tanks.Link,
							tanks.Category,
							tanks.Year,
							tanks.Cout,
							tanks.Note
						FROM tanks
						where tanks.ID=tanks.ID")
						or die(mysql_error());
		echo "<table border class=search>";
		echo "<tr>";
		echo 	"<th width=100px>Тип танка</th>";
		echo 	"<th>Изображение</th>";
		echo 	"<th>Класификация</th>";
		echo 	"<th>Принят на вооружение</th>";
		echo 	"<th>Количество выпущенных, шт.</th>";
		echo 	"<th>Примечания</th>";
		echo "</tr>";
		while($RESULT = mysql_fetch_assoc($SEARCH)) {
			echo "<tr border>";
			echo 	"<td width=100px>".$RESULT['Link']."</td>";
			echo 	"<td>".$RESULT['Image']."</td>";
			echo 	"<td>".$RESULT['Category']."</td>";
			echo 	"<td>".$RESULT['Year']."</td>";
			echo 	"<td>".$RESULT['Cout']."</td>";
			echo 	"<td>".$RESULT['Note']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>	