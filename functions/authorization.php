<?php
//header('Refresh: 0; URL = /../index.php');
ini_set ("session.use_trans_sid", true);
session_start();
include_once('connect.php');
//include('functions.php');
connectDB ();
global $db;
$error1;
$error2;
//проверим, быть может пользователь уже авторизирован. Если это так, перенаправим его на главную страницу сайта
if (isset($_SESSION['id_u']) || (isset($_SESSION['email']) && isset($_SESSION['password']))) 
{
	header("Location: /../index.php", TRUE, 301);
}
else 
{	//echo "Hello!";
	//header("Location: /../login.php", TRUE, 301);
	if (isset($_POST['login'])){
		//echo "Hello!";
		$email = $_POST['email'];
		$password = $_POST['password'];
		//если email и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    	$email = stripslashes($email);
    	$email = htmlspecialchars($email);
    	$password = stripslashes($password);
    	$password = htmlspecialchars($password);
 		//удаляем лишние пробелы
    	$email = trim($email);
    	$password = trim($password);
    	$result = mysql_query("SELECT id_u, username, email, password, salt, online FROM users WHERE email='$email'", $db) or die("checkPass fatal error: ".mysql_error());
    	$userdata = mysql_fetch_assoc($result);
    	//echo $userdata[id_u];
    	if ($result) $row = mysql_fetch_array($result);
			else echo mysql_error();
    	if (mysql_num_rows($result)==0) {
    		//echo 'Ошибка1!'
    		$error1="Нет зарегистрированного пользователя с данным адресом.";
    		return $error1;
   		}
    	else {
    		//echo 'Ошибка2!';
    		if($userdata['password'] != md5(md5($password).$userdata['salt'])){
    			//echo 'Ошибка3!';
    			$error2="Введен не верный пароль!";
    			return $error2;
    		}
    		else{
                $online_user = mysql_query ("UPDATE users SET online=1 WHERE id_u='".$userdata['id_u']."'");
                if($online_user){
                    $_SESSION['id_u']= $userdata['id_u'];
                    $_SESSION['username']= $userdata['username'];
                    $_SESSION['email']= $userdata['email'];
                    $_SESSION['password']= $userdata['password'];
                    $_SESSION['online'] = 1;
                    header("Location: /../index.php", TRUE, 301);
                } else{
                    header("Location: /../errors/autoerror.php", TRUE, 301);
                }
    			
    			
    			//echo 'Авторизация прошла успешно!';
    		}
		}
	}
}
?>