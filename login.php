<?php
	include_once('functions/authorization.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Вход</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/loginstyles.css">
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="js/forms.js" type="text/javascript"></script>	
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
	<section class="container">
	   	<h1>Вход</h1>
		<form action="" method="post" class="registration">
			<p><input type="text" name="email" class="required email error" value="" placeholder="email"></p>
			<p>	<label class="error" id="error_email" for="email" generated="true"><?=$error1;?> </lable></p>
						
			<p><input type="password" name="password" class="required password error" value="" placeholder="Password"></p>
			<p>	<label class="error" id="error_password" for="password" generated="true"><?=$error2;?></lable></p>
			
			<p class="submit-1"><input type="submit" name="login" class="login_btn" value="Войти"></p>
			<!--<p class="submit-1"><input type="submit" name="registration" class="btn-submit" value="Зарегистрироваться"></p>	-->	
      	</form>
 	<p class="remember_me "><a href="registration.php">Регистрация</a>.</p>
	<p class="remember_me "><a href="index.php">На главную страницу</a>.</p>
	</section>
	</div>
	<div class="clear"></div>
	<?php
	include_once 'main/footer.php';
	?>
</div>

</body>
</html>