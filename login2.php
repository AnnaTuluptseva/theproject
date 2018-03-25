<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Вход</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/loginstyles.css">
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
	<div class="login" align="center">
    	<h1>Вход</h1>
		<form action="" method="post">
			<p><input type="text" name="email" class="email" value="<?=$fields['email'];?>"  placeholder="email"></p>
			<div class="error" id="email-error"><?=$errors['email'];?></div>
						
			<p><input type="password" name="password" class="password" value="" placeholder="Password"></p>
			<div class="error" id="password-error"><?=$errors['password'];?></div>
			
			<p><input type="password" name="password_again" class="password_again" value="" placeholder="Repeat password"></p>
			<div class="error" id="password_again-error"><?=$errors['password_again'];?></div>
			
			<p class="submit-1"><input type="submit" name="submit" class="btn-submit" value="Войти"></p>
		
      	</form>
    </div>
    <div align="center"><p class="remember_me "><a href="registration.php">Регистрация</a>.</p></div>
	<div align="center"><p class="remember_me "><a href="index.php">На главную страницу</a>.</p></div>
</section>
</div>
<div id="clear"></div>
<?php
	include_once 'main/footer.php';
?>
</div>

</body>
</html>