<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/loginstyles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
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
	<section class="container">
    <h1>Регистрация</h1>
	<form action="main.php" method="post" class="registration">
		<p><input type="text" name="email" class="required email error" value="<?=$fields['email'];?>" placeholder="email"></p>
		<p>	<label class="error" for="email" generated="true"><?=$errors['email'];?> </lable></p>
						
		<p><input type="password" name="password" class="required password error" value="" placeholder="Password"></p>
		<p>	<label class="error" for="password" generated="true"><?=$errors['password'];?></lable></p>
			
		<p><input type="password" name="password_again" class="required password_again error" value="" placeholder="Repeat password"></p>
		<p>	<label class="error" for="password_again" generated="true"><?=$errors['password_again'];?></lable></p>
			
		<p class="submit-1"><input type="submit" name="submit" class="btn-submit" value="Зарегистрироваться"></p>
		
     </form>
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