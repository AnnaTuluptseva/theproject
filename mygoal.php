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
	<meta http-equiv="Content-Type" content="text/css; charset=utf-8" />
	<title>Тест</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/usersstyles.css">
	<link rel="stylesheet" type="text/css" href="css/loginstyles.css">
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>	
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="js/buttons.js" type="text/javascript"></script>	
	<script src="js/forms.js" type="text/javascript"></script>	
</head>
<body>

<div class="wrapper">	
	<?php
	include_once 'main/header.php';
	include_once 'main/navigation.php';
	?>
	<div class="clear"></div>

	<div class="content">	
		
	</div>
	<div class="clear"></div>
	<?php
	include_once 'main/footer.php';
	?>
</div>

</body>
</html>