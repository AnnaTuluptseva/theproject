<?php
ini_set ("session.use_trans_sid", true);
session_start();
include_once('connect.php');
//include('functions.php');
connectDB ();
$online_user = mysql_query ("UPDATE users SET online=0 WHERE id_u='".$_SESSION['id_u']."'");
if($online_user){
    session_destroy();
    closeDB ();
	header("Location: /../index.php", TRUE, 301);
} else{
    header("Location: /../errors/autoerror.php", TRUE, 301);
}

?>