<?php
include_once('connect.php');
connectDB ();
$FAIL = 0;
$SUCCESS = 1;
//Не достигнутые целы
$goals1 = mysql_query("SELECT * FROM goals WHERE goal_success='$FAIL'", $db) or die("checkPass fatal error: ".mysql_error());

echo "<div>";
echo "<p class='usertopic'>Мои цели:</p>";
while($myrow = mysql_fetch_array($goals1)){ 	
	echo "<span class='futuregoal' id='".$myrow['idgoal']."'title='".$myrow['goaltext']."'> <p>";
	//echo "ID - ".$myrow['idgoal']."<br>";
    echo $myrow['goalname'];
    echo "</p> <p class='spandates'>";
	echo "Дедлайн: ".$myrow['goaldeadline'];
    //echo "Текст - ".$myrow['goaltext']."<br>";
    echo "</p> </span>";
}
echo "</div>";
//Достигнутые цели
$goals2 = mysql_query("SELECT * FROM goals WHERE goal_success='$SUCCESS'", $db) or die("checkPass fatal error: ".mysql_error());

echo "<div>";
echo "<p class='usertopic'>Достигнутые цели:</p>";
while($fgoals = mysql_fetch_array($goals2)){ 
	echo "<span title='".$fgoals['goaltext']."'> <p>";
	//echo "ID - ".$myrow['idgoal']."<br>";
    echo $fgoals['goalname'];
    echo "</p> <p class='spandates'>";
	echo "Начало: ".$fgoals['goal_bdate'];
	echo "</p> <p class='spandates'>";
	echo "Завершение: ".$fgoals['goal_bdate'];
    //echo "Текст - ".$myrow['goaltext']."<br>";
    echo "</p> </span>";
}
echo "</div>";

closeDB();

?>