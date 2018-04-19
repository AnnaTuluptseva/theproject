<?php

require_once('functions.php');

$errors = array();
$fields = array();

$reg = false;

// Если была нажата кнопка регистрации
if(isset($_POST['submit'])) {			

	$errors['email'] = $errors['password'] = $errors['password_again'] = '';
	
	$fields['email'] = trim($_POST['email']);
	$password = trim($_POST['password']);
	$password_again = trim($_POST['password_again']);
	
	$errors['email'] = checkemail($fields['email']) === true ? '' : checkemail($fields['email']);
	
	$errors['password'] = checkPassword($password) === true ? '' : checkPassword($password);
	
	$errors['password_again'] = (checkPassword($password) === true && $password === $password_again) ? '' : 'Введенные пароли не совпадают';
	
	
	if($errors['email'] == '' && $errors['password'] == '' && $errors['password_again'] == '') {

		$reg = registration($fields['email'], $password);
		
		if($reg === true) {
			/*$message = '<p>Вы успешно зарегистрировались в системе. Сейчас вы будете переадресованы на главную страницу. Если это не произошло, перейдите на неё по <a href="index.html">прямой&nbsp;ссылке</a>.</p>';*/
			
			header('Refresh: 1; URL = errors/error_registration_1.php');
		}
		
		else {
			$errors['full_error'] = $reg;
		}
	}
	
if($reg !== true) {
	echo $errors['full_error'] ? $errors['full_error'] : '';
}

else {
	print $message;
}

}
?>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Регистрация</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
</head>
<body>

<section class="container">
	  <div class="login" align="center">
      <h1>Регистрация</h1>
	<form action="" method="post">
		<p><input type="text" name="email" id="email" value="<?=$fields['email'];?>"  placeholder="email"></p>
			<div class="error" id="email-error"><?=$errors['email'];?></div>
						
		<p><input type="password" name="password" id="password" value="" placeholder="Password"></p>
			<div class="error" id="password-error"><?=$errors['password'];?></div>
			
		<p><input type="password" name="password_again" id="password_again" value="" placeholder="Repeat password"></p>
			<div class="error" id="password_again-error"><?=$errors['password_again'];?></div>

		<p><select class="wrapper-dropdown" id="language" name="language"></p>
				<option value="" disabled selected style='display:none;'>Предпочитаемый язык</option>
				<option id="1">English</option> 
				<option id="2">Русский</option> 

			</select>
			
		<p class="submit-1"><input type="submit" name="submit" id="btn-submit" value="Зарегистрироваться"></p>
		
      </form>
    </div>
	<div align="center"><p class="remember_me "><a href="index.html">На главную страницу</a>.</p></div>
  </section>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="bootstrap/assets/js/vendor/popper.min.js"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>