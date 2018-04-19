<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div id='q'></div>

<?php
	/*$doc = new DOMDocument;
	$doc->loadHTMLFile("https://api.kraken.com/0/public/Time");*/
	//echo $doc;
	//$doc->getElementsByID('unixtime');
	//echo $doc;
	$tTime= file_get_contents('https://api.kraken.com/0/public/Time');
	$json_obj = json_decode($tTime);//JSON_PRETTY_PRINT);
	//print_r($json_obj);
	var_dump($json_obj);
	//echo $json_obj;
	/*if( $tTime != false && !is_null($json_obj)){
    foreach($json_obj as $k => $e){
        echo '<p>'  . $e . '</p>';
    }
}*/
    /*$str1 = stripos($tTime,'unixtime');
    echo $str1 .'</br>';
    $str2 = strrpos($tTime,'unixtime');
    echo $str2 .'</br>';*/
    /*$str3 = strstr($tTime,'unixtime');
    echo $str3 .'</br>';
    $str4 = strpos($str3,',');
    echo $str4 .'</br>';
    str5 = substr($str3,10);
    echo $str5 .'</br>';*/
	/*$xml = simplexml_load_file($sContent);
	echo $xml;*/

	/*$aAssets = file_get_contents('https://api.kraken.com/0/public/Assets');
	echo $aAssets .'</br>';*/
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


</body>
</html>