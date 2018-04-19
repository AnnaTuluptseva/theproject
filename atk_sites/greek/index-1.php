<?
session_start();

require_once('functions.php');

if(isset($_POST['submit'])) {
		if($_POST['language'] == '1'){
			$_SESSION['name'] = 'eng';
		}elseif ($_POST['language'] == '2'){
			$_SESSION['name'] = 'rus';
		}
        header("Location: main.php");
		//session_write_close();
		
}
?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?=$lang['our_site'];?></title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
	<link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">

	</head>

	<body>
		<section class="container">
		<div class="login" align="center">
			<h1>Выберите язык</h1>
				<form action="" method="post">
						<select class="wrapper-dropdown" id="language" name="language">
							<option value="" disabled selected style='display:none;'></option>
							<option value="1">English</option> 
							<option value="2">Русский</option> 

						</select>
					
					<p class="submit-1"><input type="submit" name="submit" id="btn-submit" value="Выбрать"></p>
				</form>
							
			</div>
		</section>
		
		
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>