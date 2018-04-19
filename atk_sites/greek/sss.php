<?php 
function strToBin($input) 
{ 
if (!is_string($input)) 
return false; 
$ret = ''; 
for ($i = 0; $i < strlen($input); $i++) 
{ 
$temp = decbin(ord($input{$i})); 
$ret .= str_repeat("0", 8 - strlen($temp)) . $temp; 
} 
return $ret; 
}
echo strToBin("phptuts");
$dva=strToBin("phptuts");
$des=bindec($dva);
echo "<br>";
echo $des;
$sum=$des+123;
$sumdva=decbin($sum);
echo "<br>";
echo decbin(123);
echo "<br>";
echo $sumdva;
?>