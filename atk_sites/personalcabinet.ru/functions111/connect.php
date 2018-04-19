<?php
	/*$mysqli = false;
	function connectDB (){
		global $mysqli;
		$mysqli = new mysqli ("localhost","root","","engscdb");
		$mysqli->query("SET NAMES 'utf-8'");
	}
	function closeDB (){
		global $mysqli;
		$mysqli->close();
	}*/
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "cabinet";
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>