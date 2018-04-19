<?php
session_start();
/**
  * functions.php
  * Файл с пользовательскими функциями
  */
  
// Подключаем файл с параметрами подключения к СУБД
require_once('database.php');

// Проверка имени пользователя
function checkemail($str) {
	// Инициализируем переменную с возможным сообщением об ошибке
	$error = '';
	
	// Если отсутствует строка с логином, возвращаем сообщение об ошибке
	if(!$str) {
		$error = 'Вы не ввели имя пользователя';
		return $error;
	}

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
		
	//Проверяем пароль пользователя с помощью регулярных выражений
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
// Функция регистрации пользователя
function registration($email, $password) {
	// Инициализируем переменную с возможным сообщением об ошибке
	$error = '';
	
	// Если отсутствует строка с логином, возвращаем сообщение об ошибке
	if(!$email) {
		$error = 'Не указана почта';
		return $error;
	} 
	elseif(!$password) {
		$error = 'Не указан пароль';
		return $error;
	}
	
	// Проверяем не зарегистрирован ли уже пользователь
	// Подключаемся к СУБД
	$conn = pg_connect("host=localhost port=5434 dbname=postgres user=postgres");
	
	// Пишем строку запроса
	$sql = "SELECT id FROM users WHERE email='$email'";
	// Делаем запрос к базе
	
	//$query = mysql_query($sql) or die("<p>Can't do: " . mysql_error() . ". Errows in " . __LINE__ . "</p>");
	$query = pg_query($conn, "SELECT id FROM users WHERE email='$email'");
	
	// Смотрим на количество пользователей с таким логином, если есть хоть один,
	// возвращаем сообщение об ошибке
	if(pg_num_rows($query) > 0) {
		$error = 'Пользователь с указанной почтой уже зарегистрирован';
		return $error;
	}
	
	// Если такого пользователя нет, регистрируем его
	// Пишем строку запроса
	$sql = "INSERT INTO users
			(email,password) VALUES 
			('" . $email . "','" . $password . "')";
	// Делаем запрос к базе
	
	//$query = mysql_query($sql) or die("<p>Can't create users: " . mysql_error() . ". Errow in " . __LINE__ . "</p>");
	$query = pg_query($conn, "INSERT INTO users (email, password) VALUES ('" . $email . "','" . $password . "')");
	
	// Не забываем отключиться от СУБД
	
	//mysql_close();
	pg_close();
	
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
		$error = 'Не указана почта';
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
	
	//$sql = "SELECT `id` FROM `users` WHERE `email`='".$email."' AND `password`='".$password."'";
	$sql = "SELECT ID FROM users WHERE email='".$email."' AND password='".$password."'";
	
	// Выполняем запрос
	
	//$query = mysql_query($sql) or die("<p>Невозможно выполнить запрос: " . mysql_error() . ". Ошибка произошла в строке " . __LINE__ . "</p>");
	$query = pg_query($sql); 
	
	// Если пользователя с такими данными нет, возвращаем сообщение об ошибке
	if(pg_num_rows($query) == 0)	{
		$error = 'Пользователь с указанными данными не зарегистрирован';
		return $error;
	}
	
	// Если пользователь существует, запускаем сессию
	// И записываем в неё логин и пароль пользователя
	// Для этого мы используем суперглобальный массив $_SESSION
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;
	
	// Не забываем закрывать соединение с базой данных
	
	//mysql_close();
	pg_close();
	
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
	$sql = "SELECT ID FROM users WHERE email='".$email."' AND password='".$password."'";
	// Выполняем запрос
	$query = pg_query($sql);
	
	// Если пользователя с такими данными нет, возвращаем false;
	if(pg_num_rows($query) == 0)	{
		return false;
	}
	
	// Не забываем закрывать соединение с базой данных
	pg_close();
	
	// Иначе возвращаем true
	return true;
}

?>