<?php
include_once('connect.php');
connectDB ();
$errors;
if(isset($_POST['registrate'])){
	//echo "Hello!";
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
	$username = stripslashes($username);
    $username = htmlspecialchars($username);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
 	//удаляем лишние пробелы
    $username = trim($username);
    $email = trim($email);
    $password = trim($password);
    $salt = mt_rand(100, 999);
	//$tm = time();
	$reg_date=date("Y.m.d");
	//echo $reg_date;
	$password = md5(md5($password).$salt);
     // проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT id_u FROM users WHERE email='$email'",$db);

   	if ($result) $row = mysql_fetch_array($result);
	else echo mysql_error();

    if (mysql_num_rows($result)!=0) {
    	$myrow = mysql_fetch_array($result);
    	$errors="Пользователь с этим email уже зарегистрирован. Пожалуйста введите новый email!";
    	return $errors;
    }
    else {
   	$myrow = false;
    
 	// если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO users (username,email,email_reg,password,salt,last_visit,reg_date) VALUES('$username','$email','$email','$password','$salt','$reg_date','$reg_date')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    	header("Location: /successreg.php", TRUE, 301);
    	//echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
    }
 	else {
    	echo "Ошибка! Вы не зарегистрированы.";
    }

	}
closeDB ();
}

?>