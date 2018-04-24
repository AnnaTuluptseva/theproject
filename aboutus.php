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
	<title>О нас</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/aboutus.css">
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
		<h1>
			О наc
		</h1>
		<p>
			<span>STUDY CONTROL</span> - приложение для контроля процесса обучения. Это новый проект, который ждет великое будущее. Оно поможет вам достичь успеха при помощи новой методики контроля.
		</p>
		
	</div>
	<div class="clear"></div>
	<?php
	include_once 'main/footer.php';
	?>
</div>

</body>
</html>