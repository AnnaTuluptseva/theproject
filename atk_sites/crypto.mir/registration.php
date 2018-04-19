<?php require_once("includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->
    <link rel="stylesheet" type="text/css" href="styles.css" media="all">
  </head>
  <body>


<?php
    
    if(isset($_POST["commit"])){
    
    if(!empty($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        /*$login= htmlspecialchars($_POST['login']);*/
        $email=htmlspecialchars($_POST['email']);
        $password=htmlspecialchars($_POST['password']);
        $query=mysql_query("SELECT * FROM users WHERE login='".$login."'");
        $numrows=mysql_num_rows($query);
    if($numrows==0)
    {
        /*echo "New member!";*/
        $sql="INSERT INTO users
        (login, email, password)
        VALUES('$email', '$password')";
        $result=mysql_query($sql);
    if($result){
        $message = "Account Successfully Created";
    } else {
    $message = "Failed to insert data information!";
    }
        } else {
        $message = "That username already exists! Please try another one!";
    }
        } else {
        $message = "All fields are required!";
        }
    }
    ?>

    <?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>












    
    <div class="login_registration">
        <h1>Регистрация</h1>
        <form method="POST" action="index.php">            
            <p><input type="text" name="email" value="" placeholder="Email"></p>
            <!--<p><input type="text" name="login" value="" placeholder="Логин"></p>
            <p><input type="text" name="organizations_name" value="" placeholder="Наименование организации"></p>-->
            <!--<p><input type="text" name="address" value="" placeholder="Адрес организации"></p>
            <p><input type="text" name="phone_number" value="" placeholder="Телефонный номер огранизациии"></p>
            <p><input type="text" name="site" value="" placeholder="Сайт организации"></p>                   
            <p><input type="text" name="logo" value="" placeholder="Логотип"></p>-->
            <p><input type="password" name="password" value="" placeholder="Пароль"></p>
            <p><input type="password" name="password2" value="" placeholder="Повторите пароль"></p>
            <p class="submit"><input type="submit" name="commit" value="Зарегистрироваться"></p>
        </form>          
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>