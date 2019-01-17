<?php

// Указываем кодировку, в которой будет получена информация из базы 
@mysqli_query ($db, 'set character_set_results = "utf8"');

// Извлекаем статистику по текущей дате (переменная date попадает сюда из файла count.php, который, в свою очередь, подключается в каждом из 4 обычных файлов)
$res = mysqli_query($db, "SELECT `views`, `hosts` FROM `visits`");
	while ($row = mysqli_fetch_assoc($res))
    {
        $count1 = $count1 + $row['hosts'];
        $count2 = $count2 + $row['views'];
    }	
    $count2=$count2-1;
	echo '<div class=fixed_statistic>
		<table>
			<tr>
				<td >
					<img width=20px src=Images/noavatar.png />								
				</td>
				<td width = 65px>				
					<font style="margin:0; text-align:left; padding:0; ">' .$count1.'</font>
				</td>
			</tr>
			<tr>
				<td >
					<img width=20px src=Images/Views.png />
				</td>
				<td width = 65px>
					'.$count2.'
				</td>
			</tr>
		</table>
	</div>';

?>