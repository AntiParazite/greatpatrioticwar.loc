<form name="search" method="post" action="">
    <input type="search" name="query" placeholder="Поиск">
    <button type="submit">Найти</button> 
</form>

<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ' ');
define('DB_NAME', 'gpw');

if (!mysql_connect(DB_HOST, DB_USER, DB_PASS)) {
    exit('Cannot connect to server');
}
if (!mysql_select_db(DB_NAME)) {
    exit('Cannot select database');
}

mysql_query("SET NAMES 'utf8'");

if (!empty($_POST['Name']) || !empty($_POST['Year']) || !empty($_POST['Type'])) { 
    search ($_POST['Name'],$_POST['Year'],$_POST['Type']); 
}

function search ($Name, $Year, $Type) 
{ 
    $query = trim($Name); 
    $query = mysql_real_escape_string($Name);
    $query = htmlspecialchars($Name);
    $query = trim($Year); 
    $query = mysql_real_escape_string($Year);
    $query = htmlspecialchars($Year);
    $query = trim($Type); 
    $query = mysql_real_escape_string($Type);
    $query = htmlspecialchars($Type);

    if (!empty($Name) || !empty($Year) || !empty($Type)) 
    { 
           $q = "SELECT `tanks.ID`, 
                        `tanks.Type`,
                        `tanks.Image`,
                        `tanks.Link`,
                        `tanks.category`,
                        `tanks.Year`,
                        `tanks.Cout`,
                        `tanks.Note`
                FROM `tanks` 
                WHERE `Type` LIKE '%$Name%'
                OR `Categoty` LIKE '%$Type%' 
                OR `Year` LIKE '%$Year%'";

            $result = mysql_query($q);
            if (mysql_affected_rows() > 0) { 
                echo "<table border class=search>";
                echo "<tr>";
                echo    "<th width=100px>Тип танка</th>";
                echo    "<th>Изображение</th>";
                echo    "<th>Класификация</th>";
                echo    "<th>Принят на вооружение</th>";
                echo    "<th>Количество выпущенных, шт.</th>";
                echo    "<th>Примечания</th>";
                echo "</tr>";
                $row = mysql_fetch_assoc($result); 
                $num = mysql_num_rows($result);
                while ($row = mysql_fetch_assoc($result)) {
                    echo "<tr border>";
                        echo    "<td width=100px>".$result['Link']."</td>";
                        echo    "<td>".$result['Image']."</td>";
                        echo    "<td>".$result['Category']."</td>";
                        echo    "<td>".$result['Year']."</td>";
                        echo    "<td>".$result['Cout']."</td>";
                        echo    "<td>".$result['Note']."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } 
            else {
                $alert = 'По вашему запросу ничего не найдено.';
            }
        } 
    } else {
        $alert = 'Задан пустой поисковый запрос.';
    }

    include "alert.php";
} 
?>