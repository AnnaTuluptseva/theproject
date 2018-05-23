<?php
include_once('connect.php');
connectDB ();
$FAIL = 0;
$SUCCESS = 1;
//echo $_SESSION['id_u'];
//id пройденных тестов
$id_u = $_SESSION['id_u'];
$completed = mysql_query("SELECT id_test FROM usertests WHERE id_u='$id_u'", $db) or die("checkPass fatal error: ".mysql_error());
//echo $completed ;
$completed_arr = array();
//$tests1 = mysql_query("SELECT * FROM tests WHERE id_test NOT IN(".implode(',',$completed_rows).")", $db) or die("checkPass fatal error: ".mysql_error());
while ($completed_rows=mysql_fetch_array($completed)) {
	//echo $completed_rows['id_test'];
	array_push($completed_arr , $completed_rows['id_test']);
}

//echo $completed_rows[0];
//Тесты
$tests1 = mysql_query("SELECT * FROM tests WHERE id_test NOT IN(".implode(',',$completed_arr).")", $db) or die("checkPass fatal error: ".mysql_error());

echo "<div>";
echo "<p class='usertopic'>Мои тесты:</p>";
while($testrow1 = mysql_fetch_array($tests1)){ 	
	echo "<span class='mytest' id='".$testrow1['id_test']."'title='".$testrow1['testtext']."'> <p>";
	//echo "ID - ".$myrow['idgoal']."<br>";
    echo $testrow1['testname'];
    echo "</p> <p class='spandates'>";
	echo "Дедлайн: ".$testrow1['testdeadline'];
    //echo "Текст - ".$myrow['goaltext']."<br>";
    echo "</p> </span>";
}
echo "</div>";
//Пройденные тесты
$tests2 = mysql_query("SELECT * FROM tests WHERE id_test IN(".implode(',',$completed_arr).")", $db) or die("checkPass fatal error: ".mysql_error());

//Все данные о пройденных тестах
$tests3 = mysql_query("SELECT * FROM usertests WHERE id_u='$id_u'", $db) or die("checkPass fatal error: ".mysql_error());
$test3_arr = array();
while($testrow3 = mysql_fetch_array($tests3)){
	array_push($test3_arr, $testrow3);
	//echo $testrow3;
}
//echo $test3_arr[0]['points_result'];
echo "<div>";
echo "<p class='usertopic'>Пройденные тесты:</p>";
while($testrow2 = mysql_fetch_array($tests2)){ 
	echo "<span id='".$testrow1['id_test']."' title='".$testrow2['testtext']."'> <p>";
	//echo "ID - ".$myrow['idgoal']."<br>";
    echo $testrow2['testname'];
    echo "</p> <p class='spandates'>";
    foreach ($test3_arr as $i) {
    	if ($i['id_test']==$testrow2['id_test']) {
    		//echo "Hello!";
    		echo "Верных ответов: ".$i['points_result']."%";
    	}
    }
	
	/*echo "</p> <p class='spandates'>";
	echo "Завершение: ".$testrow2['goal_bdate'];*/
    //echo "Текст - ".$myrow['goaltext']."<br>";
    echo "</p> </span>";
}
echo "</div>";

closeDB();

?>