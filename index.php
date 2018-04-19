<?php
	ini_set ("session.use_trans_sid", true);
	session_start();
	if($_SESSION['online'] == 1){
		$online = 'Online';
	} 
	$username = $_SESSION['username'];
	$useremail = $_SESSION['email'];
	//echo $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Главная</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/usersstyles.css">
	<link rel="stylesheet" type="text/css" href="/../css/loginstyles.css">
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>	
	<script src="js/buttons.js" type="text/javascript"></script>	
</head>
<body>

<div class="wrapper">	
	<?php
	include_once 'main/header.php';
	include_once 'main/navigation.php';
	?>
	<div class="clear"></div>

	<div class="content">		
		<div class="firstpage">			
			<p class="greeting">
				Добро пожаловать в систему контроля процесса обучения!
			</p>
			<div class="frontpic">
				<span class="left"> <img src="img/frontpic1.jpg" ></span>
				<span class="right"> <img src="img/frontpic2.jpg" ></span>
			</div>
		</div>
		<div class="aboutus"> 
			<h1>
				О наc
			</h1>
			<p>
				<span>STUDY CONTROL</span> - приложение для контроля процесса обучения. Это новый проект, который ждет великое будущее. Оно поможет вам достичь успеха при помощи новой методики контроля.
			</p>
		</div>
		<div class="contacts">
			<h1>Контакты</h1>
			<p>Телефон: +79155166361</p>
			<p>Email: anya.tul@yandex.ru </p>
		</div>
		<div class="userpage">
			<div class="user_navigation">
				<ul>
					<!-- id в навигации пользователя могут быть только числа!!! -->
					<li class="thecabinet"><div id="1" class="noselect">Личный кабинет</div></li>
					<li class="thegoals"><div id="2" class="noselect">Цели</div></li>
					<li class="thetests"><div id="3" class="noselect">Тестирование</div></li>
					<li class="thediagrams"><div id="4" class="noselect">Диаграмы успеха</div></li>
				</ul>	
			</div>	
			<div class="user_content">
				<div class="thecabinet">
					<?php 
						include_once('main/thecabinet.php');
					?>
				</div>
				<div class="thegoals">
					thegoals
				</div>	
				<div class="thetests">
					thetests
				</div>	
				<div class="thediagrams">
					thediagrams
				</div>			
			</div>
		</div>
		<div  class="errorblock">
			<section class="container">
    			<p class="errormessage">Произошла ошибка!</p>
				<p class="remember_me "><a href="index.php">На главную страницу</a>.</p>
			</section>
		</div>
		
	</div>
	<div class="clear"></div>
	<?php
	include_once 'main/footer.php';
	?>
</div>

</body>
</html>