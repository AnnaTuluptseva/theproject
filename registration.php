<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Регистрация</title>
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
			
		<p class="submit-1"><input type="submit" name="submit" id="btn-submit" value="Зарегистрироваться"></p>
		
      </form>
    </div>
	<div align="center"><p class="remember_me "><a href="index.php">На главную страницу</a>.</p></div>
</section>

</body>
</html>