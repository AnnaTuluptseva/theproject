<?php
	ini_set ("session.use_trans_sid", true);
	session_start();
	if($_SESSION['online'] == 1){
		$online = 'Online';
	} 
	$user_window = 0; // Личный кабинет

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
				thecabinet
				<p><?$_SESSION['username']?></p>
				<p><?$_SESSION['email']?></p>
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
	<div class="clear"></div>
	<?php
	include_once 'main/footer.php';
	?>
</div>

</body>
</html>