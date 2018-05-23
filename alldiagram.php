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
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var data2 = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     2],
          ['Eat',      20],
          ['Commute',  10],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'Достигнутые цели',
          backgroundColor: '#F0FFF6',
          titleTextStyle:{color:'#2a4837',fontSize: 20, bold: true},
          legend:{textStyle: {color:'#2a4837',fontSize: 16}},
        };

        var options2 = {
          title: 'Тестирование',
          backgroundColor: '#F0FFF6',
          titleTextStyle:{color:'#2a4837',fontSize: 20, bold: true},
          legend:{textStyle: {color:'#2a4837',fontSize: 16}},
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));

        document.getElementById("piechart2").style.backgroundColor = '#e8f7ef';

        chart.draw(data, options);
        chart2.draw(data2, options2);
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
		<div id="piechart1" class="piechart"></div>
		<div id="piechart2" class="piechart" ></div>
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