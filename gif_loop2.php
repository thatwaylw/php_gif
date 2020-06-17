<?php
Header ('Content-type:image/gif'); 

$fn = "temp/1.gif";
//$fn = "http://res.yuanqutech.com/hanzi/hanzi_bishun_3355.gif";
if(isset($_GET['fn']))
	$fn = $_GET['fn'];
//echo $fn.'<br>';

$im = file_get_contents($fn);
$pos = strpos($im, "NETSCAPE2.0");
if ($pos !== false) {
	$pos += 13;		// ...NETSCAPE2.0\3\1
	$buf = substr($im, 0, $pos);
	$buf .= "\1";	// 循环次数篡改为1（但是总是多一次？？）
	$buf .= substr($im, $pos+1);
	echo $buf;
	//echo 'modify loop --> 1 @'.$pos.':::'.substr($im, $pos-13, 15);
}
else {
	echo $im;
	//echo 'return orig gif!';
}

//$im = imagecreatefromgif("temp/1.gif");		//貌似只能读到第一帧。。。
//imagegif($im);     							//输出图片二进制数据


?>