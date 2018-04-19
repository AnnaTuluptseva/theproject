<?php
/**
  * registration.php
  * Страница регистрации пользователей. Предполагается, что в вашей
  * базе данных присутствует таблица пользователей users, в которой
  * есть поля id, login, password, reg_date
  */
  
// Подключаем файл с пользовательскими функциями
require_once('functions.php');

// Инициализируем переменные для введенных значений и возможных ошибок
$errors = array();
$fields = array();

// Заранее инициализируем переменную регистрации, присваивая ей ложное значение
$reg = false;

// Если была нажата кнопка регистрации
if(isset($_POST['submit'])) {			
	// Делаем массив сообщений об ошибках пустым
	$errors['email'] = $errors['password'] = $errors['password_again'] = '';
	
	// С помощью стандартной функции trim() удалим лишние пробелы
	// из введенных пользователем данных
	$fields['email'] = trim($_POST['email']);
	$password = trim($_POST['password']);
	$password_again = trim($_POST['password_again']);
	
	// Если логин не пройдет проверку, будет сообщение об ошибке
	$errors['email'] = checkemail($fields['email']) === true ? '' : checkemail($fields['email']);
	
	// Если пароль не пройдет проверку, будет сообщение об ошибке
	$errors['password'] = checkPassword($password) === true ? '' : checkPassword($password);
	
	// Если пароль введен верно, но пароли не идентичны, будет сообщение об ошибке
	$errors['password_again'] = (checkPassword($password) === true && $password === $password_again) ? '' : 'Введенные пароли не совпадают';
	
	
	
	
	// Если ошибок нет, нам нужно добавить информацию о пользователе в БД
	if($errors['email'] == '' && $errors['password'] == '' && $errors['password_again'] == '') {
		// Вызываем функцию регистрации, её результат записываем в переменную
		$reg = registration($fields['email'], $password);
		
		// Если регистрация прошла успешно, сообщаем об этом пользователю
		// И создаем заголовок страницы, который выполнит переадресацию к форме авторизации
		if($reg === true) {
			$message = '<p>Вы успешно зарегистрировались в системе. Сейчас вы будете переадресованы на главную страницу. Если это не произошло, перейдите на неё по <a href="index.html">прямой&nbsp;ссылке</a>.</p>';
			header('Refresh: 3; URL = index.html');
		}
		// Иначе сообщаем пользователю об ошибке
		else {
			$errors['full_error'] = $reg;
		}
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
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">
</head>
<body>
<?
// Показываем форму только если пользователь еще не запустил процесс регистрации, 
// и если регистрация не была успешной
if($reg !== true) {
?>
	<!-- Блок для вывода сообщений об ошибках -->
	<div id="full_error" class="error" style="display:
	<?
	echo $errors['full_error'] ? 'inline-block' : 'none';
	?>
	;">
	<?
	// Выводим сообщение об ошибке, если оно есть
	echo $errors['full_error'] ? $errors['full_error'] : '';
	?>
	</div>
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
<?php
}	// закрывающая фигурная скобка условия проверки запущенного процесса регистрации
// Если регистрация прошла успешно, сообщаем об этом
else {
	print $message;
}
/**
  * Если всё пройдет как положено, вы сможете попробовать 
  * зарегистрировать такого же точно пользователя. Скрипт 
  * должен будет сообщить об ошибке
  */
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="bootstrap/assets/js/vendor/popper.min.js"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>