<?php
	/*$mysqli = false;
	$username = 'localhost';
	$dbname = 'root';
	$dbpassword = '';
	$tablename = 'users';
	function connectDB (){
		global $mysqli;
		$mysqli = new mysqli ("$username","$dbname",$dbpassword,$tablename);
		$mysqli->query("SET NAMES 'utf-8'");
	}
	function closeDB (){
		global $mysqli;
		$mysqli->close();
	}*/
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'diplom';
	$db;
	function connectDB (){
		global $db_host;
		global $db_user;
		global $db_pass;
		global $db_name;
		global $db;
		$db = mysql_connect($db_host, $db_user, $db_pass); //, $db_name
		//or die ("Ошибка подключения к базе данных");
		//mysql_select_db("db_name");
		$chdb = mysql_select_db ($db_name,$db);
		/*if ($db) {
			echo "Подключение прошло успешно!";
			
		}
		else{
			echo "Не удалось удалось установить подключение к базе данных!";
		}
		
		if ($chdb) {
			echo "База данный найдена!";
			
		}
		else{
			echo "Не удалось удалось найти базу данных!";
		}*/
	}
	function closeDB (){
		global $db;
		mysql_close($db);
		//echo "База данных закрыта!";

	}
?>