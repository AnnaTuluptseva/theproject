<?php
session_start();

require_once('database.php');

// Проверка имени пользователя
function checkemail($str) {
	$error = "";
	
	if(!$str) {
		$error = "Вы не ввели имя пользователя";
		return $error;
	}
}

// Проверка пароля пользователя
function checkPassword($str) {
	$error = "";
	
	if(!$str) {
		$error = "Вы не ввели пароль";
		return $error;
	}
		
	$pattern = '/^[_!)(.a-z\d]{6,16}$/i';	
	$result = preg_match($pattern, $str);
	
	if(!$result) {
		$error = "Недопустимые символы в пароле пользователя или пароль слишком короткий (длинный)";
		return $error;
	}
	
	return true;
}

// Функция регистрации пользователя
function registration($email, $password) {
	$error = "";
	
	if(!$email) {
		$error = "Не указана почта";
		return $error;
	} 
	elseif(!$password) {
		$error = "Не указан пароль";
		return $error;
	}

	// Подключаемся к СУБД
	//$conn = pg_connect("host=localhost port=5432 dbname=postgres user=webUser password=ga1{cgDcD#");
	$conn = pg_connect("host=localhost port=5434 dbname=postgres user=postgres password=''");
	$query = pg_query($conn, "SELECT id FROM users WHERE email='" . $email . "'");
	
	if(pg_num_rows($query) > 0) {
		$error = "Пользователь с указанной почтой уже зарегистрирован";
		return $error;
	}
	
	// Если такого пользователя нет, регистрируем его
	$query = pg_query($conn, "INSERT INTO users (email, password) VALUES ('" . $email . "','" . $password . "')");
	
	pg_close();

	return true;
}


//Функция авторизации пользователя.
function authorization($email, $password) {
	$error = '';
	
	if(!$email) {
		$error = 'Не указана почта';
		return $error;
	} 
	elseif(!$password) {
		$error = 'Не указан пароль';
		return $error;
	}

	$conn = pg_connect("host=localhost port=5432 dbname=postgres user=WebUser password=ga1{cgDcD#");
//	$conn = pg_connect("host=localhost port=5434 dbname=postgres user=postgres");
	$query = pg_query($conn, "SELECT id FROM users WHERE email='".$email."' AND password='".$password."'");

	if(pg_num_rows($query) == 0)	{
		$error = 'Пользователь с указанными данными не зарегистрирован';
		return $error;
	}
	
	$_SESSION['email'] = $email;
	$_SESSION['password'] = $password;

	pg_close();
	
	return true;
}

function checkAuth($email, $password) {

	if(!$email || !$password)	return false;

	$conn = pg_connect("host=localhost port=5432 dbname=postgres user=WebUser password=ga1{cgDcD#");
//	$conn = pg_connect("host=localhost port=5434 dbname=postgres user=postgres");
	$query = pg_query($conn, "SELECT id FROM users WHERE email='".$email."' AND password='".$password."'");

	if(pg_num_rows($query) == 0)	{
		return false;
	}
	
	pg_close();
	
	return true;
}

?>