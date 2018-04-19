<?php
// Convert a string into binary
// Should output: 0101001101110100011000010110001101101011
/*$value = unpack('Q*', "Itsbeautiful");
$word = base_convert($value[1], 16, 2);
echo $word;

echo "<br>";

// Convert binary into a string
// Should output: Stack
echo pack('Q*', base_convert($word, 2, 16));*/
$word = "Hello";
$wholeword = decbin(ord($word));
echo $wholeword;
$l=strlen($word);
echo $$word;
echo "<br>";
for($i=0;$i<$l;$i++){
	$s=substr($word, $i, $i+1);
	$bin = $bin.decbin(ord($s));
}
//$bin = decbin(ord($word));
echo $bin;
echo "<br>";
$char = chr(bindec($bin));
echo $char;
?>