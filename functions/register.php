<?php 
$_SESSION['user_name'] = $_POST['user_name'];
$_SESSION['user_email'] = $_POST['user_email'];

$user_name = $mysqli->escape_string($_POST['user_name']);
$user_email = $mysqli->escape_string($_POST['user_email']);
$user_password = $mysqli->escape_string(password_hash($_POST['user_password'], PASSWORD_BCRYPT));
$user_r_password = $mysqli->escape_string(password_hash($_POST['user_r_password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

$result = $mysqli->query("SELECT * FROM users WHERE (user_name='$user_name') OR (user_email='$user_email')") or die($mysqli->error());


if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email or username already exists!';
    header("location: error.php");
}
else {
	$sql = "INSERT INTO users (user_name, user_email, user_password, hash) " 
            . "VALUES ('$user_name','$user_email','$user_password', '$hash')";

    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( clevertechie.com )';
        $message_body = '
        Hello '.$user_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }
}


?>