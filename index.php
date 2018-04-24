<?php
	ini_set ("session.use_trans_sid", true);
	session_start();
	if($_SESSION['online'] == 1){
		$online = 'Online';
	} 
	$username = $_SESSION['username'];
	$useremail = $_SESSION['email'];
	//echo $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/css; charset=utf-8" />
	<title>Главная</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/usersstyles.css">
	<link rel="stylesheet" type="text/css" href="css/loginstyles.css">
	<script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>	
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="js/buttons.js" type="text/javascript"></script>	
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
		<div class="firstpage">			
			<p class="greeting">
				Добро пожаловать в систему контроля процесса обучения!
			</p>
			<div class="frontpic">
				<span class="left"> <img src="img/frontpic1.jpg" ></span>
				<span class="right"> <img src="img/frontpic2.jpg" ></span>
			</div>
		</div>
		<div class="aboutus"> 
			<h1>
				О наc
			</h1>
			<p>
				<span>STUDY CONTROL</span> - приложение для контроля процесса обучения. Это новый проект, который ждет великое будущее. Оно поможет вам достичь успеха при помощи новой методики контроля.
			</p>
		</div>
		<div class="contacts">
			<h1>Контакты</h1>
			<p>Телефон: +79155166361</p>
			<p>Email: anya.tul@yandex.ru </p>
		</div>
		<div class="userpage">
			<div class="user_navigation">
				<ul>
					<li class="thecabinet"><div class="noselect">Личный кабинет</div></li>
					<li class="thegoals"><div class="noselect">Цели</div></li>
					<li class="thetests"><div class="noselect">Тестирование</div></li>
					<li class="thediagrams"><div class="noselect">Диаграмы успеха</div></li>
				</ul>	
			</div>	
			<div class="user_content">
				<div class="thecabinet">
					<?php 
						include_once('main/thecabinet.php');
					?>
				</div>
				<div class="thegoals">
					<?php 
						include('functions/getgoals.php');
					?>
					<div>
						<p class='usertopic'>Поставить новую цель:</p>
						<span class='newgoal'>
							<p>
								Новая цель
							</p>
						</span>
					</div>
					<script type="text/javascript">
						var goals = '<?php echo $row[2];?>';
						var numg = goals.length;
						//alert(numg); 
						for (var i = 0; i < numg; i++) {
							//document.write(i +': ' + goals[i]);
						}
						//alert(goals[0]);
					</script>
				</div>	
				<div class="newgoal">
						<h1>Новая цель</h1>
						<form action="functions/addgoal.php" class="addgoal" method="post">
							<p>Наименование цели:</p>
							<p><input type="text" name="goalname" class="required error" placeholder=""></p>
							<p>	<label class="error" for="goalname" generated="true"></lable></p>
							<p>Краткий комментарий:</p>
							<p><input type="text" name="goaltext" class="required error" placeholder=""></p>
							<p>	<label class="error" for="goaltext" generated="true"></lable></p>
							<p>Выберите дату, к которой цель должна быть достигнута:</p>
							<p><input type="datetime" name="goaldeadline" class="required error" value="" placeholder="YYYY.MM.DD"></p>
							<p>	<label class="error" for="goaldeadline" generated="true"></lable></p>
										
							<p><input type="submit" name="addgoal" class="newgoal_btn" value="Добавить цель"></p>
		
    					 </form>
				</div>
				<div class="thetests">
					thetests
				</div>	
				<div class="thediagrams">
					thediagrams
				</div>			
			</div>
		</div>
		<div  class="errorblock">
			<section class="container">
    			<p class="errormessage">Произошла ошибка!</p>
				<p class="remember_me "><a href="index.php">На главную страницу</a>.</p>
			</section>
		</div>
		
	</div>
	<div class="clear"></div>
	<?php
	include_once 'main/footer.php';
	?>
</div>

</body>
</html>