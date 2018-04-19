<?
/**
  * Страница авторизации пользователей. Предполагается, 
  * что в вашей базе данных присутствует таблица users,
  * в которой существуют поля id, login и password
  */
// Подлючаем файл с пользовательскими функциями
require_once('functions.php');
require_once('get_languages.php'); 


// Заранее инициализируем переменную авторизации, присвоив ей ложное значение
$auth = false;

// Если была нажата кнопка авторизации
if(isset($_POST['submit'])) {
	// Делаем массив сообщений об ошибках пустым
	$errors['email'] = $errors['password'] = '';
	
	// С помощью стандартной функции trim() удалим лишние пробелы
	// из введенных пользователем данных
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	
	// Авторизуем пользователя
	// Вызываем функцию регистрации, её результат записываем в переменную
	$auth = authorization($email, $password);
	
	// Если авторизация прошла успешно, сообщаем об этом пользователю
	// И создаем заголовок страницы, который выполнит переадресацию на защищенную
	// от общего доступа страницу
	if($auth === true) {
		$message = '<p>Вы успешно авторизовались в системе. Сейчас вы будете переадресованы на главную страницу. Если это не произошло, перейдите на неё по <a href="main.php">прямой&nbsp;ссылке</a>.</p>';
		header('Refresh: 3; URL = main.php');
	}
	// Иначе сообщаем пользователю об ошибке
	else {
		$errors['full_error'] = $auth;
	}
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Авторизация</title>
	<link rel="stylesheet" type="text/css" href="styles.css" media="all">
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
<?
// Если запущен процесс авторизации, но она не была успешной,
// или же авторизация еще не запущена, отображаем форму авторизации
if($auth !== true) {
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
	  <div class="login_registration" align="center">
      <h1>Авторизация</h1>
	<form action="" method="post">
	
		<p><input type="text" name="email" id="email" placeholder="Ваш email"></p>
		<div class="error" id="email-error"><?=$errors['email'];?></div>
		
		<p><input type="password" name="password" id="password" placeholder="Пароль"></p>
		<div class="error" id="password-error"><?=$errors['password'];?></div>
			
		<p class="submit-1"><input type="submit" name="submit" id="btn-submit" value="Войти"></p>
		
	</form>
	<p class="remember_me ">Нет аккаунта?   <a href="registration.php">Зарегистрируйтесь!</a>.</p>
	</div>
<?
}	// Закрывающая фигурная скобка условного оператора проверки успешной авторизации
// Иначе выводим сообщение об успешной авторизации
else {
	print $message;
}

/**
  * Если всё правильно, будет выведено сообщение об успешной авторизации,
  * пользователь будет переадресован на защищенную страницу
  */
?>
</body>
</html>