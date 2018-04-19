<?php
require_once('signup.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php 
    /*include_once 'functions/signup.php'; */
    ?>

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->
    <link rel="stylesheet" type="text/css" href="styles.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    
    <div class="login_registration">
        <h1>Регистрация</h1>
        <form method="POST" action="">
            <p><input type="text" name="email" value="" placeholder="Email"></p> 
            <div class="error" id="email-error"><?=$errors['email'];?></div>
            <!--<p><input type="text" name="login" value="" placeholder="Логин"></p>
            <p><input type="text" name="organizations_name" value="" placeholder="Наименование организации"></p>-->
            <!--<p><input type="text" name="address" value="" placeholder="Адрес организации"></p>
            <p><input type="text" name="phone_number" value="" placeholder="Телефонный номер огранизациии"></p>
            <p><input type="text" name="site" value="" placeholder="Сайт организации"></p>                  
            <p><input type="text" name="logo" value="" placeholder="Логотип"></p>-->
            <p><input type="password" name="password" value="" placeholder="Пароль"></p>
            <div class="error" id="password-error"><?=$errors['password'];?></div>
            <p><input type="password" name="password2" value="" placeholder="Повторите пароль"></p>
            <div class="error" id="password2-error"><?=$errors['password2'];?></div>
            <p class="submit"><input type="submit" name="commit" value="Зарегистрироваться"></p>
        </form>          
    </div>

    <script type="text/javascript">
        $(function(){
            $(".submit").click(function(){ 
                alert('Мир jQuery');
        });
    });
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>