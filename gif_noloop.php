<?php
Header ('Content-type:image/gif'); 

$fn = "temp/1.gif";		//$fn = "http://res.yuanqutech.com/hanzi/hanzi_bishun_3355.gif";
if(isset($_GET['fn']))
	$fn = $_GET['fn'];
//echo $fn.'<br>';

$im = file_get_contents($fn);
$pos = strpos($im, "NETSCAPE2.0");
if ($pos !== false) {
	$pos -= 2;		// ff 0b NETSCAPE2.0 03 01 01 ---> 这一段 16 bytes 要去掉
	$buf = substr($im, 0, $pos);
	$buf .= substr($im, $pos+16);
	echo $buf;
	//echo 'modify loop --> 1 @'.$pos.':::'.substr($im, $pos-13, 15);
}
else {
	echo $im;
	//echo 'return orig gif!';
}

?>