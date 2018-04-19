<?php
/**
  * Функция для подключения к СУБД MySQL.
  * Функция не принимает никаких параметров.
  * Функция предназначена для использования, в основном,
  * с одной базой данных
  */
function connect() {
	// Объявляем переменные, в которых будут храниться параметры для подключения к СУБД
	$db_host = 'localhost';				// Сервер
	$db_user = 'WebUser';			// Имя пользователя
	$db_password = 'ga1{cgDcD#';	// Пароль пользователя
	$db_name = 'postgres';				// Имя базы данных
	
	// Подключаемся к серверу
	
	//$conn = mysql_connect($db_host, $db_user, $db_password) or die("<p>Can't connect: " . mysql_error() . ". Errow in " . __LINE__ . "</p>");
	$conn = pg_connect("host=$db_host dbname=$db_name user=$db_user password=$db_password");
	
	// Эта часть кода выполнится только в случае успешного подключения к серверу
	// Выбираем базу данных
	
	//$db = mysql_select_db($db_name, $conn) or die("<p>Can't connect: " . mysql_error() . ". Errow in " . __LINE__ . "</p>");
	
	// Эта часть кода выполняется только в случае успешного подключения к БД
	// Указываем серверу, что данные, которые мы от него получаем, нам нужны в кодировке UTF-8
	
	//$query = mysql_query("set names utf8", $conn) or die("<p>Can't do: " . mysql_error() . ". Errow in " . __LINE__ . "</p>");
	$query = pg_exec($conn, "set names utf8");
}
?>