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
	$buf .= "\1";	// ѭ�������۸�Ϊ1���������Ƕ�һ�Σ�����
	$buf .= substr($im, $pos+1);
	echo $buf;
	//echo 'modify loop --> 1 @'.$pos.':::'.substr($im, $pos-13, 15);
}
else {
	echo $im;
	//echo 'return orig gif!';
}

//$im = imagecreatefromgif("temp/1.gif");		//ò��ֻ�ܶ�����һ֡������
//imagegif($im);     							//���ͼƬ����������


?>