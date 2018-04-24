<?php
    include_once('connect.php');
    connectDB ();
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
    	//echo "Hey";
    	header("Location: /../index.php", TRUE, 301);
    	//echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
    }
 	else {
    	echo "Ошибка!";
    }
closeDB();

?>