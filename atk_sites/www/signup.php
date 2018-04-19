<?php 
//include_once 'connect.php';
	/*$con = mysqli_connect("localhost", "root", "", "cabinet");

    

    $login = $_POST["login"];    
    $password = $_POST["password"];
    $email_u = $_POST["email"];

    $response = array();
  
    $res = $con->query("SELECT * FROM users WHERE login='$login'");
    $num_names = 0;
    for ($row_no = $res->num_rows - 1; $row_no >= 0; $row_no--) {
        $num_names ++;
    }

    if($num_names>0){
        $response["success"] = 2;  
    } else
    {    
    $statement = mysqli_prepare($con, "INSERT INTO users (login, password, email) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($statement, "sss",  $login, $password, $email);
    mysqli_stmt_execute($statement);

    $response["success"] = 1;  
    }
    echo json_encode($response);
    mysqli_close($con);*/


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
if(isset($_POST['commit'])) {
	// Делаем массив сообщений об ошибках пустым
	$errors['password'] = $errors['password2'] = $errors['email'] = '';
	
	// С помощью стандартной функции trim() удалим лишние пробелы
	// из введенных пользователем данных
	/*$login = trim($_POST['login']);*/
	$password = trim($_POST['password']);
	$password2 = trim($_POST['password2']);
	$email = trim($_POST['email']);
	
	// Если логин не пройдет проверку, будет сообщение об ошибке
	/*$errors['login'] = checkLogin($login) === true ? '' : checkLogin($login);*/
	
	// Если пароль не пройдет проверку, будет сообщение об ошибке
	$errors['password'] = checkPassword($password) === true ? '' : checkPassword($password);
	
	// Если пароль введен верно, но пароли не идентичны, будет сообщение об ошибке
	$errors['password2'] = (checkPassword($password) === true && $password === $password2) ? '' : 'Введенные пароли не совпадают';
	
	// ЕЕсли email не пройдет проверку, будет сообщение об ошибке
	$errors['email'] = checkemail($email) === true ? '' : checkemail($email);
	
	// Если ошибок нет, нам нужно добавить информацию о пользователе в БД
	if($errors['email'] == '' && $errors['password'] == '' && $errors['password2'] == '' && $errors['email'] == '') {
		// Вызываем функцию регистрации, её результат записываем в переменную
		$reg = registration($password, $email);
		
		// Если регистрация прошла успешно, сообщаем об этом пользователю
		// И создаем заголовок страницы, который выполнит переадресацию к форме авторизации
		if($reg === true) {
			$message = '<p>Вы успешно зарегистрировались в системе. Сейчас вы будете переадресованы к странице авторизации. Если это не произошло, перейдите на неё по <a href="index.html">прямой&nbsp;ссылке</a>.</p>';
			header('Refresh: 5; URL = index.html');
		}
		// Иначе сообщаем пользователю об ошибке
		else {
			$errors['full_error'] = $reg;
		}
	}
}

    
?>