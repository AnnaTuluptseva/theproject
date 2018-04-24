<?php
	ini_set ("session.use_trans_sid", true);
	session_start();
	if($_SESSION['online'] == 1){
		$online = 'Online';
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Главная</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/contacts.css">
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
		<h1>Контакты</h1>
		<p>Телефон: +79155166361</p>
		<p>Email: anya.tul@yandex.ru </p>
		
	</div>
	<div class="clear"></div>
	<?php
	include_once 'main/footer.php';
	?>
</div>

</body>
</html>