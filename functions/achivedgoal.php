<?php
//echo "Achived!!!";
include_once('connect.php');
connectDB ();
$fdate=date("Y.m.d");
$idgoal = $_GET['idgoal'];
//echo $idgoal;
// если такого нет, то сохраняем данные
$result = "UPDATE `goals` SET `goal_fdate`='$fdate', `goal_success`=1 WHERE `idgoal`='$idgoal'";
$query_result = mysql_query($result); 
if (mysql_affected_rows() >0)
{
    header("Location: ../index.php", TRUE, 301);
    	//echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
}
else {
    echo "Mistake! <br>";
    echo $fdate;
    echo $idgoal;
    echo mysql_error();
}
closeDB();
?>