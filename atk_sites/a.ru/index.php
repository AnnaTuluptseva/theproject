<?php

header("Content-Type: text/html; charset=utf-8"); 
/*for($i=1; $i<6;$i++){
	echo "String ", $i. "<br>";
	flush();
	sleep(1);
}*/


/*class Myclass{
	const myconst = 170;
	public $var;
	public $tu;
	public function __construct($var){
		$this->var = $var;
		$this->tu="Hello!";
		echo "Вызван коструктор <br>";
	}
	public function __destruct(){
		echo "Вызван деструктор <br>";
	}
	public function f_get(){
		return $this->var;
	}
	public function f_get_tu(){
		return $this->tu;
	}
	public function f_addconst($add){
		return ($add + self::myconst);
	}
}
$obj = new Myclass(5);
echo 'Значение свойства $tu равно ' . $obj->f_get_tu() . '<br>';
echo 'Значение свойства var равно ' . $obj->f_get() . '<br>';
echo $obj->f_addconst(2).'<br>';
echo Myclass::myconst . '<br>';
echo "Вывод перед удалением объекта<br>";
unset($obj);*/



$conn = mysql_connect('localhost','root','') or die("<p>Ошибка " . mysql_error() . " в строке " . _LINE_ . "</p>");
$db = mysql_select_db("testdb", $conn) or die("<p>Ошибка " . mysql_error() . " в строке " . _LINE_ . "</p>");

$sql = "CREATE TABLE IF NOT EXISTS `City` (
	`id_City` INT NOT NULL AUTO_INCREMENT,
	`City` CHAR(50) NOT NULL,
	PRIMARY KEY (`id_City`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8";

$query = mysql_query($sql) or die("<p>Ошибка " . mysql_error() . " в строке " . _LINE_ . "</p>");

if(isset($_POST['submit_table'])){
	$sql2 = "CREATE TABLE IF NOT EXISTS `Customers`(
		`id_Customer` INT NOT NULL AUTO_INCREMENT,
		`Name` CHAR(50) NOT NULL,
		PRIMARY KEY (`id_Customer`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8";
	$query2 = mysql_query($sql2) or die("<p>Ошибка " . mysql_error() . " в строке " . _LINE_ . "</p>");
	echo "Added a new table!";
}
if(isset($_POST['submit_show'])){
	$sql3 = "SHOW TABLES FROM `testdb`";
	$query3 = mysql_query($sql3) or die("<p>Ошибка " . mysql_error() . " в строке " . _LINE_ . "</p>");
	echo $query3;
}
if(isset($_POST['submit_inf'])){

}


mysql_close();




?>

<!DOCTYPE html>
<html>
<head>
	<title>Test page</title>
</head>
<body>

<form method="POST">
<input type="submit" name="submit_table" value="Add table">
<input type="submit" name="submit_show" value="Show table">
</form>

</body>
</html>