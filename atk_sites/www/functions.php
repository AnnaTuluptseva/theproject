<?
/**
  * functions.php
  * Файл с пользовательскими функциями
  */
  
// Подключаем файл с параметрами подключения к СУБД
require_once('database.php');
require_once('connect.php');

// Проверка имени пользователя
function checkLogin($str) {
	// Инициализируем переменную с возможным сообщением об ошибке
	$error = '';
	
	// Если отсутствует строка с логином, возвращаем сообщение об ошибке
	if(!$str) {
		$error = 'Вы не ввели имя пользователя';
		return $error;
	}
	
	/**
	  * Проверяем имя пользователя с помощью регулярных выражений
	  * Логин должен быть не короче 4, не длинне 16 символов
	  * В нем должны быть символы латинского алфавита, цифры, 
	  * в нем могут быть символы '_', '-', '.'
	  */
	$pattern = '/^[-_.a-z\d]{3,16}$/i';	
	$result = preg_match($pattern, $str);
	
	// Если проверка не прошла, возвращаем сообщение об ошибке
	if(!$result) {
		$error = 'Недопустимые символы в имени пользователя или имя пользователя слишком короткое (длинное)';
		return $error;
	}
	
	// Если же всё нормально, вернем значение true
	return true;
}

// Проверка пароля пользователя
function checkPassword($str) {
	// Инициализируем переменную с возможным сообщением об ошибке
	$error = '';
	
	// Если отсутствует строка с логином, возвращаем сообщение об ошибке
	if(!$str) {
		$error = 'Вы не ввели пароль';
		return $error;
	}
		
	/**
	  * Проверяем пароль пользователя с помощью регулярных выражений
	  * Пароль должен быть не короче 6, не длинне 16 символов
	  * В нем должны быть символы латинского алфавита, цифры, 
	  * в нем могут быть символы '_', '!', '(', ')'
	  */
	$pattern = '/^[_!)(.a-z\d]{6,16}$/i';	
	$result = preg_match($pattern, $str);
	
	// Если проверка не прошла, возвращаем сообщение об ошибке
	if(!$result) {
		$error = 'Недопустимые символы в пароле пользователя или пароль слишком короткий (длинный)';
		return $error;
	}
	
	// Если же всё нормально, вернем значение true
	return true;
}

/*function is_email($email) {
  return preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/", $email);
}*/


function checkemail($str) {
	filter_var('example@mail.ru', FILTER_VALIDATE_EMAIL);
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		return true;
	} 
	else {
		$error = 'Email введен неверно!';
		return $error;
	}
}

// Функция регистрации пользователя
function registration($password, $email) {
	// Инициализируем переменную с возможным сообщением об ошибке
	$error = '';
	
	// Если отсутствует строка с логином, возвращаем сообщение об ошибке
	/*if(!$login) {
		$error = 'Не указан логин';
		return $error;
	} */
	if(!$password) {
		$error = 'Не указан пароль';
		return $error;
	}
	else if(!$email) {
		$error = 'Не указана почта';
		return $error;
	}
	
	// Проверяем не зарегистрирован ли уже пользователь
	// Подключаемся к СУБД
	connect();
	
	// Пишем строку запроса
	$sql = "SELECT `id_user` FROM `users` WHERE `email`='" . $email . "'";
	// Делаем запрос к базе
	$query = mysql_query($sql) or die("<p>Can't do: " . mysql_error() . ". Errows in " . __LINE__ . "</p>");
	// Смотрим на количество пользователей с таким логином, если есть хоть один,
	// возвращаем сообщение об ошибке
	if(mysql_num_rows($query) > 0) {
		$error = 'Пользователь с указанным логином уже зарегистрирован';
		return $error;
	}
	
	// Если такого пользователя нет, регистрируем его
	// Пишем строку запроса
	$sql = "INSERT INTO `users` 
			(`password`,`email`) VALUES 
			('" . $password . "','" . $email . "')";
	// Делаем запрос к базе
	$query = mysql_query($sql) or die("<p>Can't create users: " . mysql_error() . ". Errow in " . __LINE__ . "</p>");
	
	// Не забываем отключиться от СУБД
	mysql_close();
	
	// Возвращаем значение true, сообщающее об успешной регистрации пользователя
	return true;
}

/**
  * Функция авторизации пользователя.
  * Авторизация пользователей у нас будет осуществляться
  * с помощью сессий PHP.
  */
function authorization($email, $password) {
	// Инициализируем переменную с возможным сообщением об ошибке
	$error = '';
	
	// Если отсутствует строка с логином, возвращаем сообщение об ошибке
	if(!$email) {
		$error = 'Не указан логин';
		return $error;
	} 
	elseif(!$password) {
		$error = 'Не указан пароль';
		return $error;
	}
	
	// Проверяем не зарегистрирован ли уже пользователь
	// Подключаемся к СУБД
	connect();
	
	// Нам нужно проверить, есть ли такой пользователь среди зарегистрированных
	// Составляем строку запроса
	$sql = "SELECT `id_user` FROM `users` WHERE `email`='" .$email. "' AND `password`='" .$password. "'";
	// Выполняем запрос
	$query = mysql_query($sql) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
	// Если пользователя с такими данными нет, возвращаем сообщение об ошибке
	if(mysql_num_rows($query) == 0)	{
		$error = 'Пользователь с указанными данными не зарегистрирован';
		return $error;
	}
	// Если пользователь существует, запускаем сессию
	session_start();
	// И записываем в неё логин и пароль пользователя
	// Для этого мы используем суперглобальный массив $_SESSION
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	// Не забываем закрывать соединение с базой данных
	mysql_close();
	
	// Возвращаем true для сообщения об успешной авторизации пользователя
	return true;
}

function checkAuth($email, $password) {
	
	// Если нет логина или пароля, возвращаем false
	if(!$email || !$password)	return false;
	
	// Проверяем зарегистрирован ли такой пользователь
	// Подключаемся к СУБД
	connect();
	
	// Составляем строку запроса
	$sql = "SELECT `id_user` FROM `users` WHERE `email`='".$email."' AND `password`='".$password."'";
	// Выполняем запрос
	$query = mysql_query($sql) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
	
	// Если пользователя с такими данными нет, возвращаем false;
	if(mysql_num_rows($query) == 0)	{
		return false;
	}
	
	// Не забываем закрывать соединение с базой данных
	mysql_close();
	
	// Иначе возвращаем true
	return true;
}

function getLanguages(){
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT * FROM languages");
	closeDB();
	return resultToArray($result);
	
}

function getWords($lang){
	global $mysqli;
	connectDB();
	$result = $mysqli->query("SELECT term, translation FROM words WHERE `lang`='".$lang."'");
	closeDB();
	return resultToArray($result);
	
}

function getMeaning($mass, $m){
	$s = "";
	for($i = 1; $i <= count($mass); $i++){
		$s+= $mass[$i]["term"] + "and" +$m;
		if($mass[$i]["term"] == $m){
			return $mass[$i]["translation"];
		}
  	}
  	return $s;
}

function resultToArray($result){	
		$array = array();
		while(($row = $result->fetch_assoc()) != false)
			$array[] = $row;
		return $array;
}

?>