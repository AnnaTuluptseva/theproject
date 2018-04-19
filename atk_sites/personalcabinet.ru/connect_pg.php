<?

function connect() {
	// Объявляем переменные, в которых будут храниться параметры для подключения к СУБД
	$db_host = 'localhost';				// Сервер
	$db_user = 'postgres';			// Имя пользователя
	$db_password = '';	// Пароль пользователя
	$db_name = 'cabinet';				// Имя базы данных
	
	// Подключаемся к серверу
	$conn = pg_connect("host=localhost port=5432 dbname=postgres user=WebUser password=ga1{cgDcD#") or die("<p>Can't connect!");
	
	
	/*$query = pg_query($conn,) or die("<p>Can't do: " . mysql_error() . ". Errow in " . __LINE__ . "</p>");*/

	echo pg_last_error($conn);
}


?>