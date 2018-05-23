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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Тесты', 'Ожидаемый результ','Результат','Процент набранных баллов за тест'],
          ['Are you clever person?', 0.9, 0.95, 0.9],
          ['Test 3', 0.8, 0.90, 0.85],
          ['Веб-дизайн', 0.9, 0.6, 0.7],
          ['Основы JavaScript', 0.9, 0.9, 0.9]
        ]);

        var options = {
          chart: {
            title: 'Результаты пройденных тестов ',
            subtitle: 'Тестирование',
          },
          vAxis: {format: 'percent'},
          colors: ['#0E4927','#1FA85A','#9DF6C6'],
          backgroundColor: '#F0FFF6',
          titleTextStyle:{color:'#2a4837',fontSize: 20},
          legend:{textStyle: {color:'#2a4837'}},
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
</script>
</head>
<body>

<div class="wrapper">	
	<?php
	include_once 'main/header.php';
	include_once 'main/navigation.php';
	?>
	<div class="clear"></div>

	<div class="content">	
		<div class="diagram"> 	
		<div id="columnchart_material"></div>
		<div><a href="index.php">Вернуться</a></div>
		</div>
	</div>
	<div class="clear"></div>
	<?php
	include_once 'main/footer.php';
	?>
</div>

</body>
</html>