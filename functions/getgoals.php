<?php
include_once('connect.php');
connectDB ();
$FAIL = 0;
$SUCCESS = 1;
//Не достигнутые целы
$result1 = mysql_query("SELECT * FROM goals WHERE goal_success='$FAIL'", $db) or die("checkPass fatal error: ".mysql_error());

echo "<div>";
echo "<p class='usertopic'>Мои цели:</p>";
while($myrow = mysql_fetch_array($result1)){ 	
	echo "<span class='futuregoal' id='".$myrow['idgoal']."'title='".$myrow['goaltext']."'> <p>";
	//echo "ID - ".$myrow['idgoal']."<br>";
    echo $myrow['goalname'];
    echo "</p> <p class='goaldate'>";
	echo "Дедлайн: ".$myrow['goaldeadline'];
    //echo "Текст - ".$myrow['goaltext']."<br>";
    echo "</p> </span>";
}
echo "</div>";
//Достигнутые цели
$result2 = mysql_query("SELECT * FROM goals WHERE goal_success='$SUCCESS'", $db) or die("checkPass fatal error: ".mysql_error());

echo "<div>";
echo "<p class='usertopic'>Достигнутые цели:</p>";
while($fgoals = mysql_fetch_array($result2)){ 
	echo "<span title='".$fgoals['goaltext']."'> <p>";
	//echo "ID - ".$myrow['idgoal']."<br>";
    echo $fgoals['goalname'];
    echo "</p> <p class='goaldate'>";
	echo "Начало: ".$fgoals['goal_bdate'];
	echo "</p> <p class='goaldate'>";
	echo "Завершение: ".$fgoals['goal_bdate'];
    //echo "Текст - ".$myrow['goaltext']."<br>";
    echo "</p> </span>";
}
echo "</div>";

//Добавление новой цели
/*if(isset($_POST['addgoal'])){
	$goalname = $_POST['goalname'];
	$goaltext = $_POST['goaltext'];
	$goaldeadline= $_POST['goaldeadline'];
	$goal_bdate = date("Y.m.d");
	$goalname = stripslashes($goalname);
    $goalname = htmlspecialchars($goalname);
    $goalname = trim($goalname);
    $goaltext = stripslashes($goaltext);
    $goaltext = htmlspecialchars($goaltext);
    $goaltext = trim($goaltext);
    $result3 = mysql_query ("INSERT INTO goals (goalname,goaltext,goal_bdate,goaldeadline,goal_success) VALUES('$goalname','$goaltext','$goal_bdate','$goaldeadline',0)");
    // Проверяем, есть ли ошибки
    if ($result3=='TRUE')
    {
    	echo "Hey";
    	header("Location: /newgoal.php", TRUE, 301);
    	//echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
    }
 	else {
    	echo "Ошибка!";
    }
}*/
closeDB();

?>