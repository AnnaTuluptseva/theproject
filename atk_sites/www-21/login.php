<?php

require_once('functions.php');

$auth = false;

// Если была нажата кнопка авторизации
if(isset($_POST['submit'])) {
	$errors['email'] = $errors['password'] = '';
	
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	
	$auth = authorization($email, $password);
	
	if($auth === true) {
		/*$message = '<p>Вы успешно авторизовались в системе. Сейчас вы будете переадресованы на главную страницу. Если это не произошло, перейдите на неё по <a href="index.html">прямой&nbsp;ссылке</a>.</p>';*/
		header('Refresh: 1; URL = errors/error_login_1.php');
	}
	else {
		$errors['full_error'] = $auth;
	}
}

if($auth !== true) {
	echo $errors['full_error'] ? $errors['full_error'] : '';
}

else {
	print $message;
}
?>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
<head>
	<title>Авторизация пользователей</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Авторизация</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
	<script>
		window.onload = function() {
			document.getElementById('email').ontextInput = function() {
				alert(this.data);
			},
			focus = function() {
				alert("ok");
			}
			;
		};
	</script>
</head>
<body>

	<section class="container">
	  <div class="login" align="center">
      <h1>Авторизация</h1>
	<form action="" method="post">
	
		<p><input type="text" name="email" id="email" placeholder="Ваш email"></p>
			<div class="error" id="email-error"><?=$errors['email'];?></div>
		
		<p><input type="password" name="password" id="password" placeholder="Пароль"></p>
		<div class="error" id="password-error"><?=$errors['password'];?></div>
			
		<p class="submit-1"><input type="submit" name="submit" id="btn-submit" value="Войти"></p>
		
	</form>
	</div>
	<div align="center"><p class="remember_me ">Нет аккаунта? <a href="registration.php">Зарегистрируйтесь!</a>.</p></div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>