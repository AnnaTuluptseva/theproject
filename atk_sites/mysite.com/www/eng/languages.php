<?php 
	//print_r($_POST);
	/*if (isset($_POST["done"])) {
		if ($_POST["name"] == "") {
			echo "hi! <br>"; 
		}
		else echo "bye! <br>";
	}*/
	/*if ($_POST["language"] == "eng") {
		echo "Выбран английский язык <br>";
	}
	if ($_POST["language"] == "ru") {
		echo "Выбран русский язык <br>";
	}
	if ($_POST["language"] == "") {
		echo "Ошибка язык не выбран <br>";
	}*/
	/*if (isset($_POST["language"])) {
		echo("Выбранные пункты: <br>");
		foreach ($_POST["language"] as $item) {
			echo $item . "br>";
		}
	}*/
	if (isset($_POST["done"])) {
	if ($_POST["language"] == 1)
		header("Location: index.php");
	if ($_POST["language"] == 2){
		header("Location: ../ru/index.php");
		exit();
	}
	}
?>