<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>  
<?php
if(checkUser($_SESSION["Login"],$_SESSION["Password"])){ 
  if(!empty($_POST["Test"])){
    $true = 0;
    $false = 0; 
    $str = "";
    if ($_POST[Q1] == 2){$true++;} else {$false++;$str=$str." 1,";}
    if ($_POST[Q2] == 4){$true++;} else {$false++;$str=$str." 2,";}
    if ($_POST[Q3] == 4){$true++;} else {$false++;$str=$str." 3,";}
    if ($_POST[Q4] == 1){$true++;} else {$false++;$str=$str." 4,";}
    if ($_POST[Q5] == 3){$true++;} else {$false++;$str=$str." 5,";}
    if ($_POST[Q6] == 2){$true++;} else {$false++;$str=$str." 6,";}
    if ($_POST[Q7] == 2){$true++;} else {$false++;$str=$str." 7,";}
    if ($_POST[Q8] == 4){$true++;} else {$false++;$str=$str." 8,";}
    if ($_POST[Q9] == 4){$true++;} else {$false++;$str=$str." 9,";}
    if ($_POST[Q10] == 2){$true++;} else {$false++;$str=$str." 10,";}
    if ($_POST[Q11] == 3){$true++;} else {$false++;$str=$str." 11,";}
    if ($_POST[Q12] == 3){$true++;} else {$false++;$str=$str." 12,";}
    if ($_POST[Q13] == 4){$true++;} else {$false++;$str=$str." 13,";}
    if ($_POST[Q14] == 2){$true++;} else {$false++;$str=$str." 14,";}
    if ($_POST[Q15] == 4){$true++;} else {$false++;$str=$str." 15,";}
    if ($_POST[Q16] == 3){$true++;} else {$false++;$str=$str." 16,";}
    if ($_POST[Q17] == 1){$true++;} else {$false++;$str=$str." 17,";}
    if ($_POST[Q18] == 4){$true++;} else {$false++;$str=$str." 18,";}
    if ($_POST[Q19] == 1){$true++;} else {$false++;$str=$str." 19,";}
    if ($_POST[Q20] == 1){$true++;} else {$false++;$str=$str." 20,";}

    if($true>=18) $mark="ОТЛИЧНО";
    if($true<18) $mark="ХОРОШО";
    if($true<13) $mark="УДОВЛЕТВОРИТЕЛЬНО";
    if($true<8) $mark="НЕУДОВЛЕТВОРИТЕЛЬНО";
    $str=substr($str, 1,-1);         
    $results = getNameUser($_SESSION["Login"]);
    $name = $results[0]["Name"];
    $surname = $results[0]["Surname"];
    $email = $results[0]["Email"];
    $success = addTest($name, $surname, $email, $true, $false, $str);
    if($true<=18)
      $alert = "Количество правильных ответов $true. Ваша оценка $mark. Неправльные ответы даны на вопросы №: $str, тоесть неправильных ответов $false.";
    elseif($true==19)
      $alert = "Количество правильных ответов $true. Ваша оценка $mark. Неправльный ответ дан на вопрос №: $str, тоесть неправильный ответ всего $false.";
    else 
      $alert = "Количество правильных ответов $true. Ваша оценка $mark.";
    include "alert.php";
}
 print<<<end
  <i><p><a href="index.php">Главная</a> > <a href="Test.php">Тест</a></p></i>
  <h2>Тест о Великой Отечественной войне</h2>
  <p><b>Инструкция</b></p>
  <ul>
    <li>Выберите один из вариантов в каждом из 20 вопросов;</li>
    <li>Нажмите на кнопку "Показать результат";</li>
    <li>За каждый правильный ответ начисляется 1 балл;</li>
    <li>Оценки: менее 8 баллов - НЕУДОВЛЕТВОРИТЕЛЬНО, от 8 но менее 13 - УДОВЛЕТВОРИТЕЛЬНО, 13 и менее 17 - ХОРОШО, от 18 до 20 - ОТЛИЧНО;</li>
    <li>Чтобы сбросить результат тестирования, нажать кнопку "Сбросить ответы";</li>
  </ul>
  <form name="test" action="" method="POST" >
    <ol>
      <li><b> Контрнаступление советских войск под Сталинградом началось:</b><br />
        <label><input type="radio" value="1" name="Q1"/> 5 декабря 1941 г.</label><br />
        <label><input type="radio" value="2" name="Q1"/> 19 ноября 1942 г.</label><br />
        <label><input type="radio" value="3" name="Q1"/> 5 июля 1943 г.</label><br />
        <label><input type="radio" value="4" name="Q1"/> 6 июня 1944 г.</label><br />
      </li>
      <li><b> Какое из названных событий произошло в 1943 г.?</b><br />
        <label><input type="radio" value="1" name="Q2"/> Смоленское сражение</label><br />
        <label><input type="radio" value="2" name="Q2"/> полное освобождение Ленинграда от блокады</label><br />
        <label><input type="radio" value="3" name="Q2"/> объявление Советским Союзом войны Японии</label><br />
        <label><input type="radio" value="4" name="Q2"/> Курская битва</label><br />
      </li>
      <li><b> Какая из названных конференций представителей, лидеров СССР, Великобритании и США произошла раньше других?</b><br />
        <label><input type="radio" value="1" name="Q3"/> Потсдамская</label><br />
        <label><input type="radio" value="2" name="Q3"/> Тегеранская</label><br />
        <label><input type="radio" value="3" name="Q3"/> Ялтинская</label><br />
        <label><input type="radio" value="4" name="Q3"/> Московская</label><br />
      </li>
      <li><b> Какой город был удостоен звания города-героя за мужество его защитников в первые дни Великой Отечественной войны?</b><br />
        <label><input type="radio" value="1" name="Q4"/> Брест</label><br />
        <label><input type="radio" value="2" name="Q4"/> Киев</label><br />
        <label><input type="radio" value="3" name="Q4"/> Ленинград</label><br />
        <label><input type="radio" value="4" name="Q4"/> Минск</label><br />
      </li>
      <li><b> В ходе какой битвы произошло крупнейшее танковое сражение Великой Отечественной войны?</b><br />
        <label><input type="radio" value="1" name="Q5"/> битвы за Москву</label><br />
        <label><input type="radio" value="2" name="Q5"/> Сталинградского сражения</label><br />
        <label><input type="radio" value="3" name="Q5"/> Курской битвы</label><br />
        <label><input type="radio" value="4" name="Q5"/> битвы за Берлин</label><br />
      </li>
      <li><b> В феврале 1945 г. состоялась встреча руководителей СССР, Великобритании и США:</b><br />
        <label><input type="radio" value="1" name="Q6"/> в Потсдаме</label><br />
        <label><input type="radio" value="2" name="Q6"/> в Ялте</label><br />
        <label><input type="radio" value="3" name="Q6"/> в Тегеране</label><br />
        <label><input type="radio" value="4" name="Q6"/> в Москве</label><br />
      </li>
      <li><b> Кто из советских военачальников командовал во всех названных операциях – сражении за Москву, обороне Ленинграда, боях за освобождение Варшавы, Берлинской операции?</b><br />
        <label><input type="radio" value="1" name="Q7"/> И.С. Конев</label><br />
        <label><input type="radio" value="2" name="Q7"/> Г.К. Жуков</label><br />
        <label><input type="radio" value="3" name="Q7"/> А.М. Василевский</label><br />
        <label><input type="radio" value="4" name="Q7"/> И.Д. Черняховский</label><br />
      </li>
      <li><b> Создателями новых видов оружия, военной техники в годы Великой Отечественной войны были:</b><br />
        <label><input type="radio" value="1" name="Q8"/> И.В. Курчатов, Л.Д. Ландау, П.С. Капица</label><br />
        <label><input type="radio" value="2" name="Q8"/> С.А. Ковпак, П.П. Вершигора, Д.Н. Медведев</label><br />
        <label><input type="radio" value="3" name="Q8"/> И.С. Конев, И.Х. Баграмян, В.И. Чуйков</label><br />
        <label><input type="radio" value="4" name="Q8"/> С.В. Ильюшин, С.П. Королев, М.И. Кошкин</label><br />
      </li>
      <li><b> Какое произведение было создано в блокадном Ленинграде?</b><br />
        <label><input type="radio" value="1" name="Q9"/> поэма А.Т. Твардовского «Василий Теркин»</label><br />
        <label><input type="radio" value="2" name="Q9"/> роман К.М. Симонова «Живые и мертвые»</label><br />
        <label><input type="radio" value="3" name="Q9"/> рассказ М.А. Шолохова «Судьба человека»</label><br />
        <label><input type="radio" value="4" name="Q9"/> Седьмая симфония Д.Д. Шостаковича</label><br />
      </li>
      <li><b> Направления «Север», «Центр», «Юг» для наступления германских войск предусматривались в плане:</b><br />
        <label><input type="radio" value="1" name="Q10"/> окружения Сталинграда</label><br />
        <label><input type="radio" value="2" name="Q10"/> «Барбаросса»</label><br />
        <label><input type="radio" value="3" name="Q10"/> взятия Курска (операция «Цитадель»)</label><br />
        <label><input type="radio" value="4" name="Q10"/> «Ост»</label><br />
      </li>
      <li><b> Коренной перелом в ходе Великой Отечественной войны был достигнут в результате:</b><br />
        <label><input type="radio" value="1" name="Q11"/> поражения немецких войск под Москвой</label><br />
        <label><input type="radio" value="2" name="Q11"/> снятия блокады Ленинграда и освобождения Новгорода</label><br />
        <label><input type="radio" value="3" name="Q11"/> сражения под Сталинградом и на Курской дуге</label><br />
        <label><input type="radio" value="4" name="Q11"/> освобождения Киева и Минска</label><br />
      </li>
      <li><b> Какая из названных территорий была включена в состав СССР после завершения Великой Отечественной войны?</b><br />
        <label><input type="radio" value="1" name="Q12"/> часть карельского перешейка с г.Выборгом</label><br />
        <label><input type="radio" value="2" name="Q12"/> Западная Украина</label><br />
        <label><input type="radio" value="3" name="Q12"/> часть Восточной Пруссии</label><br />
        <label><input type="radio" value="4" name="Q12"/> Бессарабия и Северная Буковина</label><br />
      </li>
      <li><b> Название «Дорога жизни» связано с сопротивлением врагу защитников:</b><br />
        <label><input type="radio" value="1" name="Q13"/> Севастополя</label><br />
        <label><input type="radio" value="2" name="Q13"/> Москвы</label><br />
        <label><input type="radio" value="3" name="Q13"/> Одессы</label><br />
        <label><input type="radio" value="4" name="Q13"/> Ленинграда</label><br />
      </li>
      <li><b> Прочтите отрывок из приказа Верховного Главнокомандующего (1943 г.) и укажите название городов, о которых идет речь в приказе:</b><br><p class = "center">«Отразив все попытки прорваться к Курску… наши войска сами перешли в наступление и 5 августа, ровно через месяц после начала июльского наступления немцев, заняли ________ и _________... Сегодня, 5 августа, в 24 часа столица нашей Родины Москва будет салютовать нашим доблестным войскам, освободившим __________ и __________, двенадцатью артиллерийскими залпами из 120 орудий».<br /></p>
        <label><input type="radio" value="1" name="Q14"/> Новгород и Луга</label><br />
        <label><input type="radio" value="2" name="Q14"/> Орел и Белгород</label><br />
        <label><input type="radio" value="3" name="Q14"/> Минск и Бобруйск</label><br />
        <label><input type="radio" value="4" name="Q14"/> Киев и Гомель</label><br />
      </li>
      <li><b> Быстрая перестройка советской экономики на военный лад в 1941-1942 гг. стала возможна благодаря:</b><br />
        <label><input type="radio" value="1" name="Q15"/> военной помощи западных союзников</label><br />
        <label><input type="radio" value="2" name="Q15"/> использованию труда немецких военнопленных</label><br />
        <label><input type="radio" value="3" name="Q15"/> разрешению частной собственности в деревне</label><br />
        <label><input type="radio" value="4" name="Q15"/> плановому характеру управления хозяйством</label><br />
      </li>
      <li><b> Что из названного было следствием сражения под Москвой?</b><br />
        <label><input type="radio" value="1" name="Q16"/> Германия начала терять союзников</label><br />
        <label><input type="radio" value="2" name="Q16"/> произошел коренной перелом в войне</label><br />
        <label><input type="radio" value="3" name="Q16"/> был сорван немецкий план молниеносной войны</label><br />
        <label><input type="radio" value="4" name="Q16"/> был открыт второй фронт в Европе</label><br />
      </li>
      <li><b> Какая военная операция получила название «огненная дуга»?</b><br />
        <label><input type="radio" value="1" name="Q17"/> Курская битва</label><br />
        <label><input type="radio" value="2" name="Q17"/> освобождение Киева</label><br />
        <label><input type="radio" value="3" name="Q17"/> сражение за Сталинград</label><br />
        <label><input type="radio" value="4" name="Q17"/> снятие блокады Ленинграда</label><br />
      </li>
      <li><b> Система оказания Соединенными Штатами Америки помощи союзникам путем поставок техники и продовольствия называлась:</b><br />
        <label><input type="radio" value="1" name="Q18"/> контрибуцией</label><br />
        <label><input type="radio" value="2" name="Q18"/> концессией</label><br />
        <label><input type="radio" value="3" name="Q18"/> кооперацией</label><br />
        <label><input type="radio" value="4" name="Q18"/> ленд-лизом</label><br />
      </li>
      <li><b> Операция советских войск под названием «Багратион» проводилась в 1944 г.:</b><br />
        <label><input type="radio" value="1" name="Q19"/> в Белоруссии</label><br />
        <label><input type="radio" value="2" name="Q19"/> на Кавказе</label><br />
        <label><input type="radio" value="3" name="Q19"/> в Венгрии</label><br />
        <label><input type="radio" value="4" name="Q19"/> в Крыму</label><br />
      </li>
      <li><b> Проведение партизанскими отрядами операций «Рельсовая война» и «Концерт» связаны с событиями:</b><br />
        <label><input type="radio" value="1" name="Q20"/> Курской битвы</label><br />
        <label><input type="radio" value="2" name="Q20"/> снятия блокады Ленинграда</label><br />
        <label><input type="radio" value="3" name="Q20"/> Сталинградской битвы</label><br />
        <label><input type="radio" value="4" name="Q20"/> начала наступления советских войск под Москвой</label><br />
      </li>
    </ol> 
      <INPUT type="submit" value="Показать результат" name="Test"/>
      <INPUT type="reset" value="Сбросить ответы"/>      
  </form> 

end;
}
else
  echo'<p class=center_1>Вы не можете пройти тест пока не выполнили вход в свой аккаунт. Если же вы не зарегестрированы, тогда можете пройти <a href=Registration.php>Регистрацию</a> для возможности прохождения теста.</p>';
?>
<img class="basement_image2" src="Images\ogon.gif"/><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img width="100px" src="Images\Красная звезда.png" /><img class="basement_image2" src="Images\ogon.gif"/>  